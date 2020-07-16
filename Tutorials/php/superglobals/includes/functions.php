<?php
include "../header.php"; //Get Navigation from Front Page
?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Functions</title>
</head>

<body>


<?php
//One Function should do one thing
//Write one php-Document with all the functions

$x = 100;
newCalc($x);
newCalc(100);

//Superglobals
$x = 5;
function something() {
    //echo $GLOBALS["x"]; //Only be used in special cases
}
something();

?>

</body>

</html>