<?php
    include_once "dbh.php";

    if (isset($_POST["bUpload"])) {
        $newFileName = $_POST["fileName"];
        // What happens if there is no filename
        if (empty($newFileName)) {
            // Later we can insert a random id.
            $newFileName = "gallery";
        } else {
            // Replace spaces with _ and only use lower cases
            $newFileName = strtolower(str_replace(" ", "_", $newFileName));
        }
        $imageTitle = $_POST["fileTitle"];
        $imageDesc = $_POST["fileDesc"];
        // Grab the file
        $file = $_FILES["file"];
        // print_r($file); to test the upload

        // Grab the information of the image
        $fileName = $file["name"];
        $fileType = $file["type"];
        $fileTempName = $file["tmp_name"];
        $fileError = $file["error"];
        $fileSize = $file["size"];

        // explode() to take away the filename from the extension
        // end to take the ending
        $array = explode(".", $fileName);
        $fileExt = strtolower(end($array));

        // What do we allow
        $allowed = array("jpg", "jpeg", "png");

        // Error handling:
        // Is a specific string in one of the arrays?
        if (!in_array($fileExt, $allowed)) {
            echo "You need to upload a proper file type!";
            exit();
        } else {
            if (!$fileError === 0) {
                echo "You had an error!";
                exit();
            } else {
                if ($fileSize > 20000000) {
                    echo "Upload a smaller image";
                    exit();
                } else {
                    // If there is finally no error!
                    // Is it a unique Name. Combine it (.) with a random number
                    // New name for the image

                    $imageFullName = $newFileName . "." . uniqid("", true) . "." . $fileExt;
                    $fileDestination = "../img/" . $imageFullName;

                    if (empty($imageTitle) || empty($imageDesc)) {
                        header("Location: ..index.php?upload=empty");
                        exit();
                    } else {
                        $sql = "SELECT * FROM gallery;";
                        $stmt = mysqli_stmt_init($conn);

                        // Does the prepared statement work?
                        if (!mysqli_stmt_prepare($stmt, $sql)) {
                            echo "Prepared Statement failed!";
                        } else {
                            mysqli_stmt_execute($stmt);

                            // Now give me the output of the prepared statement
                            $result = mysqli_stmt_get_result($stmt);

                            // Give sequential numbers to the images (for ordering)
                            $rowCount = mysqli_num_rows($result);
                            $setImageOrder = $rowCount + 1;

                            // Upload information to the database
                            $sql =  "
                                    INSERT INTO gallery 
                                    (titleGallery, descGallery, imgFullNameGallery, orderGallery) 
                                    VALUES (?, ?, ?, ?); 
                                    ";

                            // We take the initialized prepared statement from above
                            if (!mysqli_stmt_prepare($stmt, $sql)) {
                                echo "Prepared Statement failed!";
                            } else {
                                // Insert for the ? placeholders above
                                mysqli_stmt_bind_param($stmt, "ssss",
                                    $imageTitle, $imageDesc, $imageFullName, $setImageOrder);
                                mysqli_stmt_execute($stmt);

                                move_uploaded_file($fileTempName, $fileDestination);
                                header("Location: ../index.php?upload=success");
                            }
                            }
                    }
                }
            }
        }
    }