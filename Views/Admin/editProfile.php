<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
}
require_once '../../Controllers/userController.php';
include './adminNav.php';

$user = getUser($_SESSION['user']['u_id']);

?>

<h1>Welcome <?php echo $_SESSION["username"] ?></h1>
<h2>Edit Your Profile</h2>
<div class="container">
    <form action="" method="POST">
        <input type="hidden" name="u_id" value="<?php echo $user["u_id"]; ?>">
        <fieldset>
            <legend><?php echo $_SESSION["username"] ?> Profile</legend>
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