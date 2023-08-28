<?php 

include 'connection.php';

session_start();

if(isset($_POST['login']))
{

    $email = $_POST['email'];
    $password = $_POST['password'];

    $select = " SELECT * FROM `reg` WHERE email = '$email' && password = '$password' ";

    $result = mysqli_query($conn, $select);

    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_array($result);

        if($row['user_type'] == 'admin'){

            $_SESSION['admin_id'] = $row['id'];
            echo '<script>alert("Login Successfully");</script>';
            header('location:adminpage.php');
        }
        elseif($row['user_type'] == 'user'){

            $_SESSION['user_id'] = $row['id'];
            echo '<script>alert("Login Successfully");</script>';
            header('location:userpage.php');
        }

    }
    else{
        echo '<script>alert("Invalid credentials");</script>';
        echo '<script>window.location.href="log.php"</script>';
    }


};



if(isset($_POST['login']))
{

    $email = $_POST['email'];
    $password = $_POST['password'];

    $select = " SELECT * FROM `transport` WHERE email = '$email' && password = '$password' ";

    $result = mysqli_query($conn, $select);

    if(mysqli_num_rows($result) > 0)
    {
        $row = mysqli_fetch_array($result);

        $_SESSION['driver_id'] = $row['id'];
        echo '<script>alert("Login Successfully");</script>';
        header('location:driverpage.php');
    }

};



if(isset($_POST['login']))
{

    $email = $_POST['email'];
    $password = $_POST['password'];

    $select = " SELECT * FROM `hotels` WHERE email = '$email' && password = '$password' ";

    $result = mysqli_query($conn, $select);

    if(mysqli_num_rows($result) > 0)
    {
        $row = mysqli_fetch_array($result);

        $_SESSION['hotel_id'] = $row['id'];
        echo '<script>alert("Login Successfully");</script>';
        header('location:hotelpage.php');
    }

};


if(isset($_POST['login']))
{

    $email = $_POST['email'];
    $password = $_POST['password'];

    $select = " SELECT * FROM `reslist` WHERE resemail = '$email' && password = '$password' ";

    $result = mysqli_query($conn, $select);

    if(mysqli_num_rows($result) > 0)
    {
        $row = mysqli_fetch_array($result);

        $_SESSION['restaurant_id'] = $row['id'];
        echo '<script>alert("Login Successfully");</script>';
        header('location:restaurantpage.php');
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
<body id="login-body">
    <div class="login-container">
        <form class="log-form" action="" method="post">
            <h1>LOGIN NOW</h1>
            <?php

            if(isset($error)){
                foreach($error as $error){
                    echo '<span class="error-msg">'.$error.'</span>';
                };
            };

            ?>
            <div class="input-box">
                <input type="text" name="email" placeholder="Enter your Email" autocomplete="off" required>
            </div>
            <div class="input-box">
                <input type="password" name="password" placeholder="Password" autocomplete="off" required>
            </div>
            <div class="right">
                <a href="#">Forgot Password ?</a>
            </div>
            <button name="login" id="login">Login</button>

            <div class="center">
                <p>Don't have an account? </p><a href="reg.php">Register Now !</a>
            </div>
        </form>
    </div>    
</body>
</html>