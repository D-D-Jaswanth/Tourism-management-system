<?php

$server_name="localhost";
$username="root";
$password="";
$database_name="tour;

$conn=mysqli_connect($server_name,$username,$password,$database_name);

if(!$conn){
    die(mysqli_error($conn));
}

if(isset($_POST['send']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $to = "djchinnu25@gmail.com";

    $sql= "INSERT INTO `mail`(`name`, `email`, `subject`, `message`) 
    VALUES ('$name','$email','$subject','$message')";

}


header('location:home.html');
?>