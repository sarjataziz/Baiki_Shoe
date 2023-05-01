<?php
    session_start();
    if(!isset($_SESSION["username"])){
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

        <table align="center">
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
                foreach($users as $user){
                    echo "<tr>";
                        echo "<td>$i</td>";
                        echo "<td>".$user["name"]."</td>";
                        echo "<td>".$user["email"]."</td>";
                        echo "<td>".$user["mobile"]."</td>";
                        echo "<td>".$user["gender"]."</td>";
                        echo "<td>".$user["username"]."</td>";
                        echo "<td>".$user["password"]."</td>";
                        echo '<td><a href="editUser.php?id='.$user["u_id"].'">Edit</a></td>';
                        echo '<td><a href="deleteUser.php?id='.$user["u_id"].'">Delete</a></td>';
                    echo "</tr>";
                    $i++;
                }           
            ?>
            </tbody>
        </table>
    </div>

</body>

</html>