<?php
require "db.php";
session_start();

$id_COM=$_GET['id_EAr'];

$sqled="SELECT * FROM  `commentaire` ";
print_r($sqled);
$resulted=mysqli_query($connection,$sqled);
$row=mysqli_fetch_array($resulted);
/* $id_user=$row['id_user'];

echo $id_user; */
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
<?php echo $row['text']; ?>
    <!-- Nav brand -->
    
    <a href="index.php" style="text-align: center;position: relative; left: 44%;" class="nav-brand"><img src="img/green leaves.png" width="60" alt="Le jardin Vert "><span style="color:#a7c94d; font-size:.8rem; font-weight: bolder;">Le jardin Vert</span></a>    
   
</nav>    <!-- Navbar Toggler -->
<div class="mag-breadcrumb py-5">
        <div class="container-fluidmag-breadcrumb py-5">
            <div class="row justify-content-center">
                <div class="col-8 col-xl-8">

<form action="editCom.php?id_EAr=<?php echo $id_COM; ?>" method="post" enctype="multipart/form-data">
                            
                                <div class="row">
                                    
                                   
                                    
                                    <div class="col-12" >
                                        <textarea  class="form-control"  name="content" cols="30" rows="80" placeholder="Message*" required><?php echo $row['text'] ?></textarea>
                                    </div>

                                    
                                    <div class="col-12">
                                        <button class="btn mag-btn mt-30" name="save" type="submit" value="upload">edit comment</button>
                                    </div>
                                </div>
                        </form>
                    </div>
                    <?php 
                    if(isset($_POST['save'])) {
                   
                    $up_comment=mysqli_real_escape_string($connection, $_POST['content']);

                    print_r($_POST);
                
                   $sqlup="UPDATE commentaire SET  text ='$up_comment', modifier_commentaire = '1'  WHERE id_commentaire =$id_COM";
                   mysqli_query($connection, $sqlup) or die(mysqli_error($connection));
                   header("refresh:1 ; url=editCom.php?id_EAr=$id_COM");
                   
                    }
                    ?>
                </div>
            </div>
        </div>
</body>
