<?php
include '../../Models/database_config.php';

$u_id = $name = $email = $username = $password = $mobile = $address = $gender = $profile_picture = $confirm_password = "";
$error_name = $error_email = $error_username = $error_password = $error_mobile = $error_address = $error_gender = $error_profile_picture = $error_confirm_password = "";
$db_error = "";
$hasError = false;

function insertUser($name, $email, $username, $password, $mobile, $address, $gender, $user_type)
{
    $query = "insert INTO users (name, email, mobile, username, password, gender, image, address, user_type) VALUES ('$name', '$email', '$mobile', '$username', '$password', '$gender', NULL, '$address', '$user_type')";
    return execute($query);
}


function checkUsers($username, $password)
{
    $query = "select * from users where username = '$username' and password = '$password'";
    $result = get($query);
    if (count($result) > 0) {
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
    $query = "select * from users where u_id = $id";
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

if (isset($_POST['login'])) {

    if (empty($_POST['username'])) {
        $error_username = "Username cannot be empty!";
    } else {
        $username = trim($_POST['username']);
        if (!preg_match("/^[a-zA-Z0-9_]+$/", $username)) {
            $error_username = "Invalid username format!";
        }
    }

    if (empty($_POST['password'])) {
        $error_password = "Password cannot be empty!";
    } else {
        $password = trim($_POST['password']);
        if (strlen($password) < 8) {
            $error_password = "Password must be at least 8 characters long!";
        }
    }

    if (empty($error_username) && empty($error_password)) {

        $query = "select * FROM users WHERE username = '$username' AND password = '$password'";
        $result = get($query);

        if (count($result) > 0) {
            session_start();
            $_SESSION['username'] = $username;
            $_SESSION['u_id'] = $result[0]['u_id'];
            $_SESSION['user_type'] = $result[0]['user_type'];

            if ($_SESSION['user_type'] == 'admin') {
                header("Location: ../Views/Admin/dashboard.php");
                exit();
            } else if ($_SESSION['user_type'] == 'seller') {
                header("Location: ../Views/Seller/dashboard.php");
                exit();
            }
        } else {
            $db_error = "Invalid login credentials";
        }
    }
}

if (isset($_POST['addUser'])) {
    $name = trim($_POST['name']);
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $email = trim($_POST['email']);
    $mobile = trim($_POST['mobile']);
    $address = trim($_POST['address']);
    $gender = isset($_POST['gender']) ? $_POST['gender'] : '';
    $user_type = isset($_POST['user_type']) ? $_POST['user_type'] : '';

    // Basic validation for required fields
    if (empty($name) || empty($username) || empty($password) || empty($email) || empty($mobile) || empty($address) || empty($gender) || empty($user_type)) {
        echo "All fields are required.";
        return;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format.";
        return;
    }

    if (!preg_match('/^[0-9]{10}+$/', $mobile)) {
        echo "Invalid mobile number.";
        return;
    }

    if (!preg_match('/^[a-zA-Z0-9]+$/', $username)) {
        echo "Invalid username format.";
        return;
    }

    if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/', $password)) {
        echo "Password must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, one number and one special character.";
        return;
    }

    if ($user_type !== 'admin' && $user_type !== 'user' && $user_type !== 'seller') {
        echo "Invalid user type.";
        return;
    }

    if (insertUser($name, $email, $username, $password, $mobile, $address, $gender, $user_type)) {
        header("Location: ../Views/Admin/dashboard.php");
        exit();
    } else {
        echo "Error adding user.";
    }
}

if (isset($_POST['update'])) {
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
    $u_id = $_POST['u_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $mobile = $_POST['mobile'];
    $address = $_POST['address'];
    updateUser($u_id, $name, $email, $username, $password, $mobile, $address, $gender);
    header("Location: ./viewProfile.php");
}


function updateUser($u_id, $name, $email, $username, $password, $mobile, $address)
{
    $query = "UPDATE users SET name='$name', email='$email', username='$username', password='$password', mobile='$mobile', address='$address' WHERE u_id=$u_id";
    return execute($query);
}
