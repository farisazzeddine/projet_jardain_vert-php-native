<?php
 require "db.php";
function check($var){
    $var=trim($var);
    $var=strip_tags($var);
    $var=stripslashes($var);
    if (empty($var)) return false;
    else return $var;
}
$title=check($_POST["title"]);
echo $title."<br>";
$catego=check($_POST["category"]);
echo $catego."<br>";
$content=check($_POST["content"]);
echo $content."<br>";
$date_ajoute_article=date('Y/m/d H:i:s');
echo $date_ajoute_article."<br>";


/* if($_FILES["image"]["name"]=="") $error["image"]="please insert image";
$uploads_dir = 'uploads';
if(empty($error)){
    $img_name = $_FILES["image"]["name"];
    $img_size = $_FILES["image"]["size"];
    $img_tmp= $_FILES["image"]["tmp_name"];
    $exploded = explode('.',$img_name);
    $img_ext = end($exploded);
    $avl = array('jpg','png','jpeg');
    if($img_size>524288) $error[image]="too large image";
    else if(!in_array($img_ext,$avl)) $error["image"]="invalid extension";
    if(empty($error["image"])){
        
       $image=(microtime(true)*10000).".".$img_ext;
       move_uploaded_file($_FILES['image']['tmp_name'],"$uploads_dir/$img_name"); 
    }
} */

/* if(!$title) $error["title"]="please insert a valid title";
else if(strlen($title)>20) $error["title"]="too large title";
if(!$catego) $error["category"]="please chose a category"; */


/* if(isset($_POST["save"])){

$img=time().'_'.$_FILES["image"]["name"]; 
$tname=$_FILES["image"]["tmp_name"];
print_r ($img);
$uploads_dir = 'images/';
move_uploaded_file($tname, $uploads_dir.'/'.$img);
} */
 /* if($_FILES["image"]["name"]=="") $error["image"]="please insert image";

if(isset($_FILES['image'])){
    echo $_FILES['image']['tmp_name'];
    $img_name = $_FILES["image"]["name"];
    $img_size = $_FILES["image"]["size"];
    $img_tmp= $_FILES["image"]["tmp_name"];
    $exploded = explode('.',$img_name);
    $img_ext = end($exploded);
    $avl = array('jpg','png','jpeg');
    if($img_size>524288) $error[image]="too large image";
    if(!in_array($img_ext,$avl)) $error["image"]="invalid extension";
    if(empty($error["image"])){
        $image=(microtime(true)*10000).".".$img_ext;
        move_uploaded_file($_FILES['image']['tmp_name'],$uploads_dir);
    }
} */
/* if(isset($_FILES["image"])){
    $img_name = $_FILES["image"]["name"];
    $img_size = $_FILES["image"]["size"];
    $img_tmp= $_FILES["image"]["tmp_name"];
    $exploded = explode('.',$img_name);
    $img_ext = end($exploded);
    $avl = array('jpg','png','jpeg');
    if($img_size>524288) $error[image]="too large image";
    if(!in_array($img_ext,$avl)) $error["image"]="invalid extension";
    if(empty($error["image"])){
       $image=(microtime(true)*10000).".".$img_ext;
       move_uploaded_file($_FILES['image']['tmp_name'],$uploads_dir); 
    }
} */
if(empty($error)){
    $sql="INSERT INTO `articles`(`id_article`, `titre`, `contenue`, `image`, `date_ajoute_article`, `id_categories`)
     VALUES (null,'$title','$content','$img_name','$date_ajoute_article','$catego')";
     
     if(mysqli_query($connection,$sql))
      echo "posted completed and your id is".mysqli_insert_id($connection);
     else echo mysqli_error($connection);
     
}
else{
foreach($error as $e)
    echo $e."<br>";

}

?>




<?php 
                    $sql=="SELECT * FROM `articles`";
                    $result=mysqli_query($connection,$sql);
                    while($row=mysqli_fetch_array($result)){
                       echo "<div class='blog-thumb mb-30'>";
                            echo "<img src='".$row['image']."' >";
                       echo "</div>";
                        echo "<div class='blog-content'>";
                           
                           echo "<h4 class='post-title'>".$row['title']."</h4>";
                          

                           echo "<p>".$row['content']."</p>";

                        echo "</div>";
                       echo "<div class='post-meta'>";
                          echo "<a href='#'>".$row['date_ajoute_article']."</a>";
                        
                        echo "</div>";
                        }
                               ?>



if(isset($_POST['save'])){

$image=$_FILES["image"];
print_r($image);
$img_name= $_FILES["image"]["name"];
$target='images'.basename($img_name);
$title=$_POST["title"];
$catego=$_POST["category"];
$content=$_POST["content"];
//var_dump($_FILES);
if( move_uploaded_file($_FILES["image"]["tmp_name"],$target)){
    $msg= "image uploaded successfuly ";
} else{
    $msg="there was problem in uploading image ";
}
$sql="INSERT INTO `articles`(`id_article`, `titre`, `contenue`, `image`, `date_ajoute_article`, `id_categories`)
     VALUES (null,'$title','$content','$img_name','$date_ajoute_article','$catego')";
     echo $sql;
     mysqli_query($connection,$sql);
  
}
?>

                    <img src="<?php echo 'uploads/'.$row['image'] ;?>" width="50px" height="50px">
                    <?php 
                        }
                 ?>



<?php
                 
                 $sql="SELECT * FROM articles";
                 $result=mysqli_query($connection,$sql);
              ?>
              <?php
                 while($row=mysqli_fetch_array($result)){
                     ?>

                 <div class="blog-thumb mb-30">
                 <img class="card-img-top" src="<?php echo htmlspecialchars('uploads/'.$row['image']); ?>" alt="erreur">
                </div>
                 <div class="blog-content">

                        <h4 class="post-title">  <?php echo $row['titre']; ?></h4>

                        <p><?php echo $row['contenue'] ;?></p>
                 </div>
                 <div class="post-meta">
                        <a href='#'><?php echo $row['date_ajoute_article']; ?></a>;
                 </div>

                 <?php
                     }
              ?>


<div class="post-details-content bg-white mb-30 p-30 box-shadow">
                    
                    <?php
               
               $sql="SELECT * FROM articles";
               $result=mysqli_query($connection,$sql);
                      ?>
                     <?php
               while($row=mysqli_fetch_array($result)){
                       ?>
  
               <div class="blog-thumb mb-30">
                      <img class="card-img-top" src="<?php echo 'uploads/'.$row['image']; ?>" alt="erreur">
              </div>
               <div class="blog-content">

                      <h4 class="post-title"> <?php echo $row['titre']; ?></h4>
                      <p><?php echo $row['contenue'] ;?></p>
               </div>
               <div class="post-meta">
                      <a href='#'><?php echo $row['date_ajoute_article']; ?></a>;
               </div>

               <?php
                   }
            ?>

          </div> 