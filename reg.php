<?php 

include 'connection.php';

if(isset($_POST['register']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobilenumber = $_POST['mobilenumber'];   
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $image = $_FILES['image']['name'];
    $image_size = $_FILES['image']['size'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_folder = 'upload/'.$image;


    $select = " SELECT * FROM `reg` WHERE email = '$email' && password = '$password' ";


    $result = mysqli_query($conn, $select);

    if(mysqli_num_rows($result) > 0){
        
        echo '<script>alert("User Already exists");</script>';
    }
    else{

        if($password != $cpassword){
            echo '<script>alert("Password mismatched");</script>';
        }
        elseif($image_size > 200000){
            echo '<script>alert("Image size is too large");</script>';
        }
        else{
            $insert = "INSERT INTO `reg`(`name`, `email`, `mobilenumber`, `password`, `image`) 
            VALUES ('$name','$email','$mobilenumber','$password','$image')";

            $result_insert = mysqli_query($conn, $insert);

            if($result_insert){
                move_uploaded_file($image_tmp_name, $image_folder);
                echo '<script>alert("Registration successfull");</script>';
                header('location:log.php');
            }
        }
    }

};
?>
<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles/style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Babylonica&family=Dancing+Script&family=Poppins:ital,wght@0,200;0,300;0,500;1,300&family=Roboto+Slab:wght@200;300;500&family=Zeyada&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/icon?family=Material+Symbols+Outlined" rel="stylesheet">

    <title>Tour & Travels</title>

</head>
<body id="register-body">
    <div class="register-container">
        <form class="reg-form" action="#" method="post" enctype="multipart/form-data">
            <h1>REGISTER</h1>
            
            <div class="input-box">
                <input type="text" name="name" placeholder="Enter Full Name" autocomplete="off" required>
            </div>
            <div class="input-box">
                <input type="email" name="email" placeholder="Enter Email ID" autocomplete="off" required>
            </div>
            <div class="input-box">
                <input type="number" name="mobilenumber" placeholder="Enter Mobile Number" autocomplete="off" required>
            </div>
            <div class="input-box">
                <input type="password" name="password" placeholder="Enter Password" autocomplete="off"required>
            </div>
            <div class="input-box">
                <input type="password" name="cpassword" placeholder="Confirm Password" autocomplete="off" required>
            </div>
            <div class="input-box-file">
                <input class="file" type="file" accept="image/jpg, image/png" name="image">
            </div>
            <!--<div class="input-box">
                <select name="user_type" id="">
                    <option name="user" value="user">User</option>
                    <option name="admin" value="admin">Admin</option>
                </select>
            </div>-->

            <button name="register" id="register">Register</button>

            <div class="center">
                <p>have an account? </p><a class="c-login" href="log.php">Login Now</a>
            </div>
        </form>

        <p class="note">Note: Please fill all the details correctly</p>
    </div>    
</body>
</html>