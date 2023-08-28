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

    <div class="item usertrans">

        <span class="dashboard-title">Transactions</span>
        <br>
        <br>

        <div class="trans">

            <div class="triptrans">
                <center><h3>Trip Booking</h3></center>

                <table>
                    <thead>
                        <tr>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Age</th>
                            <th>Destination Name</th>
                            <th>Date</th>
                            <th>No. of Persons</th>
                            <th>Persons Name</th>
                            <th>Age</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php

                        $query = " SELECT *  FROM `booktrip` WHERE user_id = '$user' ";
                        $sql_query_result = mysqli_query($conn, $query);

                        if($sql_query_result)
                        {
                            while($row = mysqli_fetch_assoc($sql_query_result))
                            {

                    ?>

                        <tr>
                            <td><?php echo $row['fullname'] ?></td>
                            <td><?php echo $row['email'] ?></td>
                            <td><?php echo $row['age'] ?></td>
                            <td><?php echo $row['destinationname'] ?></td>
                            <td><?php echo $row['date'] ?></td>
                            <td><?php echo $row['noofpersons'] ?></td>
                            <td><?php echo $row['persons'] ?></td>
                            <td><?php echo $row['ages'] ?></td>
                            <td>
                                <a href=""><span class="material-symbols-outlined">edit</span></a>
                                <a href="deleteusertrip.php?id=<?php echo $row['id'] ?>"><span class="material-symbols-outlined">delete</span></a>
                                <a href=""><span class="material-symbols-outlined">visibility</span></a>
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
                            <td>Full Name</td>
                            <td>Email</td>
                            <td>Mobile Number</td>
                            <td>Date of Birth</td>
                            <td>Address</td>
                            <td>Place</td>
                            <td>Booking Date</td>
                            <td>No. of Persons</td>
                            <td>Peoples</td>
                            <td>Date of Birth</td>
                            <td>Submission Date</td>
                            <td>Emergency Contact Number</td>
                            <td>Declaration Place</td>
                            <td>Actions</td>
                        </tr>
                    </thead>
                    <tbody>

                    <?php

                        $query = " SELECT *  FROM `bookspltrip` WHERE user_id = '$user' ";
                        $sql_query_result = mysqli_query($conn, $query);

                        if($sql_query_result){
                            while($row = mysqli_fetch_assoc($sql_query_result)){

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
                                <a href=""><span class="material-symbols-outlined">edit</span></a>
                                <a href="deleteuserspl.php?id=<?php echo $row['id'] ?>"><span class="material-symbols-outlined">delete</span></a>
                                <a href=""><span class="material-symbols-outlined">visibility</span></a>
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