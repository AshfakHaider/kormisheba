<?php
    session_start();
    // remove all session variables
    // unset($_SESSION['userid']);
    // unset($_SESSION['usertype']);
    session_unset();
    session_destroy();

    header("Location: ../pages/Home.php");
    exit();
?>