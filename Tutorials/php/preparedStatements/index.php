<?php
    include_once "includes/dbh.inc.php";
    include "header.php";

    $data = "Admin";

    //Create template
    $sql = "SELECT * FROM users WHERE user_uid=?;"; //Setup SQL-Command

    //Create a prepared statement
    $stmt = mysqli_stmt_init($conn);

    //Prepare the prepared statement
    if (!mysqli_stmt_prepare($stmt, $sql)) { //Always check the error first
        echo "SQL statement failed";
    }
    else {
        //Bind parameters to the placeholders
        mysqli_stmt_bind_param($stmt, "s", $data); //s=string datatype

        //Run parameters inside database
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        while ($row = mysqli_fetch_assoc($result)) {
            //Get or fetch all the results from the database and save it as an array
            echo $row["user_uid"] . "<br>";
        }
    }


    /*Checking for a select statement
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);

    if ($resultCheck > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            //Get or fetch all the results from the database and save it as an array
            echo $row["user_uid"];
        }
    }
