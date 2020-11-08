<?php
    // session_start();
    // if(!isset($_SESSION['valid']) && $_SESSION['valid'] != true){
    //     header('location:regester.php');
    // } else {
    //     require_once 'connection.php';
    // }
    // $id = $_SESSION["id"];
    // $sql = "SELECT * FROM `user` where u_id =$id";
    // $stmt = $conn->query($sql);
    
    // $row = $stmt->fetch(PDO::FETCH_OBJ);
    //     $name = $row->u_name;
    //     $phone = $row->u_phone;
    //     $img = $row->u_image;
    //     $cover_img = $row->u_imgcover;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MeStore</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Rubik:700|Lalezar|Raleway">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
    <!--div lamm kol 7aga 34an ady al navbar lon 4faf-->
    <div class="intro">
        <header class="uppernav">
            <div class="container">
                <div class="row">
                    <span class="col "><b>Hello: </b>
                        <?php echo $name;?></span>
                    <span class="col text-right"><b>Phone: </b><?php echo "0" . $phone;?></span>
                </div>
                <hr>
            </div>
        </header>
        <nav class="navbar navbar-expand-lg navbar-light ">
            <div class="container">
                <a class="navbar-brand" href="#">MeStore</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active"><a class="nav-link" href="index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="profile.php">Profile</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Product</a></li>
                        <!-- <li class="nav-item"><a class="nav-link" href="#">Blog</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Portfolio</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">page</a></li> -->
                        <li class="nav-item"><a class="nav-link" href="logout.php">Log out</a></li>
                    </ul>
                    <ul class="navbar-nav links-search-cart">
                        <li class="nav-item d-none d-sm-block"><i class="fa fa-search fa-fw"></i></li>
                        <li class="nav-item d-none d-sm-block"><i class="fa fa-shopping-cart fa-fw"></i></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div><!--END DIV INTRO-->