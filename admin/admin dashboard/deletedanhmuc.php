<?php
ob_start(); // Bắt đầu bộ đệm đầu ra
require('./include/header.php'); // Kết nối đến tệp header
require('../../db/conn.php');    // Kết nối đến cơ sở dữ liệu

// Lấy ID của danh mục từ URL
$id = intval($_GET['id']);

// Kiểm tra xem danh mục có tồn tại hay không
$sql_check = "SELECT * FROM danh_muc_do_an WHERE id_danh_muc = $id";
$result_check = mysqli_query($conn, $sql_check);
$category = mysqli_fetch_assoc($result_check);

if (!$category) {
    echo "Danh mục không tồn tại.";
    exit();
}

// Thực hiện xóa danh mục
$sql_delete = "DELETE FROM danh_muc_do_an WHERE id_danh_muc = $id";
if (mysqli_query($conn, $sql_delete)) {
    // Xóa thành công, chuyển hướng về trang danh sách danh mục
    header("Location: listdanhmucdoan.php");
    exit();
} else {
    echo "Lỗi: Không thể xóa danh mục. " . mysqli_error($conn);
}

require('./include/footer.php');
ob_end_flush(); // Đẩy nội dung bộ đệm ra trình duyệt
?>
