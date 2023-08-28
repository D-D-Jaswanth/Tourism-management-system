<?php
include './includes/hotelsidebar.php';
include './includes/header.php';
include 'connection.php';

$id = "";
if(isset($_GET["id"])){
    $id = $_GET["id"];
}

if(isset($_POST['upbookhotel']))
{
    $upfullname = $_POST['upfullname'];
    $upemail = $_POST['upemail'];
    $uphname = $_POST['uphname'];
    $uproomtype = $_POST['uproomtype'];
    $uprooms = $_POST['uprooms'];
    $upnumber = $_POST['upnumber'];
    $uparrivaldate = $_POST['uparrivaldate'];
    $uparrtime = $_POST['uparrtime'];
    $updepdate = $_POST['updepdate'];
    $response = $_POST['response'];
    $remarks = $_POST['remarks'];

    $update_hotelbook =  "UPDATE `hotelbookings` SET `response`='$response',`remarks`='$remarks' WHERE id= '$id' ";
    
    $sql = mysqli_query($conn, $update_hotelbook);

    if($sql){
        echo '<script>alert("Updated Successfully");</script>';
        echo '<script>window.location.href="hoteltrans.php"</script>';
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
    <div class="item hhotelbook">

        <span class="dashboard-title">Hotel Booking</span>
        <br>
        <br>

        <div class="edithotel">
            <center><h3>Book your Hotel</h3></center>

            <form action="" method="POST" enctype="multipart/form-data">
                <?php
                    $selecthotels = " SELECT * FROM `hotelbookings` WHERE id = '$id' " ;
                    $query = mysqli_query($conn, $selecthotels);
                    
                    if(mysqli_num_rows($query) > 0)
                    {
                        while($row = mysqli_fetch_assoc($query))
                        {
                ?>

                <div class="editbookpersonal">
                    <div class="book-edit-hotel-box">
                        <span>Full Name</span>
                        <input type="text" name="upfullname" value="<?php echo $row['fullname'] ?>" placeholder="enter full name" readonly>
                    </div>
                    <div class="book-edit-hotel-box">
                        <span>Email</span>
                        <input type="text" name="upemail" value="<?php echo $row['email'] ?>" placeholder="enter hotel name" readonly>
                    </div>   
                </div>
                <h3>Booking Details</h3>
                <div class="bookdetails">
                    <div class="book-edit-hotel-box">
                        <span>Hotel name</span>
                        <input type="text" name="uphname" value="<?php echo $row['hotelname'] ?>" placeholder="enter hotel name" readonly>
                    </div>
                    <div class="book-edit-hotel-box">
                        <span>Room Type</span>
                        <input type="text" name="uproomtype" value="<?php echo $row['roomtype'] ?>" placeholder="enter hotel name" readonly>
                    </div>
                    </div>
                    <div class="book-edit-hotel-box">
                        <span>Rooms</span>
                        <input type="number" name="uprooms" value="<?php echo $row['rooms'] ?>" readonly>
                    </div>
                    <div class="book-edit-hotel-box">
                        <span>Number of Guests</span>
                        <input type="number" name="upnumber" value="<?php echo $row['noofguests'] ?>" readonly>
                    </div>
                    <div class="book-edit-hotel-box">
                        <span>Arrival Date</span>
                        <input type="date" mame="uparrivaldate" value="<?php echo $row['arrivaldatetime'] ?>" readonly>
                    </div>
                    <div class="book-edit-hotel-box">
                        <span>Depature Date</span>
                        <input type="date" name="updepdate" value="<?php echo $row['depaturedate'] ?>" readonly>
                    </div>
                    <div class="responsedetails">
                        <div class="book-edit-hotel-box">
                            <span>Accept / Reject</span>
                            <select name="response" id="" onchange="change(this)" required>
                                <option value="" disabled="" selected="">Choose any option</option>
                                <option value="Accept">Accept</option>
                                <option value="Reject">Reject</option>
                            </select>
                        </div>

                        <div class="remarks-box" id="remarks">
                            <div class="book-edit-hotel-box">
                                <span>Remarks</span>
                                <input type="text" name="remarks" placeholder="enter remarks">
                            </div>
                        </div>

                    </div>
                    <div class="submit-btn">
                        <button name="upbookhotel">Update</button>
                    </div>
                </div>
                <?php
                        }
                    }
                ?>
            </form>
        </div>vy
    </div>

    <script>
        function change(answer){
            if(answer.value == "Reject"){
                document.getElementById('remarks').classList.remove('remarks-box');
            }
            else{
                document.getElementById('remarks').classList.add('remarks-box');
            }
        };
    </script>
</body>
</html>