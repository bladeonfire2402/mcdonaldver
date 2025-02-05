<?php
require('../../db/conn.php');

// Lấy dữ liệu từ form
$code_khuyen_mai = isset($_POST['code_khuyen_mai']) ? mysqli_real_escape_string($conn, $_POST['code_khuyen_mai']) : '';
$ngay_het_han = isset($_POST['ngay_het_han']) ? mysqli_real_escape_string($conn, $_POST['ngay_het_han']) : '';
$ngay_phat_hanh = isset($_POST['ngay_phat_hanh']) ? mysqli_real_escape_string($conn, $_POST['ngay_phat_hanh']) : '';
$mo_ta = isset($_POST['mo_ta']) ? mysqli_real_escape_string($conn, $_POST['mo_ta']) : '';

// Câu lệnh thêm vào bảng `khuyen_mai`
// Không bao gồm trường `ngay_su_dung` vì trường này sẽ chỉ được cập nhật khi người dùng sử dụng mã
$sql_str = "INSERT INTO `khuyen_mai` (`id_ma_khuyen_mai`, `code_khuyen_mai`, `ngay_het_han`, `ngay_phat_hanh`, `mo_ta`) 
VALUES (NULL, '$code_khuyen_mai', '$ngay_het_han', '$ngay_phat_hanh', '$mo_ta');";

// Thực thi câu lệnh
if (mysqli_query($conn, $sql_str)) {
    echo "Mã khuyến mãi mới đã được tạo thành công";
} else {
    echo "Lỗi: " . $sql_str . "<br>" . mysqli_error($conn);
}

// Trở về trang danh sách mã khuyến mãi
header("Location: listmagiamgia.php");
exit(); 
?>
