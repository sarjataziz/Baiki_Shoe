<?php
session_start();
//include $_SERVER['DOCUMENT_ROOT'] . '/Bshop' . '/Models/database_config.php';
include __DIR__ . '/../Models/database_config.php';


$name = $email = $username = $password = $mobile = $address = $gender = $profile_picture = $confirm_password = "";
$error_name = $error_email = $error_username = $error_password = $error_mobile = $error_address = $error_gender = $error_profile_picture = $error_confirm_password = "";
$db_error = "";
$hasError = false;

if (isset($_POST['submit'])) {
    if (empty($_POST['name'])) {
        $error_name = "Name is required";
        $hasError = true;
    } else {
        $name = $_POST['name'];
    }
    if (empty($_POST['email'])) {
        $error_email = "Email is required";
        $hasError = true;
    } else {
        $email = $_POST['email'];
    }
    if (empty($_POST['username'])) {
        $error_username = "Username is required";
        $hasError = true;
    } else {
        $username = $_POST['username'];
    }
    if (empty($_POST['password'])) {
        $error_password = "Password is required";
        $hasError = true;
    } else {
        $password = $_POST['password'];
    }
    if (empty($_POST['confirm_password'])) {
        $error_confirm_password = "Confirm Password is required";
        $hasError = true;
    } else {
        $confirm_password = $_POST['confirm_password'];
        if ($confirm_password != $password) {
            $error_confirm_password = "Passwords do not match";
            $hasError = true;
        }
    }
    if (empty($_POST['mobile'])) {
        $error_mobile = "Mobile is required";
        $hasError = true;
    } else {
        $mobile = $_POST['mobile'];
    }
    if (empty($_POST['address'])) {
        $error_address = "Address is required";
        $hasError = true;
    } else {
        $address = $_POST['address'];
    }
    if (!isset($_POST["gender"])) {
        $error_gender = "Gender Required.";
        $hasError = true;
    } else {
        $gender = $_POST["gender"];
    }
    $user_type = "user";

    if (isset($_POST["user_type"])) {
        $user_type = $_POST["user_type"];
    }

    if (!$hasError) {
        $result_check = insertUser($name, $email, $username, $password, $profile_image = NULL, $mobile, $address, $gender, $user_type);
        if ($result_check === true) {
            if (isset($_SESSION['user']['user_type']) && $_SESSION['user']['user_type'] == 'admin') {
                header("Location: ../Admin/userDetails.php");
            } else {
                header("Location: ../Views/login.php");
            }
        } else {
            var_dump($result_check);
            $db_error = $result_check;
        }
    }
} elseif (isset($_POST['login'])) {
    if (empty($_POST['username'])) {
        $error_username = "Username is required";
        $hasError = true;
    } else {
        $username = $_POST['username'];
    }

    if (empty($_POST['password'])) {
        $error_password = "Password is required";
        $hasError = true;
    } else {
        $password = $_POST['password'];
    }

    if (!$hasError) {
        $result_check = checkUsers($username, $password);
        if ($result_check === true) {
            session_start();
            $_SESSION['username'] = $username;
            header("Location: ../Views/Admin/dashboard.php");
        } else {
            $db_error = "Username or Password is incorrect";
        }
    }
}

function validateEmail($email)
{
    $pos_at = strpos($email, "@");
    $pos_dot = strpos($email, ".", $pos_at + 1);
    if ($pos_at < $pos_dot) {
        return true;
    }
    return false;
}

function insertUser($name, $email, $username, $password, $profile_image, $mobile, $address, $gender, $user_type)
{
    $query = "insert into users values (NULL,'$name', '$email', '$mobile', '$username', '$password', '$gender', '$profile_image' , '$address', '$user_type')";

    return execute($query);
}

function checkUsers($username, $password)
{
    $query = "select * from users where username = '$username' and password = '$password'";
    $result = get($query);
    if (count($result) > 0) {
        $_SESSION['user'] = $result[0];
        return true;
    }
    return false;
}

function getAllUsers()
{
    $query = "select * from users";
    $result = get($query);
    return $result;
}

function getUser($id)
{
    $query = "select * from users where id = $id";
    $result = get($query);
    if (count($result) > 0) {
        return $result[0];
    }
    return false;
}

function checkUsername($username)
{
    $query = "select * from users where username = '$username'";
    $result = get($query);
    if (count($result) > 0) {
        return true;
    }
    return false;
}