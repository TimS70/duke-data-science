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

    <div class="div" id="Calculator">
    <h1>Calculator</h1>
    <form method="GET">
        <input type="number" name="num1" placeholder="Number 1">
        <input type="number" name="num2" placeholder="Number 2">
        <select name="operator">
            <option>Add</option>
            <option>None</option>
            <option>Subtract</option>
            <option>Divide</option>
        </select>
        <button name="submit" accesskey="c" value="Submit">Calculate Alt_c<button>
    </form>
    <p>The answer is:</p>
    <?php
        if (isset($_GET["submit"])) {//Check if the button is clicked, Seems like functions are prettier
            $result1 = $_GET["num1"];
            $result2 = $_GET["num2"];
            $operator = $_GET["operator"];

            switch ($operator) {
                case Add:
                    echo $result1 + $result2;
                    break;
                case None:
                    echo "You need to select something";
                    break;
                case Subtract:
                    echo $result1 - $result2;
                    break;
                case Divide:
                    echo $result1 / $result2;
                    break;
            }
        }
    ?>
</body>

    
</html>

