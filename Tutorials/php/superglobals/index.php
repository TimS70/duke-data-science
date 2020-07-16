<?php
include "header.php";
?>

<!doctype html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta charset="UTF-8" http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="../introduction/style.css">
    <title>Superglobals</title>
</head>

<body>

<?php
    //Session is a superglobal variable that can save information in the browser until the browser is closed
    $_SESSION["username"] = "ts380";
    echo $_SESSION["username"];

    if (!isset($_SESSION["username"])) {
        echo "You are not logged in!";
    }
    else {
        echo "You are logged in!";
    }
?>


<!-- POST and GET are superglobals -->
<form method="POST"> <!-- Method is about what to do when submitted. GET and POST pass it to the URL,
    POST hides it, GET shows the variable in the URL -->
    <input type="number" name="num1" placeholder="Insert Number">
    <button type="submit">PRESS ME!</button> <!-- Submitting means doing sth. with the form, when clicked -->
</form>

<!--$_COOKIE
    - Saves information on the server
    - Are easier to hack
    - Has time limit
-->

<!--$_SESSION
    - Saves information on the browser, e.g. saves LogIn-Info, when switching sides
    - Saves, until browser session is closed
-->

<?php
echo $_POST["num1"];

setcookie("nameOfCookie", "ValueEGDaniel", time()+ 86400); //Time is expiration date, other way to destroy is by "-"
$_SESSION["name"] = "12"; //Here, we want to save information about age from hacking and save it in session
?>


</body>
