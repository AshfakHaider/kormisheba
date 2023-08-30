<?php
$title = 'Sign Up';
$page = 'Sign Up';
include_once('../assets/header.php');
include_once('../validation/signupVal.php');
?>

    <?php
        if($emailErr !== null){?>  
            <style>.email-error{display: block;}</style> <?php
        }
        if($passwordErr !== null){?>  
            <style>.password-error{display: block;}</style> <?php
        }
        if($confPassErr !== null){?>  
            <style>.confPass-error{display: block;}</style> <?php
        }
    ?>
    
</head>
<body class="signuplogin-body">
    <div class="signup-box">
        <h1 class="signuplogin-h1">Sign Up</h1>
        <h4 class="signuplogin-h4">Its free and only takes a minuite</h4>
        <form class="signuplogin-form" action="" method="post">
            <label class="signuplogin-label">Email:</label>
            <input class="signuplogin-input" type="text" name="email" value="<?php echo $email ?>">
            <p class="error email-error">
               <?php echo $emailErr?> 
            </p>

            <label class="signuplogin-label">Password:</label>
            <input class="signuplogin-input" type="password" name="password" value="<?php echo $password; ?>">
            <p class="error password-error">
               <?php echo $passwordErr?> 
            </p>
            
            <label class="signuplogin-label">Confirm Password:</label>
            <input class="signuplogin-input" type="password" name="conf_password" value="<?php echo $confPass; ?>">
            <p class="error confPass-error">
               <?php echo $confPassErr?> 
            </p>
            <label class="signuplogin-label">Select Type:</label>
            <select name="type">
                <option value="Buyer">Buyer</option>
                <option value="Seller">Seller</option>
            </select>
            
            <input type="submit" value="Sign up" name="sign-up">
        </form>
        <p class="signuplogin-p">By clicking the Sign Up button,you agree to our <br>
        <a class="signuplogin-a" href="#">Terms and Conditions</a> and <a href="#">Privacy Policy</a>
        </p>
    </div>
    <p class="para-2">Already have an account? <a href="login.php">Login here</a></p>
</body>

</html>