<?php
include './includes/driversidebar.php';
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
    <div class="item profile">

        <span class="dashboard-title">Profile</span>
        <br>
        <br>

        <div class="personal">

            <?php
                $select = " SELECT * FROM `transport` WHERE id = '$driver_id' ";

                $result = mysqli_query($conn, $select);
                if(mysqli_num_rows($result) > 0){
                    $fetch = mysqli_fetch_assoc($result);
                }
                // if($fetch['image'] == ''){
                //     echo '<img src="images/default.jpg">';
                // }
                // else{
                //     echo '<img src="upload/'.$fetch['image'].'">';
                // }
            ?>
            <img src="images/default.jpg" alt="">
            <div class="personal_info">
                <label for="name">Full Name :</label>
                <label><?php echo $fetch['drivername']; ?></label>
            </div>
            <div class="personal_info">
                <label for="email">Email :</label>
                <label for="e"><?php echo $fetch['email']; ?></label>
            </div>
            <div class="personal_info">
                <label for="name">Mobile Number :</label>
                <label for="n"><?php echo $fetch['contactnumber']; ?></label>
            </div>
            <div class="btn-update">
                <a href="updateprofile.php">Update Profile</a>
            </div>
        </div>

    </div>
</body>
</html>