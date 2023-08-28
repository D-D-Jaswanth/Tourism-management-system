<?php
include './includes/sidebar1.php';
include './includes/header1.php';
include 'connection.php';

$id = "";
if(isset($_GET["id"])){
    $id = $_GET["id"];
}

$sql_query = "SELECT * FROM `packages` WHERE id = $id";
$result = mysqli_query($conn, $sql_query);


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
    <div class="item user-view-spl">

        <span class="dashboard-title">View Special Packages</span>
        <br>
        <br>

        <div class="user_view">

        <?php

            if($result_query = mysqli_num_rows($result) > 0)
            {
                while($row = mysqli_fetch_assoc($result))
                {

        ?>

            <center><h3><?php echo $row['packagetype'] ?></h3></center>
            <div class="details">
                <div class="image">
                    <img src="upload/pack/<?php echo $row['packageimage'] ?>" alt="">
                </div>
                <div class="description">
                    <p><?php echo nl2br($row['packagedescription']) ?></p>
                </div>
                <div class="des2">
                    <p><?php echo $row['packagetype'] ?> places like <?php echo $row['packageplaces'] ?></p>
                </div>

                <div class="btn">
                    <a href="itemuserbookspl.php">Book Now</a>
                </div>
            </div>


        <?php

                }
            }

        ?>
            
        </div>

    </div>
</body>
</html>