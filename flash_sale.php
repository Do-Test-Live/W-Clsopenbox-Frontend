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
        <link type="text/css" rel="stylesheet" href="assets/css/style.css">
    </head>
</head>
<body style="background: url('assets/images/10sec/BG.jpg'); background-repeat: no-repeat; background-position: top;background-size: cover; height: 100%">

<?php include('include/header.php'); ?>

<section class="main">
    <div class="container-fluid">
        <img src="assets/images/ecom/Untitled-3.png" class="img-fluid">
    </div>
    <div class="container-fluid cls-section"
         style="background: url('assets/images/ecom/Untitled-2.png'); background-repeat: no-repeat; background-position: top;background-size: cover; height: 100%;">
        <div class="row" style="padding: 20px; margin: 35px 15px; height: 950px !important;">
            <div class="col-12 text-center">
                <a href="spinner/index.php" class="btn" tabindex="0"><img src="assets/images/ecom/Untitled-5.png" class="img-fluid"></a>
            </div>
            <div class="col-12">
                <p class="spinner-body-text">在這場限時閃購活動中 ， 我們將為您呈現各種商品 ， 包括時尚服飾、家居用品、電子產品、美妝保健品等等 。 無論您是要買給自己 ， 還是送給親朋戚友 ，<span style="color: #00d6ff">現在都是絕佳機會！ 只待您來挑選！</span> </p>
                </br></br>
                <p class="spinner-body-text"><span style="color: #00d6ff">更令人興奮的是！</span></p>
                <p class="spinner-body-text">以超低價格擁有心儀的商品 。</p>
                <p class="spinner-body-text">您不僅能節省金錢 ，</p>
                <p class="spinner-body-text"><span style="color: #00d6ff">還能擁有獨一無二的購物樂趣！</span></p>
                </br></br>
                <p class="spinner-body-text"><span style="color: #00d6ff">開始您的限時搶購之旅吧！</span></p>
                <p class="spinner-body-text"><span style="color: #00d6ff">抓住限時閃購的機會 ， 立即行動！</span></p>
                <p class="spinner-body-text">我們期待為您帶來最好的購物體驗 。</p>
            </div>
        </div>
    </div>

</section>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="assets/js/custom.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
<script>
    $(document).ready(function () {
        $('.slider').slick({
            slidesToShow: 2,
            slidesToScroll: 1,
            responsive: [
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 2
                    }
                }
            ]
        });
    });
</script>
</body>
</html>
