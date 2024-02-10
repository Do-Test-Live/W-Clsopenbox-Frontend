<?php
session_start();
include('include/dbController.php');
$db_handle = new DBController();

$user = $_SESSION['userid'];

if (isset($_POST['coupon_code'])) {
    $coupon_code = $_POST['coupon_code'];
    $total_amount = $_POST['total_price'];
    $query = $db_handle->runQuery("select * from spinner_data where cupon_code = '$coupon_code'");
    $coupon_id = $query[0]['id'];
    $min_order = $query[0]['minimum_purchase'];
    $discount = $query[0]['discount_amount'];

    if($total_amount >= $min_order) {
        $validity = $db_handle->runQuery("select * from coupon_code_data where customer_id = '$user' and coupon_code_id = '$coupon_id' and status = '0'");
        $no_validity = $db_handle->numRows("select * from coupon_code_data where customer_id = '$user' and coupon_code_id = '$coupon_id' and status = '0'");
        if($no_validity > 0){
            echo "true";
        }else{
            echo "false";
        }
    }else {
        echo "false";
    }
}