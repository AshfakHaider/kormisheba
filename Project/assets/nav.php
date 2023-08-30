
<header>
    <?php 
        include_once('../model/model.php');
        $id = $_SESSION['userid'];
        $sql = "SELECT profile_pic from users where id = '$id'";
        $data = selectQuery($sql);
    ?>
    <a href="../pages/home.php" class="logo">
        <img src="../assets/img/shop.png" alt="">
        <span>Kormi Sheba</span>
    </a>

    <ul class="navbar">
        <li><a href="../pages/home.php">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Services</a></li>
        <li><a href="#">Contact</a></li>
        <li>
        <form method="GET" action="search.php" style="display: flex; margin-top:-5px">
            <input style="border-radius: 2px;" type="text" name="query" placeholder="Search...">
            <button  style="display: inline-block;" type="submit">Search</button>
        </form>
        </li>
    </ul>

    <div class="navbar-main">
        <?php if(!isset($_SESSION['usertype'])){ ?>
            <a href="../pages/login.php">Login</a>
            <a href="../pages/signup.php"> Sign Up</a>
        <?php };?>
        
        <?php if(empty($data['profile_pic'])){?>
            <img src="../assets/img/profile.png" alt="" class="nav-prof-img" onclick="toggleMenu()">
        <?php }else{ ?>
            <img src="<?php echo $data['profile_pic'] ?>" alt="" class="nav-prof-img" onclick="toggleMenu()">
            
        <?php };?>
        <div class="arrow" id="arrow"></div>
        <div class="profile-menu" id="profileMenu">
            <ul>
                <li><a href="../pages/profile.php"><img src="../assets/img/user.png" alt=""> Profile</a></li>
                <?php if($_SESSION['usertype'] == 'Seller'){ ?>
                    <li><a href="../pages/dashboard.php"><img src="../assets/img/dashboard.png" alt=""> Dashboard</a></li>
                    <li><a href="../pages/addService.php"><img src="../assets/img/add.png" alt=""> Add Service</a></li>
                    <li><a href="../pages/orders.php"><img src="../assets/img/orders.png" alt=""> Orders</a></li>
                <?php }?>
                <?php if($_SESSION['usertype'] == 'Buyer'){ ?>
                    <li><a href="../pages/history.php"><img src="../assets/img/history.png" alt=""> History</a></li>
                <?php }?>
                <li><a href="../validation/logout.php"><img src="../assets/img/log-out.png" alt=""> Logout</a></li>
            </ul>
        </div>

        <div class="menu" id="sidebar-trigger">
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="bar"></div>
        </div>
        <div class="sidebar" id="sidebar-menu">
            <ul>
                <li><a href="../pages/home.php">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">Contact</a></li>
                <?php if(empty($data['profile_pic'])){?>
                    <img src="../assets/img/profile.png" alt="" class="sid-prof-img" onclick="toggleSPMenu()">
                <?php }else{ ?>
                    <img src="<?php echo $data['profile_pic'] ?>" alt="" class="sid-prof-img" onclick="toggleSPMenu()">
                <?php };?>
                <div class="sidBar-profile" id="sidBar-profile">
                    <hr>
                    <li><a href="../pages/profile.php"><img src="../assets/img/user.png" alt=""> Profile</a></li>
                    <?php if($_SESSION['usertype'] == 'Seller'){ ?>
                        <li><a href="../pages/dashboard.php"><img src="../assets/img/dashboard.png" alt=""> Dashboard</a></li>
                        <li><a href="../pages/addService.php"><img src="../assets/img/add.png" alt=""> Add Service</a></li>
                        <li><a href="../pages/orders.php"><img src="../assets/img/orders.png" alt=""> Orders</a></li>
                    <?php }?>
                    <?php if($_SESSION['usertype'] == 'Buyer'){ ?>
                        <li><a href="../pages/history.php"><img src="../assets/img/history.png" alt=""> History</a></li>
                    <?php }?>
                    <li><a href="../validation/logout.php"><img src="../assets/img/log-out.png" alt=""> Logout</a></li>    
                </div>
            </ul>
        </div>
    </div>
    <script src="../assets/scripts/nav.js"></script>
    <script src="../assets/scripts/nav_profileMenu.js"></script>
    <script src="../assets/scripts/nav_sidebarProfileMenu.js"></script>
</header>