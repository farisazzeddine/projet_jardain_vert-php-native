<?php
require "db.php";
session_start();
$sqlDele="UPDATE `articles` SET `supprimer_article` = '1' WHERE `articles`.`id_article` ='$_GET[id]'";
if(mysqli_query($connection, $sqlDele))
header("refresh:1 ; url=archive.php");
else
  echo "Not Deleted";

?>