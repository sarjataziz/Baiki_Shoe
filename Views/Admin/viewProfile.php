<?php
session_start();
include '../../Controllers/userController.php';
include './adminNav.php';


if (isset($_SESSION['user'])) {
    $user = getUser($_SESSION['user']['u_id']);
} else {
    header('Location: ./login.php');
    exit();
}

?>

<body>
<h1>Profile</h1>
<!--<img src="../../storage/users/-->
<?php //echo $user['image']; ?><!--" alt="Profile Picture" width="100px" height="100px">-->
<p><strong>ID:</strong> <?php echo $user['u_id']; ?></p>
<p><strong>Name:</strong> <?php echo $user['name']; ?></p>
<p><strong>Email:</strong> <?php echo $user['email']; ?></p>
<p><strong>Mobile:</strong> <?php echo $user['mobile']; ?></p>
<p><strong>Username:</strong> <?php echo $user['username']; ?></p>
<p><strong>Gender:</strong> <?php echo $user['gender']; ?></p>
<p><strong>Address:</strong> <?php echo $user['address']; ?></p>
<p><strong>User Type:</strong> <?php echo $user['user_type']; ?></p>

<a href="editProfile.php?u_id=<?php echo $user['u_id']; ?>">Edit</a>
<a href="deleteProfile.php?u_id=<?php echo $user['u_id']; ?>">Delete</a>
</body>
