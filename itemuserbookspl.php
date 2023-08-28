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


$sql_query = "SELECT * FROM `destinations` WHERE id = $id";
$result = mysqli_query($conn, $sql_query);

if(isset($_POST['bookspl']))
{

    $splname = $_POST['splname'];
    $splemail = $_POST['splemail'];
    $splnumber = $_POST['splnumber'];
    $spldob = $_POST['spldob'];
    $spldoor = $_POST['spldoor'];
    $splstr = $_POST['splstr'];
    $splvill = $_POST['splvill'];
    $splcity = $_POST['splcity'];
    $splstate = $_POST['splstate'];
    $splcode = $_POST['splcode'];
    $splplace = $_POST['splplace'];
    $splbdate = $_POST['splbdate'];
    $splnoofpersons = $_POST['splnoofpersons'];
    $spldupname = implode(", ",$_POST['spldupname']);
    $spldupdob = implode(", ",$_POST['spldupdob']);
    $spldecplace = $_POST['spldecplace'];
    $spldecdate = $_POST['spldecdate'];
    $splcontact = $_POST['splcontact'];
    $splcheck = $_POST['splcheck'];


    $booksplinsert =  "INSERT INTO `bookspltrip`(`user_id`,`name`, `email`, `mobilenumber`, `dateofbirth`, `doorno`, `street/area`, `village/town`, `city`, `state`, `pincode`, `place`, `bookingdate`, `noofpersons`, `personsname`, `personsdob`, `declarationplace`, `declarationdate`, `emergency`, `checkbox`)
    VALUES ('$user','$splname','$splemail','$splnumber','$spldob','$spldoor','$splstr','$splvill','$splcity','$splstate','$splcode','$splplace','$splbdate','$splnoofpersons','$spldupname','$spldupdob','$spldecplace','$spldecdate','$splcontact','$splcheck')";
    
    $sql = mysqli_query($conn, $booksplinsert);

    if($sql){
        echo '<script>alert("Booking Successfully");</script>';
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
    <div class="item usersplbook">

        <span class="dashboard-title">Booking</span>
        <br>
        <br>

        <div class="booksplpack">
            <center><h2>Travel Information Form</h2></center>

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
                            <input type="text" name="splname" value="<?php echo $row['name']?>" placeholder="Enter your name" readonly>
                        </div>
                        <div class="input-fields">
                            <span>Email</span>
                            <input type="text" name="splemail" value="<?php echo $row['email']?>" placeholder="Enter email" readonly>
                        </div>
                        <div class="input-fields">
                            <span>Mobile Number</span>
                            <input type="text" name="splnumber" value="<?php echo $row['mobilenumber']?>" placeholder="Enter your name" readonly>
                        </div>
                    
                    <?php
                            }
                        }
                    ?>
                    <div class="input-fields">
                        <span>Date of Birth</span>
                        <input type="date" name="spldob" placeholder="Enter age" required>
                    </div>
                    
                </div>
                
                <h2 style="margin: 20px 0px">Address Details</h2>
                <div class="personal-book-address" style="display: grid; grid-template-columns: 1fr 1fr; grid-gap: 10px">

                    <div class="input-fields">
                        <span>Door No.</span>
                        <input type="text" name="spldoor" placeholder="Enter House no. / Door no." required>
                    </div>
    
                    <div class="input-fields">
                        <span>Street Name / Area Name</span>
                        <input type="text" name="splstr" placeholder="Enter street / area" required>
                    </div>

                    <div class="input-fields">
                        <span>Village / Town</span>
                        <input type="text" name="splvill" placeholder="Enter village / town" required>
                    </div>

                    <div class="input-fields">
                        <span>City</span>
                        <input type="text" name="splcity" placeholder="Enter city" required>
                    </div>

                    <div class="input-fields">
                        <span>State</span>
                        <input type="text" name="splstate" placeholder="Enter state" required>
                    </div>

                    <div class="input-fields">
                        <span>Pincode</span>
                        <input type="text" name="splcode" placeholder="Enter pincode" required>
                    </div>

                </div>
                <br>
                <br>
                <h2>Travel Details</h2>
                <br>
                <div class="personal-booking-details">

                    <div class="input-fields">
                        <?php
                            
                            $select_places = " SELECT `packageplaces` FROM `packages` WHERE `id` = '$id' ";
                            $query = mysqli_query($conn, $select_places);
                                
                                if($query)
                                {
                                    while($row = mysqli_fetch_array($query))
                                    {
                                        
                                        ?>
                        <span>Package Places</span>
                        <input type="text" value="" name ="splplace" placeholder="enter place" required>
                        <p style="color: red; margin: 15px 0px">popular places like <?php echo $row['packageplaces'] ?></p>
                                        <?php
                                    }
                                }
                            ?>
                        </select>
                    </div>

                    <div class="input-fields">
                        <span>Booking Date</span>
                        <input type="date" name="splbdate" required>
                    </div>

                    <div class="input-fields">
                        <span>Total Number of Adults</span>
                        <input type="number" name="splnoofpersons" onchange="subTotal(this.value)" placeholder="enter how many families" required>
                    </div>

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
                        <input type="text" name="spldupname[]" value="<?php echo $row['name'] ?>" placeholder="Enter name" readonly>

                        <?php
                                }
                            }        
                        ?>
                    </div>
                    <div class="input-fields">
                        <span>Date of Birth</span>
                        <input type="date" name="spldupdob[]" placeholder="Enter age">
                    </div>
                </div>

                <h2 style="margin:30px 0px">Declaration</h2>

                <div class="personal-declaration">
                    <div class="input-fields">
                        <span>Place</span>
                        <input type="text" name="spldecplace" placeholder="Enter place" required>
                    </div>
                    <div class="input-fields">
                        <span>date</span>
                        <input type="date" name="spldecdate" placeholder="Enter age" required>
                    </div>
                </div>

                <div class="declaration">

                    <div class="input-fields">
                        <span>Emergency Contact Number</span>
                        <input type="number" name="splcontact" placeholder="Enter number" required>
                    </div>

                    <div class="input-fields">
                        <input type="checkbox" name="splcheck">
                        <p>I agree to terms and conditions</p>
                    </div>

                </div>

                <div class="submit-btn">
                    <button name="bookspl">Submit</button>
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
                                <input type="text" name="spldupname[]" placeholder="Enter name" >\
                            </div>\
                            <div class="input-fields">\
                                <span>Date of Birth</span>\
                                <input type="date" name="spldupdob[]" placeholder="Enter age" >\
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

        function change1(answer){
            if(answer.value == "Yes"){
                document.getElementById('bresname').classList.remove('bresname');
            }
            else{
                document.getElementById('bresname').classList.add('bresname');
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