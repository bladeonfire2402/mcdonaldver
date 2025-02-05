<?php
// Kết nối cơ sở dữ liệu
require('../../db/conn.php');

// Lấy ID mã khuyến mãi từ URL
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Kiểm tra nếu ID hợp lệ
if ($id > 0) {
    // Xóa mã khuyến mãi có ID tương ứng
    $sql_str = "DELETE FROM khuyen_mai WHERE id_ma_khuyen_mai = $id";

    // Thực thi câu truy vấn
    if (mysqli_query($conn, $sql_str)) {
        // Chuyển hướng về trang danh sách mã khuyến mãi sau khi xóa thành công
        header("Location: listmagiamgia.php");
        exit();
    } else {
        echo "Lỗi: Không thể xóa mã khuyến mãi. " . mysqli_error($conn);
    }
} else {
    echo "ID mã khuyến mãi không hợp lệ.";
}
