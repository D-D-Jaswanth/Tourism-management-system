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
    <div class="item hotels">

    <span class="dashboard-title">Hotels</span>
    <br>
    <br>

    <div class="hotels-container">

        <div class="filters">
            <input type="search" id="myInput" name="" placeholder="Search here..." onkeyup="search()">

            <div class="btn">
                <a href="addhotels.php">Add Hotels</a>
            </div>
            <a href="adminhotelbooktrans.php">View Transactions</a>
            
        </div>

        <div class="hotels-list-container">
            <div class="card-hotel">
                <?php
                    $select = " SELECT * FROM `hotels`";
                    $query = mysqli_query($conn, $select);
                    while($row = mysqli_fetch_assoc($query))
                    {
                ?>
                <div class="card">
                    <div class="left">
                        <img src="upload/hotels/<?php echo $row['hotelimage']?>" alt="">
                    </div>
                    <div class="middle">
                        <h3><?php echo $row['hotelname'] ?></h3>
                        <span class="hrating"><?php echo $row['hotelratings'] ?> / 5</span>
                        <span class="hadd"><?php echo $row['hoteladdress'] ?></span>
                        <li>
                            <span class="material-symbols-outlined">wifi</span>
                            <span>Free Wifi</span>
                        </li>
                        <li>
                            <span class="material-symbols-outlined">local_parking</span>
                            <span>Free Parking</span>
                        </li>
                        <li>
                            <span class="material-symbols-outlined">done</span>
                            <span>Full Refundable</span>
                        </li>
                        <li>
                            <span class="material-symbols-outlined">done</span>
                            <span>No prepayment needed</span>
                        </li>
                    </div>
                    <div class="right">
                        <div class="icons">
                            <span class="material-symbols-outlined">currency_rupee</span>
                            <span class="hprice"><?php echo $row['hotelprice'] ?></span>
                        </div>
                        <div class="deletebtn">
                            <a href="admindeletehotel.php?id=<?php echo $row['id'] ?>">Delete</a>
                        </div>
                    </div>
                </div>
                    
                <?php

                    }
                ?>
            </div>
        </div>

    </div>
    </div>

    <script>
        function search(){

            let filter = document.getElementById('myInput').value.toUpperCase();
            var item = document.querySelectorAll('.card');
            let l = document.getElementsByTagName('h3');

            for(i=0; i< l.length;i++)
            {
                let a = item[i].getElementsByTagName('h3')[0];
                let value = a.innerHTML || a.innerText || a.textContent;

                if(value.toUpperCase().indexOf(filter)> -1)
                {
                    item[i].style.display="";
                }
                else
                {
                    item[i].style.display="none";
                }
            }
        };
    </script>
</body>
</html>