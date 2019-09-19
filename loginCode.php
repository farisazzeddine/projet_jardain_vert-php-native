<?php
require "db.php";
session_start();
$is_logged = false ;
$name="";
$prenom="";
$mail="";
$pass="";
$id_user="";

if(isset($_POST["mail"])) {
    $mail=$_POST["mail"];
    $pass=md5($_POST["pass"]);
}


$sql="SELECT * FROM `utilisateur`  WHERE `email`='" . $mail. "' AND `password`='" . $pass . "'";
$run=mysqli_query($connection,$sql);
if($rows=mysqli_fetch_array($run))
   { 
       //echo "You have successfully logged in!";
    $is_logged = true;
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $name = $row['nom'];
            $prenom = $row['prenom'];
            $id_user=$row['id_utilisateur'];
        }

        if($is_logged){
            $_SESSION['uname'] = $name;
            $_SESSION['prenom'] = $prenom;
            $_SESSION['id_user']=$id_user;
        }
    
        header('Location: login.php'); 
    
    } else {
        echo "0 results";
    }
    }
else {echo "you have Entered inccorrect password";
exit();
}





?>