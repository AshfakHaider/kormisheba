<?php 
    include_once('../model/model.php');

    $id = $_SESSION['userid'];
    $sql = "SELECT password from users where id = '$email'";
    $data = selectQuery($sql);

    $err = array();
    $old_pass = null;
    $old_passErr = null;
    $new_pass = null;
    $new_passErr = null;
    $conf_pass = null;
    $conf_passErr = null;
    $success = null;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['submit'])) {
            $old_pass = $_POST['old_pass'];
            $new_pass = $_POST['new_pass'];
            $conf_pass = $_POST['conf_pass'];

            // check if old_pass input is empty
            if (empty($old_pass)) {
                $old_passErr = 'Please enter your old password!';
                $err[] = 1;
            }

            // check if new_pass input is empty
            if (empty($new_pass)) {
                $new_passErr = 'Please enter your new password!';
                $err[] = 1;
            }

            // check if conf_pass input is empty
            if (empty($conf_pass)) {
                $conf_passErr = 'Please confirm your new password!';
                $err[] = 1;
            }

            // check if old_pass exists
            if (!empty($old_pass)) {
                if(!password_verify($old_pass, $data['password'])) {
                    $old_passErr = 'Incorrect password! Please enter the correct password.';
                    $err[] = 1;
                }
            }

            // check if old_pass and new_pass are the same
            if (!empty($old_pass) && !empty($new_pass)) {
                if ($old_pass == $new_pass) {
                    $new_passErr = 'Old and new password are the same! Please choose a different new password.';
                    $err[] = 1;
                }
            }

            // check if conf_pass and new_pass are the same
            if (!empty($conf_pass) && !empty($new_pass)) {
                if ($conf_pass != $new_pass) {
                    $conf_passErr = 'New and confirm password do not match!';
                    $err[] = 1;
                }
            }

            // go to the next step if there is no error
            if (empty($err)) {
                $sql = "UPDATE users SET password = '$conf_pass' WHERE id = '$id';";

                if (insertQuery($sql) === TRUE) {
                    $success = 'Password has been changed!';
                }
            }
        }
    }
?>
