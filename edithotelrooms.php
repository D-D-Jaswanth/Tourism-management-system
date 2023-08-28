<?php

include 'connection.php';
include './includes/hotelsidebar.php';
include './includes/header.php';

$id = "";
if(isset($_GET["id"])){
    $id = $_GET["id"];
}

$sql_query = "SELECT * FROM `rooms` WHERE id = $id";
$result = mysqli_query($conn, $sql_query);


if(isset($_POST['updateroom']) && !empty($_GET['id'])){

    $floor = $_POST['floor'];
    $rooms = $_POST['rooms'];
    $type = $_POST['type'];
    $avail = $_POST['avail'];

    $update = " UPDATE `rooms` SET `floor` = '$floor', `rooms`= '$rooms', `type` = '$type',`available` = '$avail' WHERE `id` = '$id'";
    $query = mysqli_query($conn, $update);

    if($query){
        echo '<script>alert("Room Updated");</script>';
        echo '<script>window.location.href="hotelrooms.php"</script>';
    }
    else{
        echo '<script>alert("Room not Updated");</script>';
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
    <div class="item editrooms" id="editrooms">

        <span class="dashboard-title">Tables</span>
        <br>
        <br>
        
        <div class="editrooms-container">
            <form action="" method="POST" enctype="multipart/form-data">
                <?php
                    $select = " SELECT * FROM `rooms` WHERE id = '$id'";
                    $query = mysqli_query($conn, $select);
                    if(mysqli_num_rows($query) > 0){
                        while($row = mysqli_fetch_assoc($query)){
                ?>

                <div class="hotel-box">
                    <span>Floor</span>
                    <input type="text" name="floor" value="<?php echo $row['floor'] ?>" readonly>
                </div>
                <div class="hotel-box">
                    <span>Rooms</span>
                    <input type="text" name="rooms" value="<?php echo $row['rooms'] ?>" readonly>
                </div>

                <?php
                        }
                    }
                ?>
                <div class="hotel-box">
                    <span>Type</span>
                    <select name="type" id="">
                        <option value="" disabled="" selected="">Choose any option</option>
                        <option value="Single Bed">Single Bed</option>
                        <option value="Double Bed">Double Bed</option>
                    </select>
                </div>
                <div class="hotel-box">
                    <span>Is this Available</span>
                    <select name="avail" id="">
                        <option value="" disabled="" selected="">Choose any option</option>
                        <option value="Available">Available</option>
                        <option value="Unavailable">Unavailable</option>
                    </select>
                </div>
                <div class="btn-hotel">
                    <button name="updateroom">Update</button>
                </div>
            </form>
        </div>
        </div>

    </div>
</body>
</html>