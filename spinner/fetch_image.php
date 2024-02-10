<?php
session_start();
$user = $_SESSION['userid'];
$spin = $_GET['spin'];
date_default_timezone_set("Asia/Hong_Kong");
$inserted_at = date("Y-m-d H:i:s");

// Replace these with your actual database credentials
$servername = "localhost";
$username = "ugslytd0xpq4v";
$password = "&^1e>j}@3RD{";
$dbname = "dbmqv5byv7apwb";

// Create a connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Query to fetch the image name
$sql = "SELECT * FROM spinner_data WHERE spin_angle = '$spin'";
$result = mysqli_query($conn, $sql);

if ($result) {
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $insert_customer_coupon = "INSERT INTO `coupon_code_data`(`customer_id`, `coupon_code_id`,`inserted_at`) VALUES ('$user','{$row['id']}','$inserted_at')";
        $result1 = mysqli_query($conn, $insert_customer_coupon);
        $imageName = $row['image_source'];
        echo json_encode(['image' => $imageName]);
    } else {
        echo json_encode(['error' => 'Image not found']);
    }
} else {
    echo json_encode(['error' => 'Query error: ' . mysqli_error($conn)]);
}

// Close the connection
mysqli_close($conn);