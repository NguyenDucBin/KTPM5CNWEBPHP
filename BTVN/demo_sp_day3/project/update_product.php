<?php
require_once 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        // Chuẩn bị câu lệnh UPDATE
        $sql = "UPDATE products SET name = :name, price = :price WHERE id = :id";
        $stmt = $conn->prepare($sql);
        
        // Bind các giá trị
        $stmt->bindParam(':name', $_POST['name']);
        $stmt->bindParam(':price', $_POST['price']);
        $stmt->bindParam(':id', $_POST['id']);
        
        // Thực thi câu lệnh
        $stmt->execute();
        
        header("Location: index.php");
    } catch(PDOException $e) {
        die("ERROR: Không thể cập nhật sản phẩm. " . $e->getMessage());
    }
}