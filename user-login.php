<?php
session_start();
include("model/db.php"); 
include("model/user.class.php"); 
include("model/product.class.php"); 
if (!User::jePrijavljen()) header("Location: login.php");

$prijavljeni_korisnik = User::$prijavljeniKorisnik;
if($prijavljeni_korisnik["typeOfUser"] !='korisnik'){
    header("Location:login.php");
}
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
                <div class="col-lg-3 first mt-3">
                    <h4 class="text-secondary align-center">Filter proizvoda</h4>
                    <hr>
                    <h6 class="text-primary">Brand</h6>
                    <ul class="list-group">
                        <?php
                            $sql="SELECT DISTINCT brand FROM products ORDER BY brand";
                            $results=$conn->query($sql);
                            while($product=$results->fetch_assoc()){
                        ?>
                        <li class="list-group-item">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input product_check" value="<?= $product['brand'];?>" id="brand"><?= $product['brand'];?>
                                </label>
                            </div>
                        </li>
                        <?php
                            }
                        ?>
                    </ul>
                    <hr>
                    <h6 class="text-primary">RAM</h6>
                    <ul class="list-group">
                        <?php
                            $sql="SELECT DISTINCT ram FROM products ORDER BY ram";
                            $results=$conn->query($sql);
                            while($product=$results->fetch_assoc()){
                        ?>
                        <li class="list-group-item">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input product_check" value="<?= $product['ram'];?>" id="ram"><?= $product['ram'];?>
                                </label>
                            </div>
                        </li>
                        <?php
                            }
                        ?>
                    </ul>
                    <hr>
                    <h6 class="text-primary">Procesor</h6>
                    <ul class="list-group">
                        <?php
                            $sql="SELECT DISTINCT processor FROM products ORDER BY processor";
                            $results=$conn->query($sql);
                            while($product=$results->fetch_assoc()){
                        ?>
                        <li class="list-group-item">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input product_check" value="<?= $product['processor'];?>" id="processor"><?= $product['processor'];?>
                                </label>
                            </div>
                        </li>
                        <?php
                            }
                        ?>
                    </ul>
                    <hr>
                    <h6 class="text-primary">Memorija</h6>
                    <ul class="list-group">
                        <?php
                            $sql="SELECT DISTINCT hard_disc FROM products ORDER BY hard_disc";
                            $results=$conn->query($sql);
                            while($product=$results->fetch_assoc()){
                        ?>
                        <li class="list-group-item">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input product_check" value="<?= $product['hard_disc'];?>" id="hard_disc"><?= $product['hard_disc'];?>
                                </label>
                            </div>
                        </li>
                        <?php
                            }
                        ?>
                    </ul>
                    <hr>
                    <h6 class="text-primary">Veličina</h6>
                    <ul class="list-group">
                        <?php
                            $sql="SELECT DISTINCT screen FROM products ORDER BY screen";
                            $results=$conn->query($sql);
                            while($product=$results->fetch_assoc()){
                        ?>
                        <li class="list-group-item">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input product_check" value="<?= $product['screen'];?>" id="screen"><?= $product['screen'];?>
                                </label>
                            </div>
                        </li>
                        <?php
                            }
                        ?>
                    </ul>
                    <hr>
                    <h6 class="text-primary">Grafička</h6>
                    <ul class="list-group">
                        <?php
                            $sql="SELECT DISTINCT graphic_card FROM products ORDER BY graphic_card";
                            $results=$conn->query($sql);
                            while($product=$results->fetch_assoc()){
                        ?>
                        <li class="list-group-item">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input product_check" value="<?= $product['graphic_card'];?>" id="graphic_card"><?= $product['graphic_card'];?>
                                </label>
                            </div>
                        </li>
                        <?php
                            }
                        ?>
                    </ul>
                    <hr>
                    <h6 class="text-primary">Operacijski sustav</h6>
                    <ul class="list-group">
                        <?php
                            $sql="SELECT DISTINCT os FROM products ORDER BY os";
                            $results=$conn->query($sql);
                            while($product=$results->fetch_assoc()){
                        ?>
                        <li class="list-group-item">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input product_check" value="<?= $product['os'];?>" id="os"><?= $product['os'];?>
                                </label>
                            </div>
                        </li>
                        <?php
                            }
                        ?>
                    </ul>
                </div>
                <div class="col-lg-3 second mt-3">
                    <nav class="navbar navbar-expand-lg">
                            
                        <button class="navbar-toggler" style="width:100%;height:3rem;background-color:#005DA4;outline:none;color:white;text-align:center;" type="button" data-toggle="collapse" data-target="#navbarsExample03" aria-controls="navbarsExample03" aria-expanded="false" aria-label="Toggle navigation">
                            Filter proizvoda
                        </button>
                        <div class="collapse navbar-collapse" id="navbarsExample03">
                            <ul class="navbar-nav mr-auto" style="background-color:rgb(230, 240, 237);">
                                <h6 class="text-primary ml-3 mt-2">Brand</h6>
                                <?php
                                    $sql="SELECT DISTINCT brand FROM products ORDER BY brand";
                                    $results=$conn->query($sql);
                                    while($product=$results->fetch_assoc()){
                                ?>
                                <li class="list-group-item" style="border:none;background-color:transparent;">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input product_check" value="<?= $product['brand'];?>" id="brand"><?= $product['brand'];?>
                                        </label>
                                    </div>
                                </li>
                                <?php
                                    }
                                ?>
                                <h6 class="text-primary ml-3">RAM</h6>
                            <?php
                                $sql="SELECT DISTINCT ram FROM products ORDER BY ram";
                                $results=$conn->query($sql);
                                while($product=$results->fetch_assoc()){
                            ?>
                            <li class="list-group-item" style="border:none;background-color:transparent;">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input product_check" value="<?= $product['ram'];?>" id="ram"><?= $product['ram'];?>
                                    </label>
                                </div>
                            </li>
                            <?php
                                }
                            ?>
                            <h6 class="text-primary ml-3">Procesor</h6>
                            <?php
                                $sql="SELECT DISTINCT processor FROM products ORDER BY processor";
                                $results=$conn->query($sql);
                                while($product=$results->fetch_assoc()){
                            ?>
                            <li class="list-group-item" style="border:none;background-color:transparent;">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input product_check" value="<?= $product['processor'];?>" id="processor"><?= $product['processor'];?>
                                    </label>
                                </div>
                            </li>
                            <?php
                                }
                            ?>
                            <h6 class="text-primary ml-3">Memorija</h6>
                            <?php
                                $sql="SELECT DISTINCT hard_disc FROM products ORDER BY hard_disc";
                                $results=$conn->query($sql);
                                while($product=$results->fetch_assoc()){
                            ?>
                            <li class="list-group-item" style="border:none;background-color:transparent;">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input product_check" value="<?= $product['hard_disc'];?>" id="hard_disc"><?= $product['hard_disc'];?>
                                    </label>
                                </div>
                            </li>
                            <?php
                                }
                            ?>
                            <h6 class="text-primary ml-3">Veličina ekrana</h6>
                            <?php
                                $sql="SELECT DISTINCT screen FROM products ORDER BY screen";
                                $results=$conn->query($sql);
                                while($product=$results->fetch_assoc()){
                            ?>
                            <li class="list-group-item" style="border:none;background-color:transparent;">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input product_check" value="<?= $product['screen'];?>" id="screen"><?= $product['screen'];?>
                                    </label>
                                </div>
                            </li>
                            <?php
                                }
                            ?>
                            <h6 class="text-primary ml-3">Grafička</h6>
                            <?php
                                $sql="SELECT DISTINCT graphic_card FROM products ORDER BY graphic_card";
                                $results=$conn->query($sql);
                                while($product=$results->fetch_assoc()){
                            ?>
                            <li class="list-group-item" style="border:none;background-color:transparent;">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input product_check" value="<?= $product['graphic_card'];?>" id="graphic_card"><?= $product['graphic_card'];?>
                                    </label>
                                </div>
                            </li>
                            <?php
                                }
                            ?>
                            <h6 class="text-primary ml-3">Operacijski sustav</h6>
                            <?php
                                $sql="SELECT DISTINCT os FROM products ORDER BY os";
                                $results=$conn->query($sql);
                                while($product=$results->fetch_assoc()){
                            ?>
                            <li class="list-group-item" style="border:none;background-color:transparent;">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input product_check" value="<?= $product['os'];?>" id="os"><?= $product['os'];?>
                                    </label>
                                </div>
                            </li>
                            <?php
                                }
                            ?>
                            </ul>
                        </div>
                    </nav>                    
                </div>          
                <div class="col-lg-9 mt-3">
                    <h4 class="text-secondary align-center" id="textChange"style="text-align:center;">Svi proizvodi</h4>
                    <hr>
                    <div class="text-center">
                        <img src="assets/images/loader.gif" alt="" id="loader" width="200" style="display:none;">
                    </div>
                    
                    <div class="row mt-5" id="result">
                        <div class="col-lg-12" id="message"></div>
                        <?php
                            foreach(Product::getProducts() as $product):
                        ?>
                        <div class="col-lg-4 col-md-6 col-sm-6  mb-5">
                            <div class="card shadow p-1  bg-white rounded" style="width:15rem; height:30rem;margin-left: auto;margin-right: auto;">
                                <img src="<?=$product['image'];?>" class="card-img-top" style="width:95%;"alt="...">
                                <div class="card-body">
                                    <h5 class="card-title text-center" style="color:#005DA4;font-size:17px;">
                                        <a href="product-profile.php?id=<?=$product['ID']?>"><?php echo($product['brand']. " " .$product['model']);?></a>
                                    </h5>
                                    <p class="card-text">
                                        <ul style="list-style-type:square;font-size:12px;color:gray;" >
                                            <li class="ml-3"><?=$product['processor'] ?></li>
                                            <li class="ml-3"><?=$product['ram'] ?></li>
                                            <li class="ml-3"><?=$product['hard_disc'] ?></li>
                                            <li class="ml-3"><?php echo($product['graphic_card'] . " " . $product['model_graphic_card']);?></li>
                                        </ul>
                                        <p class="text-center font-italic"style="color:red;text-decoration:underline; "><?php echo($product['price']." BAM"); ?></p>
                                    </p>
                                </div>
                                <div class="card-footer">
                                    <form class="form-submit">
                                        <input type="hidden" class="pid" value="<?=$product['ID'] ?>">
                                        <input type="hidden" class="pname" value="<?=$product['brand'] ?> <?=$product['model'] ?>">
                                        <input type="hidden" class="pprice" value="<?=$product['price'] ?>">
                                        <input type="hidden" class="pimage" value="<?=$product['image'] ?>">
                                        
                                        <button class="btn btn-primary btn-block addItemBtn"><i class="fas fa-cart-plus"></i>&nbsp;&nbsp;Dodaj u košaricu</button>
                                    </form>
                                </div>
                            </div>
                            
                        </div>
                        <?php endforeach?>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
    <?php include("static/footer.php");?>
    <script>
        $(document).ready(function(){ 
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
            $(".product_check").click(function(){
                $("#loader").show();
                var action='data';
                var brand=get_filter_text('brand');
                var ram=get_filter_text('ram');
                var processor=get_filter_text('processor');
                var hard_disc=get_filter_text('hard_disc');
                var screen=get_filter_text('screen');
                var graphic_card=get_filter_text('graphic_card');
                var os=get_filter_text('os');
                $.ajax({                              
                    url:'action.php',
                    method:'POST',
                    data:{action:action,brand:brand,ram:ram,processor:processor,hard_disc,graphic_card:graphic_card,screen:screen,os:os},
                    success:function(response){
                        $("#result").html(response);
                        $("#loader").hide();
                        $("#textChange").text("Filtrirani proizvodi");
                    }
                });
            });
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
            function get_filter_text(text_id){
                var filterData=[];
                $('#'+ text_id + ':checked').each(function(){
                    filterData.push($(this).val());
                });
                return filterData;
            }
        });
    </script>
    <script src="main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    
</body>

</html>
    