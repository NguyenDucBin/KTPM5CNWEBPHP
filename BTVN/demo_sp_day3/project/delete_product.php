<?php
require_once 'config.php';

if (isset($_GET['id'])) {
    try {
        // Chuẩn bị câu lệnh DELETE
        $sql = "DELETE FROM products WHERE id = :id";
        $stmt = $conn->prepare($sql);
        
        // Bind ID
        $stmt->bindParam(':id', $_GET['id']);
        
        // Thực thi câu lệnh
        $stmt->execute();
        
        header("Location: index.php");
    } catch(PDOException $e) {
        die("ERROR: Không thể xóa sản phẩm. " . $e->getMessage());
    }
}