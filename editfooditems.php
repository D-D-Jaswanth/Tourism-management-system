<?php

include 'connection.php';
include './includes/ressidebar.php';
include './includes/header.php';

$id = "";
if(isset($_GET["id"])){
    $id = $_GET["id"];
}

$sql_query = "SELECT * FROM `menuitems` WHERE id = $id";
$result = mysqli_query($conn, $sql_query);


if(isset($_POST['updatefood']) && !empty($_GET['id'])){

    $itemtype = $_POST['itemtype'];
    $itemname = $_POST['itemname'];
    $itemprice = $_POST['itemprice'];

    $update = " UPDATE `menuitems` SET `itemtype` = '$itemtype', `itemname`= '$itemname', `itemprice` = '$itemprice' WHERE `id` = '$id'";
    $query = mysqli_query($conn, $update);

    if($query){
        echo '<script>alert("Food Item Updated");</script>';
        echo '<script>window.location.href="fooditems.php"</script>';
    }
    else{
        echo '<script>alert("Table not Updated");</script>';
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
    <div class="item edittable" id="edittable">

        <span class="dashboard-title">Tables</span>
        <br>
        <br>

        <div class="edittable-container">
            <form action="" method="POST" enctype="multipart/form-data">
                <?php
                    if(mysqli_num_rows($result) > 0)
                    {
                        while($row = mysqli_fetch_assoc($result))
                        {
                ?>

                <div class="table-box">
                    <span>Item Type</span>
                    <input type="text" name="itemtype" placenumber="enter item type" value="<?php echo $row['itemtype'] ?>" readonly required>
                </div>
                
                <div class="table-box">
                    <span>Item Name</span>
                    <input type="text" name="itemname" placenumber="enter item name" value="<?php echo $row['itemname'] ?>" required>
                </div>

                <div class="table-box">
                    <span>Price</span>
                    <input type="text" name="itemprice" placenumber="enter price" value="<?php echo $row['itemprice'] ?>" required>
                </div>

                <?php
                        }
                    }
                ?>
                <div class="btn-table">
                    <button name="updatefood">Update</button>
                </div>
            </form>
        </div>

    </div>
</body>
</html>