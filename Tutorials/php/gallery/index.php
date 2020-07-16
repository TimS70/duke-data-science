<?php
    require "header.php";
?>

<!DOCTYPE html>
<html>

<body>
    <main>
        <?php
            // We only need to check one of the conditions
            if (!isset($_SESSION['userId'])) {
                echo "<p>You are logged out!</p>";
            } else {
                echo "<p>You are logged in!</p>";
            }
        ?>
        <section class="galleryLinks">
            <div class="wrapper">
                <!-- Container for the pictures that we will display inside the page -->
                <div class="galleryContainer">

                    <?php
                    $sql = "SELECT * FROM gallery ORDER BY orderGallery DESC";
                    // Prepared Statement
                    $stmt = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($stmt, $sql))  {
                        echo "SQL statement failed!";
                    } else {
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);

                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '
                            <a href="#">
                                <!-- This div allows to adjust the size of the table -->
                                <div style="background-image: url(img/'.$row["imgFullNameGallery"].');"></div>
                                <h3>'.$row["titleGallery"].'</h3>
                                <p>'.$row["descGallery"].'</p>
                            </a>
        
                            ';

                        }
                    }
                    ?>
                </div>
                <?php
                // If a certain session variable is set, i.e. login
                // The upload form is shown
                if (isset($_SESSION["userId"])) {
                    echo '
                    <div class="galleryUpload">
                        <!-- enctype specifies how the form data should be encoded -->
                        <form action="includes/galleryUpload.php" method="POST" enctype="multipart/form-data">
                            <input type="text" name="fileName" placeholder="File Name">
                            <input type="text" name="fileTitle" placeholder="Image Name">
                            <input type="text" name="fileDesc" placeholder="File Description">
                            <input type="file" name="file">
                            <button type="submit" name="bUpload">UPLOAD</button>
    
                        </form>
                    </div>
                    ';
                }
                ?>

            </div>
        </section>
    </main>

    <?php
        require "footer.php";
    ?>
</body>
</html>