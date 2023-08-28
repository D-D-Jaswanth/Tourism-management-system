<?php 

$server_name="localhost";
$username="root";
$password="";
$database_name="tour";

$conn=mysqli_connect($server_name,$username,$password,$database_name);

if(!$conn){
    die(mysqli_error($conn));
}


if(isset($_POST['register']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobilenumber = $_POST['mobilenumber'];   
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    $sql= "INSERT INTO `register`(`name`, `email`, `mobilenumber`, `password`, `cpassword`) 
    VALUES ('$name','$email','$mobilenumber','$password','$cpassword')";

    $result=mysqli_query($conn, $sql);
    if($result)
    {
        // echo "Data inserted successully";
        header('location:adm.html');
    }
    else
    {
        die(mysqli_error($conn));
    }
}

?>