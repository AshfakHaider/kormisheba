<?php
$title = 'Orders';
$page = 'Orders';
include_once('../assets/header.php');
include_once('../assets/auth.php');
?>

</head>

<body>
    <?php include_once('../assets/nav.php'); ?>
    <div class="main_dashboard">
        <table class="dashboard">
            <tr>
                <th>Buyer</th>
                <th>Title</th>
                <th>Description</th>
                <th>Price</th>
                <th>Delivery Time</th>
                <th>Order Date</th>
                <th>Status</th>
            </tr>

            <?php
            include_once('../model/model.php');
            $id = $_SESSION['userid'];
            $sql = "SELECT * FROM orders where seller_id = '$id'";
            $datas1 = selectAllQuery($sql);

            if (!empty($datas1)) {
                foreach ($datas1 as $data) {
                    $order_id = $data['id'];
                    $buyer_id = $data['buyer_id'];
                    $sql = "SELECT * FROM users where id = '$buyer_id'";
                    $res = selectQuery($sql);
                    $buyer_name = $res['name'];
                    $order_placed = $data['order_placed'];
                    $order_status = $data['status'];
                    $service_id = $data['service_id'];
                    $sql = "SELECT title, description, price, delivery_time FROM services where id = '$service_id'";
                    $datas = selectQuery($sql);

                    echo "<tr>";
                    echo "<td>$buyer_name</td>";
                    foreach ($datas as $r) echo "<td>$r</td>";

                    echo "<td>$order_placed</td>";
                    echo "<td>$order_status</td>";
                    echo "<form class=\"orderSub\" method=\"post\" action=\"../validation/ordersVal.php\">
                    <td><select name=\"status\">
                    <option value=\"Processing\">Processing</option>
                    <option value=\"Canceled\">Canceled</option>
                    <option value=\"Completed\">Completed</option>
                    </select></td>";
                    echo "<input name=\"order_id\" type=\"text\" value=\"$order_id\" hidden>";
                    echo "<td><input type=\"submit\" value=\"Edit\"></td></form>";
                    echo "</tr>";
                }
            }
            ?>

        </table>
    </div>

</body>