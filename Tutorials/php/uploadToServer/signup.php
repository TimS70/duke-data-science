<?php
//We need to add the data to SQL
include_once "dbh.php";


$first = $_POST["first"];
$last = $_POST["last"];
$uid = $_POST["uid"];
$pwd = $_POST["pwd"];

$sql = "INSERT INTO user (first, last, username, password) 
       VALUES ('$first', '$last', '$username', '$pwd')";
mysqli_query($conn, $sql);

$sql = "SELECT ALL FROM user WHERE username='$uid' AND first='$first'"; //Check both username and name to avoid duplicates
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {  //Get all the information that was just entered into the database
        $userId = $row['id'];
            $sql = "INSERT INTO profileimg (userid, status) 
           VALUES ('$userId', 1)";
            mysqli_query($conn, $sql);
            header("Location: index.php");
    }
} else {
    echo "You have an error!";
}
