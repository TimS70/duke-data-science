<?php
include "header.php";
?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="Basics/style.css">
    <title>PHP-Tutorial</title>
</head>

<body>

<p>This is a PHP-Tutorial! See <a href="https://www.youtube.com/watch?v=qVU3V0A05k8&list=PL0eyrZgxdwhwBToawjm9faF1ixePexft-&index=1">
here</a></p>

<form method="GET"> //New Form Tag. With get, you can pass the input on
    <input id="tInput" name="Name" type="text">
    <button>SUBMIT</button>
</form>

<?php //Make Open PHP-Tag

//Printing
    echo "<p>Printing</p>";
    echo "Echo PHP!"; //Echo is a little faster than print
    print "Print PHP";

//Variables
    echo "<p>Variable Results</p>";
    $VarName = $_GET["Name"]; //$ For declaring a variable. Get it from the form-tag
    echo $VarName;
    echo $VarName." is a handsome fellow!"; //Combine PHP-Code with Strings

//Data Types

    /*
    //Boolean
        true  = 1;
        false = 0;
    */

    echo "<p>Arrays</p>";
    $MyArray = ["Ben", "Stephan", "Klaus"];//Array
    echo $MyArray[0];

/*Operators
    Mathematical
        +, -, *, %, ^ or **, etc.
    Assignment
        ++, +=, -=, /=, etc.
    Comparison
        = defining; == checking, === checks for same data type, avoids type coercion
        <, >, <>
    Logical
        xor: Only one of the conditions is true
/*

/*Statements
    if (){} //Check for conditions
*/
    echo "<p>Switch-Results</p>";
    $x = 1;
    switch ($x) { //Similar to if-statement
        case 1:
            echo "The answer is 1";
        break;
        default:    //Like else
            echo "There is no answer";
    }


?>

</body>

    
</html>

