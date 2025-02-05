<?php
require('../../db/conn.php');

// Lấy dữ liệu từ form
$ten_mon_an = isset($_POST['ten_mon_an']) ? mysqli_real_escape_string($conn, $_POST['ten_mon_an']) : '';
$loai_mon_an = isset($_POST['loai_mon_an']) ? mysqli_real_escape_string($conn, $_POST['loai_mon_an']) : '';
$gia = isset($_POST['gia']) ? mysqli_real_escape_string($conn, $_POST['gia']) : 0;
$id_danh_muc = isset($_POST['id_danh_muc']) ? mysqli_real_escape_string($conn, $_POST['id_danh_muc']) : '';

// Xử lý upload hình ảnh
$hinh_anh_mon_an = '';
if (isset($_FILES['hinh_anh_mon_an']) && $_FILES['hinh_anh_mon_an']['error'] == 0) {
    $target_dir = "uploads/food/"; // Đưa vào nhánh food
    // Tạo thư mục nếu chưa tồn tại
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    $target_file = $target_dir . basename($_FILES["hinh_anh_mon_an"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Chỉ cho phép định dạng JPG, JPEG, PNG
    $valid_extensions = array("jpg", "jpeg", "png");
    if (in_array($imageFileType, $valid_extensions)) {
        if (move_uploaded_file($_FILES["hinh_anh_mon_an"]["tmp_name"], $target_file)) {
            $hinh_anh_mon_an = $target_file;
        } else {
            echo "Có lỗi khi tải lên hình ảnh.";
            exit();
        }
    } else {
        echo "Chỉ chấp nhận các định dạng JPG, JPEG, PNG.";
        exit();
    }
}

// Câu lệnh thêm vào bảng `mon_an`
$sql_str = "INSERT INTO `mon_an` (`id_mon_an`, `ten_mon_an`, `hinh_anh_mon_an`, `loai_mon_an`, `gia`, `id_danh_muc`) 
VALUES (NULL, '$ten_mon_an', '$hinh_anh_mon_an', '$loai_mon_an', $gia, $id_danh_muc);";

// Thực thi câu lệnh
if (mysqli_query($conn, $sql_str)) {
    echo "Món ăn mới đã được tạo thành công";
    header("Location: listmonan.php"); // Trở về trang danh sách món ăn
    exit();
} else {
    echo "Lỗi: " . $sql_str . "<br>" . mysqli_error($conn);
}
?>
