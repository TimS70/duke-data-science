<?php
    session_start();
    include_once "dbh.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Upload</title>
</head>
<body>

<?php
    //Show in the browser how the user looks like
    $sql = "SELECT * FROM user";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) { //Check if we have users inside the database
        while ($row = mysqli_fetch_assoc($result)) { //If we get any data spit any result out, one after another
            $id = $row["$id"];
            $sqlImg = "SELECT * FROM profileimg WHERE userid='$id'"; //Does that user has an uploaded image?
            $resultImg = mysqli_query($conn, $sqlImg);
            while ($rowImg = mysqli_fetch_assoc($resultImg)) {
                echo "<div>";
                    if ($rowImg["status"] == 0) {
                        echo "<img src='uploads/profile".$id.".jpg'".mt_rand().">"; //Create personal image
                    } else {
                        echo "<img src='uploads/profiledefault.jpg'>";
                    }
                    echo $row["username"];
                echo "</div>";
            }
        }
    } else {
        echo "There are no users yet!";
    }

    if (isset($_SESSION["id"])) {//Check if we are logged in
        if($_SESSION['id'] == 1) {  //Is the session-ID equal to 1?
            echo "You are logged in as user #1 (or Admin)";
        }
        echo '
        <form action="upload.php" method="POST" enctype="multipart/form-data">  
            <!-- enctype specifies how the form data should be encoded -->
            <input type="file" name="file">
            <button type="submit" name="submit">UPLOAD</button>
        </form>
        '; //If we are logged in, we can upload images
    } else {
        echo "You are not logged in!";
        echo "
        <form action='loginInc.php' method='POST'>
            <input type='text' name='first' placeholder='First Name'> 
            <input type='text' name='last' placeholder='Last Name'> 
            <input type='text' name='uid' placeholder='Username'> 
            <input type='password' name='pwd' placeholder='Password'> 
            <button type='submit' name='submitSignup'>Sign Up</button>
        </form>
        ";
    }
?>


<p>Log in as user!</p>
<form action="login.php" method="POST">
    <button type="submit" name="submitLogin">Login</button>
</form>

<p>Log out as user!</p>
<form action="logout.php" method="POST">
    <button type="submit" name="submitLogout">Logout</button>
</form>

</body>
</html>


<?php
