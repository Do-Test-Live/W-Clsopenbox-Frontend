<?php
session_start();
include('include/dbController.php');
$db_handle = new DBController();

include('include/add_to_cart.php');
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
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css'>
        <link type="text/css" rel="stylesheet" href="assets/css/style.css">
    </head>
</head>
<body style="background: url('assets/images/10sec/BG.jpg'); background-repeat: no-repeat; background-position: top;background-size: cover; height: 100vh;">

<?php include ('include/header.php');?>

<section class="main">
    <div class="container-fluid">
        <table class="table-bordered text-white mt-5" style="width: 100%; font-size: 25px">
            <thead>
            <tr>
                <th>產品名稱</th>
                <th>數量</th>
                <th>價格</th>
                <th>合計</th>
                <th>行動</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $total_quantity_new = 0;
            $total_price_new = 0;
            if (isset($_SESSION["cart_item"])) {
                foreach ($_SESSION["cart_item"] as $item) {
                    $item_price = $item["quantity"] * $item["price"];
                    ?>
                    <tr>
                        <td><?php echo $item['name'];?></td>
                        <td><?php echo $item['quantity'];?></td>
                        <td><?php echo $item['price'];?></td>
                        <td><?php echo $item_price;?></td>
                        <td><a href="cart.php?action=remove&id=<?php echo $item["id"]; ?>" style="color: red; text-decoration: none;">刪除</a></td>
                    </tr>
                    <?php
                    $total_quantity_new += $item["quantity"];
                    $total_price_new += ($item["price"] * $item["quantity"]);
                }
            }
            ?>
            </tbody>
            <tfoot>
            <tr>
                <td colspan="3">合計</td>
                <td colspan="3"><?php echo $total_price_new;?></td>
            </tr>
            </tfoot>
        </table>

        <div class="row mt-5 text-center">
            <div class="col-6">
                <a href="checkout.php" class="btn add-to-cart" tabindex="0">結帳</a>
            </div>
            <div class="col-6">
                <a href="index.php" class="btn add-to-cart" tabindex="0">返回購物</a>
            </div>
        </div>
    </div>

</section>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>

</body>
</html>
