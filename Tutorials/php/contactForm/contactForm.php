<?php

// We need to upload this to an online server to test it

if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $subject = $_POST["subject"];
    $mailFrom = $_POST["mail"];
    $message = $_POST["message"];
    $header = "From: ".$mailFrom;
    $txt = "You have received an email from ".$name.".\n\n".$message;

        // \n means that we go down two lines

    //Google will block emails that are sent by the "mail()"-function
    mail ( 'second-email@web.de', $subject , $txt, $header);
    header("Location: index.php?MailSent");
}
