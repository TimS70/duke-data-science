<?php
    include "header.php";
    include_once "includes/dbh.inc.php";
?>

<!doctype html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta charset="UTF-8" http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index</title>
</head>

<body>

<form action="includes/signup.inc.php" method="POST"> <!-- POST, because the data is more sensitive -->
    <!-- I want to run a file, when the submit-button is hit -->
    <?php
    //Give out the past Input depending on the error messages
    if(isset($_GET["first"])) { //If Firstname is set, then keep the input
        $first = $_GET["first"];
        echo '<input name="first" placeholder="Firstname" type="text" value="'.$first.'">';
    }
    else { //If it is not set, give the
        echo '<input name="first" placeholder="Firstname" type="text">';
    }
    if(isset($_GET["last"])) {
        $last = $_GET["last"];
        echo '<input name="last" placeholder="LastName" type="text" value="'.$last.'">';
    }
    else {
        echo '<input name="last" placeholder="LastName" type="text">';
    }
        if(isset($_GET["uid"])) {
        $uid = $_GET["uid"];
        echo '<input name="uid" placeholder="Username" type="text" value="'.$uid.'">';
    }
    else {
        echo '<input name="uid" placeholder="Username" type="text">';
    }
    ?>
    <br>
    <input name="email" placeholder="email" type="text">
    <br>
    <input name="pwd" placeholder="Password" type="password">
    <button name="submit" type="submit">Sign up</button>
</form>


<?php //Display an error message

    /* First Way
    $fullURL = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; //Get the URL

    if (strpos($fullURL, "signup=empty") == true) { //stringpos() checks if there is sth. in the URL
        echo "You did not fill in all fields!";
        exit();
    }
    elseif (strpos($fullURL, "signup=email") == true) {
            echo "You used an invalid email!";
        exit();
    }
    elseif (strpos($fullURL, "signup=char") == true) {
        echo "You used an invalid email!";
        exit();
    }
    elseif (strpos($fullURL, "signup=email") == true) {
        echo "You used invalid characters!";
        exit();
    }
    elseif (strpos($fullURL, "signup=success") == true) {
        echo "You signed up successfully!";
        exit();
    }
    */

    if (!isset($_GET["signup"])) {
        exit();
    } else {
        $signupCheck = $_GET["signup"]; //The variable "signup is equal to whatever comes after the =

        if ($signupCheck == "empty") {
            echo "You did not fill in all fields";
            exit();
        }
        if ($signupCheck == "char") {
            echo "You used invalid characters";
            exit();
        }
        if ($signupCheck == "email") {
            echo "You used an invalid email";
            exit();
        }
        if ($signupCheck == "success") {
            echo "You signed up successfully";
            exit();
        }
    }

?>

</body>
