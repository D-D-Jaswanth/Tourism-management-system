<?php
include './includes/sidebar1.php';
include './includes/header1.php';
include 'connection.php';

$id = "";
if(isset($_GET["id"])){
    $id = $_GET["id"];
}

$query = mysqli_query($conn, "SELECT * FROM `reslist` WHERE id = '$id'");
$row = mysqli_fetch_array($query);

$user = $_SESSION['user_id'];
$query_user = mysqli_query($conn, "SELECT * FROM `reg` WHERE email = '$user'");
$row = mysqli_fetch_array($query_user);

if(isset($_POST["bookbtn"])){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $bookresname = $_POST['bookresname'];
    $booktype = $_POST['booktype'];
    $bookpurpose = $_POST['bookpurpose'];
    $bookplan = $_POST['bookplan'];
    $booktime = $_POST['booktime'];
    $bookdate = $_POST['bookdate'];

    $book = "INSERT INTO `booktable`(`username`, `user_id`, `email`, `res_id`, `resname`, `booktype`,`bookpurpose`, `bookplan`, `booktime`, `bookdate`)
    VALUES ('$name', '$user', '$email', '$id', '$bookresname', '$booktype', '$bookpurpose', '$bookplan', '$booktime', '$bookdate')";

    $book_query = mysqli_query($conn, $book);

    if($book_query)
    {
        echo '<script>alert("Table Booking Successfully");</script>';
        echo '<script>window.location.href="itemuserfood.php"</script>';
    }
    else
    {
        echo '<script>alert("Some thing went wrong please try again after some time....");</script>';
        echo '<script>window.location.href="itemuserfood.php"</script>';
    }
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

    <div class="item book">

        <span class="dashboard-title">Food</span>
        <br>
        <br>

        <div class="booktable">

            <center><h2>Book Your Table</h2></center>

                <form action="#" method="POST" enctype="multipart/form-data">
                    <?php

                        $select_name = " SELECT * FROM `reg` WHERE  id = '$user_id'" ;
                        $query = mysqli_query($conn, $select_name);

                        if(mysqli_num_rows($query) > 0){
                            while($row = mysqli_fetch_assoc($query)){
                                
                    ?>
                                <div class="box-table">
                                    <label for="">Full Name</label>
                                    <input type="text" name="name" value="<?php echo $row['name'] ?>" readonly>
                                </div>
                                <div class="box-table">
                                    <label for="">Email</label>
                                    <input type="text" name="email" value="<?php echo $row['email'] ?>" readonly>
                                </div>
                    <?php
                            }
                        }
                    ?>


            <?php
                $query_book = "SELECT * FROM `reslist` WHERE id = $id";
                $rbook_query = mysqli_query($conn, $query_book);
                $res_book = mysqli_num_rows($rbook_query) > 0;

                if($res_book)
                {

                    while($row = mysqli_fetch_assoc($rbook_query))
                    {
                    ?>

                            
                            <div class="box-table">
                                <label for="">Restaurant Name</label>
                                <input type="text" name="bookresname" value="<?php echo $row['resname'] ?>" readonly>
                            </div>
                            <div class="box-table">
                                <label for="">Type of Table</label>
                                <select name="booktype" id="booktype" required>
                                    <option value="" disabled="" selected="">Select Filters</option>
                                    <option value="2">Table for 2 persons</option>
                                    <option value="3">Table for 3 persons</option>
                                    <option value="4">Table for 4 persons</option>
                                    <option value="5">Table for 5 persons</option>
                                    <option value="6">Table for 6 persons</option>
                                </select>
                            </div>
                            <div class="box-table">
                                <label for="">Purpose</label>
                                <select name="bookpurpose" id="bookpurpose" required>
                                    <option value="" disabled="" selected="">Select Filters</option>
                                    <option value="meeting">Meeting</option>
                                    <option value="casual">Casual</option>
                                    <option value="birthday">Birthday</option>
                                </select>
                            </div>
                            <div class="box-table">
                                <label for="">Plan</label>
                                <select name="bookplan" id="bookplan" required>
                                    <option value="" disabled="" selected="">Select Filters</option>
                                    <option value="breakfast">Breakfast</option>
                                    <option value="lunch">Lunch</option>
                                    <option value="Dinner">Dinner</option>
                                </select>
                            </div>
                            <div class="box-table">
                                <label for="">Time</label>
                                <input type="time" name="booktime" required>
                            </div>
                            <div class="box-table">
                                <label for="">Date</label>
                                <input type="date" name="bookdate" required>
                            </div>

                            <div class="book-btn">
                                <input type="submit" name="bookbtn" class="bookbtn">
                            </div>

                        </form>
                    <?php
                    }
                }

            ?>    

        </div>

    </div>
    
</body>
</html>