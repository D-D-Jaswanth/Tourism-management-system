<?php

include 'connection.php';
if(isset($_GET['id'])){
    $id = $_GET['id'];

    $sql = " DELETE FROM `booktable` WHERE id = $id";
    $query = mysqli_query($conn, $sql);
    if($query){
        echo '<script>alert("Delete Successfully");</script>';
        echo '<script>window.location.href="itemuserfoodtrans.php"</script>';
    }
}

?>