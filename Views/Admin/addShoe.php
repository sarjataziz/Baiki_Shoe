<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}

include './adminNav.php';
include '../../Controllers/shoeController.php';
include '../../Controllers/shoeTypeController.php';

$shoes = getAllShoeTypes();
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
        <h1 align="center">Add Shoes</h1>
        <h5 style="color: red;"><?php echo $db_error; ?></h5>
        <form action="" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">

            <fieldset>
                <legend>Details</legend>
                <table align="center">
                    <tr>
                        <td><label>Shoe's Name: </label></td>
                        <td><input type="text" id="name" name="name" placeholder="name"><br>
                            <span style="color:red"><?php echo $error_shoe_name; ?></span>
                        </td>
                    </tr>
                    <tr>
                        <td><label>Shoe Type</label></td>
                        <td>
                            <select name="shoe_id" id="shoe_id">
                                <option disabled selected value="">Select Shoe Type</option>
                                <?php
                                foreach ($shoes as $shoe) {
                                    echo "<option value='" . $shoe['shoe_type_id'] . "'>" . $shoe['shoes_type'] . "</option>";
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label>Category: </label></td>
                        <td>
                            <input type="text" id="category" name="category" placeholder="Category">
                            <span style="color:red"><?php echo $error_category; ?></span>
                        </td>
                    <tr>
                        <td><label>Price: </label></td>
                        <td><input type="text" id="price" name="price" placeholder="price"><br>
                            <span style="color:red"><?php echo $error_price; ?></span>
                        </td>
                    </tr>
                    <tr>
                        <td><label>Quantity: </label></td>
                        <td><input type="text" id="quantity" name="quantity" placeholder="quantity"><br>
                            <span style="color:red"><?php echo $error_quantity; ?></span>
                        </td>
                    </tr>
                    <tr>
                        <td><label>Size: </label></td>
                        <td><input type="text" id="size" name="size" placeholder="size"><br>
                            <span style="color:red"><?php echo $error_size; ?></span>
                        </td>
                    </tr>
                    <tr>
                        <td><label>Color: </label></td>
                        <td><input type="text" id="color" name="color" placeholder="color"><br>
                            <span style="color:red"><?php echo $error_color; ?></span>
                        </td>
                    </tr>
                    <tr>
                        <td><label>Rating: </label></td>
                        <td><input type="text" id="rating" name="rating" placeholder="rating"><br>
                            <span style="color:red"><?php echo $error_rating; ?></span>
                        </td>
                    </tr>
                    <tr>
                        <td><label>Description: </label></td>
                        <td><textarea type="text" name="description" id="text" cols="60" rows="5"></textarea><br>
                            <span style="color:red"><?php echo $error_description; ?></span>
                        </td>
                    </tr>
                    <tr>
                        <td><label>Image: </label></td>
                        <td><input type="file" id="shoe_img" name="shoe_img" placeholder="image"><br>
                            <span style="color:red"><?php echo $error_shoe_img; ?></span>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" colspan="2"><input type="submit" name="add_shoe" value="Save"></td>
                    </tr>
                </table>
            </fieldset>
        </form>
    </div>
    <script src="../../JavaScript/addShoe.js"></script>

</body>

</html>