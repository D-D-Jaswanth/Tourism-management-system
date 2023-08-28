<?php
include './includes/sidebar.php';
include './includes/header.php';
include 'connection.php';

if(isset($_POST['addplace'])){

    $name = $_POST['dest_name'];
    $place = $_POST['place'];

    $filename = $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $filefolder = 'upload/places/'.$filename;
    
    move_uploaded_file($tmp_name , $filefolder);

    $insert = "INSERT INTO `popularplaces` (`destination_name`,`place`,`image`) 
    VALUES ('$name','$place','$filename') " ;
    $query_run = mysqli_query($conn, $insert);
    
    if($query_run)
    {
        echo '<script>alert("Place added Successfully")</script>';
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
<div class="item add_place">

    <span class="dashboard-title">Add Places</span>
    <br>
    <br>

    <div class="add-place-container">

        <label for="packadd">Add Places</label>

        <div class="add-place-details">

            <form action="" method="POST" enctype="multipart/form-data">

                <div class="placedetails">

                    <div class="place-box">
                        <span>Destination name</span>
                        <select name="dest_name" id="">
                            <?php

                            $selectquery = " SELECT * FROM `destinations` ";
                            $resultselect = mysqli_query($conn, $selectquery);

                            if(mysqli_num_rows($resultselect) > 0)
                            {
                                foreach($resultselect as $row)
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
                        <span>Place </span>
                        <input type="text" name="place" placeholder="enter place1" required>
                    </div>

                    <div class="place-box">
                        <span>Image</span>
                        <input type="file" class="inputfile" name="image" value="Upload Image" required>
                    </div>

                </div>

                <div class="add-btn">
                    <input type="submit" value="Add place" name="addplace">
                </div>

            </form>
        </div>
    </div>
</div>

</body>
</html>