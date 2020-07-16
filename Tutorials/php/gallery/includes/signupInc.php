<?php

include_once "dbh.php";

//Create an entry for when a user enters his information and clicks submit
if (!isset($_POST["signupSubmit"])) {
    header("Location: ../signup.php");
    exit();
} else {
    $first = $_POST["first"];
    $last = $_POST["last"];
    $mail = $_POST["mail"];
    $pwd = $_POST["pwd"];
    $pwdRepeat = $_POST["pwdRepeat"];

    // Error handlers
    if (empty($first) || empty($last) || empty($mail) || empty($pwd) || empty($pwdRepeat)) {
        //Save the stuff that we already wrote in the URL
        header("Location: ../signup.php?error=emptyfields&first=" . $first . "&last=" . $last . "&mail=" . $mail);
        exit();
    } else if (!filter_var($mail, FILTER_VALIDATE_EMAIL) &&
        !preg_match("/^[a-zA-Z0-9]*$/", $first) || !preg_match("/^[a-zA-Z0-9]*$/", $last)) {
        header("Location: ../signup.php?error=invalidmailname");
        exit();
    } else if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../signup.php?error=invalidmail&first=" . $first . "&last=" . $last);
        exit();
    } else if (!preg_match("/^[a-zA-Z0-9]*$/", $first) || !preg_match("/^[a-zA-Z0-9]*$/", $last)) {
        header("Location: ../signup.php?error=invalidname&mail=" . $mail);
        exit();
    } else if ($pwd !== $pwdRepeat) {
            header("Location: ../signup.php?error=pwdcheck&first=" . $first . "&last=" . $last . "&mail=" . $mail);
            exit();
            // Check if the mail is already taken
    } else {
        $sql = "SELECT uMail FROM users WHERE uMail=?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../signup.php?error=preparedstatement1");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $mail);
            mysqli_stmt_execute($stmt);
            // takes the result that it gets from the database and stores it into $stmt
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);

            if ($resultCheck > 0)    {
                header("Location: ../signup.php?error=mailtaken&first=" . $first . "&last=" . $last);
                exit();
            } else {
                // Insert data into the database
                $sql = "
                    INSERT INTO users (uFirst, uLast, uMail, uPwd) 
                    VALUES(?, ?, ?, ?);            
                    ";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: ../signup.php?error=preparedstatement2");
                    exit();
                } else {
                    // Hash the password
                    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
                    mysqli_stmt_bind_param($stmt, "ssss", $first, $last, $mail, $hashedPwd);
                    mysqli_stmt_execute($stmt);
                    header("Location: ../index.php?signup=success");
                    exit();
                }
            }
        }
    }
    // Close the connection to save resources
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
//Initial SQL-Commands
/*CREATE TABLE contacts(
                a_id int(11) not null PRIMARY KEY AUTO_INCREMENT,
                a_first varchar(256) not null,
                a_last varchar(256) not null,
                a_email text not null,
                a_phone int(11) not null,
                a_reference int(11) not null,
                a_date datetime not null
            );

            INSERT INTO contacts (a_first, a_last, a_email, a_phone, a_reference, a_date)
            VALUES('Tim',
                   'Snow',
                   'second-email@web.de',
                   '55555',
                   'Bosch',
                   '2017-11-25 12:40:11');


*/