<?php

//require_once '../../Models/database_config.php';
include __DIR__ . '/../Models/database_config.php';


$shoe_name = $category = $price = $quantity = $description = $shoe_img = $shoe_type = $size = $color = $rating = "";
$error_shoe_name = $error_category = $error_price = $error_quantity = $error_description = $error_shoe_img = $error_shoe_type = $error_size = $error_color = $error_rating = "";
$db_error = "";

function insertShoe($shoe_name, $category, $quantity, $fk_shoe_type, $color, $shoe_img, $price, $rating, $size, $description)
{
    $query = "insert into shoe values(NULL, '$shoe_name', '$category', '$quantity', '$fk_shoe_type', '$color', '$shoe_img', '$price', '$rating', '$size', '$description')";
    return execute($query);
}

function getAllShoe()
{
    $query = "select shoe.*, shoe_type.shoes_type as 'shoe_type' FROM shoe left join shoe_type ON shoe.fk_shoe_type = shoe_type.shoe_type_id";
    return get($query);
}

function getShoe($shoe_id)
{
    $query = "select * from shoe where shoe_id = '$shoe_id'";
    $result = get($query);
    return $result[0];
}

function updateShoe($shoe_id, $shoe_name, $category, $quantity, $shoe_type, $color, $shoe_img, $price, $rating, $size, $description)
{
    $query = "update shoe set
                    shoe_name = '$shoe_name',
                    category = '$category',
                    quantity = '$quantity',
                    fk_shoe_type = '$shoe_type',
                    color = '$color',
                    shoe_img = '$shoe_img',
                    price = '$price',
                    rating = '$rating',
                    size = '$size',
                    description = '$description'
                    WHERE shoe_id = '$shoe_id'";
    return execute($query);
}


function deleteShoe($shoe_id)
{
    $query = "delete from shoe WHERE shoe_id = '$shoe_id'";
    return execute($query);
}


if (isset($_POST['add_shoe'])) {

    if (empty($_POST['name'])) {
        $error_shoe_name = "Shoe name is required";
    } else {
        $shoe_name = $_POST['name'];
    }
    if (empty($_POST['category'])) {
        $error_category = "Category is required";
    } else {
        $category = $_POST['category'];
    }
    if (empty($_POST['price'])) {
        $error_price = "Price is required";
    } else {
        $price = $_POST['price'];
    }
    if (empty($_POST['quantity'])) {
        $error_quantity = "Quantity is required";
    } else {
        $quantity = $_POST['quantity'];
    }
    if (empty($_POST['description'])) {
        $error_description = "Description is required";
    } else {
        $description = $_POST['description'];
    }
    if (empty($_FILES['shoe_img']['name'])) {
        $error_shoe_img = "Image is required";
    } else {
        $shoe_img = $_FILES['shoe_img']['name'];
    }
    if (empty($_POST['shoe_id'])) {
        $error_shoe_type = "Shoe type is required";
    } else {
        $fk_shoe_type = $_POST['shoe_id'];
    }
    if (empty($_POST['size'])) {
        $error_size = "Size is required";
    } else {
        $size = $_POST['size'];
    }
    if (empty($_POST['color'])) {
        $error_color = "Color is required";
    } else {
        $color = $_POST['color'];
    }
    if (empty($_POST['rating'])) {
        $error_rating = "Rating is required";
    } else {
        $rating = $_POST['rating'];
    }

    if (!$error_shoe_name && !$error_category && !$error_price && !$error_quantity && !$error_description && !$error_shoe_img && !$error_shoe_type && !$error_size && !$error_color && !$error_rating) {

        $fileType = strtolower(pathinfo(basename($_FILES["shoe_img"]["name"]), PATHINFO_EXTENSION));
        $file = "../../storage/shoes_image/" . uniqid() . ".$fileType";
        move_uploaded_file($_FILES["shoe_img"]["tmp_name"], $file);

        $result = insertShoe($shoe_name, $category, $quantity, $fk_shoe_type, $color, $file, $price, $rating, $size, $description);
        var_dump($result);
        //$result_check = updateShoe($_POST['shoe_id'], $shoe_name, $category, $quantity, $shoe_type, $color, $file, $price, $rating, $size, $description);

        if ($result === true) {
            echo "Update successful";
            header("Location: ../Admin/shoeDetails.php");
            exit;
        } else {
            $db_error = "Error updating shoe.";
            echo $db_error;
        }
    }
} else if (isset($_POST['edit_shoe'])) {
    if (empty($_POST['shoe_name'])) {
        $error_shoe_name = "Shoe name is required";
    } else {
        $shoe_name = $_POST['shoe_name'];
    }
    if (empty($_POST['category'])) {
        $error_category = "Category is required";
    } else {
        $category = $_POST['category'];
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
    if (empty($_POST['description'])) {
        $error_description = "Description is required";
    } else {
        $description = $_POST['description'];
    }
    if (empty($_FILES['shoe_img']['name'])) {
        $error_shoe_img = "Shoe image is required";
    } else {
        $shoe_img = $_FILES['shoe_img']['name'];
    }
    if (empty($_POST['shoe_type'])) {
        $error_shoe_type = "Shoe type is required";
    } else {
        $shoe_type = $_POST['shoe_type'];
    }
    if (empty($_POST['size'])) {
        $error_size = "Size is required";
    } else {
        $size = $_POST['size'];
    }
    if (empty($_POST['color'])) {
        $error_color = "Color is required";
    } else {
        $color = $_POST['color'];
    }
    if (empty($_POST['rating'])) {
        $error_rating = "Rating is required";
    } else {
        $rating = $_POST['rating'];
    }

    if (empty($error_shoe_name) && empty($error_category) && empty($error_price) && empty($error_quantity) && empty($error_description) && empty($error_shoe_img) && empty($error_shoe_type) && empty($error_size) && empty($error_color) && empty($error_rating)) {

        $fileType = strtolower(pathinfo(basename($_FILES["shoe_img"]["name"]), PATHINFO_EXTENSION));
        $file = "../../storage/shoes_image/" . uniqid() . ".$fileType";
        move_uploaded_file($_FILES["shoe_img"]["tmp_name"], $file);

        $result_check = updateShoe($_POST['shoe_id'], $shoe_name, $category, $quantity, $shoe_type, $color, $file, $price, $rating, $size, $description);


        if ($result_check === true) {
            header("Location: ../Views/Admin/shoeDetails.php");
            exit;
        } else {
            $db_error = "Error updating shoe.";
        }
    }

    if (isset($_POST['shoe_id'])) {
        $shoe_id = $_POST['shoe_id'];
        $result_check = deleteShoe($shoe_id);

        if ($result_check === true) {
            //header('Location: ../Views/Admin/shoeDetails.php?msg=Sock Added Successfully');
            header("Location: ../Views/Admin/shoeDetails.php");
        } else {
            $db_error = "Error: " . $result_check;
            //var_dump($db_error);
        }
    }
}