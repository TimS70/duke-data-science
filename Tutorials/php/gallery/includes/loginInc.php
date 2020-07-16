<?php

if (!isset($_POST["loginSubmit"])) {
    header("Location: ../index.php");
    exit();
} else {
    require "dbh.php";
    $mailLogin = $_POST["mailLogin"];
    $pwdLogin = $_POST["pwdLogin"];

    if (empty($mailLogin) || empty($pwdLogin)) {
        header("Location: ../index.php?error=emptyfields?mailLogin=" . $mailLogin);
        exit();
    } else {
        // Check if the mail is known
        $sql = "SELECT * FROM users WHERE uMail=?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../index.php?error=preparedstatement1");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $mailLogin);
            mysqli_stmt_execute($stmt);

            // Get the result
            $result = mysqli_stmt_get_result($stmt);

            // fetch_assoc fetches the data from the result as an 'associative array' (sth. we can work with)

            if (!($row = mysqli_fetch_assoc($result))) {
                header("Location: ../index.php?error=mailunknown");
                exit();
            } else {
                // Compare the passwords, password_verify gives us a boolean statement
                $pwdCheck = password_verify($pwdLogin, $row['uPwd']);

                if ($pwdCheck == false) {
                    header("Location: ../index.php?error=wrongpassword1");
                    exit();
                } else if ($pwdCheck == true) {

                    // Create Session as soon as we log in ///////////////////////////////////////////////
                    // a session can save the information in the browser
                    session_start();
                    $_SESSION['userId'] = $row['uId'];
                    $_SESSION['userMail'] = $row['uMail'];
                    header("Location: ../index.php?login=success");

                } else {
                    header("Location: ../index.php?error=wrongpassword2");
                    exit();
                }
            }
        }
    }
}
