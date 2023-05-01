<?php

require_once '../../Models/database_config.php';
//include __DIR__ . '/../Models/database_config.php';


$shoe_type = $error_shoe_type = "";
$db_error = "";

if (isset($_POST['add_shoeType'])) {
    if (empty($_POST['name'])) {
        $error_shoe_type = "Shoe type name is required";
    } else {
        $shoe_type = $_POST['name'];
    }
    if (!$error_shoe_type) {
        $result_check = insertShoeType($shoe_type);
        if ($result_check === true) {
            header("Location: ../../Views/Admin/shoeTypeDetails.php");
        } else {
            //var_dump($result_check);
            $db_error = "Duplicate entry for key Shoe Type Name'";
        }
    }
} else if (isset($_POST['edit_shoe_type'])) {
    if (empty($_POST['name'])) {
        $error_shoe_type = "Shoe type name is required";
    } else {
        $shoe_type = $_POST['name'];
    }
    if (!$error_shoe_type) {
        $result_check = updateShoeType($_POST['id'], $shoe_type);
        if ($result_check === true) {
            header("Location: ../../Views/Admin/shoeTypeDetails.php");
        } else {
            //var_dump($result_check);
            $db_error = "Duplicate entry for key Shoe Type Name'";
        }
    }
} else if (isset($_POST['delete_shoe_type'])) {
    $result = deleteShoeType($_POST['id']);
    if ($result === true) {
        header("Location: ../../Views/Admin/shoeTypeDetails.php");
    } else {
        $db_error = "Error deleting shoe type";
    }
}

function deleteShoeType($id)
{
    $query = "delete from shoe_type where shoe_type_id = $id";
    return execute($query);
}

function insertShoeType($shoe_type)
{
    $query = "insert into shoe_type values (NULL, '$shoe_type')";
    return execute($query);
}

function getAllShoeTypes()
{
    $query = "select * from shoe_type";
    $result = get($query);
    return $result;
}

function getShoeType($id)
{
    $query = "select * from shoe_type where shoe_type_id = $id";
    $result = get($query);
    return $result[0];
    //Here, return first element of the array and not the whole array and to pass only 1 instance of the array
}

function updateShoeType($id, $shoe_type)
{
    $query = "update shoe_type set shoes_type = '$shoe_type' where shoe_type_id = $id";
    return execute($query);
}
