<?php
    //include_once "includes/dbh.php";
?>

<!doctype html>
<html>
<head>
    <title>Arrays</title>
</head>
<body>
<?php
    $data = array();
    //How to add sth. to an array
    array_push($data, "daniel", 15, 23);

    /*
    $data[] = "Daniel";
    $data[] = "15";

    echo $data[0]; //Show first entry
    */

    print_r($data); //Other way of printing

    //Types of Arrays
    //Indexed arrays
    $data = array("daniel", "John", "Jane");

    //Associative arrays, we name the data points
    $data = array("first"   => "Daniel",
                  "last"    => "Nielsen");
    //or
    $data["first"] = "Daniel";
    $data["last"] = "Nielsen";
    $data["age"] = 25;

    //echo $data["first"];
    //Multidimensional array
    $data = array(
                array(1, 2, 3),
                "John",
                "Jane"
                );
    //print_r($data);
    echo $data[0][0]; //Get something from an array inside an array


    /*
    $sql    = "SELECT * FROM data";
    $result = mysqli_query($conn, $sql);
    $datas  = array();
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $datas[] = $result;

        }
    }
    //print_r($datas);

    //Multidimensional array
    foreach($datas as $data) {
        echo $data["content"]." "; //Get variable
    }
    //$datas[0] gives 1 entry
    */


?>
</body>
</html>

