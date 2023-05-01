<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: ../login.php");
}
include '../../Controllers/socksController.php';
include './adminNav.php';
$message = $_GET["msg"];
?>
<!DOCTYPE html>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
      integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shoe Details</title>
</head>

<body>
<h2>Welcome <?php echo $_SESSION["username"] ?></h2><br>

<div class="container">
    <h3 class="text-center">Socks Details</h3>

    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>Sock ID</th>
            <th>Sock Image</th>
            <th>Sock Name</th>
            <th>Sock Color</th>
            <th>Sock Material</th>
            <th>Sock Quantity</th>
            <th>Sock Size</th>
            <th>Sock Description</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $socks = getAllSocks();
        $i = 1;
        foreach ($socks as $sock) {
            echo "<tr>";
            echo "<td>" . $i . "</td>";
            echo "<td><img src='" . $sock['img'] . "' width='50px' height='50px'></td>";
            echo "<td>" . $sock['sock_name'] . "</td>";
            echo "<td>" . $sock['color'] . "</td>";
            echo "<td>" . $sock['material'] . "</td>";
            echo "<td>" . $sock['size'] . "</td>";
            echo "<td>" . $sock['price'] . "</td>";
            echo "<td>" . $sock['quantity'] . "</td>";
            echo "<td><a href='editSocks.php?id=" . $sock['socks_id'] . "' class='btn btn-primary'>Edit</a></td>";
            echo "<td><a href='deleteSock.php?id=" . $sock['socks_id'] . "' class='btn btn-danger'>Delete</a></td>";
            echo "</tr>";
            $i++;
        }
        ?>
        </tbody>
    </table>
</div>
</body>


</html>