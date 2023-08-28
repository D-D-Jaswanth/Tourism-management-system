<?php

include 'connection.php';
if(isset($_GET['id'])){
    $id = $_GET['id'];

    $sql = " DELETE FROM `destinations` WHERE id = $id";
    $query = mysqli_query($conn, $sql);
    if($query){
        echo '<script>alert("Delete Successfully");</script>';
        echo '<script>window.location.href="itemdestination.php"</script>';
    }
}

?>