<?php
require('../db/conn.php'); // Kết nối cơ sở dữ liệu

// Lấy dữ liệu email từ form
$email = $_POST['email'];

// Kiểm tra dữ liệu email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Email không hợp lệ.");
}

// Thêm email vào bảng email_subscribers
$sql = "INSERT INTO email_subscribers (email) VALUES (?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);

if ($stmt->execute()) {
    // Chuyển hướng về index.php với thông báo thành công
    header("Location: index.php?success=1");
} else {
    echo "Lỗi khi thêm email: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
