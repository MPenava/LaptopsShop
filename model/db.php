<?php
    $conn=mysqli_connect('localhost','root','','ls_shop');

    if(!$conn){
        die ("Conection failed!" . mysqli_connect_error());
    }
?>