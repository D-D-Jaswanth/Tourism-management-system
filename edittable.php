<?php

include 'connection.php';
include './includes/ressidebar.php';
include './includes/header.php';

$id = "";
if(isset($_GET["id"])){
    $id = $_GET["id"];
}

$sql_query = "SELECT * FROM `tables` WHERE id = $id";
$result = mysqli_query($conn, $sql_query);


if(isset($_POST['updatetable']) && !empty($_GET['id'])){

    $tableno = $_POST['tableno'];
    $retable = $_POST['retable'];
    $update = " UPDATE `tables` SET `tablesname` = '$tableno', `reserved/Empty`= '$retable' WHERE `id` = '$id'";
    $query = mysqli_query($conn, $update);

    if($query){
        echo '<script>alert("Table Updated");</script>';
        echo '<script>window.location.href="tables.php"</script>';
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
                    <span>Table Name</span>
                    <input type="text" name="tableno" placenumber="enter table name" value="<?php echo $row['tablesname'] ?>" readonly required>
                </div>

                <?php
                        }
                    }
                ?>
                <div class="table-box">
                    <span>Reserved / Empty</span>
                    <select name="retable" id="" required>
                        <option value="" disabled="" selected="">Choose any Option</option>
                        <option value="Reserved">Reserved</option>
                        <option value="Empty">Empty</option>
                    </select>
                </div>
                <div class="btn-table">
                    <button name="updatetable">Update</button>
                </div>
            </form>
        </div>

    </div>
</body>
</html>