<?php
include 'db.php';

// Truy vấn lấy danh sách hoa
$sql = "SELECT * FROM flowers";
$stmt = $pdo->query($sql);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>14 loại hoa tuyệt đẹp thích hợp trồng để khoe hương sắc dịp xuân hè</title>
    <link rel="stylesheet" href="project/bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="project/bootstrap-5.3.3-dist/css/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="my-4">14 loại hoa tuyệt đẹp thích hợp trồng để khoe hương sắc dịp xuân hè</h1>
        <div class="row">
            <?php
            if ($stmt->rowCount() > 0) {
                while ($row = $stmt->fetch()) {
                    echo '<div class="col-md-4">';
                    echo '<div class="card mb-4">';
                    echo '<img src="images/' . $row['image'] . '" class="card-img-top" alt="' . $row['name'] . '">';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">' . $row['name'] . '</h5>';
                    echo '<p class="card-text">' . $row['description'] . '</p>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo "<p>No flowers found</p>";
            }
            ?>
        </div>
    </div>

    <script src="project/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
// Đóng kết nối PDO (thực tế, PDO sẽ tự đóng khi script kết thúc)
$pdo = null;
?>
