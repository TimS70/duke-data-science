<!DOCTYPE html>
<html>
<head>
    <title>Regular Expressions</title>
</head>
<body>
<?php

//Introduction
$string = "My name is Tim, Tim is my name!";
// preg_match() checks if a certain string is inside a text
// Für Argumente siehe https://www.php.net/manual/de/function.preg-match.php
// Matches gives a multidimensional array
// Für alle Ergebnisse preg_match_all
// If you only search for any character, you could use .
// You could also use operators like |
// For "any of these" is []
// More: a-zA-Z

if (preg_match("/Tim/", $string, $array)) {
    print_r($array);
    //echo "It is a match!";
}

// Multiple Searches within one function
if (preg_match("/T(i)m/", $string, $array)) {
    echo $array[0][1];
}

$stringReplaced = preg_replace("/T(i)m/", "Jan", $string);
echo $stringReplaced;

// Quantifiers D* (0 or more D's) in combi with preg_match_all and print array
// D.*m prints out the first D and all the letters after until the first m
preg_match_all('/D.*m/', $string, $array);
print_r($array);

//At least one D
preg_match_all('/D+/', $string, $array);
print_r($array);

$string = "1Tim2 is my name, my name is 1Tim2.";
// * is a greedy quantifier that takes the entire string from the very first to the very last search term (1 to 2)
preg_match_all('/1.*2/', $string, $array);
print_r($array);

//? is a lazy quantifier
preg_match_all('/1.*?2/', $string, $array);
print_r($array);

// 2 D's in a row
echo    preg_match_all('/D{2}/', $string, $array);

// 1 or 2 D's in a row
echo    preg_match_all('/D{1,2}/', $string, $array);

// 1 or more D's
echo    preg_match_all('/D{1,}/', $string, $array);

// Special characters \, e.g. \digit, \s (whitespace), \S (non-whitespace), \word, or \W (non-word)
echo    preg_match_all('/\d{1,}/', $string, $array);

//Anchors, ^M begins with M, e$ ends with e, or both conditions ^M.*e$
// Use \ to indicate ^ as a character and not an anchor
echo    preg_match('/^M/', $string, $array);


?>
</body>
</html>