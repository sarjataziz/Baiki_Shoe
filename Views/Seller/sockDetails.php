<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: ../login.php");
}
include '../../Controllers/socksControllerSeller.php';
include './sellerNav.php';
?>
<!DOCTYPE html>
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
        <h3 align="center">Socks Details</h3>

        <table align="center">
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
                    echo "<td><a href='editSocks.php?id=" . $sock['socks_id'] . "'>Edit</a></td>";
                    echo "<td><a href='deleteSock.php?id=" . $sock['socks_id'] . "'>Delete</a></td>";
                    echo "</tr>";
                    $i++;
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>