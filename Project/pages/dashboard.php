<?php
$title = 'Dashboard';
$page = 'Dashboard';
include_once('../assets/header.php');
include_once('../assets/auth.php');
?>

</head>

<body>
    <?php include_once('../assets/nav.php'); ?>
    <div class="main_dashboard">
        <table class="dashboard">
            <tr>
                <td>ID</td>
                <td>Title</td>
                <td>Description</td>
                <td>Price</td>
                <td>Days</td>
                <td>Tags</td>
                <td>Created At</td>
                <td></td>

            </tr>

            <?php
            include_once('../model/model.php');
            $id = $_SESSION['userid'];
            $sql = "SELECT id, title, description, price, delivery_time, tags, created_at FROM services where user_id = '$id'";
            $datas = selectAllQuery($sql);

            if (!empty($datas)) {
                foreach ($datas as $data) {
                    $serID = $data['id'];
                    echo "<tr>";
                    foreach ($data as $r) echo "<td>$r</td>";

                    echo "<td><a href=\"editService.php?servID=$serID\" class=\"edit-service\">Edit</a></td>";
                    echo "</tr>";
                }
            }
            ?>

        </table>
    </div>

</body>