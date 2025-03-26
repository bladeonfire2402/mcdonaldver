<?php
ob_start(); // Bắt đầu bộ đệm đầu ra
require('./include/header.php');
require('../../db/conn.php');

// Lấy ID của tin tức từ URL
$id = intval($_GET['id']);

// Truy vấn để lấy thông tin tin tức từ cơ sở dữ liệu
$sql_news = "SELECT * FROM tin_tuc WHERE id_tin_tuc = $id";
$result_news = mysqli_query($conn, $sql_news);
$news = mysqli_fetch_assoc($result_news);

if (!$news) {
    echo "Tin tức không tồn tại.";
    exit();
}

// Lấy ngày hiện tại để giới hạn ngày đăng
$today = date('Y-m-d');

// Xử lý khi người dùng nhấn nút "Cập nhật"
if (isset($_POST['btnUpdate'])) {
    // Lấy dữ liệu từ form
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $content = mysqli_real_escape_string($conn, $_POST['content']);
    $ngay_dang = $_POST['ngay_dang'];

    // Xử lý upload hình ảnh nếu người dùng chọn ảnh mới
    $avatar = $news['avatar']; // Sử dụng ảnh hiện tại nếu không có ảnh mới
    if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] == 0) {
        $target_dir = "uploads/news/";

        // Tạo thư mục nếu chưa tồn tại
        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0777, true);
        }

        $target_file = $target_dir . basename($_FILES["avatar"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
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

    // Cập nhật tin tức vào cơ sở dữ liệu với `ngay_cap_nhat` là ngày hiện tại
    $sql_update = "UPDATE tin_tuc 
                   SET title = '$title', 
                       avatar = '$avatar', 
                       content = '$content', 
                       ngay_dang = '$ngay_dang', 
                       ngay_cap_nhat = NOW() 
                   WHERE id_tin_tuc = $id";

    if (mysqli_query($conn, $sql_update)) {
        // Trở về trang danh sách tin tức sau khi cập nhật thành công
        header("Location: listnews.php");
        exit();
    } else {
        echo "Lỗi: " . mysqli_error($conn);
    }
}
?>

<div class="container">
    <div class="card shadow-lg my-5">
        <div class="card-body">
            <div class="text-center mb-4">
                <h2 class="text-gray-900">Cập nhật tin tức</h2>
            </div>
            <form class="user" method="post" action="#" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="title">Tiêu đề:</label>
                    <input type="text" class="form-control" id="title" name="title" value="<?php echo htmlspecialchars($news['title']); ?>" required>
                </div>
                <div class="form-group">
                    <label for="avatar">Ảnh đại diện:</label>
                    <input type="file" class="form-control" id="avatar" name="avatar" accept="image/*">
                    <br>
                    <img src="<?php echo $news['avatar']; ?>" height="100" alt="Ảnh đại diện hiện tại">
                </div>
                <div class="form-group">
                    <label for="content">Nội dung:</label>
                    <textarea class="form-control" id="content" name="content" rows="5" required><?php echo htmlspecialchars($news['content']); ?></textarea>
                </div>
                <div class="form-group">
                    <label for="ngay_dang">Ngày đăng:</label>
                    <input type="date" class="form-control" id="ngay_dang" name="ngay_dang" value="<?php echo $news['ngay_dang']; ?>" max="<?php echo $today; ?>" required>
                </div>
                <button type="submit" id="btn-update-news" class="btn btn-primary" name="btnUpdate">Cập nhật</button>
            </form>
        </div>
    </div>
</div>

<?php
require('./include/footer.php');
ob_end_flush(); // Kết thúc bộ đệm đầu ra và gửi nội dung
?>
