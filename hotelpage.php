<?php

include 'connection.php';
include './includes/hotelsidebar.php';
include './includes/header.php';
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
                    <span class="text food">Bookings</span>
                </div>
                <div class="count">
                    <span class="numbercount">0</span>
                </div>
            </div>

            <div class="card food">
                <div class="card-content">
                    <span class="material-symbols-outlined icon">lunch_dining</span>
                    <span class="text food">Completed</span>
                </div>
                <div class="count">
                    <span class="numbercount">0</span>
                </div>
            </div>

            <div class="card trip">
                <div class="card-content">
                    <span class="material-symbols-outlined icon">package</span>
                    <span class="text trip">Cancelling</span>
                </div>
                <div class="count">
                    <span class="numbercount">0</span>
                </div>
            </div>
        </div>
    </div>
</body>
</html>