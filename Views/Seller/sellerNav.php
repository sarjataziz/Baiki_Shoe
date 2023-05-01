<!DOCTYPE html>
<html lang="en">

<head>
    <style>
    .navbar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px;
        background-color: #f0f0f0;
    }

    .navbar h2 {
        margin: 0;
    }

    .navbar ul {
        list-style: none;
        display: flex;
        margin: 0;
        padding: 0;
    }

    .navbar li {
        margin-right: 20px;
    }

    .navbar li:last-child {
        margin-right: 0;
    }

    .navbar a {
        text-decoration: none;
        color: #333;
        font-weight: bold;
        padding: 5px 10px;
    }

    .navbar a:hover {
        color: #fff;
        background-color: #333;
    }
    </style>
</head>

<body>
    <div class="navbar">
        <h2>Welcome <?php echo $_SESSION["username"] ?></h2>
        <nav>
            <ul>
                <li><a href="./dashboard.php">Dashboard</a></li>
                <li><a href="./userDetails.php">User Details</a></li>
                <li><a href="./viewProfile.php">View Profile</a></li>
                <li><a href="./editProfile.php">Edit Profile</a></li>
                <li><a href="../../Controllers/logoutController.php">Logout</a></li>
                <li><a href="./shoeDetails.php">Shoes Details</a></li>
                <li><a href="./sockDetails.php">Socks Details</a></li>
                <li><a href="./editCategory.php">Edit Category</a></li>
                <li><a href="./addShoe.php">Add Shoes</a></li>
                <li><a href="./addSocks.php">Add Socks</a></li>
            </ul>
        </nav>
    </div>

</body>

</html>