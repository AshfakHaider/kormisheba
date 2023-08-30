<?php
$title = 'Add Service';
$page = 'Add Service';
include_once('../assets/header.php');
include_once('../assets/auth.php');
?>
</head>

<body>
    <?php include_once('../assets/nav.php');
        $id = $_SESSION['userid'];
    ?>
    <div class="addservice">
        <form class="addservice-form" method="post" action="../validation/addServiceVal.php" enctype="multipart/form-data">
                <!-- User ID -->
                <input class="addservice-input" type="text" name="user_id" hidden value="<?php echo $id; ?>">
                <!-- Title -->
                <label class="addservice-label">Title:</label>
                <input class="addservice-input" type="text" name="title">
                <!-- Description -->
                <label class="addservice-label">Description:</label>
                <textarea name="description"> </textarea>
                <!-- Price -->
                <label class="addservice-label">Price(Tk):</label>
                <input class="addservice-input" type="number" name="price">
                <!-- Days to complete -->
                <label class="addservice-label">Delivery Time:</label>
                <input class="addservice-input" type="text" name="delivery_time">
                <!-- Tags -->
                <label class="addservice-label">Tags:</label>
                <input class="addservice-input" type="text" name="tags">
                <!-- Images -->
                <label class="addservice-label">Images:</label>
                <input class="addservice-input" type="file" name="images">
                <input class="addservice-input" type="submit" name="submit" value="Add">
        </form>
    </div>
</body>

</html>