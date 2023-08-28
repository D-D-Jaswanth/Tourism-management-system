<?php

include './includes/sidebar1.php';
include './includes/header1.php';
include 'connection.php';

$id = "";
if(isset($_GET["id"])){
    $id = $_GET["id"];
}


$user = $_SESSION['user_id'];
$query_user = mysqli_query($conn, "SELECT * FROM `reg` WHERE email = '$user'");
$row = mysqli_fetch_array($query_user);


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

    <div class="item userfoodtrans">

        <span class="dashboard-title">Food</span>
        <br>
        <br>
        
        <div class="trans">

            <div class="transres">

                <center><h3>Restaurant Table Bookings</h3></center>
                
                <table>
                    <thead>
                        <th>Restaurant Name</th>
                        <th>Persons</th>
                        <th>Purpose</th>
                        <th>Plan</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>action</th>
                    </thead>
    
                    <tbody>
    
                        <?php
    
                            $query_book = "SELECT * FROM `booktable` WHERE user_id = '$user'";
                            $r_book = mysqli_query($conn, $query_book);
                            $result_book = mysqli_num_rows($r_book);
    
                            for($i=1; $i<=$result_book; $i++){
    
                                $row = mysqli_fetch_array($r_book);
                            ?>
                            <tr>
                                <td><?php echo $row['resname']?></td>
                                <td><?php echo $row['booktype']?></td>
                                <td><?php echo $row['bookpurpose']?></td>
                                <td><?php echo $row['bookplan']?></td>
                                <td><?php echo $row['bookdate']?></td>
                                <td><?php echo $row['booktime']?></td>
                                <td>
                                    <div class="action-btns">
                                        <div class="edit">
                                            <a href="editrestable.php?id=<?php echo $row['id'] ?>">Edit</a>
                                        </div>
                                        <div class="delete">
                                            <a href="deleterestable.php?id=<?php echo $row['id'] ?>">Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
    
                            <?php
    
                            }
                        ?>
                    </tbody>
                </table>

            </div>

        </div>


    </div>

</body>
</html>