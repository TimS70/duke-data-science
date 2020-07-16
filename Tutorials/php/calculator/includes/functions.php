<?php
    include "../header.php"; //Get Navigation from Front Page
?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../../introduction/style.css">
    <title>Functions</title>
</head>

<body>


<?php
    //One Function should do one thing
    //Write one php-Document with all the functions

    function newCalc($MyNumber) {
        $newNr = $MyNumber *.75;
        echo "Here is 75% of what you wrote: ".$newNr."<br>";
    }

    $x = 100;
    newCalc($x);
    newCalc(100);
?>

</body>

</html>