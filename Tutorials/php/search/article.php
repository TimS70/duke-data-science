<?php
include "header.php";
// Header contains head and css-link.
// We better have that in a separate document to save work when changing sth.
?>

<!DOCTYPE html>
<html>

<body>

<h1>Article Page</h1>
<div class="article-container"> <!-- the div box contains all the articles -->
    <?php

    // Get the title from the URL with GET (POST can't see the URL
    $title = mysqli_real_escape_string($conn, $_GET["title"]);
    $date = mysqli_real_escape_string($conn, $_GET["date"]);

    $sql = "SELECT * FROM article WHERE a_title='$title' AND a_date='$date'";
    $result = mysqli_query($conn, $sql);
    $queryResults = mysqli_num_rows($result);

    if ($queryResults > 0 ) {
        while ($row = mysqli_fetch_assoc($result)) { //Spit the results out as long as there are results
            echo "
                    <div class='article-box'>
                        <h3>".$row['a_title']."</h3>
                        <h3>".$row['a_text']."</h3>
                        <h3>".$row['a_author']."</h3>
                        <h3>".$row['a_date']."</h3>
                    </div>
                    ";
        }
    }
    ?>
</div>
</body>
</html>