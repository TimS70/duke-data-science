<?php
    // We start a session on all pages of the website
    session_start();
    include_once "includes/dbh.php";
?>

<!DOCTYPE html>
<html>

<head>
    <title>Gallery</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device_width, initial.scale=1.0">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header class="header">
        <div class="row1">
            <h2>Gallery</h2>
            <?php
            if (!isset($_SESSION["userId"])) {
                echo '
                    <form action="includes/loginInc.php" method="POST" class="login">
                        <input type="text" name="mailLogin" placeholder="mail">
                        <input type="password" name="pwdLogin" placeholder="Password">
                        <button type="submit" name="loginSubmit">Login</button>
                    </form>
                    <form action="signup.php" method="POST">
                        <button type="submit">Sign up</button>
                    </form>
                    ';
            }
            ?>
            <?php
            if (isset($_SESSION["userId"])) {
                echo     '
                    <form action="includes/logoutInc.php" method="POST" class="login">
                        <button type="submit" name="logoutSubmit">Logout</button>
                    </form>
                    ';
            }
            ?>
        </div>
        <div class="row2">
            <nav>
                <a href="#">
                    <img src="webimg/me.jpeg" width="150px" height="10px" alt="logo">
                </a>
                &nbsp;
                <a href = "#">Home</a> |
                <a href = "#">About me</a> |
                <a href = "#">Contact</a>
            </nav>
    </header>
</body>