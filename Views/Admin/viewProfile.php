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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <title>Profile</title>
</head>

<body>
    <!--<img src="../../storage/users/-->
    <?php //echo $user['image']; 
    ?>
    <div class="container">
        <h1 class="text-center">Profile</h1>
        <div class="row">
            <div class="col-md-6">
                <p><strong>ID:</strong> <?php echo $user['u_id']; ?></p>
                <p><strong>Name:</strong> <?php echo $user['name']; ?></p>
                <p><strong>Email:</strong> <?php echo $user['email']; ?></p>
                <p><strong>Mobile:</strong> <?php echo $user['mobile']; ?></p>
            </div>
            <div class="col-md-6">
                <p><strong>Username:</strong> <?php echo $user['username']; ?></p>
                <p><strong>Gender:</strong> <?php echo $user['gender']; ?></p>
                <p><strong>Address:</strong> <?php echo $user['address']; ?></p>
                <p><strong>User Type:</strong> <?php echo $user['user_type']; ?></p>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <a href="editProfile.php?u_id=<?php echo $user['u_id']; ?>" class="btn btn-primary mx-2">Edit</a>
            <a href="deleteProfile.php?u_id=<?php echo $user['u_id']; ?>" class="btn btn-danger mx-2">Delete</a>
        </div>
    </div>

    <!--" alt="Profile Picture" width="100px" height="100px">-->


</body>
</body>

</html>