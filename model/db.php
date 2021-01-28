<?php
    $conn=mysqli_connect('studenti.sum.ba','fpmoz152021','csdigital2021','fpmoz152021');

    if(!$conn){
        die ("Conection failed!" . mysqli_connect_error());
    }
?>