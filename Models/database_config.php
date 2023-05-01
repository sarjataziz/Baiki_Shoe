<?php

// Connect to the database

$db_servername = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "baiki_shoes";


function execute($query)
{

    global $db_servername, $db_username, $db_password, $db_name;
    $database_connection = mysqli_connect($db_servername, $db_username, $db_password, $db_name);

    if (!$database_connection) {
        die("Connection failed: " . mysqli_connect_error());
    } else {
        if (mysqli_query($database_connection, $query)) {
            return true;
        }
        return mysqli_errno($database_connection);
    }
}

function get($query)
{

    global $db_servername, $db_username, $db_password, $db_name;
    try {
        $database_connection = mysqli_connect($db_servername, $db_username, $db_password, $db_name);

    } catch (Exception $e) {
        echo "Error: " . $e->getMessage() . "<br>";
    }

    $data = array();
    if ($database_connection) {
        $results = mysqli_query($database_connection, $query);

        while ($row = mysqli_fetch_assoc($results)) {
            $data[] = $row;
        }
    }
    return $data;
}

?>