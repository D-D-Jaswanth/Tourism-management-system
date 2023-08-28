<?php

include 'connection.php';
include './includes/ressidebar.php';
include './includes/header.php';

$id = "";
if(isset($_GET["id"])){
    $id = $_GET["id"];
}


if(isset($_POST['update'])){

    $itemtype = implode(',', $_POST['itemtype']);
    $itemname = implode(',', $_POST['itemname']); 

    $insert = " INSERT INTO `bookfooditems`(`tableid`, `itemtype`, `itemname`) 
    VALUES ('$id', '$itemtype', '$itemname') " ;
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
            <!-- <div class="filters">
                <input type="search" id="myInput" name="" placeholder="Search here..." onkeyup="search();">
            </div> -->
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="item-box">
                        <?php
                            $selectquery = " SELECT `id` FROM `tables` WHERE id = '$id' " ;
                            $query = mysqli_query($conn, $selectquery);
                            
                            if(mysqli_num_rows($query) > 0){
                                while($row = mysqli_fetch_assoc($query)){
                        ?>

                        <span>Table Number</span>
                        <input type="text" value ="<?php echo $row['id'] ?>" readonly>

                        <?php
                                }
                            }
                        ?>
                    </div>
                    <div class="item-box">
                        <span>Item Type</span>
                        <select name="itemtype[]" id="itemtype" multiple="multiple">
                            <option value="" disabled="" selected="">Choose any option</option>
                            <?php
                                $select = " SELECT DISTINCT `itemtype` FROM `menuitems`" ;
                                $query = mysqli_query($conn, $select);
                                if(mysqli_num_rows($query) > 0){
                                    while($row = mysqli_fetch_assoc($query)){
                            ?>
                            <option value="<?php echo $row['itemtype'] ?>"><?php echo $row['itemtype'] ?></option>
                            <?php
                                    }
                                }
                            ?>
                        </select>
                    </div>
                    <div class="item-box">
                        <span>Item Name</span>
                        <select name="itemname[]" id="itemname" multiple="multiple">
                            <option value="" disabled="" selected="">Choose any option</option>
                            <?php
                                $select = " SELECT `itemname` FROM `menuitems`" ;
                                $query = mysqli_query($conn, $select);
                                if(mysqli_num_rows($query) > 0){
                                    while($row = mysqli_fetch_assoc($query)){
                            ?>
                            <option value="<?php echo $row['itemname'] ?>"><?php echo $row['itemname'] ?></option>
                            <?php
                                    }
                                }
                            ?>
                        </select>
                    </div>
                    <div class="item-box">
                        <button name="update">Update</button>
                    </div>

                </form>

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
            td = tr[i].getElementsByTagName("td")[0];
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

    <script>

    var gt = 0;
    var iprice = document.getElementsByClassName('iprice');
    var iquantity = document.getElementsByClassName('iquantity');
    var itotal = document.getElementsByClassName('itotal');
    var grandtotal = document.getElementById('grandtotal');

    function subTotal()
    {
        gt =0;
        for(i=0;i<iprice.length;i++)
        {
            itotal[i].innerText=(iprice[i].value)*(iquantity[i].value);

            gt = gt+(iprice[i].value)*(iquantity[i].value);
        }
        grandtotal.innerText = gt;
    }
    subTotal();

    </script>

</body>
</html>