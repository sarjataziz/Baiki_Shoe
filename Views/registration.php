<?php
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
    * {
        box-sizing: border-box;
    }

    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
    }

    .container {
        max-width: 600px;
        margin: 0 auto;
        padding: 20px;
    }

    form {
        background-color: #f9f9f9;
        padding: 20px;
        border-radius: 10px;
    }

    h2 {
        font-size: 24px;
        text-align: center;
    }

    h3 {
        color: red;
    }

    label {
        display: block;
        font-weight: bold;
        margin-bottom: 5px;
    }

    input[type="text"],
    input[type="email"],
    input[type="password"],
    input[type="file"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 20px;
        border: none;
        border-radius: 5px;
        background-color: #f2f2f2;
    }

    input[type="radio"] {
        margin-right: 10px;
    }

    input[type="submit"] {
        display: block;
        margin: 20px auto 0;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        background-color: #4CAF50;
        color: #fff;
        font-size: 16px;
        cursor: pointer;
    }

    span {
        display: block;
        color: red;
        margin-top: 5px;
        font-size: 14px;
    }
    </style>
    <title>Signup</title>
</head>

<body>

    <div class="container">
        <form action="" method="post" onsubmit="return validate()" enctype="multipart/form-data">
            <fieldset>
                <h2 id="sign-up">Sign-up</h2>
                <h3 style="color:red"><?php echo $db_error; ?></h3>
                <table align="center">
                    <tr>
                        <td><label>Name: </label></td>
                        <td><input type="text" id="name" name="name" placeholder="name" value="<?php echo $name; ?>">
                        </td>
                        <td><span style="color:red"><?php echo $error_name; ?></span></td>
                    </tr>
                    <tr>
                        <td><label for="Email">Email: </label></td>
                        <td><input type="email" onfocusout="checkEmail(this)" name="email" id="email"
                                placeholder="Email" value="<?php echo $email; ?>"></td>
                        <td><span style="color:red" id="error_email"><?php echo $error_email; ?></span></td>
                    </tr>
                    <tr>
                        <td><label for="mobile">Mobile: </label></td>
                        <td><input type="text" id="mobile" name="mobile" placeholder="Mobile"
                                value="<?php echo $mobile; ?>">
                        </td>
                        <td><span style="color:red"><?php echo $error_mobile; ?></span></td>
                    </tr>
                    <tr>
                        <td><label for="Username">Username: </label></td>
                        <td><input type="text" onfocusout="checkUsername(this)" id="username" name="username"
                                placeholder="Username" value="<?php echo $username; ?>"></td><br>
                        <td><span style="color:red" id="error_username"><?php echo $error_username; ?></span></td>
                    </tr>
                    <tr>
                        <td><label for="Password">Password: </label></td>
                        <td><input type="password" name="password" id="password" placeholder="Password"
                                value="<?php echo $password; ?>">
                        </td>
                        <td><span style="color:red"><?php echo $error_password; ?></span></td>
                    </tr>
                    <tr>
                        <td><label for="Confirm Password">Confirm Password: </label></td>
                        <td><input type="password" name="confirm_password" id="confirm_password"
                                placeholder="Confirm Password" value="<?php echo $confirm_password; ?>"></td>
                        <td><span style="color:red"><?php echo $error_confirm_password; ?></span></td>
                    </tr>
                    <tr>
                        <td><label for="Gender">Gender: </label></td>
                        <td><input type="radio" name="gender" value="Male"
                                <?php if ($gender == "Male") echo "checked"; ?>>Male <input type="radio" name="gender"
                                value="Female" <?php if ($gender == "Female") echo "checked"; ?>> Female </td>
                        <td><span style="color:red"><?php echo $error_gender; ?></span></td>
                    </tr>
                    <tr>
                        <td><label for="Address">Address: </label></td>
                        <td><input type="text" id="address" name="address" placeholder="Address"
                                value="<?php echo $address; ?>">
                        </td>
                        <td><span style="color:red"><?php echo $error_address; ?></span></td>
                    </tr>
                    <tr>
                        <td><label for="Profile-Picture">Upload Profile Picture: </label></td>
                        <td><input type="file" name="profile_picture" value="<?php echo $profile_picture; ?>"></td>
                        <td><span style="color:red"><?php echo $error_profile_picture; ?></span></td>
                    </tr>
                    <tr>
                        <td align="center" colspan="2"><input type="submit" name="submit" value="Save"></td>
                    </tr>
                </table>
            </fieldset>
        </form>

    </div>
    <!-- <script src="../JavaScript/signup.js">
    </script>
    <script src="../JavaScript/email.js">
    </script>
    <script src="../JavaScript/username.js">
    </script> -->
    <script src="../JavaScript/registration.js"></script>
</body>

</html>