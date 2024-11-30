<?php
// Thông tin kết nối database
define('DB_SERVER', 'localhost');  // Địa chỉ host MySQL, thường là localhost
define('DB_NAME', 'product_management'); // Tên database của bạn
define('DB_USERNAME', 'root');     // Username mặc định thường là root
define('DB_PASSWORD', '');         // Password, để trống nếu không có

try {
    // Thiết lập các options cho PDO
    $options = array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
    );

    // Tạo kết nối PDO
    $conn = new PDO(
        "mysql:host=".DB_SERVER.";dbname=".DB_NAME,
        DB_USERNAME, 
        DB_PASSWORD,
        $options
    );

    

} catch(PDOException $e) {
    die("Lỗi kết nối: " . $e->getMessage());
}
?>