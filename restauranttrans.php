<?php

include './includes/ressidebar.php';
include './includes/header.php';
include 'connection.php';

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
    <link rel="stylesheet" type="text/css" href="styles\style1.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Babylonica&family=Dancing+Script&family=Poppins:ital,wght@0,200;0,300;0,500;1,300&family=Roboto+Slab:wght@200;300;500&family=Zeyada&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/icon?family=Material+Symbols+Outlined" rel="stylesheet">

</head>
<body>

    <div class="item restrans">

        <span class="dashboard-title">Transactions</span>
        <br>
        <br>

        <div class="restauranttrans">

            <div class="recents">

                <center><h3>Recent Bookings</h3></center>
                
                <table>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Respurpose</th>
                            <th>Resplan</th>
                            <th>Persons</th>
                            <th>Transaction Date</th>
                            <th>Booking Date</th>
                            <th>Time</th>
                            <th>Accepted/Decline</th>
                            <th>Action</th>
                        </tr>
                    </thead>
    
                    <tbody>
    
                    <?php
    
                            $trans_query = "SELECT * FROM `booktable` WHERE `res_id`= '$restaurant_id' ";
                            $trans_result = mysqli_query($conn, $trans_query);
    
                            while($row = mysqli_fetch_assoc($trans_result)){
                            ?>
                            <tr>
                                <td><?php echo $row['username']?></td>
                                <td><?php echo $row['email']?></td>
                                <td><?php echo $row['bookpurpose']?></td>
                                <td><?php echo $row['bookplan']?></td>
                                <td><?php echo $row['booktype']?></td>
                                <td><?php echo $row['transaction_time'] ?></td>
                                <td><?php echo $row['bookdate']?></td>
                                <td><?php echo $row['booktime']?></td>
                                <td><?php echo $row['accept/decline'] ?></td>
                                <td>
                                    <a href="editrestauranttrans.php?id=<?php echo $row['id'] ?>">Edit</a>
                                </td>
                            </tr>
                            
                            <?php
                        }
                            ?>
                    </tbody>
    
                </table>

            </div>

        </div>


    </div>

</body>
</html>