<?php
    $conn=mysqli_connect('localhost','fpmoz152021','csdigital2021','fpmoz152021');
    //$conn=mysqli_connect('localhost','root','','ls_shop');

    if(!$conn){
        die ("Conection failed!" . mysqli_connect_error());
    }
?>