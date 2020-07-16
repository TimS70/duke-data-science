<?php

$server = "localhost";
$username = "root";
$password = "";
$dbName = "phpgallery";

$conn = mysqli_connect($server, $username, $password, $dbName);

// If the connection failed, give me an error message
if (!$conn) {
    die("Connection failed: ". mysqli_connect_error());
}