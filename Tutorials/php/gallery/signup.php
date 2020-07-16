<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Sign up</title>
    <link rel="stylesheet" type="text/css" href="css/signup.css">
</head>
<div class="signup">
    <main>
        <div class="center">
            <h1>Sign Up</h1>
            <form class="contactForm" action="includes/signupInc.php" method="POST">
                <?php
                //Give out the past Input depending on the error messages
                if(isset($_GET["first"])) { //If Firstname is set, then keep the input
                    echo '<input name="first" placeholder="First Name" type="text" value="'.$_GET["first"].'">';
                } else { //If it is not set, give the
                    echo '<input name="first" placeholder="Firstname" type="text">';
                }
                if(isset($_GET["last"])) { //If Firstname is set, then keep the input
                    echo '<input name="last" placeholder="Last Name" type="text" value="'.$_GET["last"].'">';
                } else { //If it is not set, give the
                    echo '<input name="last" placeholder="Last Name" type="text">';
                }
                if(isset($_GET["mail"])) { //If Firstname is set, then keep the input
                    echo '<input name="mail" placeholder="Your Email" type="text" value="'.$_GET["mail"].'">';
                } else { //If it is not set, give the
                    echo '<input name="mail" placeholder="Your Email" type="text">';
                }
                ?>
                <input type="password" name="pwd" placeholder="Password">
                <input type="password" name="pwdRepeat" placeholder="Repeat Password">
                <button type="submit" name="signupSubmit">Sign up</button>
            </form>

            <!-- Error Messages -->
            <?php
                // Do we have an error inside the URL?
                // Get things from the URL with GET
                // Use ===

                $errorURL   = array(
                                    // 00
                                    "emptyfields",
                                    // 01
                                    "invalidmail",
                                    // 02
                                    "invalidmailname",
                                    // 03
                                    "invalidname",
                                    // 04
                                    "pwdcheck",
                                    // 05
                                    "preparedstatement1",
                                    // 06
                                    "preparedstatement2",
                                    // 07
                                    "mailtaken"
                                     );
                $message    = array(
                                    // 00
                                    "Please fill out all forms",
                                    // 01
                                    "Choose a valid Email",
                                    // 02
                                    "Choose a valid email and a valid name",
                                    // 03
                                    "Choose a valid name",
                                    // 04
                                    "Passwords did not match",
                                    // 05
                                    "SQL Error",
                                    // 06
                                    "SQL Error",
                                    // 07
                                    "This mail is already taken"
                                     );
                for ($i = 0; $i <= 7; $i++)
                if (isset($_GET["error"])) {
                    if ($_GET["error"] === $errorURL[$i]) {
                        echo $message[$i];
                    }
                }
            ?>
        </div>
    </main>
</div>
</html>