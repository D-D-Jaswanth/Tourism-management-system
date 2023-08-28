<?php
include './includes/hotelsidebar.php';
include './includes/header.php';
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
    <div class="item hotelrooms">

        <span class="dashboard-title">Rooms</span>
        <br>
        <br>

        <div class="hotelrooms-container">

            <div class="filters">
                <span>Fetch results by : &nbsp;</span>
                <input type="search" id="myInput" name="" placeholder="Search here..." onkeyup="search();">
            </div>

            <table id="myTable">
                <thead>
                    <tr>
                        <th>Floor</th>
                        <th>Rooms</th>
                        <th>Type</th>
                        <th>Available</th>
                        <th>Edit / Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $select = " SELECT * FROM `rooms`";
                        $query = mysqli_query($conn, $select);
                        if(mysqli_num_rows($query) > 0)
                        {
                            while($row = mysqli_fetch_assoc($query))
                            {
                    ?>

                    <tr>
                        <td><?php echo $row['floor']?></td>
                        <td><?php echo $row['rooms'] ?></td>
                        <td><?php echo $row['type'] ?></td>
                        <td><?php echo $row['available'] ?></td>
                        <td>
                            <a href="edithotelrooms.php?id=<?php echo $row['id'] ?>">Edit</a>
                            <a href="">Delete</a>
                        </td>
                    </tr>

                    <?php
                                
                            }
                        }
                    ?>
                </tbody>
            </table>

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
            td = tr[i].getElementsByTagName("td")[1];
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
</body>
</html>