<?php
include './includes/sidebar.php';
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

    <title>Tour & Travels</title>
</head>
<body>
    <div class="item dest">

    <span class="dashboard-title">Destinations</span>
    <br>
    <br>

    <div class="dest-container">

        <div class="filters">
            <input type="search" id="myInput" name="" placeholder="Search here..." onkeyup="search();">

            <div class="btn">
                <a href="addestination.php">Add Destinations</a>
                <!-- <a href="addplaces.php">Add Places</a> -->
            </div>
            
        </div>

        <div class="dest-list-container">
            <table id="myTable">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>destinationimage</th>
                        <th>destinationname</th>
                        <th>destinationstate</th> 
                        <th>destinationcost</th>
                        <th>destinationdays</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    <?php

                        $query = "SELECT * FROM `destinations`";
                        $r = mysqli_query($conn,$query);

                        while($row = mysqli_fetch_assoc($r)){
                        ?>
                        <tr>
                            <td><?php echo $row['id']?></td>
                            <td><img src="upload/destination/<?php echo $row['destinationimage']?>"></td>
                            <td><a href="itemdestview.php?id=<?php echo $row['id'] ?>"><?php echo $row['destinationname']?></a></td>
                            <td><?php echo $row['destinationstate']?></td>
                            <td><?php echo $row['destinationcost']?></td>
                            <td><?php echo $row['destinationdays']?></td>
                            <td><a class="deletedest" href="admindeletedestination.php?id=<?php echo $row['id'] ?>">Delete</a></td>
                        </tr>
                        
                        <?php
                    }
                        ?>
                    
                </tbody>
            </table>
        </div>

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