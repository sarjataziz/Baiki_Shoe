<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
}
require_once '../../Controllers/shoeControllerSeller.php';
require_once '../../Controllers/shoeTypeController.php';
include './sellerNav.php';

$shoeType = getAllShoe();
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
        <h3 align="center">Shoe Details</h3>


        <input type="text" id="search-input" placeholder="Search for shoes">
        <table id="shoe-table" align="center">
            <thead>
                <tr>
                    <th>Shoe ID</th>
                    <th>Shoe Image</th>
                    <th>Shoe Name</th>
                    <th>Category Name</th>
                    <th>Shoe Price</th>
                    <th>Shoe Quantity</th>
                    <th>Shoe Description</th>
                    <th>Shoe Rating</th>
                    <th>Shoe Size</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                foreach ($shoeType as $shoe) {
                    echo "<tr class='shoe-row'>";
                    echo "<td>" . $i . "</td>";
                    echo "<td><img src='" . $shoe['shoe_img'] . "' width='50px' height='50px'></td>";
                    echo "<td>" . $shoe['shoe_name'] . "</td>";
                    echo "<td>" . $shoe['category'] . "</td>";
                    echo "<td>" . $shoe['price'] . "</td>";
                    echo "<td>" . $shoe['quantity'] . "</td>";
                    echo "<td>" . $shoe['description'] . "</td>";
                    echo "<td>" . $shoe['rating'] . "</td>";
                    echo "<td>" . $shoe['size'] . "</td>";
                    echo "<td><a href='editShoes.php?shoe_id=" . $shoe['shoe_id'] . "'>Edit</a></td>";
                    echo "<td><a href='deleteShoe.php?shoe_id=" . $shoe['shoe_id'] . "'>Delete</a></td>";
                    echo "</tr>";
                    $i++;
                }
                ?>
            </tbody>
        </table>
        <script>
            const searchInput = document.getElementById('search-input');
            const shoeTable = document.getElementById('shoe-table');

            searchInput.addEventListener('keyup', function() {
                const searchText = searchInput.value.toLowerCase();

                const shoeRows = shoeTable.querySelectorAll('.shoe-row');
                shoeRows.forEach(function(row) {
                    const name = row.querySelector('td:nth-child(3)').textContent.toLowerCase();
                    const category = row.querySelector('td:nth-child(4)').textContent.toLowerCase();

                    if (name.includes(searchText) || category.includes(searchText)) {
                        row.style.display = 'table-row';
                    } else {
                        row.style.display = 'none';
                    }
                });
            });
        </script>
    </div>
</body>

</html>