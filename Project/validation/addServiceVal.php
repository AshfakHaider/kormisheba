<?php
    $user_id = $_POST['user_id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $delivery_time = $_POST['delevary_time'];
    $tags = $_POST['tags'];


    $target_dir = "../uploads/";
    $target_file = $target_dir . basename($_FILES["images"]["name"]);
    $uploadOk = 1;


    if (move_uploaded_file($_FILES["images"]["tmp_name"], $target_file)) {
        echo "The file ". basename($_FILES["images"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }

    include_once('../model/model.php');

    $sql = "INSERT INTO services (user_id, title, description, price, delivery_time, tags, image) 
        VALUES ('$user_id', '$title', '$description', '$price', '$delivery_time', '$tags', '$target_file')";

        
    if (insertQuery($sql) === TRUE) {
        header("Location: ../pages/addService.php");
        exit();
    }
?>