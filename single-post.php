<?php 
require "db.php";
session_start();

$date_ajoute_article=date('Y/m/d H:i:s');

                            
if(isset($_SESSION['id_user'])){
    //echo $_SESSION['id_user'];
}

if(isset($_POST['save'])){
$id_user = $_SESSION['id_user'];
$title=mysqli_real_escape_string($connection, $_POST['title']);
$catego=$_POST['category'];
$content= mysqli_real_escape_string($connection, $_POST['content']);
//echo $content;

$file=$_FILES['image'];

$fileName= $_FILES['image']['name'];
$fileTmpName= $_FILES['image']['tmp_name'];
$fileSize= $_FILES['image']['size'];
$fileError= $_FILES['image']['error'];
//echo $fileError;
$fileType= $_FILES['image']['type'];
$fileNameNew='';
//print_r($_FILES);
//var_dump($_FILES);
$fileExt= explode('.', $fileName);
$fileActulExt = strtolower(end($fileExt));
$allowed = array('jpg','jpeg','png','mp4');
if(in_array($fileActulExt, $allowed)){
            if($fileError === 0){
                    if($fileSize < 10000000){
                        $fileNameNew = uniqid('', true).".".$fileActulExt;
                        /* echo $fileNameNew; */
                        $fileDestination = 'uploads/'.$fileNameNew;
                        move_uploaded_file($fileTmpName, $fileDestination);
                        //header("Location: single-post.php?uploadsucess");
                    }
                    else{
                        echo "Your file to big!";
                    }
            }
            else{
                echo "There was an error uploading your file!";
            }
}
else{
    echo "You cannot upload files of this type!";
}
 $sql="INSERT INTO `articles`(`id_article`, `titre`, `contenue`, `image`, `date_ajoute_article`, `id_categories`, `id_user`, `date_sup_article`, `supprimer_article`,`modifier_article`)
 VALUES (null,'$title','$content','$fileNameNew','$date_ajoute_article','$catego','$id_user', NOW(), 0 , 0)";
     mysqli_query($connection,$sql);

}

if(isset($_POST['savecomment'])){

    $txtComment=mysqli_real_escape_string($connection, $_POST['comment']);
    $date_ajoute_commentaire=date('Y/m/d H:i:s');
    $date_modification_commentaire=date('Y/m/d H:i:s');
    $date_suppression_commentaire=date('Y/m/d H:i:s');
    $id_user = $_SESSION['id_user'];

    $id_article= $_POST['id_article'];
    $sqlComm="INSERT INTO `commentaire`(`id_commentaire`, `text`, `date_ajoute_commentaire`, `date_modification_commentaire`, `date_suppression_commentaire`, `id_utilisateur`, `id_article`,`modifier_commentaire`,`suo_commentaire`)
        VALUES (null,'$txtComment','$date_ajoute_commentaire','$date_modification_commentaire','$date_suppression_commentaire','$id_user','$id_article', 0 ,0)";

       

    mysqli_query($connection,$sqlComm);


}
?> 
<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <script src="https://cdn.ckeditor.com/ckeditor5/12.4.0/decoupled-document/ckeditor.js"></script>
    <!-- Title -->
    <title>
<?php
    if(isset($_SESSION['uname'])){
    echo $_SESSION['uname'];} ?>
