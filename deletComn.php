<?php
require "db.php";
session_start();
$sqlCoDele="UPDATE `commentaire` SET `suo_commentaire` = '1' WHERE `commentaire`.`id_commentaire` ='$_GET[id_C]'";
if(mysqli_query($connection, $sqlCoDele))
header("refresh:1 ; url=single-post.php");
else
  echo "Not Deleted Comment";

?>