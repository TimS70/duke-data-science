<?php
    include "header.php";
        // Header contains head and css-link.
        // We better have that in a separate document to save work when changing sth.
?>

<!DOCTYPE html>
<html>

<body>
<!-- Search Form
    search.php will be activated when we press the submit button
    POST is a superglobal variable that makes the input accessible everywhere
 -->
<form action="search.php" method="POST">
    <input type="text" name="search" placeholder="Search">
    <button type="submit" name="submitSearch">Search</button>
</form>

<h1>Front Page</h1>
<h1>All articles</h1>
<div class="article-container"> <!-- the div box contains all the articles -->
    <?php
        $sql = "SELECT * FROM article";
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
<!-- SQL Command -->
<form method="GET">
    <button type="submit" name="sqlButton">Run SQL</button>
</form>

<?php
    if (isset($_GET["sqlButton"])) {
        $sql = "INSERT INTO article (a_title, a_text, a_author, a_date) 
                VALUES('50 great summer recipes', 
                       'There are many great summer recipes.', 
                       'Admin', 
                       '2017-11-25 12:40:11');
                
                INSERT INTO article (a_title, a_text, a_author, a_date) 
                VALUES('A series of computer software', 
                       'Learn about programming!', 
                       'Daniel Nielsen', 
                       '2017-11-25 12:40:11');";
        //a_... for avoiding that date is taken as a function or sth. similar
        mysqli_query($conn, $sql);
    }
?>
</body>
</html>