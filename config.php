<?php

// Product Details
// Minimum amount is $0.50 US
$productName = "1小時30分鐘租場服務";
$productID = "DP12345";
$productPrice = 190;
$currency = "hkd";

/*
 * Stripe API configuration
 * Remember to switch to your live publishable and secret key in production!
 * See your keys here: https://dashboard.stripe.com/account/apikeys
 */
define('STRIPE_API_KEY', 'sk_test_51M1Dn9ArJxNWjD969bE2B93Iu3Cww5otvtMa7j2QmVKOGERzGbLxG0CFVeJs34memhGuiT0TblZCDsvhcIqLcZP200n7wS7Jvi');
define('STRIPE_PUBLISHABLE_KEY', 'pk_test_51M1Dn9ArJxNWjD96GPUErAbmU42GEEVnl2s2KYUtDFkFDyDr6g6BOSh4PWT1fthtN9FPbMIFtxu5j2sTA6eGwwyM00iARJjq4M');
define('STRIPE_SUCCESS_URL', 'https://clsopen.ngt.hk/payment-success.php'); //Payment success URL
define('STRIPE_CANCEL_URL', 'https://clsopen.ngt.hk/payment-cancel.php'); //Payment cancel URL

// Database configuration
/*define('DB_HOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'clsopenbox');*/


define('DB_HOST', 'localhost');
define('DB_USERNAME', 'ucvdugdxvu2mk');
define('DB_PASSWORD', 's11j&4{1u#11');
define('DB_NAME', 'dboxsgvavgdgn2');

