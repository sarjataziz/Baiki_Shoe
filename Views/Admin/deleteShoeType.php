<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: ../login.php");
}
require_once '../../Controllers/shoeTypeController.php';
include './adminNav.php';

$id = $_GET["id"];
$shoeType = getShoeType($id);
?>

<div class="container">
    <h2>Edit ShoeType</h2><br>
    <h5 style="color:red"><?php echo $db_error; ?></h5>
    <form action="" method="post">
        <table>
            <tr>
                <td><label>Shoe Type Name: </label></td>
                <td><input type="hidden" name="id" value="<?php echo $shoeType["shoe_type_id"]; ?>"></td>
                <td><input type="text" name="shoe_type" value="<?php echo $shoeType["shoe_type"]; ?>"></td>
                <td><span style="color:red"><?php echo $error_shoe_type; ?></span></td>

            </tr>
            <tr>
                <td colspan="4" align="center"><input type="submit" name="delete_shoe_type" value="Delete Shoe Type">
                </td>
            </tr>
        </table>
    </form>
</div>