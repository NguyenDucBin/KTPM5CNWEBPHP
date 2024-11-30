<?php 
include 'header.php';
require_once 'config.php';

// Lấy danh sách sản phẩm từ database
try {
    $stmt = $conn->prepare("SELECT * FROM products ORDER BY created_at DESC");
    $stmt->execute();
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    echo "Lỗi: " . $e->getMessage();
}
?>

<main>
    <div class="d-flex flex-column align-items-center mb-3">
        <h3>Danh sách sản phẩm</h3>
    </div>
    <div class="container">
        <a href="add_product.php" class="btn btn-success mb-3">Thêm mới</a>
        
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Sản phẩm</th>
                    <th>Giá thành</th>
                    <th>Ngày tạo</th>
                    <th>Sửa</th>
                    <th>Xóa</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($products)) : ?>
                    <tr><td colspan="6">Không có sản phẩm nào.</td></tr>
                <?php else: ?>
                    <?php foreach ($products as $product): ?>
                        <tr>
                            <td><?= htmlspecialchars($product['id']) ?></td>
                            <td><?= htmlspecialchars($product['name']) ?></td>
                            <td><?= number_format($product['price'], 0) ?> VND</td>
                            <td><?= date('d/m/Y H:i', strtotime($product['created_at'])) ?></td>
                            <td>
                                <a href="edit_product.php?id=<?= $product['id'] ?>" class="text-primary">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                            </td>
                            <td>
                                <a href="delete_product.php?id=<?= $product['id'] ?>" 
                                   class="text-danger"
                                   onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này?')">
                                    <i class="bi bi-trash-fill"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</main>

<?php include 'footer.php'; ?>