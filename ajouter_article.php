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