<?php
// Kết nối cơ sở dữ liệu
require('../../db/conn.php');

// Lấy ID tin tức từ URL
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Kiểm tra nếu ID hợp lệ
if ($id > 0) {
    // Truy vấn để lấy đường dẫn hình ảnh (avatar) của tin tức trước khi xóa
    $sql_select_image = "SELECT avatar FROM tin_tuc WHERE id_tin_tuc = $id";
    $result = mysqli_query($conn, $sql_select_image);
    $news = mysqli_fetch_assoc($result);

    // Kiểm tra và xóa hình ảnh nếu tồn tại
    if ($news && file_exists($news['avatar'])) {
        unlink($news['avatar']);
    }

    // Xóa tin tức có ID tương ứng
    $sql_delete_news = "DELETE FROM tin_tuc WHERE id_tin_tuc = $id";

    // Thực thi câu truy vấn
    if (mysqli_query($conn, $sql_delete_news)) {
        // Chuyển hướng về trang danh sách tin tức sau khi xóa thành công
        header("Location: listnews.php");
        exit();
    } else {
        echo "Lỗi: Không thể xóa tin tức. " . mysqli_error($conn);
    }
} else {
    echo "ID tin tức không hợp lệ.";
}
?>
