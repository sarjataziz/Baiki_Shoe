<?php
include '../../Controllers/registrationController.php';
include_once '../Admin/adminNav.php';
?>
<html lang="en">
<body>
<form action="" method="post" enctype="multipart/form-data">
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
                <td><input type="email" onfocusout="checkEmail(this)" name="email" placeholder="Email"
                           value="<?php echo $email; ?>"></td>
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
                <td><input type="text" onfocusout="checkUsername(this)" name="username" placeholder="Username"
                           value="<?php echo $username; ?>"></td>
                <br>
                <td><span style="color:red" id="error_username"><?php echo $error_username; ?></span></td>
            </tr>
            <tr>
                <td><label for="Password">Password: </label></td>
                <td><input type="password" name="password" placeholder="Password"
                           value="<?php echo $password; ?>">
                </td>
                <td><span style="color:red"><?php echo $error_password; ?></span></td>
            </tr>
            <tr>
                <td><label for="Confirm Password">Confirm Password: </label></td>
                <td><input type="password" name="confirm_password" placeholder="Confirm Password"
                           value="<?php echo $confirm_password; ?>"></td>
                <td><span style="color:red"><?php echo $error_confirm_password; ?></span></td>
            </tr>
            <tr>
                <td><label for="Gender">Gender: </label></td>
                <td><input type="radio" name="gender" value="Male"
                        <?php if ($gender == "Male") echo "checked"; ?>>Male <input type="radio" name="gender"
                                                                                    value="Female" <?php if ($gender == "Female") echo "checked"; ?>>
                    Female
                </td>
                <td><span style="color:red"><?php echo $error_gender; ?></span></td>
            </tr>
            <tr>
                <td><label for="Address">Address: </label></td>
                <td><input type="text" name="address" placeholder="Address" value="<?php echo $address; ?>">
                </td>
                <td><span style="color:red"><?php echo $error_address; ?></span></td>
            </tr>
            <tr>
            <tr>
                <td><label for="UserType">User Type: </label></td>
                <td>
                    <select name="user_type">
                        <option value="user"
                            <?php if (isset($_POST['user_type']) && $_POST['user_type'] == 'user') echo 'selected'; ?>>
                            User
                        </option>
                        <option value="admin"
                            <?php if (isset($_POST['user_type']) && $_POST['user_type'] == 'admin') echo 'selected'; ?>>
                            Admin
                        </option>
                        <option value="seller"
                            <?php if (isset($_POST['user_type']) && $_POST['user_type'] == 'seller') echo 'selected'; ?>>
                            Seller
                        </option>
                    </select>
                </td>
            </tr>
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

</body>

</html>