<?php

session_start();

if (isset($_POST["submitLogin"])) {  //When the user click the login-button on index
    $_SESSION["id"] = 1; //We just want the first ID from the database
    header("Location: index.php");
}