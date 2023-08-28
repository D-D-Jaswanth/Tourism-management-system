<?php
include './includes/sidebar1.php';
include './includes/header1.php';
include 'connection.php';

$id = "";
if(isset($_GET["id"])){
    $id = $_GET["id"];
}

$user = $_SESSION['user_id'];
$query_user = mysqli_query($conn, "SELECT * FROM `reg` WHERE email = '$user'");
$row = mysqli_fetch_array($query_user);

if(isset($_POST['bookhotel']))
{
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $hname = $_POST['hname'];
    $roomtype = $_POST['roomtype'];
    $rooms = $_POST['rooms'];
    $number = $_POST['number'];
    $arrivaldate = date('Y-m-d',strtotime($_POST['arrivaldate']));
    // $arrtime = $_POST['arrtime'];
    $depdate = $_POST['depdate'];

    $hotel_bookinsert =  "INSERT INTO `hotelbookings` (`fullname`, `email`, `userid`,`hotelid`, `hotelname`, `roomtype`, `rooms`, `noofguests`, `arrivaldatetime`, `depaturedate`) 
    VALUES ('$fullname','$email','$user','$id','$hname','$roomtype','$rooms','$number', '$arrivaldate','$depdate')";
    $sql = mysqli_query($conn, $hotel_bookinsert);

    if($sql){
        echo '<script>alert("Booking Successfully");</script>';
        echo '<script>window.location.href="itemuserviewhotels.php"</script>';
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
<body>
    <div class="item userhotelbook">

        <span class="dashboard-title">Hotel Booking</span>
        <br>
        <br>

        <div class="bookhotel">
            <center><h3>Book your Hotel</h3></center>

            <form action="" method="POST" enctype="multipart/form-data">
                <div class="bookpersonal">
                    <?php
                        $select_name = " SELECT * FROM `reg` WHERE  id = '$user_id'" ;
                        $query = mysqli_query($conn, $select_name);

                        if(mysqli_num_rows($query) > 0)
                        {
                            while($row = mysqli_fetch_assoc($query))
                            {
                    ?>
                    <div class="book-hotel-box">
                        <span>Full Name</span>
                        <input type="text" name="fullname" value="<?php echo $row['name'] ?>" placeholder="enter full name" readonly>
                    </div>
                    <div class="book-hotel-box">
                        <span>Email</span>
                        <input type="text" name="email" value="<?php echo $row['email'] ?>" placeholder="enter hotel name" readonly>
                    </div>
                    <?php
                            }
                        }
                    ?>    
                </div>
                <h3>Booking Details</h3>
                <div class="bookdetails">
                    <?php
                        $select = " SELECT * FROM `hotels` WHERE id = '$id' " ;
                        $query = mysqli_query($conn, $select);
                        if(mysqli_num_rows($query) > 0)
                        {
                            while($row = mysqli_fetch_assoc($query))
                            {
                    ?>

                    <div class="book-hotel-box">
                        <span>Hotel name</span>
                        <input type="text" name="hname" value="<?php echo $row['hotelname'] ?>" placeholder="enter hotel name" readonly>
                    </div>
                    <!-- <div class="book-hotel-box">
                        <span>Destination</span>
                        <input type="text" name="destname" value="<?php echo $row['destname'] ?>" placeholder="enter Destination" readonly>
                    </div> -->

                    <?php

                            }
                        }
                    ?>
                    <div class="book-hotel-box">
                        <span>Room Type</span>
                        <select name="roomtype" id="" required>
                            <option value="" disabled="" selected="">Choose any option</option>
                            <option value="Single Bed room">Single Bed room</option>
                            <option value="Double Bed Room">Double Bed Room</option>
                        </select>
                    </div>
                    <div class="book-hotel-box">
                        <span>Rooms</span>
                        <input type="number" name="rooms" value="" required>
                    </div>
                    <div class="book-hotel-box">
                        <span>Number of Guests</span>
                        <input type="number" name="number" value="" required>
                    </div>
                    <div class="book-hotel-box">
                        <span>Arrival Date</span>
                        <input type="datetime-local" mame="arrivaldate" required>
                    </div>
                    <!-- <div class="book-hotel-box">
                        <span>Arrival time</span>
                        <input type="time" name="arrtime" required>
                    </div> -->
                    <div class="book-hotel-box">
                        <span>Depature Date</span>
                        <input type="date" name="depdate" required>
                    </div>
                </div>
                <div class="submit-btn">
                    <button name="bookhotel">Book</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>