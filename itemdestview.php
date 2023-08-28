<?php
include './includes/sidebar.php';
include './includes/header.php';
include 'connection.php';

$id = "";
if(isset($_GET["id"])){
    $id = $_GET["id"];
}

$sql_query = "SELECT * FROM `destinations` WHERE id = $id";
$result = mysqli_query($conn, $sql_query);

$sql = "SELECT * FROM `destinations` WHERE id = $id";
$resultsql = mysqli_query($conn, $sql);


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
    <div class="item dest_view">

        <span class="dashboard-title">View Special Packages</span>
        <br>
        <br>

        <div class="dest-view-list">

            <div class="dest-view">
                
                <div class="filters">
        
                    <input type="search" id="myInput" name="" placeholder="Search here..." onkeyup="search();">
                    <!-- <div class="btn">
                        <a href="addplaces.php">Add Places</a>
                    </div>
         -->
                </div>
                
            </div>

            <div class="dest-view-container">

                <div class="popplace">
                    <div class="heading">
                        <?php
    
                            $viewlist = mysqli_num_rows($result) > 0;
                            if($viewlist)
                            {
                                while($row = mysqli_fetch_assoc($result))
                                {
                        ?>
                        <label for="">Popular Places in <?php echo $row['destinationname'] ?></label>
            
                        <?php
            
                                }
                            }
                        ?>
                    </div>
                    
                    <div class="content">
                        <?php
                            
                            $sql = "SELECT `place`, `image` FROM `popularplaces` WHERE `destination_name` = '$id'";
                            $sql_query = mysqli_query($conn, $sql);
                            
                            while($row = mysqli_fetch_assoc($sql_query)){
                                ?>
                                <div class="card">
                                    <div class="image">
                                        <img src="upload/places/<?php echo $row['image']?>" alt="<?php echo $row['place']; ?>" />
                                    </div>
                                    <div class="name">
                                        <span><?php echo $row['place']; ?></span>
                                    </div>
                                </div>
                                
                                <?php
                            }
                        ?>
                    </div>

                </div>
                
                <div class="hot">

                    <div class="heading">
                        <?php
    
                            $viewlist = mysqli_num_rows($resultsql) > 0;
                            if($viewlist)
                            {
                                while($row = mysqli_fetch_assoc($resultsql))
                                {
                        ?>
                        <label for="">Popular Hotels in <?php echo $row['destinationname'] ?></label>
            
                        <?php
            
                                }
                            }
                        ?>
                    </div>

                    <div class="content">
                        <?php
                            
                            $sql = "SELECT * FROM `hotels` WHERE `destname` = '$id'";
                            $sql_query = mysqli_query($conn, $sql);
                            
                            while($row = mysqli_fetch_assoc($sql_query)){
                                ?>
                                <div class="card">
                                    <div class="image">
                                        <img src="upload/hotels/<?php echo $row['hotelimage']?>" alt="" />
                                    </div>
                                    <div class="name">
                                        <span><?php echo $row['hotelname']; ?></span>
                                    </div>
                                    <div class="address">
                                        <span><?php echo $row['hoteladdress']; ?></span>
                                    </div>
                                    <div class="price">
                                        <span><?php echo $row['hotelprice']; ?></span>
                                    </div>
                                </div>
                                
                                <?php
                            }
                        ?>
                    </div>

                </div>
    
            </div>
            
        </div>


    </div>
</body>
</html>