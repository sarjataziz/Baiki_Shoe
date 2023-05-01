<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}

include '../../Controllers/socksControllerSeller.php';
include './sellerNav.php';

$id = $_GET["id"];
$socks = getSock($id);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Socks</title>
</head>

<body>
    <div class="container">

        <h5 style="color: red;"><?php echo $db_error; ?></h5>
        <form action="" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="socks_id" value="<?php echo $_GET["id"]; ?>">
            <fieldset>
                <legend>Details</legend>
                <table align="center">
                    <tr>
                        <td><label>Sock Name: </label></td>
                        <td><input type="text" id="sock_name" name="sock_name" value="<?php echo $socks["sock_name"]; ?>"><br>
                        <td><input type="hidden" name="id" value="<?php echo $socks["socks_id"]; ?>"></td>
                        <span style="color:red"><?php echo $error_sock_name; ?></span>
                        </td>
                    </tr>
                    <tr>
                        <td><label>Color: </label></td>
                        <td><input type="text" id="color" name="color" value="<?php echo $socks["color"]; ?>"><br>
                            <span style="color:red"><?php echo $error_color; ?></span>
                        </td>
                    </tr>
                    <tr>
                        <td><label>Material: </label></td>
                        <td><input type="text" id="material" name="material" value="<?php echo $socks["material"]; ?>"><br>
                            <span style="color:red"><?php echo $error_material; ?></span>
                        </td>
                    </tr>
                    <tr>
                        <td><label>Size: </label></td>
                        <td><input type="text" id="size" name="size" value="<?php echo $socks["size"]; ?>"><br>
                            <span style="color:red"><?php echo $error_size; ?></span>
                        </td>
                    </tr>
                    <tr>
                        <td><label>Price: </label></td>
                        <td><input type="text" id="price" name="price" value="<?php echo $socks["price"]; ?>"><br>
                            <span style="color:red"><?php echo $error_price; ?></span>
                        </td>
                    </tr>
                    <tr>
                        <td><label>Quantity: </label></td>
                        <td><input type="text" id="quantity" name="quantity" value="<?php echo $socks["quantity"]; ?>"><br>
                            <span style="color:red"><?php echo $error_quantity; ?></span>
                        </td>
                    </tr>
                    <tr>
                        <td><label>Image: </label></td>
                        <td><input type="file" id="sock_img" name="sock_img" value="<?php echo $socks["img"]; ?>"><br>
                            <span style="color:red"><?php echo $error_img; ?></span>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" colspan="2"><input type="submit" name="delete_sock" value="Delete"></td>
                    </tr>
                </table>
            </fieldset>
        </form>
    </div>

</body>

</html>