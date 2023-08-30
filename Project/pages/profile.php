<?php
$title = 'Profile';
$page = 'Profile';
include_once('../assets/header.php');
include_once('../assets/auth.php');
?>

</head>

<body>
    <?php
    include_once('../assets/nav.php');
    include_once('../model/model.php');

    $id = $_SESSION['userid'];
    $sql = "SELECT * from users where id = '$id'";
    $data = selectQuery($sql);
    ?>


    <div class="main_profile">
        <form class="profile-form" method="post" action="../validation/profileVal.php" enctype="multipart/form-data">

            <div class="profile-form-img">
                <!-- Images -->
                <?php if (empty($data['profile_pic'])) { ?>
                    <img src="../assets/img/profile.png" alt="">
                <?php } else { ?>
                    <img src="<?php echo $data['profile_pic'] ?>" alt="">
                <?php } ?>
                <label class="profile-form-label">Type: <?php echo $data['type'] ?></label>
                <label class="profile-form-label">Member Since: <?php echo $data['started'] ?></label>
                <!-- <input class="profile-input" type="file" name="images"> -->
                <input class="profile-input" type="file" name="images" id="file-input">
                <label for="file-input" class="file-label">Update Image</label>
                <span class="file-name">No file chosen</span>


                <!-- Website -->
                <label class="profile-form-label">Website</label>
                <input class="profile-form-input" type="text" name="website" value="<?php echo $data['website'] ?>">
                <!-- Socials -->
                <label class="profile-form-label">Socials</label>
                <input class="profile-form-input" type="text" name="socials" value="<?php echo $data['socials'] ?>">
                
            </div>
            <div class="profile-form-textFields">
                <!-- id -->
                <input class="profile-form-input" type="text" name="id" value="<?php echo $data['id'] ?>" hidden>
                <!-- Name -->
                <label class="profile-form-label">Name</label>
                <input class="profile-form-input" type="text" name="name" value="<?php echo $data['name'] ?>">
                <!-- Email -->
                <label class="profile-form-label">Email</label>
                <input class="profile-form-input" type="text" name="email" value="<?php echo $data['email'] ?>">
                <!-- Password -->
                <a class="profile-form-change_pass" href="change_pass.php">Change password</a>
                <!-- Bio -->
                <label class="profile-form-label">Bio</label>
                <textarea rows="4" cols="40" class="profile-form-about" name="bio"><?php echo $data['bio'] ?></textarea>
                <!-- Location -->
                <label class="profile-form-label">Location</label>
                <input class="profile-form-input" type="text" name="location" value="<?php echo $data['location'] ?>">
                <!-- Phone -->
                <label class="profile-form-label">Phone</label>
                <input class="profile-form-input" type="number" name="phone" value="<?php echo $data['phone'] ?>">
                
                <!-- Submit -->
                <input class="profile-input" type="submit" name="submit" value="Update">
            </div>
        </form>
    </div>

</body>