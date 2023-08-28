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

    <div class="item transport">

        <span class="dashboard-title">Transportations</span>
        <br>
        <br>

        <div class="transport-admin">

            <div class="filters">
                <input type="search" id="myInput" name="" placeholder="Search here..." onkeyup="search()">

                <div class="btn">
                    <a href="addtransport.php">
                        <span class="material-symbols-outlined">add</span>
                    </a>
                </div>

            </div>

            <table id="myTable">
                <thead>
                    <tr>
                        <th>Driver Name</th>
                        <th>Driver Contact Number</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Vehicle Type</th>
                        <th>Variant</th>
                        <th>Category</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $select = " SELECT * FROM `transport`";
                        $query = mysqli_query($conn, $select);

                        if(mysqli_num_rows($query) > 0)
                        {
                            while($row = mysqli_fetch_assoc($query))
                            {
                    ?>

                    <tr>
                        <td><?php echo $row['drivername'] ?></td>
                        <td><?php echo $row['contactnumber'] ?></td>
                        <td><?php echo $row['email'] ?></td>
                        <td><?php echo $row['password'] ?></td>
                        <td><?php echo $row['type'] ?></td>
                        <td><?php echo $row['variants'] ?></td>
                        <td><?php echo $row['conditioning'] ?></td>
                        <td class="deletetransport">
                            <a href="">Edit</a>
                            <a href="deletetransport.php">Delete</a>
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

    <script>
        function search(){
        var input, filter, table, tr, td, i, textValue;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");

        for(i=0; i< tr.length;i++)
        {
            td = tr[i].getElementsByTagName("td")[2];
            if(td)
            {
                textValue = td.innerText;

                if(textValue.toUpperCase().indexOf(filter)> -1)
                {
                    tr[i].style.display="";
                }
                else
                {
                    tr[i].style.display="none";
                }
            }
        }
    }
    </script>

</body>
</html>