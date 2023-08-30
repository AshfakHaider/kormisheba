<?php
    include_once('../model/model.php');

    $email= null;
    $emailErr= null;
    $password= null;
    $passwordErr= null;
    $confPass= null;
    $confPassErr= null;
    $err = array();

    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        if(isset($_POST['sign-up'])){
            $email= $_POST["email"];
            $password= $_POST["password"];
            $confPass= $_POST["conf_password"];
            $type= $_POST["type"];

            // check if conf_password field is empty
            if(!$_POST["conf_password"]){
                $confPassErr = 'Confirm Password field is empty!';
                array_push($err, 1);
            }

            // check if password field is empty
            if(!$_POST["password"]){
                $passwordErr = 'Password field is empty!';
                array_push($err, 1);
            }
            
            //Confirm Password
            if($_POST["password"] && !$_POST["conf_password"]){
                if($_POST["password"] !== $_POST["conf_passowrd"]){
                    $confPassErr= 'Password dont match! Try again';  
                }
                array_push($err, 1);
            }

            // email validation
            if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
                $emailErr = 'Invalid Email! Try again';
                array_push($err, 1);
            }

            // check if email field is empty
            if(!$_POST["email"]){
                $emailErr = 'Email field in empty!';
                array_push($err, 1);
            }

            //check if email already exists
            $sql = "SELECT email from users where email = '$email'";
            $data = selectQuery($sql);
            if($data != 'error'){
                $emailErr = 'Email already exists!';
                
                array_push($err, 1);
            }

            // go to next step if there is no error
            if(empty($err)){
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                
                $sql = "INSERT INTO users (email, password, type) 
                VALUES ('$email', '$hashedPassword', '$type')";
                
                if (insertQuery($sql) === TRUE) {
                    header("Location: ../pages/login.php");
                    exit();
                }
            }
        }
    }
?>