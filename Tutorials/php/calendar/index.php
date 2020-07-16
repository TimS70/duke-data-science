<?php
include "header.php";
?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../introduction/style.css">
    <title>PHP-Tutorial</title>
</head>

<body>
    <p>This is a PHP-Tutorial! See <a href="https://www.youtube.com/watch?v=qVU3V0A05k8&list=PL0eyrZgxdwhwBToawjm9faF1ixePexft-&index=1">
    here</a></p>

<?php
    $dayofweek = date("w");
    $day = array("Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun");
    echo "<p>Today: </p>", $day[$dayofweek-1];
?>

</body>

    
</html>

