<?php
$title = 'Edit Service';
$page = 'Edit Service';
include_once('../assets/header.php');
include_once('../assets/auth.php');
?>
</head>

<body>
    <?php include_once('../assets/nav.php');
        $userid = $_GET['userid'];
        $id = $_GET['servID'];
        $sql = "SELECT * from services where id = '$id'";
        $data = selectQuery($sql);
        $title = $data['title'];
        $description = $data['description'];
        $price = $data['price'];
        $delivery_time = $data['delivery_time'];
        $tags = $data['tags'];
        $delivery_time = $data['delivery_time'];
    ?>
    <div class="addservice">
        <form class="addservice-form" method="post" action="../validation/addServiceVal.php" enctype="multipart/form-data">
                <!-- Service ID -->
                <input class="addservice-input" type="text" name="serv_id" hidden value="<?php echo $id; ?>">
                <!-- User ID -->
                <input class="addservice-input" type="text" name="user_id" hidden value="<?php echo $userid; ?>">
                <!-- Title -->
                <label class="addservice-label">Title:</label>
                <input class="addservice-input" type="text" name="title" value="<?php echo $title; ?>">
                <!-- Description -->
                <label class="addservice-label">Description:</label>
                <textarea name="description" value=""><?php echo $description; ?> </textarea>
                <!-- Price -->
                <label class="addservice-label">Price(Tk):</label>
                <input class="addservice-input" type="number" name="price" value="<?php echo $price; ?>">
                <!-- Days to complete -->
                <label class="addservice-label">Delivery Time:</label>
                <input class="addservice-input" type="text" name="delivery_time" value="<?php echo $delivery_time; ?>">
                <!-- Tags -->
                <label class="addservice-label">Tags:</label>
                <input class="addservice-input" type="text" name="tags" value="<?php echo $tags; ?>">
                <!-- Images -->
                <!-- <label class="addservice-label">Images:</label>
                <input class="addservice-input" type="file" name="images"> -->
                <input class="addservice-input" type="submit" name="submit" value="Update">
        </form>
    </div>
</body>

</html>