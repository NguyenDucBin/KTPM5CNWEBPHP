<?php
include '../db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Xóa ảnh từ thư mục images
    $sql = "SELECT image FROM flowers WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id' => $id]);
    $row = $stmt->fetch();
    if ($row) {
        $image = $row['image'];
        unlink("../images/$image"); // Xóa file ảnh

        // Xóa hoa khỏi CSDL
        $sql = "DELETE FROM flowers WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':id' => $id]);
        echo "Hoa đã được xóa thành công.";
    }
} else {
    echo "ID không hợp lệ.";
}

header("Location: list.php"); // Quay lại trang danh sách hoa
exit;
?>
