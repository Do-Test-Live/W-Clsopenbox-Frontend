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
            .main{
                margin: 5rem;
            }
            .gift_text_heading{
                margin-top: 5rem;
                color: #8dd3ff;
                font-size: 3rem;
                font-family: "Avenir Next", "Avenir", sans-serif;
                font-weight: bold;
            }
            table{
                width: 100%;
                color: white;
                text-align: center;
                font-family: "Avenir Next", "Avenir", sans-serif;
                font-size: 1.5rem;
                margin-top: 3rem;
            }
            table tr td{
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

    <h2 class="gift_text_heading">Gifts We Are Offering</h2>
    <table>
        <thead>
        <th>Sl no</th>
        <th>Gift Name</th>
        <th>Gift Image</th>
        </thead>
        <tbody>
        <?php
        $fetch_gift = $db_handle->runQuery("SELECT * FROM `gift_list`");
        $fetch_gift_no = $db_handle->numRows("SELECT * FROM `gift_list`");
        for ($i = 0; $i < $fetch_gift_no; $i++){
            ?>
            <tr>
                <td><?php echo $i + 1;?></td>
                <td><?php echo $fetch_gift[$i]['gift_title'];?></td>
                <td style="text-align: center"><img src="admin/<?php echo $fetch_gift[$i]['gift_image'];?>" style="width: 300px; height: auto;display: block;margin: 0 auto;"></td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>

</section>



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
</body>
</html>
