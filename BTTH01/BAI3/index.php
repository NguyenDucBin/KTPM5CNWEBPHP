<?php
include('db.php');

$sql = "SELECT * FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h1>Danh sách người dùng</h1>";
    echo "<table border='1'><tr><th>ID</th><th>Username</th><th>Password</th><th>Lastname</th><th>Firstname</th><th>City</th><th>Email</th><th>Course</th></tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row['id'] . "</td><td>" . $row['username'] . "</td><td>" . $row['password'] . "</td><td>" . $row['lastname'] . "</td><td>" . $row['firstname'] . "</td><td>" . $row['city'] . "</td><td>" . $row['email'] . "</td><td>" . $row['course1'] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "Không có dữ liệu.";
}

$conn->close();
?>