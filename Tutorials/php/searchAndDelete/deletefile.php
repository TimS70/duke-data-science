<?php

$path = "uploads/cat*";  //* means that we don't know the file-ending yet
$fileinfo = glob($path); //searches for any file that has a certain string ($path) inside
$fileActualName = $fileinfo[0]; //Set the file name to what we found, or the first result of multiple

print_r($fileinfo);

if (!unlink($path)) { //If-statement for the case that unlink does not work
    echo "You have an error!";
} else {
    echo "You have successfully deleted your file!";
    //or header("Location: index.php?deletesuccess");
}
 //unlink=Delete files from your root folder
