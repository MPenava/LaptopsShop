<?php
session_start();
include("model/db.php"); 
include("model/user.class.php"); 
include("model/product.class.php"); 
if (!User::jePrijavljen()) header("Location: login.php");

$prijavljeni_korisnik = User::$prijavljeniKorisnik;
if($prijavljeni_korisnik["typeOfUser"] !='superadministrator'){
    header("Location:login.php");
}

$sql="SELECT * FROM users";
$results=mysqli_query($conn,$sql);
$users=$results->fetch_all(MYSQLI_ASSOC);

$sql="SELECT * FROM products";
$results=mysqli_query($conn,$sql);
$products=$results->fetch_all(MYSQLI_ASSOC);

$sql="SELECT * FROM orders";
$results=mysqli_query($conn,$sql);
$orders=$results->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href='assets/logo/ls-icon.png'>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Laptops Shop</title>
    <link rel="stylesheet" href="css/dashboard.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
    <script src="https://kit.fontawesome.com/47f0b88d10.js"></script>
    
</head>

<body>
    <!--Add New User Modal-->  
    <div class="modal" tabindex="-1" role="dialog" id="addNewUser">
        <div class="modal-dialog modal-dialog-centered" role="document" style="width:300px;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-primary">Dodavanje korisnika</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="users/add.php" method="POST" >
                    <div class="modal-body">
                        <div class="row mb-1">
                            <div class="form-group col ">
                                <input type="text" name="firstName"  class="form-control form-control-sm" placeholder="Ime" required>
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="form-group col ">
                                <input type="text" name="lastName"  class="form-control form-control-sm" placeholder="Prezime" required>                           
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="form-group col ">
                                <input type="text" name="address"  class="form-control form-control-sm" placeholder="Adresa" required>                           
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="form-group col ">
                                <input type="text" name="phone"  class="form-control form-control-sm" placeholder="Telefon" required>                           
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="form-group col">
                                <input type="email" name="email"  class="form-control form-control-sm" placeholder="E-mail" required>
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="form-group col">
                                <input type="password" name="password"  class="form-control form-control-sm" placeholder="Lozinka" required>
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="form-group col">
                                <label>Uloga korisnika:</label>
                                <select class="form-control" name="typeOfUser" required>
                                    <option value="korisnik">Korisnik</option>
                                    <option value="administrator">Administrator</option>
                                    <option value="superadministrator">Superadministrator</option>
                                </select>
                            </div>
                        </div>
                        <hr>
                        <div class="mr-2 pb-3"style="float:right;">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Zatvori</button>
                            <button type="submit" name="insertdata" class="btn btn-primary">Spremi</button>                        
                        </div>
                    
                    </div>
                </form>                
            </div>
        </div>
    </div>
    <div class="modal" tabindex="-1" role="dialog" id="deleteWarning">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-danger">Upozorenje!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <div class="modal-body">
                <p class="text-primary">Da li ste sigurni da želite izbrisati korisnika?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Ne</button>
                <a href="#" id="modalDelete" class="btn btn-primary">Da</a>
            </div>
        </div>
    </div>    
