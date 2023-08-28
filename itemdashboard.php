<?php

include 'adminpage.php';

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
<body>
    <div class="item dashboard" id="itemdashboard">

    <span class="dashboard-title">Dashboard</span>
    <br>
    <br>

    <div class="dashboardcards">

        <div class="card user">
            <div class="card-content">
                <span class="material-symbols-outlined icon">person</span>
                <span class="text food">Users</span>
            </div>
            <div class="count">
                <?php
                    $count_query = "SELECT * FROM `reg` ORDER BY id";
                    $result = mysqli_query($conn, $count_query);

                    $row = mysqli_num_rows($result);

                    echo '<span class="numbercount"> '.$row.'</span>';
                ?>
            </div>
        </div>

        <div class="card food">
            <div class="card-content">
                <span class="material-symbols-outlined icon">lunch_dining</span>
                <span class="text food">Food Booking</span>
            </div>
            <div class="count">

                <?php
                    $count_query = "SELECT * FROM `booktable` ORDER BY id";
                    $result = mysqli_query($conn, $count_query);

                    $row = mysqli_num_rows($result);

                    echo'<span class="numbercount"> '.$row.' </span>';
                ?>
            </div>
        </div>

        <div class="card trip">
            <div class="card-content">
                <span class="material-symbols-outlined icon">card_travel</span>
                <span class="text trip">Packages</span>
            </div>
            <div class="count">
                <?php
                    $count_query = "SELECT * FROM `packages` ORDER BY id";
                    $result = mysqli_query($conn, $count_query);

                    $row = mysqli_num_rows($result);

                    echo'<span class="numbercount"> '.$row.' </span>';
                ?>
            </div>
        </div>

        <div class="card ticket">
            <div class="card-content">
                <span class="material-symbols-outlined icon">confirmation_number</span>
                <span class="text ticket">Destinations</span>
            </div>
            <div class="count">
                <?php
                    $count_query = "SELECT * FROM `destinations` ORDER BY id";
                    $result = mysqli_query($conn, $count_query);

                    $row = mysqli_num_rows($result);

                    echo'<span class="numbercount"> '.$row.' </span>';
                ?>
            </div>
        </div>
    </div>

    <div class="bottom">
        <div class="bottomcards">
            <div class="bcards food">
                <div class="title">
                    <span>Food</span>
                </div>
            </div>
            <div class="bcards trip">
                <div class="title">
                    <span>Trip</span>
                </div>
            </div>
            <div class="bcards ticket">
                <div class="title">
                    <span>Ticket</span>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>
</html>