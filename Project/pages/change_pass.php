<?php
    $title = 'Change Password';
    $page = 'Change Password';
    include_once('../assets/header.php');
    include_once('../assets/auth.php');
    include_once('../validation/changePassVal.php');

    if($old_passErr !== null){?>  
        <style>.old_pass_error{display: block;}</style> <?php
    }
    if($new_passErr !== null){?>  
        <style>.new_pass_error{display: block;}</style> <?php
    }
    if($conf_passErr !== null){?>  
        <style>.conf_pass_error{display: block;}</style> <?php
    }
    if($success !== null){?>  
        <style>.new_pass_success{display: block;}</style> <?php
    }

?>

</head>
<body>
    <?php include_once('../assets/nav.php');?>
    

    <div class="main_change_pass">
        <form class="change_pass-form" method="post">
            <div class="change_pass-form-textFields">
            <!-- Old pass -->
            <label class="change_pass-label">Old Password:</label>
            <input class="change_pass-input" type="password" name="old_pass" value="<?php echo $old_pass?>">
            <p class="error old_pass_error">
                <?php echo $old_passErr?> 
            </p>

            <!-- New pass -->
            <label class="change_pass-label">New Password:</label>
            <input class="change_pass-input" type="password" name="new_pass" value="<?php echo $new_pass?>">
            <p class="error new_pass_error">
                <?php echo $new_passErr?> 
            </p>

            <!-- Confirm pass -->
            <label class="change_pass-label">Confirm Password:</label>
            <input class="change_pass-input" type="password" name="conf_pass" value="<?php echo $conf_pass?>">
            <p class="error conf_pass_error">
                <?php echo $conf_passErr?> 
            </p>

            <input class="change_pass-input" type="submit" name="submit" value="Change Password">
            <p class="success new_pass_success">
                <?php echo $success?> 
            </p>
            </div>
        </form>
    </div>

</body>