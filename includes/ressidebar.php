<?php

include 'connection.php';

session_start();

$restaurant_id = $_SESSION['restaurant_id'];
if(!isset($restaurant_id)){
    header('location:log.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles\style2.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Babylonica&family=Dancing+Script&family=Poppins:ital,wght@0,200;0,300;0,500;1,300&family=Roboto+Slab:wght@200;300;500&family=Zeyada&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/icon?family=Material+Symbols+Outlined" rel="stylesheet">

    <title>Tour & Travels</title>
</head>
<body>

<nav id="wrapper">

<div class="wrapper-left" id="wrapper-left">

    <div class="logo">
        <span class="material-symbols-outlined menu-icon" id="nav-toggle">menu</span>
        <label class="logo-name" for="t">Sky tours</label>
    </div>

    <ul>
        <li>
            <a href="restaurantpage.php" data-li="dashboard" class="tablinks">
                <span class="material-symbols-outlined icon">grid_view</span>
                <span class="nav-items">Dashboard</span>
            </a>
        </li>

        <li>
            <a href="restaurantprofile.php" data-li="profile" class="tablinks">
                <span class="material-symbols-outlined icon">account_circle</span>
                <span class="nav-items">Profile</span>
            </a>
        </li>

        <li>
            <a href="fooditems.php" data-li="food" class="tablinks">
                <span class="material-symbols-outlined icon">menu_book</span>
                <span class="nav-items">Menu Items</span>
            </a>
        </li>

        <li>
            <a href="tables.php" data-li="food" class="tablinks">
                <span class="material-symbols-outlined icon">table_restaurant</span>
                <span class="nav-items">Tables</span>
            </a>
        </li>

        <li>
            <a href="restauranttrans.php" data-li="transaction" class="tablinks">
                <span class="material-symbols-outlined icon">receipt_long</span>
                <span class="nav-items">Transactions</span>
            </a>
        </li>

        <li>
            <a href="" data-li="setting" class="tablinks">
                <span class="material-symbols-outlined icon">settings</span>
                <span class="nav-items">Settings</span>
            </a>
        </li>

        <li>
            <a href="log.php" class="user-logout tablinks">
                <span class="material-symbols-outlined icon">logout</span>
                <span class="nav-items">Logout</span>
            </a>
        </li>

    </ul>
</div>


</nav>


<script src="scriptjs/dashboard.js"></script>

</body>
</html>