<?php

include "includes/dbh.php";

//Create an entry for when a user enters his information and clicks submit
if (isset($_POST["submit"])) {

    $first = $_POST["first"];
    $last = $_POST["last"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $place = $_POST["place"];

    // -- , a_last, a_email, a_phone, a_reference
    // -- '$last', '$email', '$phone', '$reference'
    $stmt = $conn->prepare("
            INSERT INTO contacts (a_first, a_last, a_email, a_phone, a_place, a_date) 
            VALUES(?, ?, ?, ?, ?, NOW());            
            ");
    $stmt->bind_param('sssss', $first, $last, $email, $phone, $place);
    $stmt->execute();
    $stmt->close();
    header("Location: index.php?submit=success");
}

if (isset($_POST["bSQL"])) {
    $SQLCommand = $_POST["SQLCommand"];
    $sql = "$SQLCommand";
    mysqli_query($conn, $sql);
    header("Location: index.php?sqlsuccess");
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