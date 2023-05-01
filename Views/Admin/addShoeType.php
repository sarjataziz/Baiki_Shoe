<?php
session_start();
require_once '../../Controllers/shoeTypeController.php';
include './adminNav.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Shoe Type</title>
</head>

<body>
    <div class="container">
        <form action="" method="post">
            <fieldset>
                <h1>Add Shoe Type</h1>
                <h3 style="color:red"><?php echo $db_error; ?></h3>
                <table>
                    <tr>
                        <td><label>Shoe Type Name: </label></td>
                        <td><input type="text" name="name" value=""></td>
                        <td><span style="color:red"><?php echo $error_shoe_type; ?></span></td>
                    </tr>
                    <tr>
                        <td colspan="3" align="center"><input type="submit" name="add_shoeType" value="Add Shoe Type">
                        </td>
                    </tr>
                </table>
            </fieldset>
        </form>
    </div>
</body>

</html>