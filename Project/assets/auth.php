<?php
    if(!isset($_SESSION['userid'])){
        if(!isset($_COOKIE['userid'])){
            header("Location: login.php");
        }else{
            $_SESSION['userid'] = $_COOKIE['userid'];
            $_SESSION['usertype'] = $_COOKIE['usertype'];
        }
        
    }
?>