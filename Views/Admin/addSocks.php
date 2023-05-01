<?php 
    session_start();
    if(!isset($_SESSION['username'])){
        header("Location: login.php");
    }

    include '../../Controllers/socksController.php';
    include './adminNav.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Shoes</title>
</head>

<body>
    <div class="container">
        <h1 align="center">Add Socks</h1>
        <h5 style="color: red;"><?php echo $db_error; ?></h5>
        <form action="" method="post" enctype="multipart/form-data">
            <fieldset>
                <legend>Details</legend>
                <table align="center">
                    <tr>
                        <td><label>Sock Name: </label></td>
                        <td><input type="text" id="sock_name" name="sock_name" placeholder="Sock Name"><br>
                            <span style="color:red"><?php echo $error_sock_name; ?></span>
                        </td>
                    </tr>
                    <tr>
                        <td><label>Color: </label></td>
                        <td><input type="text" id="color" name="color" placeholder="Color"><br>
                            <span style="color:red"><?php echo $error_color; ?></span>
                        </td>
                    </tr>
                    <tr>
                        <td><label>Material: </label></td>
                        <td><input type="text" id="material" name="material" placeholder="Material"><br>
                            <span style="color:red"><?php echo $error_material; ?></span>
                        </td>
                    </tr>
                    <tr>
                        <td><label>Size: </label></td>
                        <td><input type="text" id="size" name="size" placeholder="Size"><br>
                            <span style="color:red"><?php echo $error_size; ?></span>
                        </td>
                    </tr>
                    <tr>
                        <td><label>Price: </label></td>
                        <td><input type="text" id="price" name="price" placeholder="Price"><br>
                            <span style="color:red"><?php echo $error_price; ?></span>
                        </td>
                    </tr>
                    <tr>
                        <td><label>Quantity: </label></td>
                        <td><input type="text" id="quantity" name="quantity" placeholder="Quantity"><br>
                            <span style="color:red"><?php echo $error_quantity; ?></span>
                        </td>
                    </tr>
                    <tr>
                        <td><label>Image: </label></td>
                        <td><input type="file" id="sock_img" name="sock_img"><br>
                            <span style="color:red"><?php echo $error_img; ?></span>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" colspan="2"><input type="submit" name="add_sock" value="Save"></td>
                    </tr>
                </table>
            </fieldset>
        </form>
    </div>

</body>

</html>