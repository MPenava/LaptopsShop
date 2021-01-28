<?php

class User{
    public static $prijavljeniKorisnik;

    public static function jePrijavljen(){
        global $conn;
        $id = $_SESSION["token"];
        $upit = "SELECT * FROM users WHERE ID=".$id;
        $rezultat = mysqli_query($conn, $upit);
        self::$prijavljeniKorisnik = mysqli_fetch_assoc($rezultat);
        if (self::$prijavljeniKorisnik) {
            return true;
        }
        return false;
    }
    public static function deleteUser ($id) {
        global $conn;
        $id=intval($id);
        $sql="DELETE FROM users WHERE ID=".$id;
        return mysqli_query($conn, $sql);
    }
    public static function addUser(){
        global $conn;
        $firstName=$_POST['firstName'];
        $lastName=$_POST['lastName'];
        $email=$_POST['email'];
        $password=md5($_POST['password']);
        $typeOfUser=$_POST['typeOfUser'];

        $sql="INSERT INTO users VALUES (null,'".$firstName."','".$lastName."','".$email."','".$password."','".$typeOfUser."')";
        $result=mysqli_query($conn,$sql);
    }
    public static function updateUser(){
        global $conn;
        $id=$_POST['update_id'];
        $firstName=$_POST['firstName'];
        $lastName=$_POST['lastName'];
        $email=$_POST['email'];
        $password=md5($_POST['password']);
        $typeOfUser=$_POST['typeOfUser'];

        $sql="UPDATE users SET firstName='$firstName',lastName='$lastName',email='$email',password='$password',typeOfUser='$typeOfUser' WHERE ID='$id'" ;
        $result=mysqli_query($conn,$sql);
    }
}
?>