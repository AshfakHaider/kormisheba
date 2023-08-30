<?php
    include_once('../model/model.php');

    $email= null;
    $emailErr= null;
    $password= null;
    $passwordErr= null;
    $remember_me=null;
    $err = array();

    if ($_SERVER['REQUEST_METHOD'] === 'POST'){ 
        if(isset($_POST['log-in'])){
            $email= $_POST["email"];
            $password= $_POST["password"];

            // check if password field is empty
            if(!$_POST["password"]){
                $passwordErr = 'Password field is empty!';
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

            // go to next step if there is no error
            if(empty($err)){
                

                $sql = "SELECT id, email, password, type from users where email = '$email'";
                $data = selectQuery($sql);

                if($data == 'error'){
                    $emailErr = 'Wrong email!';
                }else{
                    if(!password_verify($password, $data['password'])){
                        $passwordErr = 'Wrong password!';
                    }else {
                        if(isset($_POST["remember_me"])){
                            setcookie("userid", $data['id'], time()+3600*7);
                            setcookie("usertype", $data['type'], time()+3600*7);
                        }
                        $_SESSION['userid'] = $data['id'];
                        $_SESSION['usertype'] = $data['type'];
                        header("Location: ../pages/Home.php");
                        exit();
                    }
                }

            }
        }
    }

?>