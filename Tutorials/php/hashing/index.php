<!doctype html>

<html>
<head>
    <title>Hatching</title>
</head>

<body>

<?php
    /*
    echo "test123"; //Generate an arbitrary password
    echo "<br>";
    echo password_hash("test123", PASSWORD_DEFAULT);
    */
    $input = "test123";
    $hashedPwdInDb = password_hash("test123", PASSWORD_DEFAULT);

    echo password_verify($input, $hashedPwdInDb); //Gives you a 1 back
?>

</body>
</html>

