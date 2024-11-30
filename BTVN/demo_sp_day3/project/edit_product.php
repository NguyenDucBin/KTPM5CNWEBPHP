<?php 
include 'header.php';
require_once 'config.php';

if (isset($_GET['id'])) {
    try {
        // Lấy thông tin sản phẩm
        $stmt = $conn->prepare("SELECT * FROM products WHERE id = :id");
        $stmt->bindParam(':id', $_GET['id']);
        $stmt->execute();
        $product = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if (!$product) {
            header("Location: index.php");
            exit();
        }
    } catch(PDOException $e) {
        die("ERROR: Không thể lấy thông tin sản phẩm. " . $e->getMessage());
    }
}
?>

<div class="container mt-4">
    <h3>Sửa sản phẩm</h3>
    <form action="update_product.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
        <div class="mb-3">
            <label for="name" class="form-label">Tên sản phẩm</label>
            <input type="text" class="form-control" id="name" name="name" 
                   value="<?php echo htmlspecialchars($product['name']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Giá</label>
            <input type="number" class="form-control" id="price" name="price" 
                   value="<?php echo htmlspecialchars($product['price']); ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật</button>
        <a href="index.php" class="btn btn-secondary">Hủy</a>
    </form>
</div>

<?php include 'footer.php'; ?>