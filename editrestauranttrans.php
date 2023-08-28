<?php

include 'connection.php';
include './includes/ressidebar.php';
include './includes/header.php';

$id = "";
if(isset($_GET["id"])){
    $id = $_GET["id"];
}


if(isset($_POST['update']) && !empty($_GET['id'])){

    $accept = $_POST['accept'];

    $update = " UPDATE `booktable` SET `accept/decline` = '$accept'  WHERE `id` = '$id'";
    $query = mysqli_query($conn, $update);

    if($query){
        echo '<script>alert("Booking Updated");</script>';
        echo '<script>window.location.href="restauranttrans.php"</script>';
    }
    else{
        echo '<script>alert("Booking not Updated");</script>';
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
    <div class="item editrestrans" id="editrestrans">

        <span class="dashboard-title">Tables</span>
        <br>
        <br>

        <div class="editrestrans-container">
            <form action="" method="POST" enctype="multipart/form-data">
                <?php
                    $select = " SELECT * FROM `booktable` WHERE id = '$id'";
                    $query = mysqli_query($conn, $select);
                    if(mysqli_num_rows($query) > 0){
                        while($row = mysqli_fetch_assoc($query)){
                ?>

                <div class="hotel-box">
                    <span>Name</span>
                    <input type="text" name="username" value="<?php echo $row['username'] ?>" readonly>
                </div>
                <div class="hotel-box">
                    <span>Email</span>
                    <input type="text" name="email" value="<?php echo $row['email'] ?>" readonly>
                </div>
                <div class="hotel-box">
                    <span>No. of Persons</span>
                    <input type="text" name="persons" value="<?php echo $row['booktype'] ?>" readonly>
                </div>
                <div class="hotel-box">
                    <span>Purpose</span>
                    <input type="text" name="purpose" value="<?php echo $row['bookpurpose'] ?>" readonly>
                </div>
                <div class="hotel-box">
                    <span>Plan</span>
                    <input type="text" name="plan" value="<?php echo $row['bookplan'] ?>" readonly>
                </div>
                <div class="hotel-box">
                    <span>Booking Date</span>
                    <input type="date" name="date" value="<?php echo $row['bookdate'] ?>" readonly>
                </div>
                <div class="hotel-box">
                    <span>Booking Time</span>
                    <input type="time" name="time" value="<?php echo $row['booktime'] ?>" readonly>
                </div>

                <?php
                        }
                    }
                ?>
                <div class="hotel-box">
                    <span>Accept / Decline</span>
                    <select name="accept" id="" onchange="change(this)" required>
                        <option value="" disabled="" selected="">Choose any option</option>
                        <option value="Accept">Accept</option>
                        <option value="Decline">Decline</option>
                    </select>
                </div>

                <!-- <div class="res-box" id="message">
                    <span>Remarks</span>
                    <input type="text" name="remarks" placeholder="enter remarks">
                </div> -->
                <div class="btn-hotel">
                    <button name="update">Update</button>
                </div>
            </form>
        </div>
        </div>

    </div>

    <script>
        function change(answer){
            if(answer.value == "Accept"){
                document.getElementById('message').classList.remove('res-box');
            }
            else{
                document.getElementById('message').classList.add('res-box');
            }
        }
    </script>
</body>
</html>