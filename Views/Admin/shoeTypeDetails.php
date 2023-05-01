<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: ../login.php");
}
require_once '../../Controllers/shoeTypeController.php';
include './adminNav.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shoe Type Details</title>
</head>

<body>
    <div class="container">

        <h2>Baiki Shoe</h2>

        <h2>Welcome <?php echo $_SESSION["username"] ?></h2><br>
        <h3 align="center">Shoe Type Details</h3>

        <input type="text" id="searchInput" placeholder="Search by Shocks Types">

        <table align="center">
            <thead>
                <tr>
                    <th>Shoe Type ID</th>
                    <th>Shoe Type Name</th>
                    <!-- <th>Shoe Quantity</th> -->
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                $shoes = getAllShoeTypes();
                foreach ($shoes as $ShoeType) {
                    echo "<tr>";
                    echo "<td>$i</td>";
                    echo "<td>" . $ShoeType["shoes_type"] . "</td>";
                    echo '<td><a href="editShoeType.php?id=' . $ShoeType["shoe_type_id"] . '">Edit</a></td>';
                    echo '<td><a href="deleteShoeType.php?id=' . $ShoeType["shoe_type_id"] . '">Delete</a></td>';
                    echo "</tr>";
                    $i++;
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
<script>
    const searchInput = document.querySelector('#searchInput');
    const shoeTable = document.querySelector('table tbody');
    const shoeTableRows = shoeTable.getElementsByTagName('tr');

    searchInput.addEventListener('input', () => {
        const searchValue = searchInput.value.toLowerCase();
        for (let i = 0; i < shoeTableRows.length; i++) {
            const row = shoeTableRows[i];
            const name = row.getElementsByTagName('td')[1].textContent.toLowerCase();
            if (name.includes(searchValue)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        }
    });
</script>


</script>

</html>