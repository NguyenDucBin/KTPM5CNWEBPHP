<?php
require_once 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        // Chuẩn bị câu lệnh INSERT
        $sql = "INSERT INTO products (name, price) VALUES (:name, :price)";
        $stmt = $conn->prepare($sql);
        
        // Bind các giá trị
        $stmt->bindParam(':name', $_POST['name']);
        $stmt->bindParam(':price', $_POST['price']);
        
        // Thực thi câu lệnh
        $stmt->execute();
        
        header("Location: index.php");
    } catch(PDOException $e) {
        die("ERROR: Không thể thêm sản phẩm. " . $e->getMessage());
    }
}