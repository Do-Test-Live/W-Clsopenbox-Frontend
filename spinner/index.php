<?php
session_start();
if(!isset($_SESSION['userid'])){
    echo "
    <script>
    window.location.href = '../login.php';
</script>
    ";
} else{
    $user = $_SESSION['userid'];
}
include('../include/dbController.php');
$db_handle = new DBController();
date_default_timezone_set("Asia/Hong_Kong");


$check_availability = $db_handle->numRows("select * from coupon_code_data where customer_id = '$user' and EXTRACT(MONTH FROM inserted_at) = EXTRACT(MONTH FROM CURRENT_DATE) and EXTRACT(YEAR FROM inserted_at) = EXTRACT(YEAR FROM CURRENT_DATE)");
if($check_availability >= 3){
    echo "
    <script>
    alert('You have already used 3 Spins in this month!');
    window.location.href = '../index.php';
</script>
    ";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Title</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link type="text/css" rel="stylesheet" href="style.css">
</head>
<body class="spin-bg">
<div class="container">
    <div class="wrapper">
        <div class="pointer-wrapper">
            <img src="arrow.png"
                 alt="pointer">
        </div>
        <?php
        $fetch_spinner_image = $db_handle->runQuery("SELECT * FROM `spinner_data` WHERE `spin_angle` = '0'");
        ?>
        <img src="<?php echo $fetch_spinner_image[0]['image_source'];?>" alt="spping wheel" class="wheel" width="100%">
    </div>
    <div class="button" style="margin-top: 70px">
        <button class="btn" id="spin">Spin</button>
    </div>
    <div class="button">
        <a class="btn" href="../index.php" id="spin">Go to Home</a>
    </div>
    <div class="container-fluid cls-section"
         style="background: url('../assets/images/new_website/bg5.png'); background-repeat: no-repeat; background-position: center;background-size: cover; height: 100%; margin-top: -10px;">
        <div class="row card-main" style="padding: 20px; margin: 35px 15px;">
            <div class="col-12 text-center">
                <h2 class="spinner-text">遊戲玩法</h2>
            </div>
            <div class="col-12">
                <p class="spinner-body-text"><img src="arrow-white.png" width="15px"> 註冊用戶每月可免費獲三次禮卷次數</p>
                <p class="spinner-body-text"><img src="arrow-white.png" width="15px"> 獲取後的禮卷可於會員背包查看</p>
                <p class="spinner-body-text"><img src="arrow-white.png" width="15px"> 禮卷適用於消費指定金額作使用</p>
                <p class="spinner-body-text"><img src="arrow-white.png" width="15px"> 每次結賬只能使用一張禮卷</p>
                <p class="spinner-body-text"><img src="arrow-white.png" width="15px"> 禮卷有效期限均為一個月</p>
                <p class="spinner-body-text"><img src="arrow-white.png" width="15px"> 免費禮卷次數將於每月1號重置</p>
            </div>
            <div class="col-12 text-center mt-5">
                <h2 class="spinner-text">禮卷須知</h2>
            </div>
            <div class="col-12">
                <p class="spinner-body-text"><img src="arrow-white.png" width="15px"> 消費滿$1300減$50</p>
                <p class="spinner-body-text"><img src="arrow-white.png" width="15px"> 消費滿$800 減$30</p>
                <p class="spinner-body-text"><img src="arrow-white.png" width="15px"> 滿費滿$500 減$20</p>
                <p class="spinner-body-text"><img src="arrow-white.png" width="15px"> 滿費滿$300 減$10</p>
                <p class="spinner-body-text"><img src="arrow-white.png" width="15px"> 滿費滿$100 減$5</p>
                <p class="spinner-body-text"><img src="arrow-white.png" width="15px"> 共五種精選禮卷等你拎！</p>
            </div>
        </div>
    </div>
</div>

<!-- Vertically centered modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" style="display: none; opacity: 1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <img class="img-fluid" id="gift_image" src="">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="claim">Claim</button>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
<script  src="./script.js"></script>
</body>
</html>