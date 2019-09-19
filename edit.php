<?php
require "db.php";
session_start();

$id_article=$_GET['id_Ar'];

$sqled="SELECT * FROM `articles` INNER JOIN `categories` ON `articles`.id_categories=`categories`.`id_categories` WHERE `id_article`='$id_article'";
$resulted=mysqli_query($connection,$sqled);
$row=mysqli_fetch_array($resulted);
$id_user=$row['id_user'];
echo $id_user;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Archive Le jardin vert blog</title>

    <!-- Favicon -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="style.css">

</head>

<body>
<nav class="classy-navbar justify-content-between" id="magNav">
    
    <!-- Nav brand -->
    
    <a href="index.php" style="text-align: center;position: relative; left: 44%;" class="nav-brand"><img src="img/green leaves.png" width="60" alt="Le jardin Vert "><span style="color:#a7c94d; font-size:.8rem; font-weight: bolder;">Le jardin Vert</span></a>    
   
</nav>    <!-- Navbar Toggler -->
<div class="mag-breadcrumb py-5">
        <div class="container-fluidmag-breadcrumb py-5">
            <div class="row justify-content-center">
                <div class="col-8 col-xl-8">
<div class="blog-thumb mb-30">
 <img class="card-img" width="300" src="<?php echo 'uploads/'.$row['image']; ?>" alt="erreur image"  >
</div>
<form action="edit.php?id_Ar=<?php echo $id_article; ?>" method="post" enctype="multipart/form-data">
                            
                                <div class="row">
                                    <div class="col-12 col-lg-6">
                                            <label for="exampleFormControlSelect2">Title* </label>
                                        <input type="text" class="form-control" name="title" value="<?php echo $row['titre'] ?>"  required>
                                    </div>
                                    <div class="col-12 col-md-6">
                                            <label for="exampleFormControlSelect2">Categories :  **<?php echo $row['nom_categorie'] ?>** </label>
                                        <select class="form-control form-control-lg" name="category" required>
                                            <option value="1">Garden</option>
                                            <option value="2" >Travel</option>
                                            <option value="3">Music</option>
                                            <option value="4">News</option>
                                            <option value="5">Foods</option>
                                        </select>
                                    </div>
                                    
                                    <div class="col-12" >
                                        <textarea  class="form-control"  name="content" cols="30" rows="80" placeholder="Message*" required><?php echo $row['contenue'] ?></textarea>
                                    </div>

                                    
                                    <div class="col-12">
                                        <button class="btn mag-btn mt-30" name="save" type="submit" value="upload">Update Article</button>
                                    </div>
                                </div>
                        </form>
                    </div>
                    <?php 
                    if(isset($_POST['save'])) {
                    $up_title=mysqli_real_escape_string($connection, $_POST['title']);
                    $up_categ=$_POST['category'];
                    $up_content=mysqli_real_escape_string($connection, $_POST['content']);

                    /* print_r($_POST); */
                
                   $sqlup="UPDATE articles SET titre = '$up_title', contenue ='$up_content', id_categories= '$up_categ', modifier_article = '1'  WHERE id_article =$id_article";
                   mysqli_query($connection, $sqlup) or die(mysqli_error($connection));
                    
                    }
                    ?>
                   
                </div>
            </div>
        </div>
</body>
