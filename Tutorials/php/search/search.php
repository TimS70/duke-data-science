<?php
    include "header.php";
?>

<h1>Search Page</h1>

<div class="article-container">
    <?php

        //1) Get the stuff from SQL
        if(isset($_POST["submitSearch"])) {   //When the submit-button is pressed
            $search = mysqli_real_escape_string($conn, $_POST["search"]); //
                // Any time we get sth. from the user, we should avoid any weird input,
                // e.g. SQL-injections
            $sql = "SELECT * FROM article WHERE 
                    a_text LIKE '%$search%'   OR
                    a_author LIKE '%$search%' OR
                    a_date LIKE '%$search%'";
                // Instead of =, we use LIKE to get something that sounds like the word
                // We also need %% to put a variable inside a sql-command
            $result = mysqli_query($conn, $sql);

            //2) We need to check if we have any sort of result

            //Get the number of rows from the search-results (for the line below)
            $queryResult = mysqli_num_rows($result);

            echo "There are " . $queryResult . " results from your search.";

            if ($queryResult > 0) {

                //Insert the results inside a variable called row
                while ($row = mysqli_fetch_assoc($result)) {

                    // Display the results
                    echo "
                        <!-- Link to the article -->
                        <a href='article.php?title=" . $row['a_title'] . "&date=" . $row['a_date'] . "'>
                        <div class='article-box'>
                            <h3>" . $row['a_title'] . "</h3>
                            <h3>" . $row['a_text'] . "</h3>
                            <h3>" . $row['a_author'] . "</h3>
                            <h3>" . $row['a_date'] . "</h3>
                        </div></a>";
                }
            } else {
                echo "There are no results matching your search request.";
            }
        }
    ?>
</div>

