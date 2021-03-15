<?php
    include("../model/db.php");
    $limit=12;
    $page=isset($_GET['page']) ? $_GET['page']:1;
    $start =($page -1) * $limit;
    $result=$conn->query("SELECT * FROM products ORDER BY brand LIMIT $start,$limit ");
    $products=$result->fetch_all(MYSQLI_ASSOC);

    $result1=$conn->query("SELECT count(ID) as ID FROM products ");
    $prodCount=$result1->fetch_all(MYSQLI_ASSOC);
    $total=$prodCount[0]['ID'];
    $pages=ceil($total/$limit);
    if($page<=1){
        $previous=1;
    }else{
        $previous=$page-1;
    }

    if($pages<=$page){
        $next=$pages;
    }else{
        $next=$page+1;
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href='../assets/logo/ls-icon.png'>
    <title>Laptops Shop</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/47f0b88d10.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="../css/stylee.css">
    

</head>

<body>
    <header>
        <div class="box-first">
            <div class="log-reg">
                <button type="button" class="btn btn-light btn-sm"><a href="login.php">Prijavi se</button>
                <button type="button" class="btn btn-light btn-sm"><a href="registration.php">Registriraj se</a></button>
            </div>
            <div class="search-box">
                <input type="text" class="searchInput"placeholder="Search..." value="">
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-search" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"/>
                    <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
                </svg>
            </div>
            <div class="admin-log">
                <a>
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-lines-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm7 1.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm2 9a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5z"/>
                    </svg>
                </a>
            </div>
        </div>
        <div class="box-second">
            <div class="logo">
                <a href="index.php"><i class="logo-ls"></i></a>
            </div>
            <nav class="navigation">
                <ul>
                    <li>
                        <a href="index.php?page=1"><img src="assets/images/acer_test.svg" alt=""></a>
                    </li>
                    <li>
                        <a href="index.php?page=2"><img src="assets/images/asus_test.jpg" alt=""></a>
                    </li>
                    <li>
                        <a href="index.php?page=3"><img src="assets/images/dell_test.svg" alt=""></a>
                    </li>
                    <li>
                        <a href="index.php?page=4"><img src="assets/images/hp_test.svg" alt=""></a>
                    </li>
                    <li>
                        <a href="index.php?page=5"><img src="assets/images/lenovo_test.svg" alt=""></a>
                    </li>
                </ul>
            </nav>
            <div class="search-shopping-box">
                <a href="#">
                    <i class="fa fa-shopping-cart mt-4 mr-4"  style='font-size:30px;color:#005DA4;'><span id="cart-item" class="badge badge-danger"style="width:20px;height:20px;font-size:14px;">0</span></i>
                </a>
            </div>
        </div>

        <div class="box-second-smaller">
            <div class="menu" onclick="myFunction(this)">
                <div class="bar1 "></div>
                <div class="bar2 "></div>
                <div class="bar3 "></div>
            </div>
            <div class="logo">
                <a href="index.php"><i class="logo-ls "></i></a>
            </div>
            <div class="search-shopping-box ">
                <a href="#">
                    <i class="fa fa-shopping-cart mt-4 mr-4"  style='font-size:30px;color:#005DA4;'><span id="cart-item" class="badge badge-danger"style="width:20px;height:20px;font-size:14px;">0</span></i>
                </a>
            </div>
        </div>
        <div id="menu-box-smaller">
            <nav class="navigation ">
                <ul>
                    <li>
                        <a href="public/index.php?page=1"><img src="assets/images/acer_test.svg" alt=""></a>
                    </li>
                    <li>
                        <a href="index.php?page=2"><img src="assets/images/asus.png" alt=""></a>
                    </li>
                    <li>
                        <a href="index.php?page=3"><img src="assets/images/dell_test.svg" alt=""></a>
                    </li>
                    <li>
                        <a href="index.php?page=4"><img src="assets/images/hp_test.svg" alt=""></a>
                    </li>
                    <li>
                        <a href="index.php?page=5"><img src="assets/images/lenovo_test.svg" alt=""></a>
                    </li>
                </ul>
            </nav>
        </div>

        <div class="box-second-smallest">
            <div class="menu" onclick="myFunctionSec(this)">
                <div class="bar1 "></div>
                <div class="bar2 "></div>
                <div class="bar3 "></div>
            </div>
            <div class="logo ">
                <a href="index.php"><i class="logo-ls "></i></a>
            </div>
            <div class="search-shopping-box">
                <a href="#">
                    <i class="fa fa-shopping-cart mt-4 mr-4"  style='font-size:30px;color:#005DA4;'><span id="cart-item" class="badge badge-danger"style="width:20px;height:20px;font-size:14px;">0</span></i>
                </a>

            </div>

        </div>
        <div id="menu-box-smallest">
            <nav class="navigation ">
                <ul>
                    <li>
                        <a href="index.php?page=1"><img src="assets/images/acer_test.svg" alt=""></a>
                    </li>
                    <li>
                        <a href="index.php?page=2"><img src="assets/images/asus.png" alt=""></a>
                    </li>
                    <li>
                        <a href="index.php?page=3"><img src="assets/images/dell_test.svg" alt=""></a>
                    </li>
                    <li>
                        <a href="index.php?page=4"><img src="assets/images/hp_test.svg" alt=""></a>
                    </li>
                    <li>
                        <a href="index.php?page=5"><img src="assets/images/lenovo_test.svg" alt=""></a>
                    </li>
                    
                </ul>
            </nav>
        </div>
    </header>
    <div class="main">
        <div class="animate-text">
            <p><span></span></p>
        </div>  
        <div class="container container-fluid">
            <div class="row productsSec">

            </div>
            <div class="row products">
                <?php
                    foreach($products as $product):
                ?>
                <div class="col-md col-sm-6 mt-5" >
                    <div class="card shadow p-1  bg-white rounded" style="width:15rem; height:27rem;margin-left: auto;margin-right: auto;">
                        <img src="../<?=$product['image'];?>" class="card-img-top" style="width:95%;"alt="...">
                        <div class="card-body">
                            <h5 class="card-title text-center" style="color:#005DA4;font-size:17px;">
                                <?php echo($product['brand']. " " .$product['model']);?>
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
                    </div>
                </div>           
                <?php endforeach ?>
                <div class="col-12">
                <nav aria-label="Page navigation example" style="margin-top:50px;display:flex;">
                    <ul class="pagination" style="margin:0 auto 0 auto;">
                        <li class="page-item "><a class="page-link" href="index.php?page=<?= $previous; ?>"><span aria-hidden="true">&laquo;</span></a></li>
                        <?php for($i=1;$i<=$pages;$i++):?>
                        <li class="page-item"><a class="page-link" href="index.php?page=<?= $i; ?>"><?= $i; ?></a></li>
                        <?php endfor;?>
                        <li class="page-item"><a class="page-link" href="index.php?page=<?= $next; ?>"><span aria-hidden="true">&raquo;</span></a></li>
                    </ul>
                </nav>
                </div>
            </div>
        </div>
        
    </div>
    <div class="jumbotron">
        <div class="row">
            <div class="col-md-4">
                <img src="assets/logo/logo-ls.png">
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
    <script src="../main.js"></script>
    <script>
        $(document).ready(function(){
            
            $('.searchInput').keyup(function(e){               
                if(e.keyCode == 13){
                    var value=$(this).val();
                    if(value.length== 0){
                        location.reload();
                    }
                    $(".products").hide();
                    $.ajax({
                        url:'search.php',
                        method:"POST",
                        data:{value:value},
                        success:function(response){
                            $(".productsSec").html(response);
                        }
                    });
                }
                
                
            });
        });
    </script>
</body>

</html>