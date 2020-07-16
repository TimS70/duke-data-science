<?php
    include "header.php";
?>
<!DOCTYPE html>

<html>
<body>
<?php
// To show a clean website URL, we will use an ht.exe file

// We have a webpage called article.php
$articleId = $_GET["id"];
$articleName = $_GET["name"];

echo "The article ID is " . $articleId;
echo "<br>";
echo "The article name is " . $articleName;
?>
</body>
</html>