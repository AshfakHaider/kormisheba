
<?php
    foreach($datas as $data){
        $id=$data['user_id'];
        $sql = "SELECT id, name from users where id = '$id'";
        $result = selectQuery($sql);
        
        $seller_id = $result['id'];                   
        $buyer_id = $_SESSION['userid'];                   
        $service_id = $data['id'];                   
?>
<div class="card-body">
    <div class="card-container">
        <div class="card-images">
            <img src="../uploads/ac.jpg" alt="">
        </div>
        <div class="card-content">
            <div class="profile">
                <img src="../assets/img/profile.png" alt="">
                <span><?php echo $result['name'];?></span>
            </div>
            <div class="product">
                <h3><?php echo $data['title'] ?></h3>
                <span>Tk <?php echo $data['price'] ?></span>
                <div class="rating"></div>
                <p><?php echo $data['description'] ?></p>
            </div>
            <form class="cardFormSubmit" id="cardForm" method="post" action="../validation/orderServiceVal.php">
                <input type="text" name="buyer_id" value="<?php echo $buyer_id; ?>" hidden>
                <input type="text" name="seller_id" value="<?php echo $seller_id; ?>" hidden>
                <input type="text" name="service_id" value="<?php echo $service_id; ?>" hidden>
                <input type="text" name="status" value="Processing" hidden>
                <?php if($_SESSION['usertype'] == 'Buyer'){?>
                    <button type="submit">Buy now</button>
                <?php };?>
            </form>
        </div>
    </div>
</div>

<?php }?>