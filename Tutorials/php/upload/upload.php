<?php
if (isset($_POST["submit"])) {
    $file        = $_FILES["file"];
        //$FILES is another superglobal variable
    $fileName    = $_FILES["file"]["name"];
    //Alternative $fileName = $files["name"];
    $fileTmpName = $_FILES["file"]["tmp_name"];
    $fileSize    = $_FILES["file"]["size"];
    $fileError   = $_FILES["file"]["error"];
    $fileType    = $_FILES["file"]["type"];

    //Tell, which files we will allow. Change filename
    $fileExt = explode(".", $fileName);
    $fileActualExt = strtolower(end($fileExt));
        //Make sure that we deal with lowercase
        //end gets the last piece of the data
    $allowed = array("jpg", "jpeg", "png", "pdf");

    if (in_array($fileActualExt, $allowed)) { //Actually always the wrong first
        //is the allowed type in the filetype?
        if ($fileError === 0) { //See above standard output error=> 0
            if ($fileSize < 10000000) {
                $fileNameNew = uniqid("", true).".".$fileActualExt; //Generate a new ID
                $fileDestination = "uploads/".$fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
                header("Location: index.php?uploadedsuccess");
            } else {
                echo "Upload a smaller image!";
            }
        } else {
            echo "There was another error uploading your file!";
        }
    } else {
        echo "You cannot upload files of this type!";
    }
}