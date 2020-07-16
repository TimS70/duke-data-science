<?php

echo "<p>While Loop Results</p>";
$x = 1;
while ($x < 5) {
    echo "Hello World!<br>";
    $x ++; //Add 1 to x
}

echo "<p>Do-while loops check after doing, so they do it at least once</p>";
$x = 10;
do {
    echo "Hello World<br>";
    $x ++;
}
while ($x < 5);

echo "<p>For each loops work with predefined arrays</p>";
$array = array("Milk", "Honey", "Vegetable", "Tomato");
foreach ($array as $loopdata) {
    echo "When you go shopping, please get ".$loopdata."<br>";
}