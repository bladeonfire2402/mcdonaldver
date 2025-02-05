<?php
session_start();
$errorMsg = "";

if (isset($_POST["btSubmit"])) {
    // Lấy dữ liệu từ form
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Kết nối cơ sở dữ liệu
    require('../../db/conn.php');

    // Tránh lỗi SQL injection bằng cách sử dụng prepared statements
    $stmt = $conn->prepare("SELECT * FROM admins WHERE email=?");
    $stmt->bind_param("s", $email); // "s" là kiểu dữ liệu cho email
    $stmt->execute();
    $result = $stmt->get_result();

    // Kiểm tra số lượng record trả về: > 0: đăng nhập thành công
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Kiểm tra mật khẩu
        if ($row['password'] === $password) { // Nếu mật khẩu không được mã hóa
            // Lưu trữ thông tin đăng nhập vào session
            $_SESSION['user'] = $row;

            // Chuyển qua trang quản trị
            header("Location: index.php");
            exit;
        } else {
            $errorMsg = "Mật khẩu không đúng";
        }
    } else {
        $errorMsg = "Không tìm thấy thông tin tài khoản trong hệ thống";
    }

    // Đóng kết nối cơ sở dữ liệu
    $stmt->close();
    $conn->close();
}
?>