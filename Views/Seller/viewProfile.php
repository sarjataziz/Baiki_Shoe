<?php

include '../../Controllers/userProfile.php';
include './sellerNav.php';

if(isset($_GET['u_id'])) {
    $id = $_GET['u_id'];
    $user = viewUser($id);
} else {
    echo "Invalid request";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>

<body>
    <h1>Profile</h1>
    <img src="../../storage/users<?php echo $user['image']; ?>" alt="Profile Picture" width="100px" height="100px">
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

</html>

</body>

</html>