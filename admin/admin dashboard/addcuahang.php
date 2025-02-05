<?php
require('../../db/conn.php');

// Lấy dữ liệu từ form
$store_name = isset($_POST['store_name']) ? mysqli_real_escape_string($conn, $_POST['store_name']) : '';
$address = isset($_POST['address']) ? mysqli_real_escape_string($conn, $_POST['address']) : '';
$opening_hours = isset($_POST['opening_hours']) ? mysqli_real_escape_string($conn, $_POST['opening_hours']) : '';
$phone = isset($_POST['phone']) ? mysqli_real_escape_string($conn, $_POST['phone']) : '';
$link_gg_map = isset($_POST['google_link']) ? mysqli_real_escape_string($conn, $_POST['google_link']) : '';
$link_nhung = isset($_POST['embed_google_map']) ? mysqli_real_escape_string($conn, $_POST['embed_google_map']) : '';

// Câu lệnh thêm vào bảng với các cột đúng tên
$sql_str = "INSERT INTO `cua_hang` (`id_cua_hang`, `ten_cua_hang`, `address`, `gio_mo_cua`, `so_dien_thoai`, `link_gg_map`, `link_nhung`) 
VALUES (NULL, '$store_name', '$address', '$opening_hours', '$phone', '$link_gg_map', '$link_nhung');";

// Thực thi câu lệnh
if (mysqli_query($conn, $sql_str)) {
    echo "New store created successfully";
} else {
    echo "Error: " . $sql_str . "<br>" . mysqli_error($conn);
}

// Trở về trang danh sách cửa hàng
header("Location: listcuahang.php");
exit(); 
?>
