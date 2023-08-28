<?php
include './includes/sidebar1.php';
include './includes/header1.php';
include 'connection.php';

$id = "";
if(isset($_GET["id"])){
    $id = $_GET["id"];
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
    <div class="item user-hotel">

    <span class="dashboard-title">Hotels</span>
    <br>
    <br>

    <div class="user-hotel-container">

        <div class="filters">
            <input type="search" id="find" placeholder="Search here..." onkeyup="search()">
            <a href="itemuserhoteltrans.php">View Transaction</a>
        </div>

        <div class="user-hotel-list-container">

            <center><h2>Hotels Lists</h2></center>

        <?php

            $query = "SELECT * FROM `hotels`";
            $r_query = mysqli_query($conn,$query);
            $res = mysqli_num_rows($r_query) > 0;

            if($res)
            {

            while($row = mysqli_fetch_assoc($r_query))
            {
                ?>
                <div class="hotel-user-card">
                    <div class="left">
                        <img src="upload/hotels/<?php echo $row['hotelimage'] ?>" alt="">
                    </div>
                    <div class="middle">
                        <h3><?php echo $row['hotelname'] ?></h3>
                        <span class="hname"><?php echo $row['hotelprice'] ?></span>
                        <span class="hdesc"><?php echo $row['hoteldescription'] ?></span>
                        <span class="hmail"><?php echo $row['email'] ?></span>
                        <span class="hadd"><?php echo $row['hoteladdress'] ?></span>
                    </div>
                    <div class="right">
                        <span>Rating : <?php echo $row['hotelratings'] ?></span>
                        <a href="itemuserbookhotel.php?id=<?php echo $row['id'] ?>">Book Now</a>
                    </div>
                </div>


            <?php
                }
            }
        ?>
        </div>

    </div>

    </div>

    <script>
    function search(){
        let filter = document.getElementById('find').value.toUpperCase();
        let item = document.querySelectorAll('.hotel-user-card');
        let l = document.getElementsByTagName('h3');

        for(var i = 0; i <= l.length; i++){
            let a = item[i].getElementsByTagName('h3')[0];

            let value = a.innerText || a.innerHTML || a.textContent;
            if(value.toUpperCase().indexOf(filter) > -1){
                item[i].style.display="";
            }
            else{
                item[i].style.display="none";
            }
        }
    };
    </script>
    
</body>
</html>