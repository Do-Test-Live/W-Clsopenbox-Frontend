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
    </head>
</head>
<body style="background: url('assets/images/10sec/BG.jpg'); background-repeat: no-repeat; background-position: top;background-size: cover;height: 100%;">

<?php include('include/header.php'); ?>

<div class="mx-auto text-center mt-5" style="max-width: 550px; display: none;">
    <div class="square border" data-probability="<?php echo (float)($fetch_pro[0]['gift1'] / 100); ?>" id="id1">
        <div class="textArea">Choose Me</div>
        <div class="textArea2">Gift 1</div>
    </div>
    <div class="square border" data-probability="<?php echo (float)($fetch_pro[0]['gift2'] / 100); ?>">
        <div class="textArea">Choose Me</div>
        <div class="textArea2">Gift 2</div>
    </div>
    <div class="square border" data-probability="<?php echo (float)($fetch_pro[0]['gift3'] / 100); ?>">
        <div class="textArea">Choose Me</div>
        <div class="textArea2">Gift 3</div>
    </div>
    <div class="square border" data-probability="<?php echo (float)($fetch_pro[0]['gift4'] / 100); ?>">
        <div class="textArea">Choose Me</div>
        <div class="textArea2">Gift 4</div>
    </div>
    <div class="square border" data-probability="<?php echo (float)($fetch_pro[0]['gift5'] / 100); ?>">
        <div class="textArea">Choose Me</div>
        <div class="textArea2">Gift 5</div>
    </div>
    <div class="square border" data-probability="<?php echo (float)($fetch_pro[0]['gift6'] / 100); ?>">
        <div class="textArea">Choose Me</div>
        <div class="textArea2">Gift 6</div>
    </div>
    <div class="square border" data-probability="<?php echo (float)($fetch_pro[0]['gift7'] / 100); ?>">
        <div class="textArea">Choose Me</div>
        <div class="textArea2">Gift 7</div>
    </div>
    <div class="square border" data-probability="<?php echo (float)($fetch_pro[0]['gift8'] / 100); ?>">
        <div class="textArea">Choose Me</div>
        <div class="textArea2">Gift 8</div>
    </div>
    <div class="square border" data-probability="<?php echo (float)($fetch_pro[0]['gift9'] / 100); ?>">
        <div class="textArea">Choose Me</div>
        <div class="textArea2">Gift 9</div>
    </div>

    <div id="drawContent"></div>
</div>


