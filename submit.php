<?php
require "db.php";
session_start(); 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>submit Le jardin vert blog</title>

    <!-- Favicon -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <!-- Preloader -->
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="spinner">
            <div class="double-bounce1"></div>
            <div class="double-bounce2"></div>
        </div>
    </div>

    <!-- ##### Header Area Start ##### -->
    <header class="header-area">

<!-- Navbar Area -->
<div class="mag-main-menu" id="sticker">
    <div class="classy-nav-container breakpoint-off">
        <!-- Menu -->
        <nav class="classy-navbar justify-content-between" id="magNav">

            <!-- Nav brand -->
            
            <a href="index.php" class="nav-brand"><img src="img/green leaves.png" width="60" alt="Le jardin Vert "><span style="color:#a7c94d; font-size:.8rem; font-weight: bolder;">Le jardin Vert</span></a>              <!-- Navbar Toggler -->
            <div class="classy-navbar-toggler">
                <span class="navbarToggler"><span></span><span></span><span></span></span>
            </div>

            <!-- Nav Content -->
            <div class="nav-content d-flex align-items-center">
                <div class="classy-menu">

                    <!-- Close Button -->
                    <div class="classycloseIcon">
                        <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                    </div>

                    <!-- Nav Start -->
                    <div class="classynav">
                                    <ul>
                                        <li class="active"><a href="index.php">Home</a></li>
                                        <li><a href="single-post.php">Create Article</a></li>
                                        <li><a href="#">Pages</a>
                                            <ul class="dropdown">
                                                <li><a href="index.php">Home</a></li>
                                                <li><a href="archive.php">Admin</a></li>
                                                <li><a href="single-post.php">Create Article</a></li>
                                                <li><a href="about.php">About Us</a></li>
                                                <li><a href="contact.php">Contact</a></li>
                                                <li><a href="submit.php">Submit</a></li>
                                                <li><a href="login.php">Login</a></li>
                                            </ul>
                                            </li>
                                        <?php
                                        $sqlCat="SELECT * FROM `categories` ORDER BY `id_categories` ASC";
                                         $resultCat=mysqli_query($connection,$sqlCat);
                                         ?>
                                         <?php
                                          
                                           ?>
                                      <li><a href="#">CATEGORIES</a>
                                      <div class="megamenu">
                                       <?php

                                         while($row=mysqli_fetch_array($resultCat)){
                                            $idcat=$row['id_categories'];
                                            $sqlSel="SELECT titre from articles a inner join categories c on a.id_categories=c.id_categories WHERE a.id_categories=$idcat";
                                            $reslutSel=mysqli_query($connection,$sqlSel);
                                                ?>
                                                <ul class="single-mega cn-col-5">
                                                    <li><a href="#"><?php echo $row['nom_categorie']; ?></a></li>
                                                    <input type=hidden value=<?php $idcat; ?> >
                                                    <?php
                                                    while($row=mysqli_fetch_array($reslutSel)){
                                                        ?>
                                                    <li><a href="#"><?php echo $row['titre']; ?></a></li>
                                                    <?php
                                                    }
                                                    ?>
                                                </ul>

                                                 <?php 
                                         }
                                                 ?>
                                            
                                            </div>     
                                            
                                        </li>
                                        <li><a href="about.php">About</a></li>
                                        <li><a href="contact.php">Contact</a></li>
                                    </ul>
                                </div>
                                <!-- Nav End -->
                </div>

                <div class="top-meta-data d-flex align-items-center">
                    <!-- Top Search Area -->
                    <div class="top-search-area">
                        <form action="index.php" method="post">
                            <input type="search" name="top-search" id="topSearch" placeholder="Search and hit enter...">
                            <button type="submit" class="btn"><i class="fa fa-search" aria-hidden="true"></i></button>
                        </form>
                    </div>
                    <!-- Login -->
                    <a href="login.php" class="login-btn"><i class="fa fa-user" aria-hidden="true"></i></a>
                    <!-- Submit Video -->
                    <a href="submit.php" class="submit-video"><span><i class="fa fa-cloud-upload"></i></span> <span class="video-text">Submit</span></a>
                </div>
            </div>
        </nav>
    </div>
