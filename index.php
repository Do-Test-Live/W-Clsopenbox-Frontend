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
    <div class="row mb-3 image-container">
        <!--<img src="assets/images/home/1.png" class="img-fluid">-->
        <video width="100%" height="auto" autoplay loop muted>
            <source src="assets/images/Untitled%20Project.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        <div class="button-container">
            <a href="https://clsopenecom.ngt.hk/Brands?catId=1" class="left-button"></a>
            <a href="draw.php" class="right-button"></a>
        </div>
    </div>
    <div class="row mb-5"
         style="background: url('assets/images/home/2.png'); background-repeat: no-repeat; background-position: center;background-size: cover; height: 35vh">
        <div class="col-12 text-center">
            <h1 class="banner-section-heading">iphone 14 pro max</h1>
            <div class="container">
                <h2 class="banner-section-heading-two">Latest News & Rumors</h2>
            </div>
        </div>
    </div>
    <div class="row flex align-item-center justify-content-center">
        <div class="col-10">
            <img class="img-fluid main-image-10sec" src="assets/images/10sec/Title.png">
        </div>
    </div>

    <div class="row">
        <div class="col-4 text-end">
            <p class="progress-bar-text">Mode</p>
        </div>
        <div class="col-4">
            <div class="progress">
                <div class="bar" style="width:35%">
                    <p class="percent"></p>
                </div>
            </div>
        </div>
        <div class="col-4">
            <p class="progress-bar-text">10 Sec Challenge</p>
        </div>
    </div>
    <div class="row">
        <div class="col-4 text-end">
            <p class="progress-bar-text">Millisecond</p>
        </div>
        <div class="col-4">
            <div class="progress">
                <div class="bar" style="width:35%">
                    <p class="percent"></p>
                </div>
            </div>
        </div>
        <div class="col-4">
            <p class="progress-bar-text">10.0000</p>
        </div>
    </div>
    <div class="row">
        <div class="col-4 text-end">
            <p class="progress-bar-text">Challenge</p>
        </div>
        <div class="col-4">
            <div class="progress">
                <div class="bar" style="width:35%">
                    <p class="percent"></p>
                </div>
            </div>
        </div>
        <div class="col-4">
            <p class="progress-bar-text">10.0000</p>
        </div>
    </div>

    <div class="row mt-5 container-fluid">
        <div class="col-12">
            <img src="assets/images/new_website/title-bar.png" class="img-fluid">
        </div>
    </div>


    <div class="container-fluid cls-section" style="padding-bottom: 0 !important;">
        <div class="row">
            <div class="slider">
                <div class="card">
                    <div>
                        <img src="assets/images/new_website/toy01.png" alt="Image 1" class="mt-5 img-fluid">
                    </div>
                </div>
                <div class="card">
                    <div>
                        <img src="assets/images/new_website/toy02.png" alt="Image 2" class="mt-5 img-fluid">
                    </div>
                </div>
                <div class="card">
                    <div>
                        <img src="assets/images/new_website/toy01.png" alt="Image 1" class="mt-5 img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <img src="assets/images/new_website/pic07.png" style="width: 100%">
        </div>
    </div>

    <div class="container-fluid cls-section" style="padding-top: 0 !important; margin-top: -45px;">
        <div class="row">
            <div class="slider">
                <div class="card">
                    <div>
                        <img src="assets/images/new_website/toy03.png" alt="Image 1" class="mt-5 img-fluid">
                    </div>
                </div>
                <div class="card">
                    <div>
                        <img src="assets/images/new_website/toy04.png" alt="Image 2" class="mt-5 img-fluid">
                    </div>
                </div>
                <div class="card">
                    <div>
                        <img src="assets/images/new_website/toy03.png" alt="Image 1" class="mt-5 img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container-fluid">
        <div class="row mt-5 mb-5 flex align-item-center justify-content-center">
            <div class="col-5 mx-2 gift-box" style="background-color: #fedd1c;">
                <div class="row">
                    <div class="col-4">
                        <img src="assets/images/home/3.png" class="img-fluid">
                    </div>
                    <div class="col-8 text-end mt-5">
                        <h4 class="gift-box-text">會員簽到禮</h4>
                        <button class="price-button">GO</button>
                    </div>
                </div>
            </div>
            <div class="col-5 mx-2 gift-box" style="background-color: #16a8db;">
                <div class="row">
                    <div class="col-4">
                        <img src="assets/images/home/4.png" class="img-fluid">
                    </div>
                    <div class="col-8 text-end mt-5">
                        <h4 class="gift-box-text">|新會員註冊</h4>
                        <a href="signup.php" class="price-button">GO</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="blind-box">
        <div class="row blind-box-row-image justify-content-center">
            <div class="col-3 text-center">
                <img class="img-fluid" src="assets/images/package_bundle/recharge.png">
            </div>
            <div class="col-3 text-center">
                <a href="https://clsopenecom.ngt.hk/">
                    <img class="img-fluid" src="assets/images/package_bundle/mall.png">
                </a>
            </div>
            <div class="col-3 text-center">
                <a href="draw.php">
                    <img class="img-fluid" src="assets/images/package_bundle/diy-bilnd-box-icon.png">
                </a>
            </div>
            <div class="col-3 text-center">
                <a href="profile.php">
                    <img class="img-fluid" src="assets/images/package_bundle/backpack.png">
                </a>
            </div>
        </div>
        <div class="row justify-content-center mb-5">
            <div class="col-3 text-center">
                <p class="blind-box-text">Recharge</p>
            </div>
            <div class="col-3 text-center">
                <p class="blind-box-text">Mall</p>
            </div>
            <div class="col-3 text-center">
                <p class="blind-box-text">Blind Box</p>
            </div>
            <div class="col-3 text-center">
                <p class="blind-box-text">Backpack</p>
            </div>
        </div>
    </div>


    <div class="diy-blind-box">
        <div class="row">
            <div class="col-2">
                <img src="assets/images/package_bundle/Character.png" class="img-fluid">
            </div>
            <div class="col-10" style="bottom: 0 !important;">
                <h2 class="diy-blind-box-text">CLS開盒系列</h2>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-6 text-center">
                <img class="img-fluid" src="assets/images/package_bundle/diy-blind-box.png">
            </div>
            <div class="col-6 text-center">
                <img class="img-fluid" src="assets/images/package_bundle/diy-blind-box-2.png">
            </div>
        </div>
        <div class="row mb-5 mt-3">
            <div class="col-6 text-center">
                <p class="diy-blind-box-heading">DIY BLIND BOX</p>
                <p class="diy-blind-box-subheading">Monthly recharge over 1000</p>
            </div>
            <div class="col-6 text-center">
                <p class="diy-blind-box-heading">DIY BLIND BOX</p>
                <p class="diy-blind-box-subheading">Monthly recharge over 1000</p>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-12 text-center">
                <img class="img-fluid" src="assets/images/package_bundle/diy-blind-box-3.png">
            </div>
        </div>
        <div class="row mb-5 mt-3">
            <div class="col-12 text-center">
                <p class="diy-blind-box-heading">DIY BLIND BOX</p>
                <p class="diy-blind-box-subheading">Monthly recharge over 1000</p>
            </div>
        </div>
    </div>


    <div class="container-fluid cls-section"
         style="background: url('assets/images/new_website/slider-bg.jpg'); background-repeat: no-repeat; background-position: center;background-size: cover; height: 100%; margin-top: -10px;">
        <div class="row cls-banner-1">
            <div class="col-12">
                <img src="assets/images/new_website/title.png" class="img-fluid">
            </div>
        </div>
        <div class="row">
            <div class="slider">
                <div class="card">
                    <img src="assets/images/new_website/pic05.png" alt="Image 1" class="mt-5 img-fluid"
                         style="border: 4px solid #933686;border-radius: 25px;">
                    <div class="row mt-5">
                        <button class="btn add-to-cart">香港小店</button>
                    </div>

                </div>
                <div class="card">
                    <img src="assets/images/new_website/pic06.png" alt="Image 2" class="mt-5 img-fluid"
                         style="border: 4px solid #933686;border-radius: 25px;">
                    <div class="row mt-5">
                        <button class="btn add-to-cart">香港小店</button>
                    </div>
                </div>
                <div class="card">
                    <img src="assets/images/new_website/pic05.png" alt="Image 3" class="mt-5 img-fluid"
                         style="border: 4px solid #933686;border-radius: 25px;">
                    <div class="row mt-5">
                        <button class="btn add-to-cart">香港小店</button>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <div class="row" style="margin-top: -8px;">
        <div class="col-12">
            <img src="assets/images/new_website/line1.png" class="img-fluid">
        </div>
    </div>

    <div class="container-fluid cls-section"
         style="background: url('assets/images/new_website/bg1.png'); background-repeat: no-repeat; background-position: center;background-size: cover; height: 100%; margin-top: -10px;">
        <div class="row cls-banner">
            <div class="col-3">
                <h1>CLS</h1>
            </div>
            <div class="col-3 pt-2">
                <div class="row">
                    <h6>開盒系列</h6>
                </div>
                <div class="row">
                    <p>One Day Deal</p>
                </div>
            </div>
            <div class="col-4 text-center">
                <div id="countdown">
                    <ul style="padding-left: 0 !important;">
                        <li><span id="hours"></span>Hours</li>
                        <li><span id="minutes"></span>Mins</li>
                        <li><span id="seconds"></span>Secs</li>
                    </ul>
                </div>
            </div>
            <div class="col-2 my-auto mx-auto">
                <img src="assets/images/new_website/Arrow.png" class="img-fluid p-3">
            </div>
        </div>
        <div class="row">
            <div class="slider">
                <?php
                $data = $db_handle->runQuery("SELECT * FROM product where product_shelf=2");
                $row_count = $db_handle->numRows("SELECT * FROM product where product_shelf=2");
                for ($i = 0; $i < $row_count; $i++) {
                    ?>
                    <div class="card">
                        <div class="card-main">
                            <img src="<?php echo $data[$i]["image"]; ?>" alt="Image 1" class="mt-5 img-fluid">
                            <h3><?php echo $data[$i]["name"]; ?></h3>
                            <p><?php echo $data[$i]["description"]; ?></p>
                            <div class="row text-start">
                                <p class="price text-center">
                                    $<?php echo $data[$i]["price"]; ?>
                                    <?php if ($data[$i]["discount_price"] != 0) { ?>
                                        <span class="line-over-text">$<?php echo $data[$i]["discount_price"]; ?></span>
                                    <?php } ?>
                                </p>
                            </div>
                        </div>
                        <div class="row mt-5">
                            <a href="product_details.php?id=<?php echo $data[$i]["id"]; ?>" class="btn add-to-cart">Add
                                To The Cart</a>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>

    </div>

    <div class="row" style="margin-top: -8px;">
        <div class="col-12">
            <img src="assets/images/new_website/line2.png" class="img-fluid">
        </div>
    </div>

    <div class="container-fluid cls-section"
         style="background: url('assets/images/new_website/bg2.png'); background-repeat: no-repeat; background-position: center;background-size: cover; height: 100%; margin-top: -10px;">
        <div class="row cls-banner-1">
            <div class="col-2">
                <img src="assets/images/new_website/Arrow.png" class="img-fluid p-3">
            </div>
        </div>
        <div class="row">
            <div class="slider">

                <?php
                $data = $db_handle->runQuery("SELECT * FROM product where product_shelf=3");
                $row_count = $db_handle->numRows("SELECT * FROM product where product_shelf=3");
                for ($i = 0; $i < $row_count; $i++) {
                    ?>
                    <div class="card">
                        <div class="card-main">
                            <img src="<?php echo $data[$i]["image"]; ?>" alt="Image 1" class="mt-5 img-fluid">
                            <h3><?php echo $data[$i]["name"]; ?></h3>
                            <p><?php echo $data[$i]["description"]; ?></p>
                            <div class="row text-start">
                                <p class="price">
                                    $<?php echo $data[$i]["price"]; ?>
                                    <?php if ($data[$i]["discount_price"] != 0) { ?>
                                        <span class="line-over-text">$<?php echo $data[$i]["discount_price"]; ?></span>
                                    <?php } ?>
                                </p>
                            </div>
                        </div>
                        <div class="row mt-5">
                            <a href="product_details.php?id=<?php echo $data[$i]["id"]; ?>" class="btn add-to-cart">Add
                                To The Cart</a>
                        </div>
                    </div>
                    <?php
                }
                ?>

            </div>
        </div>
    </div>

    <div class="row" style="margin-top: -8px;">
        <div class="col-12">
            <img src="assets/images/new_website/line3.png" class="img-fluid">
        </div>
    </div>

    <div class="container-fluid cls-section"
         style="background: url('assets/images/new_website/bg3.png'); background-repeat: no-repeat; background-position: center;background-size: cover; height: 100%; margin-top: -10px;">
        <div class="row cls-banner-2">
            <div class="col-2">
                <img src="assets/images/new_website/Arrow.png" class="img-fluid p-3">
            </div>
        </div>
        <div class="row">
            <div class="slider">
                <?php
                $data = $db_handle->runQuery("SELECT * FROM product where product_shelf=4");
                $row_count = $db_handle->numRows("SELECT * FROM product where product_shelf=4");
                for ($i = 0; $i < $row_count; $i++) {
                    ?>
                    <div class="card">
                        <div class="card-main">
                            <img src="<?php echo $data[$i]["image"]; ?>" alt="Image 1" class="mt-5 img-fluid">
                            <h3><?php echo $data[$i]["name"]; ?></h3>
                            <p><?php echo $data[$i]["description"]; ?></p>
                            <div class="row text-start">
                                <p class="price" style="margin-top: 70px;">
                                    $<?php echo $data[$i]["price"]; ?>
                                    <?php if ($data[$i]["discount_price"] != 0) { ?>
                                        <span class="line-over-text">$<?php echo $data[$i]["discount_price"]; ?></span>
                                    <?php } ?>
                                </p>
                            </div>
                        </div>
                        <div class="row mt-5">
                            <a href="product_details.php?id=<?php echo $data[$i]["id"]; ?>" class="btn add-to-cart">Add
                                To The Cart</a>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>

    </div>

    <div class="row" style="margin-top: -8px;">
        <div class="col-12">
            <img src="assets/images/new_website/line4.png" class="img-fluid">
        </div>
    </div>

    <div class="container-fluid cls-section"
         style="background: url('assets/images/new_website/bg4.png'); background-repeat: no-repeat; background-position: center;background-size: cover; height: 100%; margin-top: -10px;">
        <div class="row cls-banner-3">
            <div class="col-2">
                <img src="assets/images/new_website/Arrow-Golden.png" class="img-fluid p-3">
            </div>
        </div>
        <div class="row">
            <div class="slider">

                <?php
                $data = $db_handle->runQuery("SELECT * FROM product where product_shelf=5");
                $row_count = $db_handle->numRows("SELECT * FROM product where product_shelf=5");
                for ($i = 0; $i < $row_count; $i++) {
                    ?>
                    <div class="card">
                        <div class="card-main-golden">
                            <img src="<?php echo $data[$i]["image"]; ?>" alt="Image 1" class="mt-5 img-fluid">
                            <h3><?php echo $data[$i]["name"]; ?></h3>
                            <p><?php echo $data[$i]["description"]; ?></p>
                            <div class="row text-start">
                                <p class="price">
                                    $<?php echo $data[$i]["price"]; ?>
                                    <?php if ($data[$i]["discount_price"] != 0) { ?>
                                        <span class="line-over-text">$<?php echo $data[$i]["discount_price"]; ?></span>
                                    <?php } ?>
                                </p>
                            </div>
                        </div>
                        <div class="row mt-5">
                            <a href="product_details.php?id=<?php echo $data[$i]["id"]; ?>" class="btn add-to-cart">Add
                                To The Cart</a>
                        </div>
                    </div>
                    <?php
                }
                ?>

            </div>
        </div>

    </div>

    <div class="row p-5 feature text-center">
        <h2 class="feature-text">FEATURED ITEMS</h2>
    </div>
    <div class="row mt-5 mb-5 justify-content-center">
        <div class="col-5 mx-2" style="background-color: #00157a; border: 5px solid #00a69f; border-radius: 20px">
            <div class="row justify-content-center align-items-center text-center p-5">
                <img src="assets/images/home/5.png" style="height: 300px;width: 250px;">
                <h6 class="mt-3 gift-name text-center">Apple Watch S8</h6>
                <p class="mt-2 price-gift text-center">$XXX</p>
            </div>
        </div>
        <div class="col-5 mx-2" style="background-color: #00157a; border: 5px solid #00a69f; border-radius: 20px">
            <div class="row justify-content-center align-items-center p-5">
                <img src="assets/images/home/6.png" style="height: 300px;width: 250px;">
                <h6 class="mt-3 gift-name text-center">AIRPODS 3</h6>
                <p class="mt-2 price-gift text-center">$XXX</p>
            </div>
        </div>
    </div>
    <div class="row mt-5 mb-5 justify-content-center">
        <div class="col-5 mx-2" style="background-color: #00157a; border: 5px solid #00a69f; border-radius: 20px">
            <div class="row justify-content-center align-items-center text-center p-5">
                <img src="assets/images/home/6.png" style="height: 300px;width: 250px;">
                <h6 class="mt-3 gift-name text-center">AIRPODS 3</h6>
                <p class="mt-2 price-gift text-center">$XXX</p>
            </div>
        </div>
        <div class="col-5 mx-2" style="background-color: #00157a; border: 5px solid #00a69f; border-radius: 20px">
            <div class="row justify-content-center align-items-center p-5">
                <img src="assets/images/home/7.png" style="height: 300px;width: 250px;">
                <h6 class="mt-3 gift-name text-center">IPHONE 14 PRO</h6>
                <p class="mt-2 price-gift text-center">$XXX</p>
            </div>
        </div>
    </div>

    <div class="container-fluid cls-section"
         style="background: url('assets/images/new_website/bg5.png'); background-repeat: no-repeat; background-position: center;background-size: cover; height: 100%; margin-top: -10px;">
        <div class="row card-main" style="padding: 20px; margin: 35px 15px; height: 1250px !important;">
            <div class="col-12 text-center">
                <h2 class="spinner-text">遊戲玩法</h2>
            </div>
            <div class="col-12">
                <p class="spinner-body-text"><img src="spinner/arrow-white.png" style="width: 30px; display: inline-block;"> 註冊用戶每月可免費獲三次禮卷次數</p>
                <p class="spinner-body-text"><img src="spinner/arrow-white.png" style="width: 30px; display: inline-block;"> 獲取後的禮卷可於會員背包查看</p>
                <p class="spinner-body-text"><img src="spinner/arrow-white.png" style="width: 30px; display: inline-block;"> 禮卷適用於消費指定金額作使用</p>
                <p class="spinner-body-text"><img src="spinner/arrow-white.png" style="width: 30px; display: inline-block;"> 每次結賬只能使用一張禮卷</p>
                <p class="spinner-body-text"><img src="spinner/arrow-white.png" style="width: 30px; display: inline-block;"> 禮卷有效期限均為一個月</p>
                <p class="spinner-body-text"><img src="spinner/arrow-white.png" style="width: 30px; display: inline-block;"> 免費禮卷次數將於每月1號重置</p>
            </div>
            <div class="col-12 text-center mt-5">
                <h2 class="spinner-text">禮卷須知</h2>
            </div>
            <div class="col-12">
                <p class="spinner-body-text"><img src="spinner/arrow-white.png" style="width: 30px; display: inline-block;"> 消費滿$1300減$50</p>
                <p class="spinner-body-text"><img src="spinner/arrow-white.png" style="width: 30px; display: inline-block;"> 消費滿$800 減$30</p>
                <p class="spinner-body-text"><img src="spinner/arrow-white.png" style="width: 30px; display: inline-block;"> 滿費滿$500 減$20</p>
                <p class="spinner-body-text"><img src="spinner/arrow-white.png" style="width: 30px; display: inline-block;"> 滿費滿$300 減$10</p>
                <p class="spinner-body-text"><img src="spinner/arrow-white.png" style="width: 30px; display: inline-block;"> 滿費滿$100 減$5</p>
                <p class="spinner-body-text"><img src="spinner/arrow-white.png" style="width: 30px; display: inline-block;"> 共五種精選禮卷等你拎！</p>
            </div>
            <div class="col-12 text-center">
                <a href="spinner/index.php" class="btn add-to-cart" tabindex="0">Spin</a>
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
            autoplay: true,
            autoplaySpeed: 2000,
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
