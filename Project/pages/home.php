<?php
$title = 'Home';
$page = 'Home';
include_once('../assets/header.php');
include_once('../assets/auth.php');
?>

</head>
<body>
    <?php 
        include_once('../assets/nav.php');
        include_once('../model/model.php');
        $id = $_SESSION['userid'];
        $sql = "SELECT name from users where id = '$id'";
        $data = selectQuery($sql);

    ?>
    <h1 style="margin-top: 10vh;">Welcome <?php echo $data['name']?></h1>
    <div class="Main-div" style="margin-top: 10vh;">
        

        <div class="showProducts">
            <?php  
                $sql = "SELECT * FROM services";
                $datas = selectAllQuery($sql);
                if(!empty($datas)){
                    include_once('../assets/cardView.php');
                }
            ?>
        </div>
    </div>
</body>

</html>