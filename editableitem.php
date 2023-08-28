<?php

include 'connection.php';
include './includes/ressidebar.php';
include './includes/header.php';

$id = "";
if(isset($_GET["id"])){
    $id = $_GET["id"];
}


if(isset($_POST['update'])){
    $tablename = $_POST['tablename'];
    $itemtype = $_POST['itemtype'];
    $itemname = $_POST['itemname'];
    $item = implode(',', $itemname);

    $insert = ' INSERT INTO `bookfooditems`(`tablename`, `itemtype`, `itemname`) 
    VALUES ("'.$tablename.'", "'.$itemtype.'", "'.$item.'") ' ;
    $query = mysqli_query($conn , $insert);

    if($query){
        echo '<script>alert("Update Successfully");</script>';
        echo '<script>window.location.href="tables.php"</script>';
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
    <div class="item addmenutable" id="table">

        <span class="dashboard-title">Add Menu Items</span>
        <br>
        <br>

        <div class="menu-container">
            <div class="items">
                <form action="" method="POST" enctype="multipart/form-data">
                    <?php
                        $select = " SELECT * FROM `bookfooditems` WHERE `id` = '$id' " ;
                        $result = mysqli_query($conn, $select);

                        if(mysqli_num_rows($result) > 0)
                        {
                            while($row = mysqli_fetch_assoc($result))
                            {
                    ?>

                    <div class="item-box">
                        <span>Table name</span>
                        <input type="text" name="tablename" value ="<?php echo $row['tablename']  ?>" readonly>
                    </div>
                    <div class="item-box">
                        <span>Item Type</span>
                        <select name="itemtype" id="">
                            <option value="" disabled="" selected="">Choose any Option</option>
                            <option value="<?php echo $row['itemtype'] ?>"><?php echo $row['itemtype'] ?></option>
                        </select>
                    </div>
                    <div class="item-box">
                        <span>Item name</span>
                        <select name="itemname[]" id="item" multiple="multiple">
                            <option value="" disabled="" selected="">Choose item name</option>
                        </select>
                    </div>

                    <?php
                            }
                        }
                    ?>
                    <div class="item-box">
                        <button name="update">Update</button>
                    </div>

                </form>

            </div>


        </div>

    </div>

</body>
</html>