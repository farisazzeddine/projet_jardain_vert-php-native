<?php
require "db.php";
session_start();

function check($var){
    $var=trim($var);
    $var=strip_tags($var);
    $var=stripslashes($var);
    if (empty($var)) return false;
    else return $var;
}
$name=check($_POST["name"]);
$prenom=check($_POST["prenom"]);
$pass=check($_POST["pass"]);
$cpass=check($_POST["cpass"]);
$uname=check($_POST["uname"]);
$age=check($_POST["age"]);
$mail=check($_POST["mail"]);
$datAjoutUser=date('Y/m/d H:i:s');

if(!$name) $error["name"]="please insert a valid name";
else if(strlen($name)>20) $error["name"]="too large name";

if(!$prenom) $error["prenom"]="please insert a valid prenom";
else if(strlen($prenom)>20) $error["prenom"]="too large prenom";



if(empty($pass)) $error["pass"]="insert a valid password and confirmation";
else if($pass != $cpass) $error["pass"]="password  n est pas identique";
else if(strlen($pass)>10) $error["pass"]="too large password";
else $pass=md5($pass);

if(!$uname) $error["uname"]="please insert a valid UserName";
else if(strlen($uname)>20) $error["uname"]="too large UserName";

if(!$age) $error["age"]="please insert a valid age";
else if(!ctype_digit($age)) $error["age"]="insert age in  number";




if(!filter_var($mail,FILTER_VALIDATE_EMAIL))  $error["mail"]="insert valid email";


if(empty($error)){
     $sql="INSERT INTO `utilisateur`( `id_utilisateur`,`nom`,`prenom`,`password` ,`nom_utilisateur`,`age`,`email`,`date_ajout_utilisateur`) 
     VALUES( null,'$name','$prenom','$pass','$uname','$age','$mail','$datAjoutUser')";
     if(mysqli_query($connection,$sql))
      {echo "registeration completed and your id is".mysqli_insert_id($connection);
        header('Location: login.php');

       }
     else echo mysqli_error($connection);


}


?>



