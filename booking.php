<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
$servername="localhost";
$username="root";
$password="";
$dbname="cinema";
$conn=new mysqli($servername,$username,$password,$dbname);
if($conn->connect_error){die("Connection failed: ".$conn->connect_error);}
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $movie=mysqli_real_escape_string($conn,$_POST['movie']);
    $date=mysqli_real_escape_string($conn,$_POST['date']);
    $seats=mysqli_real_escape_string($conn,$_POST['seats']);
    $total_price=mysqli_real_escape_string($conn,$_POST['total_price']);
    
    $sql="INSERT INTO bookings (movie,date,seats,total_price) VALUES ('$movie','$date','$seats','$total_price')";
    if($conn->query($sql)===TRUE){
        echo"Booking successful!";
    }else{
        echo"Error: ".$sql."<br>".$conn->error;
    }
}
$conn->close();
?>