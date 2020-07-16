<!-- 1) Activate Apache and my SQL with XAMPP -->

<?php
    include "header.php";
?>

<!DOCTYPE html>
<html>
<body>
<div class="contactForm">
    <form action="sql.php" method="POST">
        <h1>Upload Data to SQL</h1>
        <input type="text" name="first" placeholder="First Name">
        <input type="text" name="last" placeholder="Last Name">
        <input type="text" name="email" placeholder="Email">
        <input type="text" name="phone" placeholder="Phone">
        <input type="text" name="place" placeholder="Place">
        <button type="submit" name="submit">Submit</button>
    </form>
</div>

<br>

<div class="development">
    <p>Run SQL Commands per button</p>
    <form action="sql.php" method="POST">
        <textarea rows="10" cols="100" class="command" name="SQLCommand"
                  placeholder="Your SQL-Command"></textarea>
        <br>
        <button type="submit" id="bSQL" name="bSQL">Run SQL</button>
    </form>
</div>

</body>
</html>