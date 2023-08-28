<?php
include './includes/sidebar.php';
include './includes/header.php';
include 'connection.php';

if(isset($_POST['addres']))
{
    $resname = $_POST['resname'];
    $resimage = $_FILES['resimage']['name'];
    $resimage_size = $_FILES['resimage']['size'];
    $resimage_tmp_name = $_FILES['resimage']['tmp_name'];
    $resimage_folder = 'upload/res'.$resimage;
    $resaddress = $_POST['resaddress'];
    $resstate = $_POST['resstate'];
    $rescity = $_POST['rescity'];
    $resvillage = $_POST['resvillage'];
    $resemail = $_POST['resemail'];
    $resphone = $_POST['resphone'];
    $resdish = $_POST['resdish'];
    $resopen = $_POST['resopen'];
    $resclose = $_POST['resclose'];
    $resrat = $_POST['resrat'];

    $res_insert = " INSERT INTO `reslist` (`resname`, `resimage`, `resaddress`, `resstate`, `rescity`, `resvillage`,'resemail','resphone',`resdish`, `resopen`, `resclose`, `resrat`)
    VALUES ('$resname','$resimage','$resaddress','$resstate','$rescity','$resvillage','$resemail','$resphone','$resdish','$resopen','$resclose','$resrat') ";

    $res_result = mysqli_query($conn, $res_insert);
    
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
<div class="item res">

    <span class="dashboard-title">Restaurants</span>
    <br>
    <br>

    <div class="res-container">

        <label for="resadd">Add Restaurants</label>

        <div class="res-details">

            <form action="#" method="post" enctype="multipart/form-data">

                <div class="res-box">
                    <span>Name</span>
                    <input type="text" name="resname" placeholder="Enter name" required>
                </div>
                <div class="res-box">
                    <span>Image</span>
                    <input class="file" type="file" accept="image/jpg, image/png" name="resimage" required>
                </div>
                <div class="res-box">
                    <span>Address</span>
                    <input type="text" name="resaddress" placeholder="Enter address" required>
                </div>
                <div class="res-box">
                    <span>State</span>
                    <input type="text" name="resstate" placeholder="Enter State" required>
                </div>
                <div class="res-box">
                    <span>City</span>
                    <input type="text" name="rescity" placeholder="Enter City" required>
                </div>
                <div class="res-box">
                    <span>Village</span>
                    <input type="text" name="resvillage" placeholder="Enter Village" required>
                </div>
                <div class="res-box">
                    <span>email</span>
                    <input type="mail" name="resemail" placeholder="Enter email" required>
                </div>
                <div class="res-box">
                    <span>Phone number</span>
                    <input type="phone" name="resphone" placeholder="Enter phone number" required>
                </div>
                <div class="res-box">
                    <span>Specials Dishes</span>
                    <input type="text" name="resdish" placeholder="Enter Dishes" required>
                </div>
                <div class="res-box">
                    <span>Description 1</span>
                    <input type="text" name="resdes1" placeholder="Enter Description">
                </div>
                <div class="res-box">
                    <span>Description 2</span>
                    <input type="text" name="resdes2" placeholder="Enter Description">
                </div>
                <div class="res-box">
                    <span>Opening Time</span>
                    <input type="time" name="resopen" required>
                </div>
                <div class="res-box">
                    <span>Closing Time</span>
                    <input type="time" name="resclose" required>
                </div>
                <div class="res-box">
                    <span>Ratings</span>
                    <input type="text" name="resrat" placeholder="Enter Rating">
                </div>

                <div class="add-btn">
                    <input type="submit" value="Add restaurant" name="addres">
                </div>

            </form>
        </div>
    </div>
</div>
</body>
</html>