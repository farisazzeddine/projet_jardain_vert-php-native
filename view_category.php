<?php
require "db.php";
$id=$_GET['id'];
 $query="SELECT * FROM articles WHERE id_categories=$id";
    $sqlCat=mysqli_query($connection,$query);
    while($row=mysqli_fetch_array($sqlCat)){
        echo $row['titre']."<br/>";
    }
?>