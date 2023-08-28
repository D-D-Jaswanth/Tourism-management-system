<?php
include './includes/sidebar.php';
include './includes/header.php';
include 'connection.php';

if(isset($_POST['addvehicle'])){

    $vehicletype = $_POST['vehicletype'];
    $variants = $_POST['variants'];
    $actype = $_POST['actype'];
    $drivername = $_POST['drivername'];
    $drivercontact = $_POST['drivercontact'];
    $vehicleprice = $_POST['vehicleprice'];
    $location = $_POST['location'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $insert = "INSERT INTO `transport`(`type`, `variants`,`conditioning`, `drivername`, `contactnumber`, `price`, `location`, `email`, `password`) 
    VALUES ('$vehicletype','$variants','$actype','$drivername','$drivercontact','$vehicleprice','$location','$email','$password') ";
    $query_run = mysqli_query($conn, $insert);

    if($query_run){
        echo "<script>alert('Vehicle added successfully');</script>";
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
<div class="item add-vehicles">

    <span class="dashboard-title">Add Vehicles</span>
    <br>
    <br>
    <div class="add-vehicles-container">

        <label for="packadd">Add Vehicles</label>

        <div class="add-vehicle-details">

            <form action="" method="POST" enctype="multipart/form-data">

                <div class="placedetails">

                    <div class="place-box">
                        <span>Vehicle Type</span>
                        <select name="vehicletype" id="">
                            <option value="" disabled="" selected=""></option>
                            <option value="Tempo">Tempo</option>
                            <option value="Car">Car</option>
                        </select>
                    </div>

                    <div class="place-box">
                        <span>Variants</span>
                        <select name="variants" id="variants">
                            <option value="" disabled="" selected=""></option>
                            <?php
                                $select = " SELECT `vehicletype`, `variants` FROM `types` ";
                                $query = mysqli_query($conn, $select);

                                if(mysqli_num_rows($query) > 0)
                                {
                                    while($row = mysqli_fetch_array($query))
                                    {
                            ?>
                            <option value="<?php echo $row['variants'] ?>"><?php echo $row['variants'] ?></option>
                            <?php

                                    }
                                }
                            ?>
                            
                        </select>
                    </div>

                    <div class="place-box">
                        <span>Conditioning Type</span>
                        <select name="actype" id="">
                            <option value="" disabled="" selected=""></option>
                            <option value="AC">AC</option>
                            <option value="Non-AC">Non-AC</option>
                        </select>
                    </div>

                    <div class="place-box">
                        <span>Driver Name</span>
                        <input type="text" name="drivername" placeholder="enter driver name" required>
                    </div>

                    <div class="place-box">
                        <span>Driver Contact Number</span>
                        <input type="text" name="drivercontact" placeholder="enter driver name" required>
                    </div>

                    <div class="place-box">
                        <span>Price / K.M</span>
                        <input type="text" name="vehicleprice" placeholder="enter price" required>
                    </div>

                    <div class="place-box">
                        <span>Location</span>
                        <input type="text" name="location" placeholder="enter location" required>
                    </div>

                    <div class="place-box">
                        <span>Email</span>
                        <input type="email" name="email" placeholder="enter email" required>
                    </div>

                    <div class="place-box">
                        <span>Password</span>
                        <input type="password" name="password" placeholder="enter password" required>
                    </div>

                </div>

                <div class="add-btn">
                    <input type="submit" value="Add Vehicle" name="addvehicle">
                </div>

            </form>
        </div>
    </div>
</div>

</body>
</html>