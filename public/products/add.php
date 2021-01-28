<?php
include("../model/db.php"); 
include("../model/product.class.php"); 
Product::saveProduct($_POST);
header("Location: ../admin-login.php");       
?>