<?php
session_start();


 if(isset($_SESSION["uname"])){
    session_destroy();
    header("Location:login.php?session_expired=1");
} 

?> 