</div>
    <!--Edit Modal-->
    <div class="modal" tabindex="-1" role="dialog" id="editmodal">
        <div class="modal-dialog modal-dialog-centered" role="document" style="width:300px;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-primary">Uređivanje korisnika</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="users/update.php" method="POST" >
                    <div class="modal-body">
                        <div class="row mb-1">
                            <div class="form-group col ">
                            <input type="hidden" name="update_id" id="update_id">
                                <input type="text" name="firstName" id="firstName" class="form-control form-control-sm" placeholder="Ime" required>
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="form-group col ">
                                <input type="text" name="lastName" id="lastName" class="form-control form-control-sm" placeholder="Prezime" required>                           
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="form-group col ">
                                <input type="text" name="address" id="address" class="form-control form-control-sm" placeholder="Adresa" required>                           
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="form-group col ">
                                <input type="text" name="phone" id="phone" class="form-control form-control-sm" placeholder="Telefon" required>                           
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="form-group col">
                                <input type="email" name="email" id="email" class="form-control form-control-sm" placeholder="E-mail" required>
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="form-group col">
                                <input type="password" name="password" id="password" class="form-control form-control-sm" placeholder="Lozinka" required>
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="form-group col">
                                <label>Uloga korisnika:</label>
                                <select class="form-control" name="typeOfUser" required>
                                    <option value="korisnik">Korisnik</option>
                                    <option value="administrator">Administrator</option>
                                    <option value="superadministrator">Superadministrator</option>
                                </select>
                            </div>
                        </div>
                        <hr>
                        <div class="mr-2 pb-3"style="float:right;">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Zatvori</button>
                            <button type="submit" name="updatedata" class="btn btn-primary">Spremi</button>                        
                        </div>
                    
                    </div>
                </form>                
            </div>
        </div>
    </div>
    <nav class="navbar navbar-dark bg-primary fixed-top flex-md-nowrap p-0 shadow">
            <a class="navbar-brand col-sm-3 col-md -2 mr-0" href="#">Laptops Shop</a>
            <div class="dropdown" style="right:20px;">
                <div class="dropdown-toggle align-center valign-center" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php echo ($prijavljeni_korisnik["firstName"]. " ".$prijavljeni_korisnik["surName"]);?>
                    <svg width="1.6em" height="1.6em" viewBox="0 0 16 16" class="bi bi-person-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path d="M13.468 12.37C12.758 11.226 11.195 10 8 10s-4.757 1.225-5.468 2.37A6.987 6.987 0 0 0 8 15a6.987 6.987 0 0 0 5.468-2.63z"/>
                        <path fill-rule="evenodd" d="M8 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                        <path fill-rule="evenodd" d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1zM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8z"/>
                    </svg>
                </div>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-fill mr-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                        </svg> Profil
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
    </nav>
    <div class="container-fluid" style="position:relative;top:40px;">
        <div class="row">
            <div class="col-md-2 bg-light d-none d-md-block sidebar">
                <div class="left-sidebar">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="#pregled">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bookmarks-fill" viewBox="0 0 16 16">
                                <path d="M2 4a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v11.5a.5.5 0 0 1-.777.416L7 13.101l-4.223 2.815A.5.5 0 0 1 2 15.5V4z"/>
                                <path d="M4.268 1A2 2 0 0 1 6 0h6a2 2 0 0 1 2 2v11.5a.5.5 0 0 1-.777.416L13 13.768V2a1 1 0 0 0-1-1H4.268z"/>
                            </svg>
                            Pregled sustava
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#korisnici">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                                <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                <path fill-rule="evenodd" d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z"/>
                                <path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"/>
                            </svg>
                            Korisnici
                        </a>
                    </li>
                    <li class="nav-item">
                            <a type="button" class="nav-link text-primary" data-toggle="modal" data-target="#addNewUser">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cloud-upload-fill" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M8 0a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 4.095 0 5.555 0 7.318 0 9.366 1.708 11 3.781 11H7.5V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V11h4.188C14.502 11 16 9.57 16 7.773c0-1.636-1.242-2.969-2.834-3.194C12.923 1.999 10.69 0 8 0zm-.5 14.5V11h1v3.5a.5.5 0 0 1-1 0z"/>
                                </svg>
                                Dodavanje korisnika
                            </a>
                    </li>  
                    <li class="nav-item">
                        <a class="nav-link" href="#proizvodi">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard" viewBox="0 0 16 16">
                                <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z"/>
                                <path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z"/>
                            </svg>
                            Proizvodi
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#narudzbe">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
                                <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
                            </svg>
                            Narudžbe
                        </a>
                    </li>
                    
                </ul>
                </div>
            </div>
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <div class="container">
                    <div class="card mt-5" id="pregled" style="scroll-margin-top:80px;">
                        <h5 class="card-header bg-primary" style="color:white;" >Pregled sustava</h5>
                        <div class="card-body">
                            <div class="container">
                                <div class="row" style="width:70%; margin:auto;">
                                    <div class="col-md-4">
                                        <div class="box" style="margin:0 auto;">
                                            <h2 style="color:gray;">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" fill="currentColor" class="bi bi-people-fill mr-1" viewBox="0 0 16 16">
                                                    <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                                    <path fill-rule="evenodd" d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z"/>
                                                    <path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"/>
                                                </svg>
                                                <?php 
                                                    $sql="SELECT COUNT(*) as total FROM users";
                                                    $result = mysqli_query($conn, $sql);
                                                    $usersCount= mysqli_fetch_assoc($result);
                                                    echo ($usersCount['total']);
                                                ?>
                                            </h2>
                                            <h4 style="color:gray;">Korisnici</h4>                            
                                        </div>
                                    </div>
                                    <div class="col-md-4 ">
                                        <h2 style="color:gray;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" fill="currentColor" class="bi bi-clipboard" viewBox="0 0 16 16">
                                                <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z"/>
                                                <path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z"/>
                                            </svg>
                                            <?php 
                                                $sql="SELECT COUNT(*)as total FROM products ";
                                                $result = mysqli_query($conn, $sql);
                                                $productsCount= mysqli_fetch_assoc($result);
                                                echo ($productsCount['total']);
                                            ?>
                                        </h2>
                                        <h4 style="color:gray;">Proizvodi</h4>                            
                                    </div>
                                    <div class="col-md-4">
                                        <h2 style="color:gray;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
                                                <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
                                            </svg>
                                            <?php 
                                                $sql="SELECT COUNT(*)as total FROM orders ";
                                                $result = mysqli_query($conn, $sql);
                                                $productsCount= mysqli_fetch_assoc($result);
                                                echo ($productsCount['total']);
                                            ?>
                                        </h2>
                                        <h4 style="color:gray;">Narudžbe</h4>                            
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="card mt-5" id="korisnici" style="scroll-margin-top:80px;">
                        <h5 class="card-header bg-primary" style="color:white;">Korisnici</h5>
                        <div class="card-body" style="overflow-x:auto;">                         
                            <table class="table">
                                <thead class="thead-light ">
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Ime</th>
                                        <th scope="col">Prezime</th>
                                        <th scope="col">Adresa</th>
                                        <th scope="col">Telefon</th>
                                        <th scope="col">E-mail</th>
                                        <th scope="col">Vrsta korisnika</th>
                                        <th scope="col">Akcije</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        foreach($users as $user):
                                    ?>
                                    <tr>
                                        <td><?=$user['ID']?></td>
                                        <td><?=$user['firstName']?></td>
                                        <td><?=$user['surName']?></td>
                                        <td><?=$user['address']?></td>
                                        <td><?=$user['phone']?></td>
                                        <td><?=$user['email']?></td>
                                        <td><?=$user['typeOfUser']?></td>
                                        <td>
                                            <a href="#" class="btn btn-success btn-sm rounded-pill editbtn mb-1" title="Uređivanje profila">Uredi</a>
                                            <a  type="button" title="Brisanje profila" class="btn btn-danger btn-sm rounded-pill text-white delete-product" data-toggle="modal" data-id="<?= $user["ID"] ?>" data-target="#deleteWarning">Izbriši</a>
                                        </td>
                                    </tr>
                                    <?php endforeach?>
                                </tbody>
                            </table>    
                        </div>
                    </div> 
                    <div class="card mt-5" id="proizvodi" style="scroll-margin-top:80px;">
                        <h5 class="card-header bg-primary" style="color:white;">Proizvodi</h5>
                        <div class="card-body" style="overflow-x:auto;">                                       
                            <table class="table table-responsive">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Slika</th>
                                        <th scope="col">Ime laptopa</th>
                                        <th scope="col">RAM</th>
                                        <th scope="col">Procesor</th>
                                        <th scope="col">Memorija</th>
                                        <th scope="col">Cijena</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        foreach($products as $product):
                                    ?>
                                    <tr>
                                        <td class="align-middle text-center"><?=$product['ID']?></td>
                                        <td class="align-middle text-center"><img src="<?=$product['image']?>" alt="" style="width:70px;height:70px;"></td>
                                        <td class="align-middle text-center"><?=$product['brand']?><?=$product['model']?></td>
                                        <td class="align-middle text-center"><?=$product['ram']?></td>
                                        <td class="align-middle text-center"><?=$product['processor']?> <?=$product['model_processor']?></td>
                                        <td class="align-middle text-center"><?=$product['hard_disc']?></td>
                                        <td class="align-middle text-center"><?=$product['price']?> KM</td>
                                    </tr>
                                    <?php endforeach?>
                                </tbody>
                            </table>    
                        </div>                    
                    </div>   
                </div>
                <div class="card mt-5 mb-3" id="narudzbe" style="scroll-margin-top:80px;">
                        <h5 class="card-header bg-primary" style="color:white;">Narudžbe</h5>
                        <div class="card-body" style="overflow-x:auto;">                                       
                            <table class="table table-responsive">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col" class="align-middle text-center">ID</th>
                                        <th scope="col" class="align-middle text-center">Datum i vrijeme</th>
                                        <th scope="col" class="align-middle text-center">Ime i prezime kupca</th>
                                        <th scope="col" class="align-middle text-center">Adresa</th>
                                        <th scope="col" class="align-middle text-center">Telefon</th>
                                        <th scope="col" class="align-middle text-center">Proizvodi(količina)</th>
                                        <th scope="col" class="align-middle text-center">Cijena</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        foreach($orders as $order):
                                    ?>
                                    <tr>
                                        <td class="align-middle text-center"><?=$order['ID']?></td>
                                        <td class="align-middle text-center"><?=$order['orderDate']?></td>
                                        <?php
                                            
                                            $sql="SELECT firstName,surName,address, phone FROM users WHERE ID=".$order['userId'];
                                            $results=mysqli_query($conn,$sql);
                                            $user=$results->fetch_row();
                                        ?>
                                        <td class="align-middle text-center"><?php echo $user[0] . " " . $user[1]?></td>
                                        <td class="align-middle text-center"><?php echo $user[2]?></td>
                                        <td class="align-middle text-center"><?php echo $user[3]?></td>
                                        <td class="align-middle text-center"><?=$order['products']?></td>
                                        <td class="align-middle text-center"><?=$order['price']?> KM</td>
                                    </tr>
                                    <?php endforeach?>
                                </tbody>
                            </table>    
                        </div>                    
                    </div>   
                </div>

            </main>
        
        </div>
    </div>  
    <script>
        $(document).ready(function(){
            $('#deleteWarning').on('show.bs.modal', function(e) {
                var id = $(e.relatedTarget).data('id');
                $('#modalDelete').attr('href', 'users/delete.php?id=' + id);
            });
            $('.editbtn').on('click',function(){
                $('#editmodal').modal('show');
                $tr=$(this).closest('tr');
                var data=$tr.children("td").map(function(){
                    return $(this).text();
                }).get();
                console.log(data);
                $("#update_id").val(data[0]);
                $("#firstName").val(data[1]);
                $("#lastName").val(data[2]);
                $("#address").val(data[3]);
                $("#phone").val(data[4]);
                $("#email").val(data[5]);
                $("#password").val(data[6]);
                $("#typeOfUser").val(data[7]);
            });

        });
    
    </script>  
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="main.js"></script>
</body>
</html>