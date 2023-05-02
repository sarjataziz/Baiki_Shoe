<?php
include './../../Controllers/shoeController.php'; // include your functions file that contains the getShoe() function

$q = $_GET['q'];
$query = "SELECT * FROM shoe WHERE shoe_name LIKE '%$q%'";
$results = get($query);

if (count($results) > 0) {
    foreach ($results as $result) {
        echo "<a href='shoeDetails.php?shoe_id=" . $result['shoe_id'] . "'>" . $result['shoe_name'] . "</a><br>";
    }
} else {
    echo "No matching shoes found.";
}
