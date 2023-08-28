<?php
include './includes/sidebar1.php';
include './includes/header1.php';
include 'connection.php';

$id = "";
if(isset($_GET["id"])){
    $id = $_GET["id"];
}

$user = $_SESSION['user_id'];

$query_user = mysqli_query($conn, "SELECT * FROM `reg` WHERE email = '$user'");
$row = mysqli_fetch_array($query_user);

if(isset($_POST['booktrip']))
{
    $bname = $_POST['bname'];
    $bemail = $_POST['bemail'];
    $bnumber = $_POST['bnumber'];
    $bage = $_POST['bage'];
    $bdesname = $_POST['bdesname'];
    $bstate = $_POST['bstate'];
    $bdate = $_POST['bdate'];
    $bcost = $_POST['bcost'];
    $bpersons = $_POST['bpersons'];

    $bdupname = implode(", ",$_POST['bdupname']);
    $bdupage = implode(", ",$_POST['bdupage']);

    $bookinsert =  "INSERT INTO `booktrip`(`fullname`, `email`, `mobilenumber`, `age`, `destinationname`, `destinationstate`, `date`, `perhead`, `noofpersons`, `user_id`,`dest_id`, `persons`,`ages`) 
    VALUES ('$bname','$bemail','$bnumber','$bage','$bdesname','$bstate','$bdate','$bcost', '$bpersons','$user','$id','$bdupname','$bdupage')";
    $sql = mysqli_query($conn, $bookinsert);

    // $bookinsert2 = " INSERT INTO `booktrippersons`(`bookid`, `persons`, `ages`) VALUES ((SELECT `id` FROM `booktrip` WHERE id = '$id'),'$bdupname','$bdupage')";
    // $sql2 = mysqli_query($conn, $bookinsert2);

    if($sql){
        echo '<script>alert("Booking Successfully");</script>';
        echo '<script>window.location.href="itemusertrip.php"</script>';
    }
    // if($sql2){
    //     echo '<script>alert("Booking Successfully");</script>';
    // }



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
    <div class="item userbook">

        <span class="dashboard-title">Booking</span>
        <br>
        <br>

        <div class="bookpack">
            <center><h3>Book your trip</h3></center>

            <form action="" method="POST" enctype="multipart/form-data">
                <div class="personal-book-details">
                <?php
                    $user_select = " SELECT * FROM `reg` WHERE id = '$user_id' ";

                    $user_result = mysqli_query($conn, $user_select);
                    if(mysqli_num_rows($user_result) > 0){
                        while($row = mysqli_fetch_assoc($user_result)){

                ?>
                    <div class="input-fields">
                        <span>Full name</span>
                        <input type="text" name="bname" value="<?php echo $row['name']?>" placeholder="Enter your name" readonly>
                    </div>
                    <div class="input-fields">
                        <span>Email</span>
                        <input type="text" name="bemail" value="<?php echo $row['email']?>" placeholder="Enter email" readonly>
                    </div>
                    <div class="input-fields">
                        <span>Mobile Number</span>
                        <input type="text" name="bnumber" value="<?php echo $row['mobilenumber']?>" placeholder="Enter your name" readonly>
                    </div>
                
                <?php
                        }
                    }
                ?>
                    <div class="input-fields">
                        <span>Age</span>
                        <input type="text" name="bage" placeholder="Enter age" required>
                    </div>
                </div>
                <div class="personal-booking-details">
                    <?php
                        $sql_query = "SELECT * FROM `destinations` WHERE id = $id";
                        $result = mysqli_query($conn, $sql_query);
                        $reslist = mysqli_num_rows($result) > 0;
        
                        if($reslist)
                        {
        
                            while($row = mysqli_fetch_assoc($result))
                            {
                    ?>

                    <div class="input-fields">
                        <span>Destination Name</span>
                        <input type="text" name="bdesname" value="<?php echo $row['destinationname'] ?>" placeholder="Enter destination name" readonly>
                    </div>
                    <div class="input-fields">
                        <span>State</span>
                        <input type="text" name="bstate" value="<?php echo $row['destinationstate'] ?>" placeholder="Enter state" readonly>
                    </div>

                    <div class="input-fields">
                        <span>Date</span>
                        <input type="date" name="bdate" required>
                    </div>
                    <div class="input-fields">
                        <span>Price per head</span>
                        <input type="text" name="bcost" id="bcost" value="<?php echo $row['destinationcost'] ?>" required>
                    </div>
                    <div class="input-fields">
                        <span>How many persons</span>
                        <input type="number" name="bpersons" onchange="subTotal(this.value)" placeholder="enter how many persons" required>
                    </div>
                    <!-- <div class="input-fields">
                        <span>Total Cost</span>
                        <input type="number" name="btotalcost" value="<?php echo $row['destinationcost'] ?>" readonly required>
                    </div> -->
                    <?php
                            }
                        }    
                    ?>

                    <div class="buttonadd">
                        <a href="javascript:void(0)" class="button-add add-more">Add more</a>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-fields">
                        <?php
                            $user_select = " SELECT * FROM `reg` WHERE id = '$user_id' ";

                            $user_result = mysqli_query($conn, $user_select);
                            if(mysqli_num_rows($user_result) > 0)
                            {
                                while($row = mysqli_fetch_assoc($user_result))
                                {
        
                                    ?>
                        <span>Name</span>
                        <input type="text" name="bdupname[]" value="<?php echo $row['name'] ?>" placeholder="Enter name" readonly>

                        <?php
                                }
                            }        
                        ?>
                    </div>
                    <div class="input-fields">
                        <span>Age</span>
                        <input type="text" name="bdupage[]" placeholder="Enter age">
                    </div>
                </div>

                <div class="submit-btn">
                    <button name="booktrip">Submit</button>
                </div>
            </form>
            
        </div>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script>
        $(document).ready(function(){

            $(document).on('click', '.remove-btn', function(){
                $(this).closest('.duplicateform').remove();
            });
            $(document).on('click', '.add-more', function(){
                $('.form-group').append('<div class="duplicateform">\
                            <div class="input-fields">\
                                <span>Name</span>\
                                <input type="text" name="bdupname[]" placeholder="Enter name" >\
                            </div>\
                            <div class="input-fields">\
                                <span>Age</span>\
                                <input type="text" name="bdupage[]" placeholder="Enter age" >\
                            </div>\
                            <div class="button-field">\
                                <input type="button" class="remove-btn" value="remove" />\
                            </div>\
                        </div>');
            });
        });



        function change(answer){
            if(answer.value == "Yes"){
                document.getElementById('bhotelname').classList.remove('bhotelname');
            }
            else{
                document.getElementById('bhotelname').classList.add('bhotelname');
            }
        }
   
        
        
        function subTotal(val){

            var iprice = document.getElementById('bcost');
            var iquantity = document.getElementsByName('bpersons');

            var amt = iquantity * iprice;

            var itotal = document.getElementsByName('btotalcost');
            itotal.value = amt;
            // var index = $(answer).parent().parent().index();
            // var iquantity = document.getElementsByName('bpersons')[index].value;
            // var iprice = document.getElementsByName('bcost');
            
            // var itotal = iquantity * iprice ;
            // document.getElementsByName('btotalcost') = itotal;
            // // for(i=0;i<iprice.length;i++){
            // //     itotal[i].innerText = (iprice[i].value)*(iquantity[i].value);
            // // }
        }
    </script>
</body>
</html>