<?php
$title = 'Service';
$page = 'Service';
include_once('../assets/header.php');
include_once('../assets/auth.php');
?>

</head>
<body>
    <?php 
        include_once('../assets/nav.php');
        include_once('../model/model.php');

        $id = $_SESSION['userid'];
        $sql = "SELECT id, name, email, about, image from users where id = '$id'";
        $data = selectQuery($sql);
    ?>


    <div class="main_profile">
    <form class="profile-form" method="post" action="../validation/profileVal.php" enctype="multipart/form-data">
                <!-- id -->
                <input class="profile-input" type="text" name="id" hidden value="<?php echo $data['id']?>">
                <!-- Name -->
                <label class="profile-label">Name:</label>
                <input class="profile-input" type="text" name="name" value="<?php echo $data['name']?>">
                <br>
                <!-- Email -->
                <label class="profile-label">Email:</label>
                <input class="profile-input" type="text" name="email" value="<?php echo $data['email']?>">
                <br>
            
                <!-- About -->
                <label class="profile-label">About:</label>
                <textarea class="profile-about" name="about" value="<?php echo $data['about']?>"> </textarea>
                <br>
                <!-- Images -->
                <label class="profile-label">Profile Pic:</label>
                <img style="height: 80px; width:80px;" src="<?php echo $data['image']?>" alt="">
                <input class="profile-input" type="file" name="images">
                <input class="profile-input" type="submit" name="submit" value="Update">
        </form>
    </div>

</body>