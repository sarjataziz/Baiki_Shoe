<?php
//include '../Controllers/userController.php';
include '../Controllers/registrationController.php';
include_once './homeNav.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
    :root {
        --primary-color: #007bff;
        --secondary-color: #6c757d;
        --bg-color: #f8f9fa;
        --font-family: 'Open Sans', sans-serif;
        --font-size: 16px;
    }

    body {
        font-family: var(--font-family);
        font-size: var(--font-size);
        background-color: var(--bg-color);
    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        text-align: center;
        color: var(--primary-color);
        font-weight: bold;
    }

    a {
        color: var(--secondary-color);
        text-decoration: none;
        transition: color 0.2s ease-in-out;
    }

    a:hover {
        color: var(--primary-color);
    }

    input[type="text"],
    input[type="password"],
    textarea {
        padding: 10px;
        border-radius: 5px;
        border: 1px solid var(--secondary-color);
        background-color: var(--bg-color);
        color: var(--secondary-color);
        font-size: var(--font-size);
        margin-bottom: 10px;
        width: 100%;
    }

    button {
        padding: 10px;
        border-radius: 5px;
        border: none;
        background-color: var(--primary-color);
        color: white;
        font-size: var(--font-size);
        cursor: pointer;
        transition: background-color 0.2s ease-in-out;
    }

    button:hover {
        background-color: #0069d9;
    }
    </style>
    <title>Login</title>
</head>

<body>

    <div class="container">

        <script>
        function validateForm() {
            var username = document.getElementById("username").value;
            var password = document.getElementById("password").value;
            var valid = true;

            if (username == "") {
                document.getElementById("error_username").innerHTML = "Please enter a username";
                valid = false;
            } else {
                document.getElementById("error_username").innerHTML = "";
            }

            if (password == "") {
                document.getElementById("error_password").innerHTML = "Please enter a password";
                valid = false;
            } else {
                document.getElementById("error_password").innerHTML = "";
            }

            return valid;
        }
        </script>

        <form method="POST" action="" onsubmit="return validateForm()">
            <table align="center">
                <tr>
                    <td><label>Username: </label></td>
                    <td><input type="text" id="username" name="username" placeholder="Username"></td>
                    <td><span style="color:red" id="error_username"><?php echo $error_username; ?></span></td>
                </tr>
                <tr>
                    <td><label>Password: </label></td>
                    <td><input type="password" id="password" name="password" placeholder="Password"></td>
                    <td><span style="color:red" id="error_password"><?php echo $error_password; ?></span></td>
                </tr>
                <tr>
                    <td colspan="3" align="center"><input type="submit" name="login" value="Submit"></td>
                </tr>
                <tr>
                    <td colspan="3" align="center"><a href="./forgetPassword.php">Forget Password?</a></td>
                </tr>
                <tr>
                    <td colspan="3" align="center"><a href="./registration.php">Create New Account?</a></td>
                </tr>
            </table>
        </form>



    </div>
</body>

</html>