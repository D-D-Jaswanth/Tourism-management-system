<?php
include './includes/sidebar.php';
include './includes/header.php';
include 'connection.php';

if(isset($_POST['addhotel'])){
    $destname = $_POST['destname'];
    $hotelname = $_POST['hotelname'];
    $hotelrating = $_POST['hotelrating'];
    $hotelprice = $_POST['hotelprice'];
    $hoteldes = $_POST['hoteldes'];
    $hoteladd = $_POST['hoteladd'];
    $hotelmail = $_POST['hotelmail'];

    $filename = $_FILES['hotelimage']['name'];
    $file_size = $_FILES['hotelimage']['size'];
    $tmp_name = $_FILES['hotelimage']['tmp_name'];
    $filefolder = 'upload/hotels/'.$filename;

    move_uploaded_file($tmp_name , $filefolder);

    $inserthotel = ' INSERT INTO `hotels` (`destname`, `hotelname`, `hotelratings`, `hotelprice`, `hoteldescription`, `hoteladdress`, `email`, `hotelimage`)
    VALUES ("'.$destname.'","'.$hotelname.'","'.$hotelrating.'","'.$hotelprice.'","'.$hoteldes.'","'.$hoteladd.'","'.$hotelmail.'","'.$filename.'") ';
    $query_run = mysqli_query($conn, $inserthotel);

    if($query_run){
        echo "<script>alert('Hotel added successfully');</script>";
        echo '<script>window.location.href="itemhotels.php"</script>';
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
<div class="item add-hotels">

    <span class="dashboard-title">Add Hotels</span>
    <br>
    <br>
    <div class="add-hotel-container">

        <label for="packadd">Add Hotels</label>

        <div class="add-hotel-details">

            <form action="" method="POST" enctype="multipart/form-data">

                <div class="placedetails">

                    <div class="place-box">
                        <span>Destination name</span>
                        <select name="destname" id="">
                            <?php

                            $selectquery = " SELECT * FROM `destinations` ";
                            $resultselect = mysqli_query($conn, $selectquery);

                            if(mysqli_num_rows($resultselect) > 0)
                            {
                                while($row = mysqli_fetch_assoc($resultselect))
                                {
                            ?>

                            <option value="<?php echo $row['id'] ?>"><?php echo $row['destinationname'] ?></option>
                            
                            <?php
                                }
                            }

                            ?>
                        </select>
                    </div>

                    <div class="place-box">
                        <span>Hotel Name</span>
                        <input type="text" name="hotelname" placeholder="enter hotel name" required>
                    </div>

                    <div class="place-box">
                        <span>Ratings</span>
                        <input type="text" name="hotelrating" placeholder="enter ratings" required>
                    </div>

                    <div class="place-box">
                        <span>Hotel price</span>
                        <input type="text" name="hotelprice" placeholder="enter hotel price" required>
                    </div>

                    <div class="place-box">
                        <span>Hotel Description</span>
                        <input type="text" name="hoteldes" placeholder="enter hotel description" required>
                    </div>

                    <div class="place-box">
                        <span>Hotel Address</span>
                        <input type="text" name="hoteladd" placeholder="enter hotel address" required>
                    </div>

                    <div class="place-box">
                        <span>Email</span>
                        <input type="email" name="hotelmail" placeholder="enter email" required>
                    </div>

                    <div class="place-box">
                        <span>Hotel Image</span>
                        <input type="file" class="inputfile" name="hotelimage" value="Upload Image" required>
                    </div>

                </div>

                <div class="add-btn">
                    <input type="submit" value="Add hotel" name="addhotel">
                </div>

            </form>
        </div>
    </div>
</div>

</body>
</html>