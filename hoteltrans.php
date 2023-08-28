<?php

include './includes/hotelsidebar.php';
include './includes/header.php';
include 'connection.php';

$id = "";
if(isset($_GET["id"])){
    $id = $_GET["id"];
}

$hotels_id = $_SESSION['hotel_id'];

if(!isset($hotels_id)){
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

    <div class="item htrans">

        <span class="dashboard-title">Transactions</span>
        <br>
        <br>

        <div class="hoteltrans">
            <center><h3>Recent Bookings</h3></center>
            <div class="hbookingtrans">

                <table>
                    <thead>
                        <tr>
                            <th>Fullname</th>
                            <th>Email</th>
                            <th>HotelName</th>
                            <th>Room Type</th>
                            <th>Rooms</th>
                            <th>No of Guests</th>
                            <th>Arrival Date</th>
                            <th>Depature Date</th>
                            <th>Transaction Date</th>
                            <th>Accept / Reject</th>
                            <th>Action</th>
                        </tr>
                    </thead>
    
                    <tbody>
    
                    <?php
    
                            $hotel_trans_query = "SELECT * FROM `hotelbookings` WHERE hotelid = '$hotels_id' ";
                            $trans_result = mysqli_query($conn, $hotel_trans_query);

                            if(mysqli_num_rows($trans_result) > 0)
                            {
                                while($row = mysqli_fetch_array($trans_result))
                                {
                    ?>
                            <tr>
                                <td><?php echo $row['fullname']?></td>
                                <td><?php echo $row['email']?></td>
                                <td><?php echo $row['hotelname']?></td>
                                <td><?php echo $row['roomtype'] ?></td>
                                <td><?php echo $row['rooms'] ?></td>
                                <td><?php echo $row['noofguests']?></td>
                                <td><?php echo $row['arrivaldatetime'] ?></td>
                                <td><?php echo $row['depaturedate']?></td>
                                <td><?php echo $row['transactiondate'] ?></td>
                                <td><?php echo $row['response'] ?></td>
                                <td>
                                    <a href="edituserhotelrequest.php?id=<?php echo $row['id'] ?>">Edit</a>
                                </td>
                            </tr>
                    <?php
                                }
                            }
                    ?>
                    </tbody>
    
                </table>

            </div>

        </div>


    </div>

</body>
</html>