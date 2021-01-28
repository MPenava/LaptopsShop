<?php
include("../model/db.php"); 
include("../model/user.class.php");
$id=$_POST['update_id'];
$firstName=$_POST['firstName'];
$lastName=$_POST['lastName'];
$email=$_POST['email'];
$password=md5($_POST['password']);
$typeOfUser=$_POST['typeOfUser'];
$sql="UPDATE users SET firstName='".$firstName."',lastName='".$lastName."',email='".$email."',typeOfUser='".$typeOfUser."' WHERE ID=".$id."'";
$result=mysqli_query($conn,$sql);
header("Location: ../superadmin-login.php");
?>