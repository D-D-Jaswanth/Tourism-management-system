<?php

include './includes/sidebar.php';
include './includes/header.php';
include 'connection.php';

if(isset($_POST['adddest'])){

    $destname = $_POST['destname'];
    $destplace = $_POST['destplace'];
    $destdes = $_POST['destdes'];
    $destcost = $_POST['destcost'];
    $destdays = $_POST['destdays'];

    $destfile_name = $_FILES['destfile']['name'];
    $destfile_size = $_FILES['destfile']['size'];
    $destfile_tmp = $_FILES['destfile']['tmp_name'];
    $destfile_folder = 'upload/destination/'.$destfile_name;
    
    move_uploaded_file($destfile_tmp , $destfile_folder);

    $dest_insert = "INSERT INTO `destinations` (`destinationimage`,`destinationname`,`destinationstate`,`destinationdescription`,`destinationcost`,`destinationdays`) 
    VALUES ('$destfile_name','$destname','$destplace','$destdes','$destcost','$destdays') " ;
    $query_run_dest = mysqli_query($conn, $dest_insert);
    
    if($query_run_dest)
    {
        echo '<script>alert("Destination added Successfully")</script>';
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
    <link href="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.min.css" rel="stylesheet"/>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>

</head>
<body>
<div class="item add_dest">

    <span class="dashboard-title">Add Destinations</span>
    <br>
    <br>
    <div class="add-dest-container">

        <label for="destadd">Add Destinations</label>

        <div class="add-dest-details">

            <form action="" method="POST" enctype="multipart/form-data">

                <div class="add-dest-box">
                    <span>Destination name</span>
                    <input type="text" name="destname" placeholder="Enter destination name" required>
                </div>

                <div class="add-dest-box">
                    <span>Package Places</span>
                    <select name="destplace">
                        <option value="" disabled="" selected="">Select State</option>
                        <option value="Andhra Pradesh">Andhra Pradesh</option>
                        <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                        <option value="Assam">Assam</option>
                        <option value="Bihar">Bihar</option>
                        <option value="Chhattisgarh">Chhattisgarh</option>
                        <option value="Goa">Goa</option>
                        <option value="Gujarat">Gujarat</option>
                        <option value="Haryana">Haryana</option>
                        <option value="Himachal Pradesh">Himachal Pradesh</option>
                        <option value="Jharkhand">Jharkhand</option>
                        <option value="Karnataka">Karnataka</option>
                        <option value="Kerala">Kerala</option>
                        <option value="Madhya Pradesh">Madhya Pradesh</option>
                        <option value="Maharashtra">Maharashtra</option>
                        <option value="Manipur">Manipur</option>
                        <option value="Meghalaya">Meghalaya</option>
                        <option value="Mizoram">Mizoram</option>
                        <option value="Nagaland">Nagaland</option>
                        <option value="Odisha">Odisha</option>
                        <option value="Punjab">Punjab</option>
                        <option value="Rajasthan">Rajasthan</option>
                        <option value="Sikkim">Sikkim</option>
                        <option value="Tamil Nadu">Tamil Nadu</option>
                        <option value="Telangana">Telangana</option>
                        <option value="Tripura">Tripura</option>
                        <option value="Uttar Pradesh">Uttar Pradesh</option>
                        <option value="Uttarakhand">Uttarakhand</option>
                        <option value="West Bengal">West Bengal</option>
                    </select>
                </div>

                <div class="add-dest-box">
                    <span>Destination Description</span>
                    <input type="text" name="destdes" placeholder="Enter destination description" required>
                </div>

                <div class="add-dest-box">
                    <span>Cost</span>
                    <input type="text" name="destcost" placeholder="Enter destination cost" required>
                </div>

                <div class="add-dest-box">
                    <span>Days</span>
                    <input type="text" name="destdays" placeholder="Enter destination days" required>
                </div>

                <div class="add-dest-box">
                    <span>Image</span>
                    <input type="file" name="destfile" placeholder="Enter destination name" required>
                </div>

                <div class="add-btn">
                    <input type="submit" value="Add Destination" name="adddest">
                </div>

            </form>
        </div>
    </div>
</div>

</body>
</html>