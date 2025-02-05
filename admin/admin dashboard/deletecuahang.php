<?php
ob_start(); // Bắt đầu bộ đệm đầu ra để tránh lỗi header
require('./include/header.php'); // Kết nối đến tệp header
require('../../db/conn.php');    // Kết nối đến cơ sở dữ liệu

// Lấy ID của cửa hàng từ URL
$id = intval($_GET['id']);

// Kiểm tra xem cửa hàng có tồn tại hay không
$sql_check = "SELECT * FROM cua_hang WHERE id_cua_hang = $id";
$result_check = mysqli_query($conn, $sql_check);
$store = mysqli_fetch_assoc($result_check);

if (!$store) {
    echo "Cửa hàng không tồn tại.";
    exit();
}

// Thực hiện xóa cửa hàng
$sql_delete = "DELETE FROM cua_hang WHERE id_cua_hang = $id";
if (mysqli_query($conn, $sql_delete)) {
    // Xóa thành công, chuyển hướng về trang danh sách cửa hàng
    header("Location: listcuahang.php");
    exit();
} else {
    echo "Lỗi: Không thể xóa cửa hàng. " . mysqli_error($conn);
}

require('./include/footer.php');
ob_end_flush(); // Đẩy nội dung bộ đệm ra trình duyệt
?>
