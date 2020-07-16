<?php
    //Save inside the "includes"-directory because the code is not visible to the user
    $dbServername = "localhost"; //Connect database to php
    $dbUsername = "root";        //Changes only when you go online
    $dbPassword = "";            //Default
    $dbName = "loginsystem";     //Whatever you create in phpmyadmin

    $conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName); //Connection to our database

?>
