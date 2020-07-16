<?php

    //Error handler
    if (!isset($_POST["submit"])) { //first check if the form is not clicked
        header("Location: ../index?signup=error)");

    } else {
        include_once "dbh.inc.php";

        //Get the variables from the index input
        $first  = $_POST["first"];
        $last   = $_POST["last"];
        $uid    = $_POST["uid"];
        $email  = $_POST["email"];
        $pwd    = $_POST["pwd"];

        if (empty($first) || empty($last) || empty($uid) || empty($email) || empty($pwd)) {
            //Then check if something is empty
            header("Location: ../index.php?signup=empty");
            exit();
        } else {
            if (!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last)) {
                header("Location: ../index.php?signup=char&$email=$email&$uid=$uid");
                    //Reset the fields except the email and uid because they were okay
                exit();
            } else {
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { //first check false
                    header("Location: ../index.php?signup=email&$first=$first&$last=$last&$uid=$uid");
                    exit();
                } else {
                    header("Location: ../index.php?signup=success");
                    exit();
                }
            }
        }
    }



    $sql = "INSERT INTO users (user_first, user_last, user_email, user_uid, user_pwd) 
        VALUES (?, ?, ?, ?, ?);"; //Set placeholders that will be replaced later

    $stmt = mysqli_stmt_init($conn);  //Init prepared statements by connecting to database

    if (!mysqli_stmt_prepare($stmt, $sql)) { //first check for error in the preparation of the init
        echo "SQL error";
    } else {
        mysqli_stmt_bind_param($stmt, "sssss", $first, $last, $uid, $email, $pwd);
            //Bind the parameters to the (init) statements, define as string and the variables to be replaced
        mysqli_stmt_execute($stmt);
    }

    header("Location: ../index.php?signup=success"); //After the code is done, take me back to the Front Page

    /*Outdated Alternative
    $first  = mysqli_real_escape_string($conn, $_POST["first"]);
    ...
        //get the variables from the form in index
        //mysqli_real_escape_string gets sure that none of the inputs is read as code, however outdated
        //Better use prepared statements
    mysqli_query($conn, $sql);
        //Query the code: Send it to the database and run it inside it
        //mysqli_query(Connection, what to import, ...
    */



?>