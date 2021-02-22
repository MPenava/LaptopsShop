<?php
session_start();
include("model/db.php"); 
include("model/user.class.php"); 
include("model/product.class.php"); 
if (!User::jePrijavljen()) header("Location: login.php");

$prijavljeni_korisnik = User::$prijavljeniKorisnik;
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
    <script src="https://kit.fontawesome.com/47f0b88d10.js"></script>

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
                    <a class="dropdown-item" href="profile.php">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-fill mr-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                        </svg> Profil
                    </a>
                    <a class="dropdown-item" href="wishList.php">
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
            <div class="row justify-content-center">
                <div class="col-lg-10">
                <div  style="display:<?php if(isset($_SESSION["showAlert"])){echo $_SESSION["showAlert"];}else{echo 'none';}unset($_SESSION['showAlert']);?>" class="alert alert-success alert-dismissible mt-3">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong><?php if(isset($_SESSION["message"])){echo $_SESSION["message"];} unset($_SESSION['showAlert']);?></strong>
                </div>
                    <div class="table-responsive mt-4">
                        <table class="table table-bordered table-striped text-center">
                            <thead>
                                <tr>
                                    <td colspan="7"><h4 class="text-center text-primary m-0">Proizvodi u košarici!</h4></td>                 
                                </tr>
                                <tr>
                                    <th>ID</th>
                                    <th>Slika</th>
                                    <th>Proizvod</th>
                                    <th>Cijena</th>
                                    <th>Količina</th>
                                    <th>Ukupna cijena</th>
                                    <th>
                                        <a href="action.php?clear=all" class="badge-danger badge p-1" onclick="return confirm('Jeste li sigurni da želite isprazniti košaricu?');">
                                            <i class="fas fa-trash"></i>&nbsp;&nbsp;Ispraznite košaricu
                                        </a>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    require "model/db.php";
                                    $stmt=$conn->prepare("SELECT * FROM cart WHERE userId=?");
                                    $stmt->bind_param("i",$prijavljeni_korisnik["ID"]);
                                    $stmt->execute();
                                    $result=$stmt->get_result();
                                    $grand_total=0;
    
                                    while($row=$result->fetch_assoc()):
                                ?>
                                <tr>
                                    <td><?=$row["ID"]?></td>
                                    <input type="hidden" class="pid" value="<?=$row["ID"]?>">
                                    <td><img src="<?=$row["product_image"]?>" width="50"></td>
                                    <td><?= $row["product_name"]?></td>
                                    <td><i class="far fa-money-bill-alt"></i>&nbsp;&nbsp;<?= number_format($row["product_price"],2)?> BAM</td>
                                    <input type="hidden" class="pprice" value="<?= $row["product_price"]?>">
                                    <td><input type="number"  class="form-control itemQty" value="<?=$row["qty"]?>" style="width:75px;"></td>
                                    <td><i class="far fa-money-bill-alt"></i>&nbsp;&nbsp;<?= number_format($row["total_price"],2)?> BAM</td>
                                    <td>
                                        <a href="action.php?remove=<?= $row["ID"]?>" class="text-danger lead" onclick="return confirm('Jeste li sigurni da želite izbristi proizvod?')">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php $grand_total += $row['total_price'];?>
                                <?php endwhile?>
                                <tr>
                                    <td colspan="3">
                                        <a href="user-login.php" class="btn btn-success"><i class="fas fa-cart-plus"></i>&nbsp;&nbsp;Nastavite kupovati</a>
                                    </td>
                                    <td colspan="2"><b>Ukupna cijena</b></td>
                                    <td><b><i class="fas fa-money-bill-alt"></i>&nbsp;&nbsp;<?= number_format($grand_total,2)?> BAM</b></td>
                                    <td>
                                        <a href="checkout.php"  class="btn btn-primary  <?= ($grand_total>1)?"":"disabled";?>"><i class="far fa-credit-card"></i>&nbsp;&nbsp;Dovršite narudžbu</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div> 
    <?php include("static/footer.php");?>
    
    <script src="main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
            $(".itemQty").on("change",function(){
                var $el=$(this).closest("tr");
                var pid=$el.find(".pid").val();
                var pprice=$el.find(".pprice").val();
                var qty=$el.find(".itemQty").val();
                location.reload(true);
                $.ajax({
                    url:"action.php",
                    method:"post",
                    cache:false,
                    data:{qty:qty,pid:pid,pprice:pprice},
                    success:function(response){                      
                        console.log(response);
                    }
                });
            }); 
            
            load_cart_item_number();
            function load_cart_item_number(){
                $.ajax({
                    url:"action.php",
                    method:"get",
                    data:{cartItem:"cart_item"},
                    success:function(response){
                        $("#cart-item").html(response);
                    }
                });
            }
            
            $(".addItemBtn").click(function(e){
                e.preventDefault();
                var $form=$(this).closest(".form-submit");
                var pid=$form.find(".pid").val();
                var pname=$form.find(".pname").val();
                var pprice=$form.find(".pprice").val();
                var pimage=$form.find(".pimage").val();
                var user=<?=$prijavljeni_korisnik["ID"]?>;

                $.ajax({
                    url:"action.php",
                    method:"post",
                    data:{pid:pid,pname:pname,pprice:pprice,pimage:pimage,user:user},
                    success:function(response){
                        $("#message").html(response);
                        window.scrollTo(0,0);
                        load_cart_item_number();
                    }
                });

                load_cart_item_number();
                function load_cart_item_number(){
                    $.ajax({
                        url:"action.php",
                        method:"get",
                        data:{cartItem:"cart_item"},
                        success:function(response){
                            $("#cart-item").html(response);
                        }
                    });
                }
            });
            
            
        });
    </script>
</body>

</html>
    