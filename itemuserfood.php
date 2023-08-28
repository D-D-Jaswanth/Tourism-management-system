<?php
include './includes/sidebar1.php';
include './includes/header1.php';
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
    <div class="item user-food">

        <span class="dashboard-title">Restaurants</span>
        <br>
        <br>

        <div class="user-food-container">

            <div class="filters">
                <input type="search" id="find" placeholder="Search here..." onkeyup="search()">
                <a href="itemuserfoodtrans.php">View Transactions</a>
            </div>

            <div class="user-food-list-container">

                <span>Restaurant Lists</span>

            <?php
    
                $query = "SELECT * FROM `reslist`";
                $r_query = mysqli_query($conn,$query);
                $res = mysqli_num_rows($r_query) > 0;
    
                if($res)
                {
    
                while($row = mysqli_fetch_assoc($r_query))
                {
                    ?>

                
                <a class="food-user-card" href="itemres.php?id=<?php echo $row['id']?>">

                    <div class="left">
                        <img src="upload/res/<?php echo $row['resimage']?>" alt="">
                    </div>

                    <div class="right">
                        <div class="resname">
                            <h3><?php echo $row['resname']?></h3>
                        </div>
                        <div class="resrat">
                            <span><?php echo $row['resrat']?>/10</span>
                        </div>
                        <div class="resaddress">
                            <span>Address : <?php echo $row['resaddress']?></span>
                        </div>
                        <div class="rescity">
                            <span>City : <?php echo $row['rescity']?></span>
                        </div>
                        <div class="resdish">
                            <span>Specials : <?php echo $row['resdish']?></span>
                        </div>
                        <div class="time">
                            <span style="color: green">Opens at : <?php echo $row['resopen']?></span>
                            <span style="color: red">Closes at : <?php echo $row['resclose']?></span>
                        </div>
                    </div>
                </a>
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
            let item = document.querySelectorAll('.food-user-card');
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