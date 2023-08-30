<?php
    include_once('../model/model.php');
    $seller_id = $_POST['seller_id'];                  
    $buyer_id = $_POST['buyer_id'];                    
    $service_id = $_POST['service_id'];     
    $status = $_POST['status'];    

    if ($_SERVER['REQUEST_METHOD'] === 'POST'){ 

        $sql = "INSERT INTO orders (service_id, buyer_id, seller_id, status) 
        VALUES ('$service_id', '$buyer_id', '$seller_id', '$status')";
        
        if (insertQuery($sql) === TRUE) {
            header("Location: ../pages/home.php");
            exit();
        }
    }
?>