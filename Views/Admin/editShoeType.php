<?php 
    session_start();
    if(!isset($_SESSION["username"])){
        header("Location: ../login.php");
    }
    require_once '../../Controllers/categoryController.php'; 
    include './adminNav.php';
    
    $id = $_GET["id"];
    $category = getCategory($id);
?>

<div class="container">
    <h2>Edit ShoeType</h2><br>
    <h5 style="color:red"><?php echo $db_error; ?></h5>
    <form action="" method="post">
        <table>
            <tr>
                <td><label>Shoe Type Name: </label></td>
                <td><input type="hidden" name="id" value="<?php echo $shoeType["shoe_type_id"]; ?>"></td>
                <td><input type="text" name="name" value="<?php echo $shoeType["shoe_type"]; ?>"></td>
                <td><span style="color:red"><?php echo $error_shoe_type; ?></span></td>
            </tr>
            <tr>
                <td colspan="4" align="center"><input type="submit" name="edit_shoeType" value="Edit Shoe Type"></td>
            </tr>
        </table>
    </form>
</div>