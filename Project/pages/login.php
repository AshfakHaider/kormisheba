<?php
$title = 'Login';
$page = 'Login';
include_once('../assets/header.php');
include_once('../validation/loginVal.php');

    if($emailErr !== null){?>  
        <style>.email-error{display: block;}</style> <?php
    }
    if($passwordErr !== null){?>  
        <style>.password-error{display: block;}</style> <?php
    }
?>

</head>
<body class="signuplogin-body">
    <div class="login-box">
        <h1 class="signuplogin-h1">Login</h1>
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

            <label class="signuplogin-label"><input  type="checkbox" name="remember_me" value="checked"> Remember me</label>
            
            <input type="submit" value="Login" name="log-in" class="loginBtn">
        </form>
    </div>
    <p class="para-2">Not have an account? <a href="signup.php">Sign Up here</a></p>
</body>

</html>