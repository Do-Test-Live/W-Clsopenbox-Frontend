<?php
session_start();
include('include/dbController.php');
$db_handle = new DBController();

$product_id = $_GET['id'];

include ('include/add_to_cart.php');

$fetch_pro = $db_handle->runQuery("SELECT * FROM `gifts`");
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
<body style="background: url('assets/images/10sec/BG.jpg'); background-repeat: no-repeat; background-position: top;background-size: cover; ">

<?php include ('include/header.php');?>

<section class="main">
    <div class="card-wrapper">
        <div class="card">
            <?php
            $fetch_product = $db_handle->runQuery("select * from product where id = '$product_id'");
            ?>
            <!-- card left -->
            <div class="product-imgs">
                <div class="img-display">
                    <div class="img-showcase">
                        <img src="<?php echo $fetch_product[0]['image'];?>"
                             alt="shoe image">
                    </div>
                </div>
            </div>
            <!-- card right -->
            <div class="product-content">
                <h2 class="product-title"><?php echo $fetch_product[0]['name'];?></h2>
                <div class="product-price">
                    <?php
                    if($fetch_product[0]['discount_price'] != 0){
                        ?>
                        <p class="last-price" style="font-size: 3rem; font-family: orbitron-bold,sans-serif;">Price: <span><?php echo $fetch_product[0]['discount_price'];?></span></p>
                        <p class="new-price" style="font-size: 3rem; font-family: orbitron-bold,sans-serif;">Discounted Price: <span><?php echo $fetch_product[0]['price'];?></span></p>
                        <?php
                    } else {
                        ?>
                        <p class="new-price" style="font-size: 3rem; font-family: orbitron-bold,sans-serif;">Price: <span><?php echo $fetch_product[0]['price'];?></span></p>
                        <?php
                    }
                    ?>
                </div>

                <div class="product-detail">
                    <h2 class="mt-5" style="font-size: 3rem; font-family: orbitron-bold,sans-serif;">about this item: </h2>
                    <p style="font-size: 1.5rem; font-family: Jura,sans-serif;"><?php echo $fetch_product[0]['description'];?></p>
                </div>

                <form method="POST" action="product_details.php?action=add&id=<?php echo $_GET['id']; ?>">
                    <div class="purchase-info">
                        <button type="button" class="btn" style="width: 80px; height: 80px; margin-right: 20px; padding-top: 10px; background: #0000ff00; font-family: orbitron-bold,sans-serif;" onclick="minius();">-</button>
                        <input type="number" name="quantity" min="1" value=1 id="quantity">
                        <button type="button" class="btn" style="width: 80px; height: 80px; margin-left: 20px; padding-top: 10px; background: #0000ff00; font-family: orbitron-bold,sans-serif;" onclick="plus();">+</button>


                    </div>
                    <div class="purchase-info">
                        <?php
                        if(isset($_SESSION['userid'])){
                            ?>
                            <button type="submit" class="btn">
                                Add to Cart <i class="fas fa-shopping-cart"></i>
                            </button>
                            <?php
                        } else{
                            ?>
                            <a href="login.php" class="btn">
                                Add to Cart <i class="fas fa-shopping-cart"></i>
                            </a>
                            <?php
                        }
                        ?>

                    </div>
                </form>

            </div>
        </div>
    </div>

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


</section>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
<script>

</script>
</body>
</html>
