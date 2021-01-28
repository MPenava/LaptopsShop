<?php
include ("model/db.php");
$id=$_GET['id'];
$sql="SELECT * FROM products WHERE ID=".$id;
$result=$conn->query($sql);
$row=$result->fetch_assoc();
    

session_start();
if (!isset($_SESSION["token"])) header("Location: login.php");
$id = $_SESSION["token"];
$upit = "SELECT * FROM users WHERE ID=".$id;
$result = mysqli_query($conn, $upit);
$prijavljeni_korisnik = mysqli_fetch_assoc($result);  

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href='assets/logo/ls-icon.png'>
    <title>Laptops Shop</title>
    <link rel="stylesheet" href="css/stylee.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="jquery-3.5.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

    <link rel="stylesheet" href="css/stylee.css">
    <style>
        @media only screen and (max-width: 550px) {
            .box-first>.search-box{
                display:block;
            }
        }
        .box-first>.dropdown{
            position:absolute;
            right:20px;
            color:white;
            margin-top:8px;
        }
        .dropdown-menu>.dropdown-item{
            color:#005DA4;
        }
        .dropdown-menu>.dropdown-item:hover{
            color:#005DA4;
        }
        .main>.container>.row>.second{
            display:none;
        }
        @media only screen and (max-width: 990px){
            .main>.container>.row>.first{
                display:none;
            }
            .main>.container>.row>.second{
                display:block;
            }
        }
        .card-title>a{
            color:#005DA4;
            text-decoration:underline;
        }
        .col-md-5>img{
            display:flex;
            align-items:center;
            justify-content: space-between;
            margin:5px auto;
        }
        table>tbody>tr>th{
            border: 1px solid #dfe6e9;
            width:20%;
            color:black;
            font-weight:normal;
            font-style:italic;
        }
        table>tbody>tr>td{
            color:gray;
            font-style:italic;
        }
        .col-md-4>.row>.col-6>img{
            display:flex;
            align-items:center;
            justify-content: space-between;
            margin:1px auto;
        }
        .col-md-4>.row>.col-6>.text{
            font-weight:bold;
            color:#005DA4;
        }
        .boxspec{
            padding-top:30px;
            border:2px solid gray;
            margin-top:30px;
            border-radius:20px;
        }
        .boxspec>.btn{
            display:flex;
            align-items:center;
            justify-content: space-between;
            margin:5px auto;
        }
        
    </style>

</head>

