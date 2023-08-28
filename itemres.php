<?php
include './includes/sidebar1.php';
include './includes/header.php';
include 'connection.php';

$id = "";
if(isset($_GET["id"])){
    $id = $_GET["id"];
}

$sql_query = "SELECT * FROM `reslist` WHERE id = $id";
$result = mysqli_query($conn, $sql_query);

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

    <div class="item res">

        <span class="dashboard-title">Food</span>
        <br>
        <br>

        <div class="reslist">

        <?php

            $reslist = mysqli_num_rows($result) > 0;
    
            if($reslist)
            {

                while($row = mysqli_fetch_assoc($result))
                {
                ?>
                    <div class="rslist">
                        
                        <div class="resdetails">
            
                            <div class="name">
                                <label for=""><?php echo $row['resname']?></label>
                            </div>
            
                            <div class="rating-items">
                                <div class="ratings">
                                    <span><?php echo $row['resrat']?>/10</span>
                                </div>
                                <div class="items">
                                    <span><?php echo $row['resdish']?></span>
                                </div>
                            </div>
            
                            <div class="resadd-time">
                                <div class="res-add">
                                    <span class="material-symbols-outlined">location_on</span>
                                    <span><?php echo $row['resvillage']?></span>
                                </div>
                                <div class="time">
                                    <span>opens at : <?php echo $row['resopen']?></span>
                                </div>
                                <div class="mobile">
                                    <span class="material-symbols-outlined">phone</span>
                                    <span><?php echo $row['resphone']?></span>
                                </div>
                            </div>
            
                        </div>
        
                        <div class="resbtn">
                            <a href="book.php?id=<?php echo $row['id']?>">Book now</a>
                        </div>
        
                    </div>
        
        
                    <div class="cards">
                        <div class="card1">
                            <div class="card-title">
                                <span class="card-title1">Ratings and reviews</span>
                            </div>
        
                            <div class="card1r">
                                <label for=""><?php echo $row['resrat']?>/10</label>
                            </div>
        
                            <hr>
        
                            <div class="card-rating">
                                <span class="card-title2">Ratings</span>
        
                                <div class="foodcard">
                                    <div class="det">
                                        <span class="material-symbols-outlined">restaurant</span>
                                        <label for="">Food</label>
                                    </div>
        
                                    <div class="r">
                                        <label for="">3.8/5</label>
                                    </div>
                                </div>
        
                                <div class="servicecard">
                                    <div class="det">
                                        <span class="material-symbols-outlined">lunch_dining</span>
                                        <label for="">Service</label>
                                    </div>
        
                                    <div class="r">
                                        <label for="">3.8/5</label>
                                    </div>
                                </div>
        
                                <div class="valuecard">
                                    <div class="det">
                                        <span class="material-symbols-outlined">account_balance_wallet</span>
                                        <label for="">Value</label>
                                    </div>
        
                                    <div class="r">
                                        <label for="">3.8/5</label>
                                    </div>
                                </div>
        
                                <div class="atmcard">
                                    <div class="det">
                                        <span class="material-symbols-outlined">humidity_high</span>
                                        <label for="">Atmosphere</label>
                                    </div>
        
                                    <div class="r">
                                        <label for="">3.8/5</label>
                                    </div>
                                </div>
                            </div>
                        </div>
        
                        <div class="card2">
                            <div class="card-title">
                                <span class="card-title1">Details</span>
                            </div>
        
                            <hr>
        
                            <div class="cdet">
                                <span class="cdet-title">CUISINES</span>
                                <span class="cdes"><?php echo $row['resdish']?></span>
                            </div>
                            <div class="sdet">
                                <span class="sdet-title">SPECIAL DIETS</span>
                                <span class="cdes">Indian, Asian</span>
                            </div>  
                            <div class="mdet">
                                <span class="mdet-title">MEALS</span>
                                <span class="cdes">Indian, Asian</span>
                            </div>
        
                        </div>
        
                        <div class="card3">
                            <div class="card-title">
                                <span class="card-title1">Location and Contact</span>
                            </div>
        
                            <hr>
        
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d122410.00036502916!2d80.56248139496148!3d16.51031324898608!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a35eff9482d944b%3A0x939b7e84ab4a0265!2sVijayawada%2C%20Andhra%20Pradesh!5e0!3m2!1sen!2sin!4v1682324724554!5m2!1sen!2sin" 
                            width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        
                            <div class="card3-add">
                                <span class="material-symbols-outlined i">location_pin</span>
                                <span><?php echo $row['resvillage']?></span>
                            </div>
                            <div class="card3-mail">
                                <span class="material-symbols-outlined i">email</span>
                                <span><?php echo $row['resemail']?></span>
                            </div>
                        </div>
                    
                    </div>
                <?php
                }
            }

        ?>

            </div>

        </div>
    </div>
</body>
</html>