<?php
require('../../db/conn.php');

// Lấy dữ liệu từ form
$title = isset($_POST['title']) ? mysqli_real_escape_string($conn, $_POST['title']) : '';
$content = isset($_POST['content']) ? mysqli_real_escape_string($conn, $_POST['content']) : '';
$ngay_dang = date('Y-m-d'); // Lấy ngày hiện tại làm ngày đăng
$ngay_cap_nhat = date('Y-m-d'); // Ngày cập nhật ban đầu cũng là ngày đăng

// Xử lý upload hình ảnh đại diện
$avatar = '';
if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] == 0) {
    $target_dir = "uploads/news/"; // Đưa vào nhánh news
    // Tạo thư mục nếu chưa tồn tại
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    $target_file = $target_dir . basename($_FILES["avatar"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Chỉ cho phép định dạng JPG, JPEG, PNG
    $valid_extensions = array("jpg", "jpeg", "png");
    if (in_array($imageFileType, $valid_extensions)) {
        if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file)) {
            $avatar = $target_file;
        } else {
            echo "Có lỗi khi tải lên hình ảnh.";
            exit();
        }
    } else {
        echo "Chỉ chấp nhận các định dạng JPG, JPEG, PNG.";
        exit();
    }
}

// Câu lệnh thêm vào bảng `tin_tuc`
$sql_str = "INSERT INTO `tin_tuc` (`id_tin_tuc`, `title`, `avatar`, `content`, `ngay_dang`, `ngay_cap_nhat`) 
VALUES (NULL, '$title', '$avatar', '$content', '$ngay_dang', '$ngay_cap_nhat');";

// Thực thi câu lệnh
if (mysqli_query($conn, $sql_str)) {
    echo "Tin tức mới đã được tạo thành công";
    header("Location: listnews.php"); // Trở về trang danh sách tin tức
    exit();
} else {
    echo "Lỗi: " . $sql_str . "<br>" . mysqli_error($conn);
}
?>
