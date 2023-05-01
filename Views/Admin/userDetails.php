<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: ../login.php");
}
include '../../Controllers/userController.php';
include './adminNav.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details</title>
</head>

<body>
    <div class="container">
        <h2>Welcome <?php echo $_SESSION["username"] ?></h2><br>
        <h3 align="center">User's Details</h3>

        <form>
            <input type="text" id="searchInput" placeholder="Search for users...">
        </form>

        <table align="center" id="userTable">
            <thead>
                <tr>
                    <th>Users' ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Gender</th>
                    <th>Username</th>
                    <th>Password</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                $users = getAllUsers();
                foreach ($users as $user) {
                    echo "<tr>";
                    echo "<td>$i</td>";
                    echo "<td>" . $user["name"] . "</td>";
                    echo "<td>" . $user["email"] . "</td>";
                    echo "<td>" . $user["mobile"] . "</td>";
                    echo "<td>" . $user["gender"] . "</td>";
                    echo "<td>" . $user["username"] . "</td>";
                    echo "<td>" . $user["password"] . "</td>";
                    echo '<td><a href="editUser.php?id=' . $user["u_id"] . '">Edit</a></td>';
                    echo '<td><a href="deleteUser.php?id=' . $user["u_id"] . '">Delete</a></td>';
                    echo "</tr>";
                    $i++;
                }
                ?>
            </tbody>
        </table>
        <script>
        const searchInput = document.querySelector('#searchInput');
        const userTable = document.querySelector('#userTable');

        searchInput.addEventListener('input', () => {
            const searchValue = searchInput.value.toLowerCase();

            // Filter the user table rows based on the search value
            const rows = userTable.querySelectorAll('tbody tr');
            rows.forEach(row => {
                const name = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
                const email = row.querySelector('td:nth-child(3)').textContent.toLowerCase();
                const mobile = row.querySelector('td:nth-child(4)').textContent.toLowerCase();
                const gender = row.querySelector('td:nth-child(5)').textContent.toLowerCase();
                const username = row.querySelector('td:nth-child(6)').textContent.toLowerCase();
                const password = row.querySelector('td:nth-child(7)').textContent.toLowerCase();

                if (name.includes(searchValue) ||
                    email.includes(searchValue) ||
                    mobile.includes(searchValue) ||
                    gender.includes(searchValue) ||
                    username.includes(searchValue) ||
                    password.includes(searchValue)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
        </script>
    </div>

</body>

</html>