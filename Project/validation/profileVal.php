<?php
    include_once('../model/model.php');

    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $bio = $_POST['bio'];
    $location = $_POST['location'];
    $phone = $_POST['phone'];
    $website = $_POST['website'];
    $socials = $_POST['socials'];

    

    $target_dir = "../uploads/profile_pic/";
    if(!empty($_FILES["images"]["name"])){
        $target_file = $target_dir . basename($_FILES["images"]["name"]);
        
        $sql = "UPDATE users
            SET name = '$name', email = '$email', bio = '$bio', location = '$location', phone = '$phone', website = '$website', socials = '$socials', profile_pic = '$target_file'
            WHERE id = '$id';";
        
    }else{
        $sql = "UPDATE users
            SET name = '$name', email = '$email', bio = '$bio', location = '$location', phone = '$phone', website = '$website', socials = '$socials'
            WHERE id = '$id';";
    }
    


    if (move_uploaded_file($_FILES["images"]["tmp_name"], $target_file)) {
        echo "The file ". basename($_FILES["images"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }

        
    if (insertQuery($sql) === TRUE) {
        header("Location: ../pages/profile.php");
        exit();
    }
?>