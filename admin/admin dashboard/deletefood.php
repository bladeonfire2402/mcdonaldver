<?php
// Kết nối cơ sở dữ liệu
require('../../db/conn.php');

// Lấy ID món ăn từ URL
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Kiểm tra nếu ID hợp lệ
if ($id > 0) {
    // Truy vấn để lấy đường dẫn hình ảnh của món ăn trước khi xóa
    $sql_select_image = "SELECT hinh_anh_mon_an FROM mon_an WHERE id_mon_an = $id";
    $result = mysqli_query($conn, $sql_select_image);
    $food = mysqli_fetch_assoc($result);

    // Kiểm tra và xóa hình ảnh nếu tồn tại
    if ($food && file_exists($food['hinh_anh_mon_an'])) {
        unlink($food['hinh_anh_mon_an']);
    }

    // Xóa món ăn có ID tương ứng
    $sql_delete_food = "DELETE FROM mon_an WHERE id_mon_an = $id";

    // Thực thi câu truy vấn
    if (mysqli_query($conn, $sql_delete_food)) {
        // Chuyển hướng về trang danh sách món ăn sau khi xóa thành công
        header("Location: listmonan.php");
        exit();
    } else {
        echo "Lỗi: Không thể xóa món ăn. " . mysqli_error($conn);
    }
} else {
    echo "ID món ăn không hợp lệ.";
}
