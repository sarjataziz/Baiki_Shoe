<?php

//include '../../Models/database_config.php';
include __DIR__ . '/../Models/database_config.php';


$sock_name = $color = $material = $size = $price = $quantity = $img = "";
$error_sock_name = $error_color = $error_material = $error_size = $error_gender = $error_price = $error_quantity = $error_img = "";
$db_error = "";

function insertSock($sock_name, $color, $material, $size, $price, $quantity, $img)
{
    $query = "insert INTO socks VALUES (NULL, '$sock_name', '$color', '$material', '$size', '$price', '$quantity', '$img')";
    return execute($query);
}

function getAllSocks()
{
    $query = "select * from socks";
    return get($query);
}

function getSock($sock_id)
{
    $query = "select * FROM socks WHERE socks_id = '$sock_id'";
    $result = get($query);
    return $result[0];
}

function updateSock($sock_id, $sock_name, $color, $material, $size, $price, $quantity, $img)
{
    $query = "update socks SET
                sock_name = '$sock_name',
                color = '$color',
                material = '$material',
                size = '$size',
                price = '$price',
                quantity = '$quantity',
                img = '$img'
                WHERE socks_id = '$sock_id'";
    return execute($query);
}

function deleteSock($sock_id)
{
    $query = "delete FROM socks WHERE socks_id = '$sock_id'";
    return execute($query);
}

if (isset($_POST['add_sock'])) {

    if (empty($_POST['sock_name'])) {
        $error_sock_name = "Sock name is required";
    } else {
        $sock_name = $_POST['sock_name'];
    }

    if (empty($_POST['color'])) {
        $error_color = "Color is required";
    } else {
        $color = $_POST['color'];
    }

    if (empty($_POST['material'])) {
        $error_material = "Material is required";
    } else {
        $material = $_POST['material'];
    }

    if (empty($_POST['size'])) {
        $error_size = "Size is required";
    } else {
        $size = $_POST['size'];
    }

    if (empty($_POST['price'])) {
        $error_price = "Price is required";
    } else if (!is_numeric($_POST['price'])) {
        $error_price = "Price must be a number";
    } else {
        $price = $_POST['price'];
    }

    if (empty($_POST['quantity'])) {
        $error_quantity = "Quantity is required";
    } else if (!is_numeric($_POST['quantity'])) {
        $error_quantity = "Quantity must be a number";
    } else {
        $quantity = $_POST['quantity'];
    }

    if (empty($_FILES['sock_img']['name'])) {
        $error_img = "Image is required";
    } else {
        $img = $_FILES['sock_img']['name'];
    }

    if (!$error_sock_name && !$error_color && !$error_material && !$error_size && !$error_price && !$error_quantity && !$error_img) {

        $fileType = strtolower(pathinfo(basename($_FILES["sock_img"]["name"]), PATHINFO_EXTENSION));
        $file = "../../storage/socks_image/" . uniqid() . ".$fileType";
        move_uploaded_file($_FILES["sock_img"]["tmp_name"], $file);

        $result_check = insertSock($sock_name, $color, $material, $size, $price, $quantity, $file);

        if ($result_check === true) {
            header('Location: ../../Views/Admin/sockDetails.php?msg=Sock Added Successfully');
        } else {
            $db_error = "Error: " . $result_check;
            var_dump($db_error);
        }
    }
}

if (isset($_POST['edit_sock'])) {

    if (empty($_POST['sock_name'])) {
        $error_sock_name = "Sock name is required";
    } else {
        $sock_name = $_POST['sock_name'];
    }

    if (empty($_POST['color'])) {
        $error_color = "Color is required";
    } else {
        $color = $_POST['color'];
    }

    if (empty($_POST['material'])) {
        $error_material = "Material is required";
    } else {
        $material = $_POST['material'];
    }

    if (empty($_POST['size'])) {
        $error_size = "Size is required";
    } else {
        $size = $_POST['size'];
    }

    if (empty($_POST['price'])) {
        $error_price = "Price is required";
    } else if (!is_numeric($_POST['price'])) {
        $error_price = "Price must be a number";
    } else {
        $price = $_POST['price'];
    }

    if (empty($_POST['quantity'])) {
        $error_quantity = "Quantity is required";
    } else if (!is_numeric($_POST['quantity'])) {
        $error_quantity = "Quantity must be a number";
    } else {
        $quantity = $_POST['quantity'];
    }

    if (empty($_FILES['sock_img']['name'])) {
        $error_img = "Image is required";
    } else {
        $img = $_FILES['sock_img']['name'];
    }

    if (!$error_sock_name && !$error_color && !$error_material && !$error_size && !$error_price && !$error_quantity && !$error_img) {

        $fileType = strtolower(pathinfo(basename($_FILES["sock_img"]["name"]), PATHINFO_EXTENSION));
        $file = "../../storage/socks_image/" . uniqid() . ".$fileType";
        move_uploaded_file($_FILES["sock_img"]["tmp_name"], $file);

        $result_check = updateSock($_POST['socks_id'], $sock_name, $color, $material, $size, $price, $quantity, $file);

        if ($result_check === true) {
            header('Location: ../../Views/Admin/sockDetails.php?msg=Sock Added Successfully');
        } else {
            $db_error = "Error: " . $result_check;
            var_dump($db_error);
        }
    }
}

if (isset($_POST['delete_sock'])) {
    $socks_id = $_POST['socks_id'];
    $result_check = deleteSock($socks_id);
    header('Location: ./sockDetails.php?msg=Sock Deleted Successfully');
}