<?php
    if(!isset($_SESSION['uname'])){
        echo"Create New Article";
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
                    
                    <a href="index.php" class="nav-brand"><img src="img/green leaves.png" width="60" alt="Le jardin Vert "><span class="h3" style="color:#a7c94d; font-size:.8rem; font-weight: bolder;">Le jardin Vert</span></a>    
                    <!-- Navbar Toggler -->
                    <div class="classy-navbar-toggler">
                        <span class="navbarToggler">
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
                            <!-- Submit  -->
                            <a href="submit.php" class="submit-video"><span><i class="fa fa-cloud-upload"></i></span> <span class="video-text">Submit</span></a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </header>
    <!-- ##### Header Area End ##### -->

    <!-- ##### Breadcrumb Area Start ##### -->
    <section class="breadcrumb-area bg-img bg-overlay" style="background-image: url(img/bg-img/49.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <h2>Create Article</h2>
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
                            <li class="breadcrumb-item"><a href="#">Features</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Single Post</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcrumb Area End ##### -->

    <!-- ##### Post Details Area Start ##### -->
    <section class="post-details-area">
        <div class="container">
            <div class="row justify-content-center">
                <!-- Post Details Content Area -->
                <div class="col-12 col-xl-8">

                   <!-- Posted Article ############################################################################################################################### -->
                    <div class="post-a-comment-area bg-white mb-30 p-30 box-shadow clearfix">
                        <!-- Section Title -->
                        <div class="section-heading">
                            <h5>ADD NEW ARTICLE</h5>
                        </div>

                        <!-- Reply Form -->
                        <div class="contact-form-area">
                        <?php if (isset($_SESSION['uname'])) {
                            ?>
                            <form action="single-post.php" method="post" enctype="multipart/form-data">
                            
                                <div class="row">
                                    <div class="col-12 col-lg-6">
                                            <label for="exampleFormControlSelect2">Title* </label>
                                        <input type="text" class="form-control" name="title" placeholder="Title*"  required>
                                    </div>
                                    <div class="col-12 col-md-6">
                                            <label for="exampleFormControlSelect2">Categories* </label>
                                        <select class="form-control form-control-lg" name="category" required>
                                            <option value="1">Garden</option>
                                            <option value="2" >Travel</option>
                                            <option value="3">Music</option>
                                            <option value="4">News</option>
                                            <option value="5">Foods</option>
                                        </select>
                                    </div>
                                    
                                    <div class="col-12" >
                                        <textarea  class="form-control"  name="content" cols="30" rows="80" placeholder="Message*" required></textarea>
                                    </div>

                                    <div class="col-12 col-lg-4">                                   
                                         <input type="file" name="image" class="btn btn-primary  mt-20" value="choose image">
                                    </div>
                                    <div class="col-12">
                                        <button style="float:right;" class="btn mag-btn mt-30" name="save" type="submit" value="upload">Add Article</button>
                                    </div>
                                </div>
                                </form>
                               
                            <?php
                        }
                        ?>
                        
                        <?php
                                          if (!isset($_SESSION['uname'])) {
                                            echo "SIGN UP";
                                       
                                          }
                        ?>
                        </div>
                    </div>
                    <!-- show your article############################################################################################################################################################################################################-->

         <div class="post-details-content bg-white mb-30 p-30 box-shadow">
                    
                    <?php
               
                     $id_article= $row['id_article'];
                     $sql="SELECT * FROM articles WHERE supprimer_article = '0'  ORDER BY `id_article` DESC";
                   $result=mysqli_query($connection,$sql);
                      ?>
                     <?php
                     $id_article= $row['id_article'];
                     echo $id_article;
                     $name= $_SESSION['uname'] ;
                     $id_user = $_SESSION['id_user'];
                      $prenom= $_SESSION['prenom'];
                  while($row=mysqli_fetch_array($result)){
                            
                              
                       ?>
                          <div class="section-heading">
                                    <h4 class="post-title"> <?php echo $row['titre']; ?></h4>
                          </div>
                          <div class="blog-thumb mb-30">
                                     <img style="width:700px; height:500px;" class="card-img-top" src="<?php echo 'uploads/'.$row['image']; ?>" alt="erreur image">
                          </div>
                         <div class="blog-content">
                                     <p><?php echo $row['contenue'] ;?></p>
                         </div>
                          <div class="post-meta">
                          <?php
                        
                          if(isset($_SESSION['uname']) && $_SESSION['uname']!==false &&  $_SESSION['id_user']==$row['id_user']){
                   ?>
                                     <button  type="button" class="btn btn-outline-info"><a href="edit.php?id_Ar=<?php echo $row['id_article']; ?>">edit</a></button><p>  <p>
                                     <button  type="button" class="btn btn-outline-danger"><a href="delet.php?id=<?php echo $row['id_article']; ?>">delete</a></button><br><br>
                                     <?php
                          }
                          ?>
                                     <a href='#'>Create In: <?php echo $row['date_ajoute_article']; ?> <hr style="height:1px;border:solid;color:#74cc50;background-color:#74cc50;" /></a>
                          </div>
                  <div class="comment_area clearfix bg-white mb-30 p-30 box-shadow">
                             <?php 
                            $id_article= $row['id_article'];
                              $sqlComm="SELECT * FROM commentaire 
                              JOIN articles ON commentaire.id_article = articles.id_article 
                              JOIN utilisateur ON utilisateur.id_utilisateur=commentaire.id_utilisateur
                              where articles.id_article=$id_article AND `suo_commentaire` = '0'  ORDER BY `date_ajoute_commentaire` DESC";
                              $resultComm=mysqli_query($connection,$sqlComm);
                              /* print_r($sqlComm);
                              print_r($resultComm); */
                             ?>
                             <?php
                             while($row=mysqli_fetch_array($resultComm)){
                                 ?>
                            <div class="comment-content d-flex">
                                    <!-- Comment Author -->
                                    <div class="comment-author">
                                        <img src="img/bg-img/55.png" alt="author">
                                    </div>
                                    <!-- Comment Meta -->
                                    <div class="comment-meta">
                                    <h6><?php echo $row['nom_utilisateur'].' '.'ID--'.$row['id_utilisateur'];?></h6>
                                    <div class="section-heading">
                                    <p class="comment-date"><?php echo $row['text']; ?></p>
                                       </div>
                                       <?php
                        
                          if(isset($_SESSION['uname']) && $_SESSION['uname']!==false &&  $_SESSION['id_user']==$row['id_utilisateur']){
                   ?>
                                       <button  type="button" class="btn btn-info"><a href="editCom.php?id_EAr=<?php echo $row['id_commentaire']; ?>">edi commentt</a></button><p>  <p>
                                       <button  type="button" class="btn btn-danger"><a href="deletComn.php?id_C=<?php echo $row['id_commentaire']; ?>">Delete Comment</a></button><p>  <p>
                                       <?php 
                          }
                                       ?>
                                        <a href="#" class="comment-date"> <?php echo $row['date_ajoute_commentaire']; ?></a>
                                        
                                        <div class="d-flex align-items-center">
                                            <a href="#" class="like">like</a>
                                            <a href="#" class="reply">Reply</a>
                                        </div>
                                    </div>
                            </div>
                            <?php 
                             }
                             ?>

                    
                        <form action="single-post.php" method="post" enctype="multipart/form-data">
                                       <div class="section-heading">
                                               <h5>COMMENTS</h5>
                                       </div>
                                       <input type="hidden" name="id_article" value="<?php echo $id_article; ?>">
                                       <div class="col-12">
                                                <textarea class="form-control form-control-lg"  name="comment" rows="2" cols="33" placeholder="Comment*" required></textarea>
                                      </div>
                                       <div class="col-12 text-left">
                                                <button style="float:right;" class="btn btn-success mt-30" name="savecomment" type="submit" value="comment">Add Comment</button>
                                      </div>
                        </form>
            </div>
                      
                    <?php
                   }
            ?>

        </div>   
 </div>

                <!-- Sidebar Widget -->
                <div class="col-12 col-md-6 col-lg-5 col-xl-4">
                    <div class="sidebar-area bg-white mb-30 box-shadow">
                        <!-- Sidebar Widget -->
                        <div class="single-sidebar-widget p-30">
                           

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
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Post Details Area End ##### -->

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
    <script src="https://cdn.ckeditor.com/ckeditor5/12.4.0/decoupled-document/ckeditor.js"></script>

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