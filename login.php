<?php
session_start();
$con = mysqli_connect("localhost" , "root" , "");
mysqli_select_db($con,'webtech');

$name=$_POST['nameText'];
$email=$_POST['emailText'];
$password=$_POST['passwordText'];
$mobile=$_POST['mobileText'];
$address=$_POST['address'];

$s="select * from profile where email = '$email'&& password='$password'";
$result=mysqli_query($con,$s);

$num=mysqli_num_rows($result);

if($num ==1)
{
    header('location:HomPage.php');
    
}
else{

   
    header('location:Food_Delivery.html');
    

}


?>