<?php

include 'connection.php';
include './includes/sidebar1.php';
include './includes/header1.php';

$id = "";
if(isset($_GET["id"])){
    $id = $_GET["id"];
}

$user = $_SESSION['user_id'];
$query_user = mysqli_query($conn, "SELECT * FROM `reg` WHERE email = '$user'");
$row = mysqli_fetch_array($query_user);


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

    <title>Tour & Travels</title>
</head>
<body>
                
    <div class="item user-dashboard">

        <span class="dashboard-title">Dashboard</span>
        <br>
        <br>
                
        <div class="user-card">

            <div class="card food">
                <div class="card-content">
                    <span class="material-symbols-outlined icon">lunch_dining</span>
                    <span class="text food">Total Food Booking</span>
                </div>
                <div class="count">
                    <?php
                        $count_query = "SELECT `id` FROM `booktable` WHERE user_id = '$user' ";
                        $result = mysqli_query($conn, $count_query);

                        $row = mysqli_num_rows($result);

                        echo '<span class="numbercount"> '.$row.'</span>';
                    ?>
                </div>
            </div>

            <div class="card trip">
                <div class="card-content">
                    <span class="material-symbols-outlined icon">card_travel</span>
                    <span class="text trip">Total Trip Booking</span>
                </div>
                <div class="count">
                    <?php
                        $count_query = "SELECT `id` FROM `booktrip` WHERE user_id = '$user' ";
                        $result = mysqli_query($conn, $count_query);

                        $row = mysqli_num_rows($result);

                        echo '<span class="numbercount"> '.$row.'</span>';
                    ?>
                </div>
            </div>

            <div class="card ticket">
                <div class="card-content">
                    <span class="material-symbols-outlined icon">confirmation_number</span>
                    <span class="text ticket">Total Ticket Booking</span>
                </div>
                <div class="count">
                    <span class="numbercount">0</span>
                </div>
            </div>
        </div>

    </div>

    <script src="dashboard.js"></script>
</body>
</html>