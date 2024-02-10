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
        <style>
            label {
                font-size: 30px;
            }

            .login-form-input {
                box-shadow: inset 0 0 5px 5px #21233c;
                background: #3f3f5dde;
                color: white;
                border-radius: 25px;
                border: 1px solid white;
                height: 70px;
                font-size: 2rem;
            }

            ::placeholder {
                color: white !important;
                font-size: 13px;
                padding-left: 0.25rem;
                font-family: 'Jura', sans-serif;
                font-weight: 100;
            }

            .btn-login, .btn-login:hover {
                border-radius: 25px;
                background: #0033ff;
                border: 1px solid #0033ff;
                color: #00f6ff;
                font-family: 'orbitron', sans-serif;
            }

            .login-header {
                color: #00f6ff;
                font-family: 'orbitron', sans-serif;
            }

            .btn-create, .btn-create:hover {
                border-radius: 25px;
                background: #f14848;
                border: 1px solid #f14848;
                color: #ffffff;
                font-family: 'orbitron', sans-serif;
            }

            .or-text {
                width: 100%;
                text-align: center;
                border-bottom: 1px solid #00f6ff;
                line-height: 0.1em;
                margin: 10px 0 20px;
            }

            .or-text span {
                color: #00f6ff;
                background: #1f2233;
                padding: 0 10px;
                font-family: 'Jura', sans-serif;
                font-size: 12px;
            }

            .forgot-password {
                font-family: 'Jura', sans-serif;
            }
        </style>
    </head>
</head>
<body style="background: url('assets/images/10sec/BG.jpg'); background-repeat: no-repeat; background-position: top;background-size: cover; height: 100vh;">

<?php include ('include/header.php');?>

<section class="main">
    <div class="container">
        <h2 class="mt-5 mb-3" style="font-size: 50px; font-weight: 700; color: #00eaff;">顧客資料</h2>
        <form action="payment.php" method="post">
            <div class="row">
                <div class="col-12 col-lg-6">
                    <div class="mb-3">
                        <label class="text-white">名稱</label>
                        <input class="form-control login-form-input" name="full_name" required="" type="text">
                    </div>
                    <div class="mb-3">
                        <label class="text-white">電話號碼</label>
                        <input class="form-control login-form-input" name="number" required="" type="text">
                    </div>
                    <div class="mb-3">
                        <label class="text-white">地址</label>
                        <textarea class="form-control login-form-input" name="address" required=""></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="text-white">優惠碼</label>
                        <input class="form-control login-form-input" name="coupon_code" type="text">
                        <span style="color: red; font-size: 28px; display: none;">This code is not valid for you.</span>
                    </div>
                </div>
                <div class="col-12 col-lg-6 mt-lg-0 mt-5">
                    <h2 style="font-size: 50px; font-weight: 700; color: #00eaff;">訂單摘要</h2>
                    <table class="table-bordered text-white mt-5" style="width: 100%; font-size: 25px">
                        <tbody>
                        <?php
                        $total_quantity_new = 0;
                        $total_price_new = 0;
                        if (isset($_SESSION["cart_item"])) {
                            foreach ($_SESSION["cart_item"] as $item) {
                                $item_price = $item["quantity"] * $item["price"];
                                ?>
                                <tr>
                                    <td style="padding: 10px"><img src="<?php echo $item['image']; ?>" alt="" class="img-fluid"></td>
                                    <td><?php echo $item['name']; ?> X <?php echo $item['quantity']; ?></td>
                                    <td><?php echo "HKD " . number_format($item_price, 2); ?></td>
                                </tr>
                                <?php
                                $total_quantity_new += $item["quantity"];
                                $total_price_new += ($item["price"] * $item["quantity"]);
                                echo '<script>';
                                echo 'var totalPrice = ' . json_encode($total_price_new) . ';';
                                echo '</script>';
                            }
                        }
                        ?>
                        </tbody>
                        <tfoot>
                        <tr>
                            <td colspan="2">合計</td>
                            <td id="total-price"><?php echo "HKD " . number_format($total_price_new, 2); ?></td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="row mt-5 text-center">
                    <div class="col-12">
                        <button class="btn add-to-cart" tabindex="0" type="submit" name="placeOrder" id="checkout_button">購買</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

</section>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>

<script>
    $(document).ready(function () {
        $("input[name='coupon_code']").on("keyup input", function () {
            var couponCode = $(this).val();
            let btn = document.getElementById('checkout_button');
            $.ajax({
                type: "POST",
                url: "check_coupon.php", // URL to the PHP file you created
                data: {
                    coupon_code: couponCode,
                    total_price: totalPrice
                },
                success: function (response) {
                    if (response === "true") {
                        $("span").hide();
                        btn.disabled = false; // Enable the button
                    } else {
                        $("span").show();
                        btn.disabled = true; // Disable the button
                    }
                },
                error: function () {
                    console.log("Error in AJAX request");
                }
            });
        });
    });
</script>

</body>
</html>