</div>
</header>
    <!-- ##### Header Area End ##### -->

    <!-- ##### Breadcrumb Area Start ##### -->
    <section class="breadcrumb-area bg-img bg-overlay" style="background-image: url(img/bg-img/40.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <h2>Submit </h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Breadcrumb Area End ##### -->

    <!-- ##### Breadcrumb Area Start ##### -->
    <div class="mag-breadcrumb py-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Submit</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcrumb Area End ##### -->

    <!-- ##### Video Submit Area Start ##### -->
    <div class="video-submit-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-8">
                    <!-- Video Submit Content -->
                    <div class="video-submit-content mb-50 p-30 bg-white box-shadow">
                        <!-- Section Title -->
                        <div class="section-heading">
                            <h5>Submit your profil</h5>
                        </div>

                        <div class="video-info mt-30">
                            <form method="post" action="regist.php" enctype="multipart/form-data">
                                <div class="row">
                                             <div class="form-group col-md-6">
                                                 <input class="form-control" name="name" type="text"  placeholder="Nom">
                                             </div>
                                             <div class="form-group col-md-6">
                                               <input class="form-control" name="prenom" type="text" placeholder="Prenom">
                                            </div>
                                </div>
                                <div class="row">
                                             <div class="form-group col-md-6">
                                                <input class="form-control" name="pass" type="password" placeholder="Password" required>
                                             </div>
                                             <div class="form-group col-md-6">
                                                <input class="form-control" name="cpass" type="password" placeholder="Confirm Password">
                                             </div>
                                </div>
                                <div class="row">
                                             <div class="form-group col-md-6">
                                                <input class="form-control" name="uname" type="text"  placeholder="UserName">
                                             </div>
                                             
                                             <div class="form-group col-md-6">
                                                <input class="form-control" name="age" type="text"  placeholder="age">
                                             </div>
                                            
                                            <div class="form-group col-md-6">
                                               <input class="form-control" name="mail" type="email" placeholder="user@email.com">
                                            </div>
                                </div>
                                             
                                            <div class="form-group">
                                            <input class="btn btn-primary" name="Register" type="submit" value="Register">
                                            </div>
                            
                                </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Video Submit Area End ##### -->

   <!-- ##### Footer Area Start ##### -->
    <footer class="footer-area">
        <div class="container">
            <div class="row">
                <!-- Footer Widget Area -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="footer-widget">
                        <!-- Logo -->
                        <a href="index.php" class="nav-brand"><img src="img/green leaves.png" width="60" alt="Le jardin Vert "><span style="color:#a7c94d; font-size:1em; font-weight: bolder;">Le jardin Vert</span></a>                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        <div class="footer-social-info">
                            <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                            <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
                            <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
                            <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                            <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
                        </div>
                    </div>
                </div>
                
                <!-- Footer Widget Area -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="footer-widget">
                        <h6 class="widget-title">Categories</h6>
                        <nav class="footer-widget-nav">
                            <ul>
                                <li><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Life Style</a></li>
                                <li><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Tech</a></li>
                                <li><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Travel</a></li>
                                <li><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Music</a></li>
                                <li><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Foods</a></li>
                                <li><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Fashion</a></li>
                                <li><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Game</a></li>
                                <li><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Football</a></li>
                                <li><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Sports</a></li>
                                <li><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i> TV Show</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                
                <!-- Footer Widget Area -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="footer-widget">
                        <h6 class="widget-title">Sport Videos</h6>
                        <!-- Single Blog Post -->
                        <div class="single-blog-post style-2 d-flex">
                            <div class="post-thumbnail">
                                <img src="img/bg-img/12.jpg" alt="">
                            </div>
                            <div class="post-content">
                                <a href="single-post.html" class="post-title">Take A Romantic Break In A Boutique Hotel</a>
                                <div class="post-meta d-flex justify-content-between">
                                    <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> 34</a>
                                    <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 84</a>
                                    <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 14</a>
                                </div>
                            </div>
                        </div>
                        <!-- Single Blog Post -->
                        <div class="single-blog-post style-2 d-flex">
                            <div class="post-thumbnail">
                                <img src="img/bg-img/13.jpg" alt="">
                            </div>
                            <div class="post-content">
                                <a href="single-post.html" class="post-title">Travel Prudently Luggage And Carry On</a>
                                <div class="post-meta d-flex justify-content-between">
                                    <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> 34</a>
                                    <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 84</a>
                                    <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 14</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Footer Widget Area -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="footer-widget">
                        <h6 class="widget-title">Channels</h6>
                        <ul class="footer-tags">
                            <li><a href="#">Travel</a></li>
                            <li><a href="#">Fashionista</a></li>
                            <li><a href="#">Music</a></li>
                            <li><a href="#">DESIGN</a></li>
                            <li><a href="#">NEWS</a></li>
                            <li><a href="#">TRENDING</a></li>
                            <li><a href="#">VIDEO</a></li>
                            <li><a href="#">Game</a></li>
                            <li><a href="#">Sports</a></li>
                            <li><a href="#">Lifestyle</a></li>
                            <li><a href="#">Foods</a></li>
                            <li><a href="#">TV Show</a></li>
                            <li><a href="#">Twitter Video</a></li>
                            <li><a href="#">Playing</a></li>
                            <li><a href="#">clips</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Copywrite Area -->
        <div class="copywrite-area">
            <div class="container">
                <div class="row">
                    <!-- Copywrite Text -->
                    <div class="col-12 col-sm-6">
                        <p class="copywrite-text"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                    </div>
                    <div class="col-12 col-sm-6">
                        <nav class="footer-nav">
                            <ul>
                                <li><a href="#">Home</a></li>
                                <li><a href="#">Privacy</a></li>
                                <li><a href="#">Advertisement</a></li>
                                <li><a href="#">Contact Us</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ##### Footer Area End ##### -->

    <!-- ##### All Javascript Script ##### -->
    <!-- jQuery-2.2.4 js -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/bootstrap/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <!-- All Plugins js -->
    <script src="js/plugins/plugins.js"></script>
    <!-- Active js -->
    <script src="js/active.js"></script>
</body>

</html>