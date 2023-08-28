<?php
include './includes/sidebar.php';
include './includes/header.php';
include 'connection.php';

if(isset($_POST['addpack'])){
    $packtype = $_POST['packtype'];
    $packdes = $_POST['packdes'];
    $packplace = implode(", ",$_POST['packplace']);

    $pack_insert = "INSERT INTO `packages` (`packagetype`,`packagedescription`,`packageplaces`) VALUES ('$packtype','$packdes','$packplace') " ;
    $query_run_pack = mysqli_query($conn, $pack_insert);

    if($query_run_pack > 0)
    {
        echo '<script>alert("Package added Successfully")</script>';
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
    <link href="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.min.css" rel="stylesheet"/>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>

</head>
<body>
<div class="item add_pack">

    <span class="dashboard-title">Add Packages</span>
    <br>
    <br>

    <div class="add-pack-container">

        <label for="packadd">Add Packages</label>

        <div class="add-pack-details">

            <form action="" method="POST">

                <div class="add-pack-box">
                    <span>Package Type</span>
                    <select name="packtype" id="packtype">
                        <option value="" disabled="" selected="">Select Package Type</option>
                        <option value="Adventure Tourism">Adventure Tourism</option>
                        <option value="Eco Tourism">Eco Tourism</option>
                        <option value="Honeymoon Tourism">Honeymoon Tourism</option>
                        <option value="Family Tourism">Family Tourism</option>
                    </select>
                </div>

                <div class="add-pack-box">
                    <span>Package Description</span>
                    <input type="text" name="packdes" placeholder="Enter package description" required>
                </div>

                <div class="add-pack-box">
                    <span>Package Places</span>
                    <select data-placeholder="Select places" multiple class="chosen-select" name="packplace[]">
                        <option value="Andhra Pradesh">Andhra Pradesh</option>
                        <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                        <option value="Assam">Assam</option>
                        <option value="Bihar">Bihar</option>
                        <option value="Chhattisgarh">Chhattisgarh</option>
                        <option value="Goa">Goa</option>
                        <option value="Gujarat">Gujarat</option>
                        <option value="Haryana">Haryana</option>
                        <option value="Himachal Pradesh">Himachal Pradesh</option>
                        <option value="Jharkhand">Jharkhand</option>
                        <option value="Karnataka">Karnataka</option>
                        <option value="Kerala">Kerala</option>
                        <option value="Madhya Pradesh">Madhya Pradesh</option>
                        <option value="Maharashtra">Maharashtra</option>
                        <option value="Manipur">Manipur</option>
                        <option value="Meghalaya">Meghalaya</option>
                        <option value="Mizoram">Mizoram</option>
                        <option value="Nagaland">Nagaland</option>
                        <option value="Odisha">Odisha</option>
                        <option value="Punjab">Punjab</option>
                        <option value="Rajasthan">Rajasthan</option>
                        <option value="Sikkim">Sikkim</option>
                        <option value="Tamil Nadu">Tamil Nadu</option>
                        <option value="Telangana">Telangana</option>
                        <option value="Tripura">Tripura</option>
                        <option value="Uttar Pradesh">Uttar Pradesh</option>
                        <option value="Uttarakhand">Uttarakhand</option>
                        <option value="West Bengal">West Bengal</option>
                    </select>
                </div>

                <div class="add-btn">
                    <input type="submit" value="Add package" name="addpack">
                </div>

            </form>
        </div>
    </div>
</div>


<script>
    $(".chosen-select").chosen({
  no_results_text: "Oops, nothing found!"
})
</script>
</body>
</html>