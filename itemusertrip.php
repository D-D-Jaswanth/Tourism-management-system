<?php
include './includes/sidebar1.php';
include './includes/header1.php';
include 'connection.php';

$id = "";
if(isset($_GET["id"])){
    $id = $_GET["id"];
}

// $user = $_SESSION['user_id'];
// $query_user = mysqli_query($conn, "SELECT * FROM `reg` WHERE email = '$user'");
// $row = mysqli_fetch_array($query_user);

// if(isset($_POST['addtocart'])){

//     $cartimage = $_POST['cartimage'];
//     $cartname = $_POST['cartname'];
//     $cartstate = $_POST['cartstate'];
//     $cartcost = $_POST['cartcost'];
//     $cartdays = $_POST['cartdays'];

//     $select_query = " SELECT * FROM `cart` WHERE user_id = '$user'";
//     $query = mysqli_query($conn, $select_query);
    
//     if(mysqli_num_rows($query) > 0){
//         echo '<script>alert("destination already added to cart");</script>';
//     }
//     else{

//         $insert_cart = " INSERT INTO `cart` (`image`, `destinationname`, `destinationstate`, `cost`, `days`, `user_id`) 
//         VALUES ('$cartimage','$cartname','$cartstate','$cartcost','$cartdays','$user')";
//         $query = mysqli_query($conn, $insert_cart);

//         echo '<script>alert("destination added to cart successfully");</script>';
//     }

// }

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

    <div class="item user-trip">

        <span class="dashboard-title">Food</span>
        <br>
        <br>

        <div class="usertriplist">
            <div class="spl-packagelist">
                <center><h2>-----Special Packages-----<h2></center>
                <div class="spl-pack">
                    <?php
                        $sql_select = " SELECT * FROM `packages`" ;
                        $query = mysqli_query($conn, $sql_select);
                        
                        if(mysqli_num_rows($query) > 0)
                        {
                            while($row = mysqli_fetch_assoc($query))
                            {
                                ?>

                                <div class="spl-list">
                                    <div class="card-spl">
                                        <div class="top">
                                            <img src="upload/pack/<?php echo $row['packageimage']; ?>" alt="">
                                        </div>
                                        <div class="middle">
                                            <span class="name"><?php echo $row['packagetype'] ?></span>
                                            <span class="places">
                                                <span class="material-symbols-outlined">location_on</span>
                                                <?php echo $row['packageplaces']?>
                                            </span>
                                        </div>
                                        <div class="bottom">
                                            <a href="itemuserviewspl.php?id=<?php echo $row['id']?>" class="view-pack">View Details</a>
                                            <a href="itemuserbookspl.php?id=<?php echo $row['id'] ?>" class="book-pack">Book Now</a>
                                        </div>
                                    </div>
                                </div>

                                <?php
                            }
                        }
                    ?>
                </div>
            <div>

            <div class="popular-packagelist">
                <center><h2>-----Popular Destinations-----<h2></center>
                <div class="pop-pack">
                    <?php
                        $sqlselect = " SELECT * FROM `destinations`" ;
                        $query = mysqli_query($conn, $sqlselect);
                        
                        if(mysqli_num_rows($query) > 0)
                        {
                            while($row = mysqli_fetch_assoc($query))
                            {
                                ?>

                                <div class="pop-list">
                                    <form action="" method="POST" enctype="multipart/form-data">
                                        
                                        <div class="card-pop">
                                            <div class="top">
                                                <img name="image" src="upload/destination/<?php echo $row['destinationimage']; ?>" alt="">
                                            </div>
                                            <div class="middle">
                                                <span class="name" name="name"><?php echo $row['destinationname'] ?></span>
                                                <span class="places" name="state">
                                                    <span class="material-symbols-outlined">location_on</span>
                                                    <?php echo $row['destinationstate']?>
                                                </span>
                                            </div>
                                            <div class="middle-bottom">
                                                <span class="material-symbols-outlined">currency_rupee</span>
                                                <span name="price" class="price"><?php echo $row['destinationcost'] ?> per person</span>
                                            </div>
                                            <div class="bottom">
                                                <a href="itemuserviewpop.php?id=<?php echo $row['id'] ?>" class="view-pop-pack">View Details</a>
                                                <a href="itemuserbook.php?id=<?php echo $row['id']?>" class="book-pop-pack">Book Now</a>
                                            </div>
    
                                            <!-- <div class="icons">
                                                <button class="cart" name="addtocart">
                                                    <span class="material-symbols-outlined">shopping_cart</span>
                                                </button>
                                                <button class="wish" name="addwishlist">
                                                    <span class="material-symbols-outlined">favorite</span>
                                                </button>
                                            </div> -->
    
                                            <div class="days">
                                                <span name="days" class="days"><?php echo $row['destinationdays'] ?></span>
                                            </div>
    
                                        </div>

                                    </form>
                                </div>

                                <?php
                            }
                        }
                    ?>
                </div>


            </div>
        </div>

    </div>
</body>
</html>