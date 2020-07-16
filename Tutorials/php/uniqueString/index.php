<?php
//include "dbh.php";
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="description" content="How to create unique strings with php?">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Unique String</title>
</head>
<body>
<?php
    /*
    // Random key dependent on the timestamp
    function generateKey() {
    $randStr = uniqid("Tim", true);
        // Based on the current time format
        // Prefix makes it even more specific
        // More entropy for even longer number after the punctuation
    return $randStr;
    }
    */

    /*
    // Simply random key
    function generateKey() {
    $keyLength = 8;
    $str = "123456789abcdefghijklmopqrstuvwxyz()/$"; // What characters to include
    $randStr = substr(str_shuffle($str), 0, $keyLength); //Mix the characters of the string together
    return $randStr;
}
*/
    $server = "localhost";
    $username = "root";
    $password = "";
    $dbName = "uniquestring";

    $conn = mysqli_connect($server, $username, $password, $dbName);

    function checkKeys($conn, $randStr) {
        $sql = "SELECT * FROM keystring";
        $result = mysqli_query($conn, $sql);

        // As long as row is in the array
        while ($row = mysqli_fetch_assoc($result)) {
            //Check if we already have that string in the database
            if ($row["keyStringKey"] == $randStr) {
                $keyExists = true;          //That is the outcome-variable (checkKeys() = true/false)
                break;                      // Break the while-loop
            } else {
                $keyExists = false;
            }
        }
        return $keyExists; // Need to return $keyExists so we can use it in generateKey
    }
    function generateKey($conn) {
        $keyLength = 1;
        $str = "abdcefg"; // What characters to include
        $randStr = substr(str_shuffle($str), 0, $keyLength); //Mix the characters of the string together

        // We want to go back to the while loop, where we check if $randStr is already there
        $checkKey = checkKeys($conn, $randStr);

        // Check keys can be true or false (see function checkkKeys)
        // We will repeat this while loop until we get a new random key
        while ($checkKey == true) {
            $randStr = substr(str_shuffle($str), 0, $keyLength);  // Repeat the shuffling
            $checkKey = checkKeys($conn, $randStr); // Repeat checking
        }
        return $randStr; // $randStr will be given to checkKeys()   

    }
    echo generateKey($conn); // We need to include $conn because the defined function also fetches $conn
?>
</body>
</html>