<?php
include './includes/sidebar.php';
include './includes/header.php';
include 'connection.php';
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
<div class="item food">

    <span class="dashboard-title">Restaurants</span>
    <br>
    <br>

    <div class="food-container">

        <div class="filters">
            <input type="search" id="myInput" name="" placeholder="Search here..." onkeyup="search();">
            <div class="btn">
                <a href="addres.php">Add</a>
            </div>
            <a href="adminfoodbooktrans.php">View Transactions</a>
            
        </div>

        <div class="food-list-container">
            <table id="myTable">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Image</th>
                        <th>Restaurant Name</th>
                        <th>Address</th> 
                        <th>Village / Town</th> 
                        <th>City</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="tbody">

                    <?php

                        $query = "SELECT * FROM `reslist`";
                        $r = mysqli_query($conn,$query);

                        while($row = mysqli_fetch_assoc($r)){
                        ?>
                        <tr>
                            <td><a class="td-row" href=""><?php echo $row['id']?></a></td>
                            <td><a class="td-row" href=""><img src="upload/res/<?php echo $row['resimage']?>" class="table-image"></a></td>
                            <td><a class="td-row" href=""><?php echo $row['resname']?></a></td>
                            <td><a class="td-row" href=""><?php echo $row['resaddress']?></a></td>
                            <td><a class="td-row" href=""><?php echo $row['resvillage']?></a></td>
                            <td><a class="td-row" href=""><?php echo $row['rescity']?></a></td>
                            <td><a class="delete-btn" href="admindeleterestaurant.php?id=<?php echo $row['id'] ?>">Delete</a></td>
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