<body>
    
    <header>
        <div class="box-first">           
            <div class="search-box" style="left:20px;">
                <input type="text" placeholder="Search...">
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-search" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"/>
                            <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
                </svg>
            </div>
            <div class="dropdown">
                <div class="dropdown-toggle align-center valign-center" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php echo ($prijavljeni_korisnik["firstName"]. " ".$prijavljeni_korisnik["surName"]);?>
                    <svg width="1.6em" height="1.6em" viewBox="0 0 16 16" class="bi bi-person-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path d="M13.468 12.37C12.758 11.226 11.195 10 8 10s-4.757 1.225-5.468 2.37A6.987 6.987 0 0 0 8 15a6.987 6.987 0 0 0 5.468-2.63z"/>
                        <path fill-rule="evenodd" d="M8 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                        <path fill-rule="evenodd" d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1zM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8z"/>
                    </svg>
                </div>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-fill mr-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                        </svg> Profil
                    </a>
                    <a class="dropdown-item" href="#">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-list-ul mr-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm-3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                        </svg>Lista želja
                    </a>
                    <a class="dropdown-item" href="logout.php">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-box-arrow-in-right mr-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z"/>
                            <path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                        </svg> Odjava
                    </a>
                </div>
            </div>           
        </div>
        <?php include("static/headerSec.php");?>
    </header>
    <div class="main">
        <div class="animate-text">
            <p><span></span></p>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <img src="<?=$row['image']?>" alt="" style="width:300px;height:300px;"/>
                    <h3 class="text-center" style="color:#005DA4;"><?=$row['brand']?> <?=$row['model']?></h3>               
                </div>
                <div class="col-md-4">
                    <div class="row mt-5">
                        <div class="col-6">
                            <img src="assets/images/television.png" alt="" />
                            <p class="text-center">Ekran</p>
                            <p class="text-center text"><?=$row['screen']?></p>
                        </div>
                        <div class="col-6" >
                            <img src="assets/images/cpu.png" alt="" />
                            <p class="text-center">Procesor</p>
                            <p class="text-center text"><?=$row['processor']?></p>
                        </div>
                        <div class="col-6">
                            <img src="assets/images/ram.png" alt="" />
                            <p class="text-center">RAM</p>
                            <p class="text-center text"><?=$row['ram']?></p>
                        </div>
                        <div class="col-6">
                            <img src="assets/images/data-storage.png" alt="" />
                            <p class="text-center">Memorija</p>
                            <p class="text-center text"><?=$row['hard_disc']?></p>
                        </div>    
                                        
                    </div>
                </div>
                <div class="col-md-3 ">
                    <div class="boxspec mt-5">
                        <p class="text-center "> Cijena: <span class="text-danger"><?=$row['price']?> KM</span></p>
                        <button class="btn btn-light border mb-4"><i class="fas fa-list"></i>&nbsp;&nbsp;Lista želja</button>
                        
                    </div>
                </div>
                <div class="col-12">
                    <table class="table table-striped border mt-5">
                        <tbody>
                            <tr>
                                <th scope="row">Naziv laptopa</th>
                                <td scope="col"><?=$row['brand']?> <?=$row['model']?></td>                
                            </tr>
                            <tr>
                                <th scope="row">Veličina ekrana</th>
                                <td scope="col"><?=$row['screen']?> Inch</td>                
                            </tr>
                            <tr>
                                <th scope="row">Procesor</th>
                                <td scope="col"><?=$row['processor']?> <?=$row['model_processor']?></td>                
                            </tr>
                            <tr>
                                <th scope="row">RAM</th>
                                <td scope="col"><?=$row['ram']?></td>                
                            </tr>
                            <tr>
                                <th scope="row">Hard disk</th>
                                <td scope="col"><?=$row['hard_disc']?></td>                
                            </tr>
                            <tr>
                                <th scope="row">Grafička kartica</th>
                                <td scope="col"><?=$row['graphic_card']?> <?=$row['model_graphic_card']?></td>                
                            </tr>
                            <tr>
                                <th scope="row">Operacijski sustav</th>
                                <td scope="col"><?=$row['os']?></td>                
                            </tr>
                            <tr>
                                <th scope="row">Težina</th>
                                <td scope="col"><?=$row['weight']?></td>                
                            </tr>
                            <tr>
                                <th scope="row">Garancija</th>
                                <td scope="col"><?=$row['guarantee']?> godine</td>                
                            </tr>
                            <tr>
                                <th scope="row">Cijena</th>
                                <td scope="col"><?=$row['price']?> KM</td>                
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> 
    <div class="jumbotron">
        <div class="row">
            <div class="col-md-4">
                <img src="assets/logo/logo-ls.png" alt="" srcset="">
            </div>
            <div class="col-md-4">
                <h4>Informacije</h4>
                <a href="about.html">O nama</a><br>
                <a href="">Kontakt</a><br>
                <a href="">Zašto kupiti kod nas?</a>
            </div>
            <div class="col-md-4">
                <h4>Pratite nas na društvenim mrežama</h4>
                <a href="https://www.facebook.com/"><img src="assets/logo/facebook-log.png" alt=""></a>
                <a href="https://www.instagram.com/"><img src="assets/logo/instagram.png" alt=""></a>

            </div>
        </div>
    </div>
    <div class="items-wrapper">
        <div class="container">
            <img src="assets/logo/maestro.png" alt="">
            <img src="assets/logo/visa.png" alt="">
            <img src="assets/logo/discover.jpg" alt="">
            <img src="assets/logo/diners.jpg" alt="">
            <img src="assets/logo/PayWeb e-kupovina_logo_v3.jpg" alt="">
        </div>
    </div>
    <footer>
        <div class="copyright">2020 © Laptops Shop</div>
    </footer>
    
    <script src="main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    
</body>
</html>