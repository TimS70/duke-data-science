<!DOCTYPE html>
<html>
<head>
    <title>Upload</title>
</head>
<body>
<form action="upload.php" method="POST" enctype="multipart/form-data">
    <!-- enctype specifies how the form data should be encoded -->
    <input type="file" name="file">
    <button type="submit" name="submit">UPLOAD</button>
</form>
</body>
</html>


<?php
