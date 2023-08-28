<?php

include 'connection.php';
include './includes/sidebar1.php';
include './includes/header1.php';

$user_id = $_SESSION['user_id'];

if(isset($_POST['user_update_profile'])){

    $user_update_name = $_POST['user_update_name'];
    $user_update_email = $_POST['user_update_email'];

    $user_update = " UPDATE `reg` SET `name` = '$user_update_name', `email` = '$user_update_email' WHERE id = '$user_id' ";

    $user_result = mysqli_query($conn, $user_update);

    $user_old_password = $_POST['user_old_password'];
    $user_update_password = $_POST['user_update_password'];
    $user_new_password = $_POST['user_new_password'];
    $user_confirm_password = $_POST['user_confirm_password'];

    if(!empty($user_update_password) || !empty($user_new_password) || !empty($user_confirm_password)){
        if($user_update_password != $user_old_password){
            echo '<script>alert("Old Password not matched")</script>';
        }elseif($user_new_password != $user_confirm_password){
            echo '<script>alert("Confirm password not matched")</script>';
        }else{
            $user_update = " UPDATE `reg` SET `password` = '$confirm_password' WHERE id = '$user_id' ";
            $user_result = mysqli_query($conn, $user_update);

            echo '<script>alert("Password Update Successfully")</script>';
        }
    }

    $user_update_image = $_FILES['user_update_image']['name'];
    $user_update_image_size = $_FILES['user_update_image']['size'];
    $user_update_image_tmp_name = $_FILES['user_update_image']['tmp_name'];
    $user_update_image_folder = 'upload/'.$user_update_image;

    if(!empty($user_update_image)){
        if($user_update_image_size > 200000){
            echo '<script>alert("Image size is too large")</script>';
        }else{
            $user_image_update = " UPDATE `reg` SET `image` = '$user_update_image' WHERE id = '$user_id' ";
            $user_result = mysqli_query($conn, $user_image_update);

            if($user_image_update){
                move_uploaded_file($user_update_image_tmp_name,$user_update_image_folder);
            }
            echo '<script>alert("Image Update Successfully")</script>';
        }
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles\style1.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Babylonica&family=Dancing+Script&family=Poppins:ital,wght@0,200;0,300;0,500;1,300&family=Roboto+Slab:wght@200;300;500&family=Zeyada&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/icon?family=Material+Symbols+Outlined" rel="stylesheet">
</head>
<body id="update_body">

<div class="item userupdate">

    <span class="dashboard-title">Profile</span>
    <br>
    <br>
    
    <div class="user-update-profile">

        <?php
            $user_select = " SELECT * FROM `reg` WHERE id = '$user_id' ";

            $user_result = mysqli_query($conn, $user_select);
            if(mysqli_num_rows($user_result) > 0){
                $fetch = mysqli_fetch_assoc($user_result);
            }
            if($fetch['image'] == ''){
                echo '<img src="images/default.jpg">';
            }
            else{
                echo '<img src="upload/'.$fetch['image'].'">';
            }
        ?>

    <form action="" method="post" enctype="multipart/form-data">

        <div class="input-box">
            <span>Full Name :</span>
            <input type="text" class="box" name="user_update_name" value="<?php echo $fetch['name']; ?>">
        </div>
        <div class="input-box">
            <span>Email :</span>
            <input type="email" class="box" name="user_update_email" value="<?php echo $fetch['email']; ?>">
        </div>
        <div class="input-box">
            <span>Mobile Number :</span>
            <input type="number" class="box" name="user_update_phone" value="<?php echo $fetch['mobilenumber']; ?>">
        </div>
        <div class="input-box">
            <input type="hidden" class="box" name="user_old_password" value="<?php echo $fetch['password']; ?>">
            <span>Old Password :</span>
            <input type="password" class="box" name="user_update_password" placeholder="Enter previous password">
        </div>
        <div class="input-box">
            <span>New Password :</span>
            <input type="password" class="box" name="user_new_password" placeholder="Enter new password">
        </div>
        <div class="input-box">
            <span>Confirm Password :</span>
            <input type="password" class="box" name="user_confirm_password" placeholder="Confirm new password">
        </div>
        <div class="input-box">
            <span>Update your pic :</span>
            <input type="file" name="user_update_image" accept="image/jpg, image/png">
        </div>
        <div class="btn">
            <input type="submit" value="update profile" name="user_update_profile">
        </div>
    </form>
    </div>
</div>
</body>