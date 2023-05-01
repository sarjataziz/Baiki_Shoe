<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
}
require_once '../../Controllers/userControllerSeller.php';
include './sellerNav.php';

$shoe1 = getAllShoeTypes();

$id = $_GET["u_id"];
$user = getUser($id);

?>

<h1>Welcome <?php echo $_SESSION["username"] ?></h1>
<h2>Edit Your Profile</h2>
<div class="container">
    <form action="" method="POST">
        <fieldset>
            <legend><?php echo $_SESSION["username"] ?> Profile</legend>
            <table align="center">
                <tr>
                    <td><label>Name: </label></td>
                    <td><input type="text" id="name" name="name" value="<?php echo $shoes["name"]; ?>"></td>
                </tr>
                <tr>
                    <td><label for="Username">Username: </label></td>
                    <td><input type="text" name="username" value="<?php echo $shoes["username"]; ?>"></td>
                </tr>
                <tr>
                    <td><label for="Password">Password: </label></td>
                    <td><input type="password" name="password" value="<?php echo $shoes["password"]; ?>"></td>
                </tr>
                <tr>
                    <td><label for="Email">Email: </label></td>
                    <td><input type="email" name="email" value="<?php echo $shoes["email"]; ?>"></td>
                </tr>
                <tr>
                    <td><label for="Phone">Mobile: </label></td>
                    <td><input type="tel" name="mobile" value="<?php echo $shoes["mobile"]; ?>"></td>
                </tr>
                <tr>
                    <td><label for="Address">Address: </label></td>
                    <td><input type="text" name="address" value="<?php echo $shoes["address"]; ?>"></td>
                </tr>
                <tr>
                    <td><label for="Gender">Gender: </label></td>
                    <td><input type="radio" name="gender" value="Male">Male <input type="radio" name="gender"
                            value="Female"> Female </td>
                </tr>
                <tr>
                    <td align="center" colspan="2"><input type="submit" name="submit" value="Save"></td>
                </tr>
            </table>
        </fieldset>
        <br>
    </form>
</div>