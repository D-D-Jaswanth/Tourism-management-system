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
   
    <div class="item users">
    
        <span class="dashboard-title">View Users</span>
        <br>
        <br>

        <div class="viewusers">

            <table>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile Number</th> 
                        <th>Password</th>
                        <th>Role</th> 
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    <?php

                        $users_query = "SELECT * FROM `reg`";
                        $r_users = mysqli_query($conn, $users_query);

                        while($row = mysqli_fetch_assoc($r_users)){
                        ?>
                        <tr>
                            <td><?php echo $row['id']?></td>
                            <td><?php echo $row['name']?></td>
                            <td><?php echo $row['email']?></td>
                            <td><?php echo $row['mobilenumber']?></td>
                            <td><?php echo $row['password']?></td>
                            <td><?php echo $row['user_type']?></td>
                            <td>
                                <a class="deleteuser" href="admindeleteuser.php?id=<?php echo $row['id'] ?>">Delete</a>
                            </td>
                        </tr>
                        
                        <?php
                    }
                        ?>
                    
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>