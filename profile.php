<?php
session_start();
include('include/dbController.php');
$db_handle = new DBController();
include('include/add_to_cart.php');

if (!isset ($_SESSION['userid'])) {
    echo "<script>
window.location.href = 'login.php';
</script>";
} else {
    $customer = $_SESSION['userid'];
}

$no_gift_claim = $db_handle->numRows("select * from customer_gifts where customer_id = '$customer'");

if (isset($_SESSION['userid'])) {
    $userId = $_SESSION['userid'];
    $fetch_user = $db_handle->runQuery("select * from userlogin where id = '$userId'");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <head>
        <meta charset="UTF-8">
        <title>Home</title>
        <link rel='stylesheet'
              href='https://cdnjs.cloudflare.com/ajax/libs/material-design-icons/3.0.1/iconfont/material-icons.min.css'>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
              integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
              crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css">
        <link type="text/css" rel="stylesheet" href="assets/css/style.css">
        <style>
            .main {
                margin: 5rem;
            }

            .gift_text_heading {
                margin-top: 5rem;
                color: #8dd3ff;
                font-size: 3rem;
                font-family: "Avenir Next", "Avenir", sans-serif;
                font-weight: bold;
            }

            table {
                width: 100%;
                color: white;
                text-align: center;
                font-family: "Avenir Next", "Avenir", sans-serif;
                font-size: 1.5rem;
                margin-top: 3rem;
            }

            table tr td {
                border: 2px solid #8dd3ff;
            }

            thead th {
                border: 2px solid #8dd3ff;
            }
        </style>
    </head>
</head>
<body style="background: url('assets/images/10sec/BG.jpg'); background-repeat: no-repeat; background-position: top;background-size: cover;min-height: 100vh;">

<?php include('include/header.php'); ?>


<section class="main">

    <h2 class="gift_text_heading">Gift List:</h2>
    <table>
        <thead>
        <th>Sl no</th>
        <th>Gift Name</th>
        <th>Winning Date</th>
        </thead>
        <tbody>
        <?php
        $fetch_gift = $db_handle->runQuery("SELECT * FROM `customer_gifts` WHERE `customer_id` = {$_SESSION['userid']}");
        $fetch_gift_no = $db_handle->numRows("SELECT * FROM `customer_gifts` WHERE `customer_id` = {$_SESSION['userid']}");
        for ($i = 0; $i < $fetch_gift_no; $i++) {
            ?>
            <tr>
                <td><?php echo $i + 1; ?></td>
                <td><?php echo $fetch_gift[$i]['gift_name']; ?></td>
                <td><?php $date = date_create($fetch_gift[$i]['inserted_at']);
                    $formatted_date = date_format($date, 'd M Y h:i:s a');
                    echo $formatted_date;
                    ?></td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>

    <h2 class="gift_text_heading">Coupon Code:</h2>
    <table>
        <thead>
        <th>Sl no</th>
        <th>Coupon Code</th>
        <th>Minimum Purchase Amount</th>
        <th>Discount Amount</th>
        <th>Obtain Date</th>
        <th>Status</th>
        </thead>
        <tbody>
        <?php
        $fetch_coupon = $db_handle->runQuery("SELECT * FROM `coupon_code_data` WHERE `customer_id` = {$_SESSION['userid']}");
        $fetch_coupon_no = $db_handle->numRows("SELECT * FROM `coupon_code_data` WHERE `customer_id` = {$_SESSION['userid']}");
        for ($i = 0; $i < $fetch_coupon_no; $i++) {
            $id = $fetch_coupon[$i]['coupon_code_id'];
            $fetch_coupon_details = $db_handle->runQuery("SELECT * FROM `spinner_data` WHERE `id` = '$id'");
            $no_fetch_coupon_details = $db_handle->numRows("SELECT * FROM `spinner_data` WHERE `id` = '$id'");
            for ($j = 0; $j < $no_fetch_coupon_details; $j++) {
                ?>
                <tr>
                    <td><?php echo $i + 1; ?></td>
                    <td><?php echo $fetch_coupon_details[0]['cupon_code']; ?></td>
                    <td><?php echo $fetch_coupon_details[0]['minimum_purchase']; ?></td>
                    <td><?php echo $fetch_coupon_details[0]['discount_amount']; ?></td>
                    <td><?php $date = date_create($fetch_coupon[$i]['inserted_at']);
                        $formatted_date = date_format($date, 'd M Y h:i:s a');
                        echo $formatted_date;
                        ?></td>
                    <td><?php if ($fetch_coupon[$i]['status'] == '0') echo 'Not Used'; else echo 'Used' ?></td>
                </tr>
                <?php
            }
        }
        ?>
        </tbody>
    </table>

    <div class="row d-flex align-items-center justify-content-center mt-5">
        <a href="logout.php" class="logout-button"></a>
    </div>

</section>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
</body>
</html>