<section class="main">
    <div class="row d-flex align-items-end justify-content-end mt-3 mb-3">
        <button class="close-barrage">
            <img src="assets/images/draw/img.png">
        </button>
    </div>
    <div class="row m-3">
        <img src="assets/images/draw/img_1.png" class="img-fluid">
    </div>

    <div class="m-3 draw-back p-3">
        <?php
        if (isset($_SESSION['userid'])) {
            $fetch_no_claim_gift = $db_handle->numRows("select * from transactions where item_name = 'draw' and billing_id = '$userId'");
            $claim_gift = $fetch_no_claim_gift % 4;
            if ($claim_gift == 0) {
                ?>
                <div class="row justify-content-center" style="margin-top: 5rem;">
                    <div class="col-5 mx-2"
                         style="background-color: #00157a; border: 5px solid #00a69f; border-radius: 20px">
                        <div class="row justify-content-center align-items-center text-center">
                            <button id="" style="background: transparent; border: unset"
                                    onclick="window.location.href = 'buy_gift.php?btn=1'">
                                <img src="assets/images/home/box.png" id="gift1">
                            </button>
                        </div>
                    </div>
                    <div class="col-5 mx-2"
                         style="background-color: #00157a; border: 5px solid #00a69f; border-radius: 20px">
                        <div class="row justify-content-center align-items-center">
                            <button style="background: transparent; border: unset"
                                    onclick="window.location.href = 'buy_gift.php?btn=2'">
                                <img src="assets/images/home/box.png" id="gift2">
                            </button>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <hr class="line">
                </div>
                <div class="row mt-2 justify-content-center" style="margin-bottom: 5rem">
                    <div class="col-5 mx-2"
                         style="background-color: #00157a; border: 5px solid #00a69f; border-radius: 20px">
                        <div class="row justify-content-center align-items-center text-center">
                            <button style="background: transparent; border: unset"
                                    onclick="window.location.href = 'buy_gift.php?btn=3'">
                                <img src="assets/images/home/box.png" id="gift3">
                            </button>
                        </div>
                    </div>
                    <div class="col-5 mx-2"
                         style="background-color: #00157a; border: 5px solid #00a69f; border-radius: 20px">
                        <div class="row justify-content-center align-items-center">
                            <button style="background: transparent; border: unset"
                                    onclick="window.location.href = 'buy_gift.php?btn=4'">
                                <img src="assets/images/home/box.png" id="gift4">
                            </button>
                        </div>
                    </div>
                </div>
                <?php
            } elseif ($claim_gift == 1) {
                ?>
                <div class="row justify-content-center" style="margin-top: 5rem;">
                    <div class="col-5 mx-2"
                         style="background-color: #00157a; border: 5px solid #00a69f; border-radius: 20px">
                        <div class="row justify-content-center align-items-center text-center">
                            <button id="" style="background: transparent; border: unset"
                                    onclick="window.location.href = 'buy_gift.php?btn=1'">
                                <img src="assets/images/home/box.png" id="gift1">
                            </button>
                        </div>
                    </div>
                    <div class="col-5 mx-2"
                         style="background-color: #00157a; border: 5px solid #00a69f; border-radius: 20px">
                        <div class="row justify-content-center align-items-center">
                            <button style="background: transparent; border: unset"
                                    onclick="window.location.href = 'buy_gift.php?btn=2'">
                                <img src="assets/images/home/box.png" id="gift2">
                            </button>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <hr class="line">
                </div>
                <div class="row mt-2 justify-content-center" style="margin-bottom: 5rem">
                    <div class="col-5 mx-2"
                         style="background-color: #00157a; border: 5px solid #00a69f; border-radius: 20px">
                        <div class="row justify-content-center align-items-center text-center">
                            <button style="background: transparent; border: unset"
                                    onclick="window.location.href = 'buy_gift.php?btn=3'">
                                <img src="assets/images/home/box.png" id="gift3">
                            </button>
                        </div>
                    </div>
                </div>
                <?php
            } elseif ($claim_gift == 2){
                ?>
                <div class="row justify-content-center" style="margin-top: 5rem;">
                    <div class="col-5 mx-2"
                         style="background-color: #00157a; border: 5px solid #00a69f; border-radius: 20px">
                        <div class="row justify-content-center align-items-center text-center">
                            <button id="" style="background: transparent; border: unset"
                                    onclick="window.location.href = 'buy_gift.php?btn=1'">
                                <img src="assets/images/home/box.png" id="gift1">
                            </button>
                        </div>
                    </div>
                    <div class="col-5 mx-2"
                         style="background-color: #00157a; border: 5px solid #00a69f; border-radius: 20px">
                        <div class="row justify-content-center align-items-center">
                            <button style="background: transparent; border: unset"
                                    onclick="window.location.href = 'buy_gift.php?btn=2'">
                                <img src="assets/images/home/box.png" id="gift2">
                            </button>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <hr class="line">
                </div>
                <?php
            } elseif ($claim_gift == 3){
                ?>
                <div class="row justify-content-center" style="margin-top: 5rem;">
                    <div class="col-5 mx-2"
                         style="background-color: #00157a; border: 5px solid #00a69f; border-radius: 20px">
                        <div class="row justify-content-center align-items-center text-center">
                            <button id="" style="background: transparent; border: unset"
                                    onclick="window.location.href = 'buy_gift.php?btn=1'">
                                <img src="assets/images/home/box.png" id="gift1">
                            </button>
                        </div>
                    </div>
                </div>
                <?php
            }
        } else{
            ?>
            <div class="row justify-content-center" style="margin-top: 5rem;">
                <div class="col-5 mx-2" style="background-color: #00157a; border: 5px solid #00a69f; border-radius: 20px">
                    <div class="row justify-content-center align-items-center text-center">
                        <button id="" style="background: transparent; border: unset"
                                onclick="window.location.href = 'buy_gift.php?btn=1'">
                            <img src="assets/images/home/box.png" id="gift1">
                        </button>
                    </div>
                </div>
                <div class="col-5 mx-2" style="background-color: #00157a; border: 5px solid #00a69f; border-radius: 20px">
                    <div class="row justify-content-center align-items-center">
                        <button style="background: transparent; border: unset"
                                onclick="window.location.href = 'buy_gift.php?btn=2'">
                            <img src="assets/images/home/box.png" id="gift2">
                        </button>
                    </div>
                </div>
            </div>
            <div class="row">
                <hr class="line">
            </div>
            <div class="row mt-2 justify-content-center" style="margin-bottom: 5rem">
                <div class="col-5 mx-2" style="background-color: #00157a; border: 5px solid #00a69f; border-radius: 20px">
                    <div class="row justify-content-center align-items-center text-center">
                        <button style="background: transparent; border: unset"
                                onclick="window.location.href = 'buy_gift.php?btn=3'">
                            <img src="assets/images/home/box.png" id="gift3">
                        </button>
                    </div>
                </div>
                <div class="col-5 mx-2" style="background-color: #00157a; border: 5px solid #00a69f; border-radius: 20px">
                    <div class="row justify-content-center align-items-center">
                        <button style="background: transparent; border: unset"
                                onclick="window.location.href = 'buy_gift.php?btn=4'">
                            <img src="assets/images/home/box.png" id="gift4">
                        </button>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>


        <div class="row mt-5 mb-5 pt-5 d-flex align-items-center justify-content-center">
            <div class="col-6 d-flex align-items-center justify-content-center"
                 style="margin-top: 60px; margin-bottom: 60px">
                <button style="background: transparent; border: unset;">
                    <img src="assets/images/draw/img_3.png">
                </button>
            </div>
            <div class="col-3 d-flex align-items-center justify-content-center"
                 style="margin-top: 60px; margin-bottom: 60px">
                <button style="background: transparent; border: unset;">
                    <img src="assets/images/draw/img_4.png" style="width: 100px;">
                </button>
            </div>
            <div class="col-3 d-flex align-items-center justify-content-center"
                 style="margin-top: 60px; margin-bottom: 60px">
                <button style="background: transparent; border: unset;">
                    <img src="assets/images/draw/img_5.png" style="width: 100px;">
                </button>
            </div>
        </div>
    </div>

    <div class="row mt-5 mb-5 footer-banner">
        <div class="col-2 d-flex align-items-center justify-content-center">
            <img src="assets/images/draw/img_6.png" style="padding: 20px; width: 150px">
        </div>
        <div class="col-10 d-flex align-items-center justify-content-center" style="text-align: center">
            <p style="font-size: 24px; padding-right: 20px;padding-top: 20px;">Probability Description: A full set of 10
                styles <span style="color: white">(10% chance for each style)</span>+ 3 hidden versions<span
                        style="color: white">(1.49% chance for each style)</span></p>
        </div>

    </div>

</section>


<div class="winning-modal" id="modal" style="display: none;">
    <div class="winnig-content">
        <h2 id="gift-name" style=" font-size: 5rem;color: white;"></h2>
        <img src="" class="gft-image" id="gift-image">
        <button class="btn gift-claim-button" type="button" id="claim">Claim Prize</button>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
</body>
</html>
