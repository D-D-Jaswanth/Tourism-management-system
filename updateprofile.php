<?php

include 'connection.php';
include './includes/sidebar.php';
include './includes/header.php';

$admin_id = $_SESSION['admin_id'];

if(isset($_POST['update_profile'])){

    $update_name = $_POST['update_name'];
    $update_email = $_POST['update_email'];
    $update_phone = $_POST['update_phone'];

    $update = " UPDATE `reg` SET `name` = '$update_name', `email` = '$update_email', `mobilenumber` = '$update_phone' WHERE id = '$admin_id' ";

    $result = mysqli_query($conn, $update);

    $old_password = $_POST['old_password'];
    $update_password = $_POST['update_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    if(!empty($update_password) || !empty($new_password) || !empty($confirm_password)){
        if($update_password != $old_password){
            echo '<script>alert("Old password not matched")</script>';
        }elseif($new_password != $confirm_password){
            echo '<script>alert("Confirm Password not matched")</script>';
        }else{
            $update = " UPDATE `reg` SET `password` = '$confirm_password' WHERE id = '$admin_id' ";
            $result = mysqli_query($conn, $update);

            echo '<script>alert("Password Update Successfully")</script>';
        }
    }

    $update_image = $_FILES['update_image']['name'];
    $update_image_size = $_FILES['update_image']['size'];
    $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
    $update_image_folder = 'upload/'.$update_image;

    if(!empty($update_image)){
        if($update_image_size > 200000){
            echo '<script>alert("Image size is too large")</script>';
        }else{
            $image_update = " UPDATE `reg` SET `image` = '$update_image' WHERE id = '$admin_id' ";
            $result = mysqli_query($conn, $image_update);

            if($image_update){
                move_uploaded_file($update_image_tmp_name,$update_image_folder);
            }
            echo '<script>alert("Image updated successfully")</script>';
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
    
    <div class="item update">

        <span class="dashboard-title">Profile</span>
        <br>
        <br>
        
        <div class="update-profile">
    
            <?php
                $select = " SELECT * FROM `reg` WHERE id = '$admin_id' ";
    
                $result = mysqli_query($conn, $select);
                if(mysqli_num_rows($result) > 0){
                    $fetch = mysqli_fetch_assoc($result);
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
                <input type="text" class="box" name="update_name" value="<?php echo $fetch['name']; ?>">
            </div>
            <div class="input-box">
                <span>Email :</span>
                <input type="email" class="box" name="update_email" value="<?php echo $fetch['email']; ?>">
            </div>
            <div class="input-box">
                <span>Mobile Number :</span>
                <input type="number" class="box" name="update_phone" value="<?php echo $fetch['mobilenumber']; ?>">
            </div>
            <div class="input-box">
                <input type="hidden" class="box" name="old_password" value="<?php echo $fetch['password']; ?>">
                <span>Old Password :</span>
                <input type="password" class="box" name="update_password" placeholder="Enter previous password">
            </div>
            <div class="input-box">
                <span>New Password :</span>
                <input type="password" class="box" name="new_password" placeholder="Enter new password">
            </div>
            <div class="input-box">
                <span>Confirm Password :</span>
                <input type="password" class="box" name="confirm_password" placeholder="Confirm new password">
            </div>
            <div class="input-box">
                <span>Update your pic :</span>
                <input type="file" name="update_image" accept="image/jpg, image/png">
            </div>
            <div class="btn">
                <input type="submit" value="update profile" name="update_profile">
            </div>
        </form>
        </div>

    </div>
</body>