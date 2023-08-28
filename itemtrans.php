<?php

include './includes/sidebar.php';
include './includes/header.php';
include 'connection.php';

$admin_id = $_SESSION['admin_id'];
if(!isset($admin_id)){
    header('location:log.php');
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

    <div class="item trans">

        <span class="dashboard-title">Transactions</span>
        <br>
        <br>

        <div class="trans">

            <div class="triptrans">
                <center><h3>Trip Booking</h3></center>

                <table>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile Number</th>
                            <th>To</th>
                            <th>Destination State</th>
                            <th>Booking Date</th>
                            <th>No. of Persons</th>
                            <th>Persons Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                            $transtrip = " SELECT * FROM `booktrip` ";
                            $query = mysqli_query($conn, $transtrip);

                            if($query)
                            {
                                while($row = mysqli_fetch_assoc($query))
                                {
                        ?>

                        <tr>
                            <td><?php echo $row['fullname'] ?></td>
                            <td><?php echo $row['email'] ?></td>
                            <td><?php echo $row['mobilenumber'] ?></td>
                            <td><?php echo $row['destinationname'] ?></td>
                            <td><?php echo $row['destinationstate'] ?></td>
                            <td><?php echo $row['date'] ?></td>
                            <td><?php echo $row['noofpersons'] ?></td>
                            <td><?php echo $row['persons'] ?></td>
                            <td>
                                <a href="admindeletepopular.php?id=<?php echo $row['id'] ?>">Delete</a>
                            </td>
                        </tr>

                        <?php


                                }
                            }
                        ?>

                    </tbody>
                </table>
    
            </div>

            <div class="spltrans">
                <center><h3>Special Package Booking</h3></center>

                <table>
                    <thead>
                        <tr>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Mobile Number</th>
                            <th>Date of Birth</th>
                            <th>Address</th>
                            <th>Place</th>
                            <th>Booking Date</th>
                            <th>No. of Persons</th>
                            <th>Peoples</th>
                            <th>Date of Birth</th>
                            <th>Submission Date</th>
                            <th>Emergency Contact Number</th>
                            <th>Declaration Place</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                            $transtrip = " SELECT * FROM `bookspltrip` ";
                            $query = mysqli_query($conn, $transtrip);

                            if($query)
                            {
                                while($row = mysqli_fetch_assoc($query))
                                {
                        ?>

                        <tr>
                            <td><?php echo $row['name'] ?></td>
                            <td><?php echo $row['email'] ?></td>
                            <td><?php echo $row['mobilenumber'] ?></td>
                            <td><?php echo $row['dateofbirth'] ?></td>
                            <td>
                                <p><?php echo $row['doorno'] ?>,</p>
                                <p><?php echo $row['street/area'] ?>,</p>
                                <p><?php echo $row['village/town'] ?>,</p>
                                <p><?php echo $row['city'] ?>,</p>
                                <p><?php echo $row['state'] ?>,</p>
                                <p><?php echo $row['pincode'] ?></p>
                            </td>
                            <td><?php echo $row['place'] ?></td>
                            <td><?php echo $row['bookingdate'] ?></td>
                            <td><?php echo $row['noofpersons'] ?></td>
                            <td><?php echo $row['personsname'] ?></td>
                            <td><?php echo $row['personsdob'] ?></td>
                            <td><?php echo $row['declarationdate'] ?></td>
                            <td><?php echo $row['emergency'] ?></td>
                            <td><?php echo $row['declarationplace'] ?></td>
                            <td>
                                <a href="admindeletespecial.php?id=<?php echo $row['id'] ?>">Delete</a>
                            </td>
                        </tr>

                        <?php


                                }
                            }
                        ?>

                    </tbody>
                </table>
    
            </div>

        </div>


    </div>

</body>
</html>