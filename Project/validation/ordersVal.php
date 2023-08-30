<?php
    include_once('../model/model.php');
    $status = $_POST['status'];                  
    $order_id = $_POST['order_id'];                  

    if ($_SERVER['REQUEST_METHOD'] === 'POST'){ 
        $sql = "UPDATE orders
            SET status = '$status'
            WHERE id = '$order_id';";
        
        if (insertQuery($sql) === TRUE) {
            header("Location: ../pages/orders.php");
            exit();
        }
    }
?>