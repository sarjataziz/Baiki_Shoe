<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
}
require_once '../../Controllers/userController.php';
include './adminNav.php';

$user = getUser($_SESSION['user']['u_id']);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
    .container {
        margin: 0 auto;
        width: 50%;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    legend {
        font-weight: bold;
        font-size: 20px;
    }

    label {
        display: inline-block;
        width: 120px;
        font-weight: bold;
        margin-bottom: 10px;
    }

    input[type="text"],
    input[type="password"],
    input[type="email"],
    input[type="tel"] {
        width: 300px;
        height: 30px;
        border-radius: 5px;
        border: 1px solid #ccc;
        padding: 5px;
        margin-bottom: 10px;
    }

    input[type="submit"] {
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
    }

    input[type="submit"]:hover {
        background-color: #45a049;
    }

    table {
        margin-top: 20px;
        border-collapse: collapse;
        width: 100%;
    }

    td {
        padding: 10px;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    tr:hover {
        background-color: #ddd;
    }

    h1,
    h2 {
        text-align: center;
    }
    </style>
    <title>User Profile</title>
</head>

<body>
    <h1>Welcome <?php echo $_SESSION["username"] ?></h1>
    <h2>Edit Your Profile</h2>
    <div class="container">
        <form action="" method="POST">
            <input type="hidden" name="u_id" value="<?php echo $user["u_id"]; ?>">
            <fieldset>
                <!-- <legend><?php echo $_SESSION["username"] ?> Profile</legend> -->
                <table align="center">
                    <tr>
                        <td><label>Name: </label></td>
                        <td><input type="text" id="name" name="name" value="<?php echo $user["name"]; ?>"></td>
                    </tr>
                    <tr>
                        <td><label for="Username">Username: </label></td>
                        <td><input type="text" name="username" value="<?php echo $user["username"]; ?>"></td>
                    </tr>
                    <tr>
                        <td><label for="Password">Password: </label></td>
                        <td><input type="password" name="password" value="<?php echo $user["password"]; ?>"></td>
                    </tr>
                    <tr>
                        <td><label for="Email">Email: </label></td>
                        <td><input type="email" name="email" value="<?php echo $user["email"]; ?>"></td>
                    </tr>
                    <tr>
                        <td><label for="Phone">Mobile: </label></td>
                        <td><input type="tel" name="mobile" value="<?php echo $user["mobile"]; ?>"></td>
                    </tr>
                    <tr>
                        <td><label for="Address">Address: </label></td>
                        <td><input type="text" name="address" value="<?php echo $user["address"]; ?>"></td>
                    </tr>
                    <tr>
                        <td align="center" colspan="2"><input type="submit" name="update" value="Save"></td>
                    </tr>
                </table>
            </fieldset>
            <br>
        </form>
    </div>
</body>

</html>