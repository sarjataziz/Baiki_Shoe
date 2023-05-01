<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forget Password</title>
</head>

<body>
    <div class="container">
        <h3 style="color:red"><?php //echo $db_error; ?></h3>
        <h1>Forgot Password</h1>
        <form action="" method="POST">
            <fieldset>
                <table align="center">
                    <tr>
                        <td><label>Email: </label></td>
                        <td><input type="text" id="email" name="email" placeholder="email" required></td>
                    </tr>
                    <tr>
                        <td><label>New Password: </label></td>
                        <td><input type="password" name="password" placeholder="New Password"></td>
                    </tr>
                    <tr>
                        <td><label>Confirm Password: </label></td>
                        <td><input type="password" id="confirm_password" name="confirm_password"
                                placeholder="Confirm Password">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center"><input type="submit" name="forgetPassword" value="Submit"></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center"><a href="login.php">Login</a></td>
                    </tr>
                </table>
                </table>
            </fieldset>
        </form>
    </div>
</body>

</html>