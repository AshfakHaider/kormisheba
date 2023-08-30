<?php
$title = 'History';
$page = 'History';
include_once('../assets/header.php');
include_once('../assets/auth.php');
?>

</head>

<body>
    <?php include_once('../assets/nav.php'); ?>
    <div class="main_dashboard">
        <table class="dashboard">
            <tr>
                <th>Title</th>
                <th>Seller</th>
                <th>Description</th>
                <th>Price</th>
                <th>Delivery Time</th>
                <th>Order Date</th>
                <th>Status</th>


            </tr>

            <?php
            include_once('../model/model.php');
            $id = $_SESSION['userid'];
            $sql = "SELECT * FROM orders where buyer_id = '$id'";
            $datas1 = selectAllQuery($sql);

            if (!empty($datas1)) {


                foreach ($datas1 as $data) {
                    $seller_id = $data['seller_id'];
                    $sql = "SELECT * FROM users where id = '$seller_id'";
                    $res = selectQuery($sql);
                    $seller_name = $res['name'];
                    $order_placed = $data['order_placed'];
                    $order_status = $data['status'];
                    $service_id = $data['service_id'];
                    $sql = "SELECT title, description, price, delivery_time FROM services where id = '$service_id'";
                    $datas = selectQuery($sql);

                    echo "<tr>";
                    echo "<td>$seller_name</td>";
                    foreach ($datas as $r) echo "<td>$r</td>";

                    echo "<td>$order_placed</td>";
                    echo "<td>$order_status</td>";
                    echo "</tr>";
                }
            }
            ?>

        </table>
    </div>

</body>