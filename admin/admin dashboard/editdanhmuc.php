<?php
ob_start(); // Bắt đầu bộ đệm đầu ra
require('./include/header.php'); // Kết nối đến tệp header
require('../../db/conn.php');    // Kết nối đến cơ sở dữ liệu

// Lấy ID của danh mục từ URL
$id = intval($_GET['id']);

// Truy vấn để lấy thông tin danh mục từ cơ sở dữ liệu
$sql_category = "SELECT * FROM danh_muc_do_an WHERE id_danh_muc = $id";
$result_category = mysqli_query($conn, $sql_category);
$category = mysqli_fetch_assoc($result_category);

if (!$category) {
    echo "Danh mục không tồn tại.";
    exit();
}

// Xử lý khi người dùng nhấn nút "Cập nhật"
if (isset($_POST['btnUpdate'])) {
    // Lấy dữ liệu từ form
    $ten_danh_muc = mysqli_real_escape_string($conn, $_POST['ten_danh_muc']);

    // Kiểm tra xem có thay đổi nào được thực hiện không
    if ($ten_danh_muc !== $category['ten_danh_muc']) {
        // Cập nhật danh mục vào cơ sở dữ liệu
        $sql_update = "UPDATE danh_muc_do_an 
                       SET ten_danh_muc = '$ten_danh_muc' 
                       WHERE id_danh_muc = $id";

        if (mysqli_query($conn, $sql_update)) {
            // Trở về trang danh sách danh mục sau khi cập nhật thành công
            header("Location: listdanhmucdoan.php");
            exit();
        } else {
            echo "Lỗi: " . mysqli_error($conn);
        }
    } else {
        // Không có thay đổi nào, chuyển hướng về trang danh sách danh mục
        header("Location: listdanhmucdoan.php");
        exit();
    }
}
?>

<div class="container">
    <div class="card shadow-lg my-5">
        <div class="card-body">
            <div class="text-center mb-4">
                <h2 class="text-gray-900">Cập nhật danh mục</h2>
            </div>
            <form class="user" method="post" action="#">
                <div class="form-group">
                    <label for="ten_danh_muc">Tên danh mục:</label>
                    <input type="text" class="form-control" id="ten_danh_muc" name="ten_danh_muc" value="<?php echo htmlspecialchars($category['ten_danh_muc']); ?>" required>
                </div>
                <button type="submit" class="btn btn-primary" id="btn-edit-category" name="btnUpdate">Cập nhật</button>
            </form>
        </div>
    </div>
</div>

<?php
require('./include/footer.php');
ob_end_flush(); // Đẩy nội dung bộ đệm ra trình duyệt
?>
