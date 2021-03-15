<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href='../assets/logo/ls-icon.png'>
    <title><?php echo($naslov)?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/47f0b88d10.js"></script>
    <link rel="stylesheet" href="css/stylee.css">
</head>

<body>
    <header>
        <div class="box-first">
            <div class="log-reg">
                <button type="button" class="btn btn-light btn-sm"><a href="login.php">Prijavi se</button>
                <button type="button" class="btn btn-light btn-sm"><a href="registration.php">Registriraj se</a></button>
            </div>
            <div class="search-box">
                <input type="text" placeholder="Search...">
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
                        <a href=""><img src="assets/images/acer_test.svg" alt=""></a>
                    </li>
                    <li>
                        <a href=""><img src="assets/images/asus_test.jpg" alt=""></a>
                    </li>
                    <li>
                        <a href=""><img src="assets/images/dell_test.svg" alt=""></a>
                    </li>
                    <li>
                        <a href=""><img src="assets/images/hp_test.svg" alt=""></a>
                    </li>
                    <li>
                        <a href=""><img src="assets/images/lenovo_test.svg" alt=""></a>
                    </li>
                </ul>
            </nav>
            <div class="search-shopping-box">
                <a href="card.php">
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
                <a href="card.php">
                    <i class="fa fa-shopping-cart mt-4 mr-4"  style='font-size:30px;color:#005DA4;'><span id="cart-item" class="badge badge-danger"style="width:20px;height:20px;font-size:14px;">0</span></i>
                </a>
            </div>
        </div>
        <div id="menu-box-smaller">
            <nav class="navigation ">
                <ul>
                    <li>
                        <a href="#"><img src="assets/images/acer_test.svg" alt=""></a>
                    </li>
                    <li>
                        <a href="#"><img src="assets/images/asus.png" alt=""></a>
                    </li>
                    <li>
                        <a href="#"><img src="assets/images/dell_test.svg" alt=""></a>
                    </li>
                    <li>
                        <a href="#"><img src="assets/images/hp_test.svg" alt=""></a>
                    </li>
                    <li>
                        <a href="#"><img src="assets/images/lenovo_test.svg" alt=""></a>
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
                <a href="card.php">
                    <i class="fa fa-shopping-cart mt-4 mr-4"  style='font-size:30px;color:#005DA4;'><span id="cart-item" class="badge badge-danger"style="width:20px;height:20px;font-size:14px;">0</span></i>
                </a>

            </div>

        </div>
        <div id="menu-box-smallest">
            <nav class="navigation ">
                <ul>
                    <li>
                        <a href="#"><img src="assets/images/acer_test.svg" alt=""></a>
                    </li>
                    <li>
                        <a href="#"><img src="assets/images/asus.png" alt=""></a>
                    </li>
                    <li>
                        <a href="#"><img src="assets/images/dell_test.svg" alt=""></a>
                    </li>
                    <li>
                        <a href="#"><img src="assets/images/hp_test.svg" alt=""></a>
                    </li>
                    <li>
                        <a href="#"><img src="assets/images/lenovo_test.svg" alt=""></a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>