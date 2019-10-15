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
    <title>
    Blog: Le jardin vert --- user:
    <?php if (isset($_SESSION['uname'])) {
       echo $_SESSION['uname']; 
    }

    ?>
    </title>

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
                        
                        <a href="index.php" class="nav-brand"><img src="img/green leaves.png" width="60" alt="Le jardin Vert "><span style="color:#a7c94d; font-size:.8rem; font-weight: bolder;">Le jardin Vert</span></a>    
                        <!-- Navbar Toggler -->
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

    <!-- ##### Hero Area Start ##### -->
    <div class="hero-area owl-carousel">
        <!-- Single Blog Post -->
        <div class="hero-blog-post bg-img bg-overlay" style="background-image: url(img/bg-img/1.jpg);">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12">
                        <!-- Post Contetnt -->
                        <div class="post-content text-center">
                            <div class="post-meta" data-animation="fadeInUp" data-delay="100ms">
                                <a href="#"><?php require "heur.php";?></a>
                                <a href="archive.html">lifestyle</a>
                            </div>
                            <a href="video-post.html" class="post-title" data-animation="fadeInUp" data-delay="300ms">Party Jokes Startling But Unnecessary</a>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Single Blog Post -->
        <div class="hero-blog-post bg-img bg-overlay" style="background-image: url(img/bg-img/2.jpg);">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12">
                        <!-- Post Contetnt -->
                        <div class="post-content text-center">
                            <div class="post-meta" data-animation="fadeInUp" data-delay="100ms">
                                <a href="#"><?php require "heur.php";?></a>
                                <a href="archive.html">lifestyle</a>
                            </div>
                            <a href="video-post.html" class="post-title" data-animation="fadeInUp" data-delay="300ms">Party Jokes Startling But Unnecessary</a>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Single Blog Post -->
        <div class="hero-blog-post bg-img bg-overlay" style="background-image: url(img/bg-img/3.jpg);">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12">
                        <!-- Post Contetnt -->
                        <div class="post-content text-center">
                            <div class="post-meta" data-animation="fadeInUp" data-delay="100ms">
                                <a href="#"><?php require "heur.php";?></a>
                                <a href="archive.html">lifestyle</a>
                            </div>
                            <a href="video-post.html" class="post-title" data-animation="fadeInUp" data-delay="300ms">Party Jokes Startling But Unnecessary</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Hero Area End ##### -->

    <!-- ##### Mag Posts Area Start ###########################################################################################################################"""## -->
    <section class="mag-posts-area d-flex flex-wrap">

        <!-- >>>>>>>>>>>>>>>>>>>>
         Post Left Sidebar Area
         <?php
         $sql="SELECT * FROM articles WHERE supprimer_article = '0'  ORDER BY `id_article` DESC";
         $result=mysqli_query($connection,$sql);
         ?>
        <<<<<<<<<<<<<<<<<<<<< -->
        <div class="post-sidebar-area left-sidebar mt-30 mb-30 bg-white box-shadow">
            <!-- Sidebar Widget -->
            <div class="single-sidebar-widget p-30">
                <!-- Section Title -->
                <div class="section-heading">
                    <h5>latest article</h5>
                </div>

                <!-- Single Blog Post -->
                <?php
                
                while($row=mysqli_fetch_array($result)){
                            $id_article= $row['id_article'];
                             /* $name= $_SESSION['uname'] ;
                             $id_user = $_SESSION['id_user'];
                              $prenom= $_SESSION['prenom']; */
                              
                       ?>
                                      <div class="single-blog-post d-flex">
                                  <div class="post-thumbnail">
                                      <img class="card-img-top" src="<?php echo 'uploads/'.$row['image']; ?>" alt="erreur image">   
                                  </div>
                                  <div class="post-content">
                                      <a href="single-post.php" class="post-title"><?php echo $row['titre']; ?></a>
                                      <div class="post-meta d-flex justify-content-between">
                                          <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> 34</a>
                                          <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 84</a>
                                          <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 14</a>
                                      </div>
                                  </div>
                              </div>
                          
                          <?php 
                  }
                          ?>
            </div>

            </div>
        </div>

        <!-- >>>>>>>>>>>>>>>>>>>>
             Main Posts Area
        <<<<<<<<<<<<<<<<<<<<< -->
        <div class="mag-posts-content mt-30 mb-30 p-30 box-shadow">
            <!-- Trending Now Posts Area -->
            <div class="trending-now-posts mb-30">
                <!-- Section Title -->
                <div class="section-heading">
                    <h5>TRENDING NOW</h5>
                </div>
                <?php
                 $sql="SELECT * FROM articles INNER JOIN categories  ON articles.id_categories = categories.nom_categorie WHERE  supprimer_article = 0  ORDER BY id_article DESC";
                 $result=mysqli_query($connection,$sql);
                
                while($row=mysqli_fetch_array($result)){
                    print_r($row);
                            $id_article= $row['id_article'];
                             /* $name= $_SESSION['uname'] ;
                             $id_user = $_SESSION['id_user'];
                              $prenom= $_SESSION['prenom']; */
                              $categorie=$row['nom_categorie'];
                              echo $categorie;
                              
                       ?>
                <div class="trending-post-slides owl-carousel">
                    <!-- Single Trending Post -->
                        <div class="single-trending-post">
                              <img class="card-img-top" src="<?php echo 'uploads/'.$row['image']; ?>" alt="erreur image">  
                              <div class="post-content">
                            <a href="#" class="post-cata"><?php echo $categorie; ?></a>
                            <a href="single-post.php" class="post-title"><?php echo $row['titre']; ?></a>
                        </div>
                     </div>
                </div>                
                          
                <?php 
                  }
                ?>
                

             
            </div>

            <!-- Feature Video Posts Area -->
            <div class="feature-video-posts mb-30">
                <!-- Section Title -->
                <div class="section-heading">
                    <h5>Featured Article</h5>
                </div>

                <div class="featured-video-posts">
                    <div class="row">
      <div class="col-12 col-lg-7">

                                                                   <?php
                $sql="SELECT * FROM articles WHERE supprimer_article = '0'  ORDER BY `id_article` DESC";
                                                               $result=mysqli_query($connection,$sql);
                                                                     ?>
                                                  
                            <!-- Single Featured Post -->
                                       <div class="single-featured-post">
                                           <?php
                                           
                                       for ($i =$row; $i < 1; $i++) {
                                        $row=mysqli_fetch_array($result);
                                           ?>
                                                                        <div class="post-thumbnail mb-50">
                                    <img src="<?php echo 'uploads/'.$row['image']; ?>" alt="erreur image">
                                                                         </div>
                               
                                            <div class="post-content">
                                             <div class="post-meta">
                                         <a href='#'>Create In: <?php echo $row['date_ajoute_article']; ?> <hr style="height:1px;border:solid;color:#74cc50;background-color:#74cc50;" /></a>
                                       
                                              </div>
                                              <a href="video-post.html" class="post-title"><?php echo $row['titre']; ?></a>
                                           <p><?php echo $row['contenue'] ;?></p>
                                            </div>
                                
                                                         <div class="post-share-area d-flex align-items-center justify-content-between">
                                 
                                                                             <div class="post-meta pl-3">
                                        <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> 1034</a>
                                        <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 834</a>
                                        <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 234</a>
                                                                             </div>
                                   
                                                                             <div class="share-info">
                                        <a href="#" class="sharebtn"><i class="fa fa-share-alt" aria-hidden="true"></i></a>
                                        
                                                                                 <div class="all-share-btn d-flex">
                                            <a href="#" class="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                            <a href="#" class="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                            <a href="#" class="google-plus"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                                            <a href="#" class="instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                                                                 </div>
                                                                             </div>
                                                         </div>
                                       </div>
                                       <?php
                                       }
                                       ?>
       </div>

                        <div class="col-12 col-lg-5">
                            <!-- Featured Video Posts Slide -->
                            <div class="featured-video-posts-slide owl-carousel">

                                <div class="single--slide">
                                    
                                                                 <?php
                                                        $sql="SELECT * FROM articles WHERE supprimer_article = '0'  ORDER BY `id_article` DESC";
                                                               $result=mysqli_query($connection,$sql);
                                                                     ?>
                                                      <?php
                
                                                      while($row=mysqli_fetch_array($result)){
                                                                  $id_article= $row['id_article'];
                                                                   /* $name= $_SESSION['uname'] ;
                                                                   $id_user = $_SESSION['id_user'];
                                                                    $prenom= $_SESSION['prenom']; */
                              
                                                             ?>
                                                           <div class="single-blog-post d-flex">
                                                                             <div class="post-thumbnail">
                                                                                 <img class="card-img-top" src="<?php echo 'uploads/'.$row['image']; ?>" alt="erreur image">   
                                                                             </div>
                                                                        <div class="post-content">
                                                                            <a href="single-post.php" class="post-title"><?php echo $row['titre']; ?></a>
                                                                              <div class="post-meta d-flex justify-content-between">
                                                                                <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> 34</a>
                                                                                <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 84</a>
                                                                                <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 14</a>
                                                                            </div>
                                                                        </div>
                                                           </div>
                          
                                                                <?php 
                                                        }
                                                                ?>  
  
                                </div>

                                <div class="single--slide">

                                    <?php
                                                         $sql="SELECT * FROM articles ORDER BY `id_article` DESC";
                                                               $result=mysqli_query($connection,$sql);
                                                                     ?>
                                                      <?php
                
                                                      while($row=mysqli_fetch_array($result)){
                                                                  $id_article= $row['id_article'];
                                                                 /*   $name= $_SESSION['uname'] ;
                                                                   $id_user = $_SESSION['id_user'];
                                                                    $prenom= $_SESSION['prenom']; */
                              
                                                             ?>
                                                           <div class="single-blog-post d-flex">
                                                                             <div class="post-thumbnail">
                                                                                                                  <img class="card-img-top" src="<?php echo 'uploads/'.$row['image']; ?>" alt="erreur image">   
                                                                             </div>
                                                                        <div class="post-content">
                                                                            <a href="single-post.php" class="post-title"><?php echo $row['titre']; ?></a>
                                                                              <div class="post-meta d-flex justify-content-between">
                                                                                <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> 34</a>
                                                                                <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 84</a>
                                                                                <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 14</a>
                                                                            </div>
                                                                        </div>
                                                           </div>
                          
                                                                <?php 
                                                        }
                                                                ?>  
                                   
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

           

            <!-- Sports Videos -->
            <div class="sports-videos-area">
                <!-- Section Title -->
                <div class="section-heading">
                    <h5>All Articles</h5>
                </div>
                <div class="sports-videos-slides owl-carousel mb-30">              
 <?php
 $sql="SELECT * FROM articles WHERE supprimer_article = '0'  ORDER BY `id_article` DESC";
 $result=mysqli_query($connection,$sql);
  ?>
 <?php
                                           
 while ($row=mysqli_fetch_array($result)) {                                     
                                           ?>
               <div class="single-featured-post">
                        <!-- Thumbnail -->
                        <div class="post-thumbnail mb-50">
                        <img src="<?php echo 'uploads/'.$row['image']; ?>" alt="erreur image">
                        </div>
                        <!-- Post Contetnt -->
                        <div class="post-content">
                            <div class="post-meta">
                            <a href='#'>Create In: <?php echo $row['date_ajoute_article']; ?></a>
                            </div>
                            <a href="video-post.html" class="post-title"><?php echo $row['titre']; ?></a>
                            <p><?php echo $row['contenue'] ;?></p>
                        </div>
                        <!-- Post Share Area -->
                        <div class="post-share-area d-flex align-items-center justify-content-between">
                            <!-- Post Meta -->
                            <div class="post-meta pl-3">
                                <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> 1034</a>
                                <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 834</a>
                                <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 234</a>
                            </div>
                            <!-- Share Info -->
                            <div class="share-info">
                                <a href="#" class="sharebtn"><i class="fa fa-share-alt" aria-hidden="true"></i></a>
                                <!-- All Share Buttons -->
                                <div class="all-share-btn d-flex">
                                    <a href="#" class="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                    <a href="#" class="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                    <a href="#" class="google-plus"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                                    <a href="#" class="instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                                  
                    </div>
                    <?php } ?> 
                </div>
                
             </div>
        </div>

        <!-- >>>>>>>>>>>>>>>>>>>>
         Post Right Sidebar Area
        <<<<<<<<<<<<<<<<<<<<< -->
        <div class="post-sidebar-area right-sidebar mt-30 mb-30 box-shadow">
           

            <!-- Sidebar Widget -->
            <div class="single-sidebar-widget p-30">
                <!-- Section Title -->
                <div class="section-heading">
                    <h5>Categories</h5>
                </div>

                <!-- Catagory Widget -->
                <ul class="catagory-widgets">
                    <li><a href="#"><span><i class="fa fa-angle-double-right" aria-hidden="true"></i> Life Style</span> <span>35</span></a></li>
                    <li><a href="#"><span><i class="fa fa-angle-double-right" aria-hidden="true"></i> Travel</span> <span>30</span></a></li>
                    <li><a href="#"><span><i class="fa fa-angle-double-right" aria-hidden="true"></i> Foods</span> <span>13</span></a></li>
                    <li><a href="#"><span><i class="fa fa-angle-double-right" aria-hidden="true"></i> Game</span> <span>06</span></a></li>
                    <li><a href="#"><span><i class="fa fa-angle-double-right" aria-hidden="true"></i> Sports</span> <span>28</span></a></li>
                    <li><a href="#"><span><i class="fa fa-angle-double-right" aria-hidden="true"></i> Football</span> <span>08</span></a></li>
                    <li><a href="#"><span><i class="fa fa-angle-double-right" aria-hidden="true"></i> TV Show</span> <span>13</span></a></li>
                </ul>
            </div>

            <!-- Sidebar Widget -->
            <div class="single-sidebar-widget p-30">
                <!-- Section Title -->
                <div class="section-heading">
                    <h5>Hot Channels</h5>
                </div>

                <!-- Single YouTube Channel -->
                <div class="single-youtube-channel d-flex">
                                <div class="youtube-channel-thumbnail">
                                    <img src="img/bg-img/16.png" alt="">
                                </div>
                                <div class="youtube-channel-content">
                                    <a href="single-post.html" class="channel-title">le jardin Vert Channel</a>
                                    <a href="#" class="btn btn-danger subscribe-btn"><i class="fa fa-play-circle-o" aria-hidden="true"></i> Subscribe</a>
                                </div>
                            </div>
            </div>

            <!-- Sidebar Widget -->
            <div class="single-sidebar-widget p-30">
                <!-- Section Title -->
                <div class="section-heading">
                    <h5>Newsletter</h5>
                </div>

                <div class="newsletter-form">
                    <p>Subscribe our newsletter gor get notification about new updates, information discount, etc.</p>
                    <form action="#" method="get">
                        <input type="search" name="widget-search" placeholder="Enter your email">
                        <button type="submit" class="btn mag-btn w-100">Subscribe</button>
                    </form>
                </div>

            </div>
        </div>
    </section>
    <!-- ##### Mag Posts Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
    <footer class="footer-area">
        <div class="container">
            <div class="row">
                <!-- Footer Widget Area -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="footer-widget">
                        <!-- Logo -->
                        <a href="index.php" class="nav-brand"><img src="img/green leaves.png" width="60" alt="Le jardin Vert "><span style="color:#a7c94d; font-size:2em; font-weight: bolder;">Le jardin Vert</span></a>                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
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