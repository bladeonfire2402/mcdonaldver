<?php
ob_start(); // Bắt đầu bộ đệm đầu ra
require('./include/header.php'); 
require('../../db/conn.php'); 

// Lấy ID món ăn từ URL
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Truy vấn để lấy dữ liệu món ăn từ cơ sở dữ liệu
$sql_str = "SELECT * FROM mon_an WHERE id_mon_an = $id";
$res = mysqli_query($conn, $sql_str);
$mon_an = mysqli_fetch_assoc($res);

if (!$mon_an) {
    echo "Món ăn không tồn tại.";
    exit();
}

// Xử lý khi người dùng nhấn nút Cập nhật
if (isset($_POST['btnUpdate'])) {
    // Lấy dữ liệu từ form
    $ten_mon_an = mysqli_real_escape_string($conn, $_POST['ten_mon_an']);
    $loai_mon_an = mysqli_real_escape_string($conn, $_POST['loai_mon_an']);
    $gia = (int)$_POST['gia'];
    $id_danh_muc = (int)$_POST['id_danh_muc'];

    // Xử lý upload hình ảnh nếu người dùng chọn ảnh mới
    $hinh_anh_mon_an = $mon_an['hinh_anh_mon_an'];
    if (isset($_FILES['hinh_anh_mon_an']) && $_FILES['hinh_anh_mon_an']['error'] == 0) {
        $target_dir = "uploads/food/";
        
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

    // Câu lệnh cập nhật thông tin món ăn trong cơ sở dữ liệu
    $sql_str2 = "UPDATE mon_an 
                 SET ten_mon_an = '$ten_mon_an', 
                     hinh_anh_mon_an = '$hinh_anh_mon_an', 
                     loai_mon_an = '$loai_mon_an', 
                     gia = $gia, 
                     id_danh_muc = $id_danh_muc 
                 WHERE id_mon_an = $id";

    if (mysqli_query($conn, $sql_str2)) {
        // Chuyển hướng về trang danh sách món ăn sau khi cập nhật thành công
        header("Location: listmonan.php");
        exit();
    } else {
        echo "Lỗi: " . mysqli_error($conn);
    }
} else {
?>

<div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <div class="row">
                <div class="col-lg-12">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Cập nhật món ăn</h1>
                        </div>
                        <form class="user" method="post" action="#" enctype="multipart/form-data">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="ten_mon_an" name="ten_mon_an" placeholder="Tên món ăn" value="<?php echo $mon_an['ten_mon_an']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Hình ảnh món ăn</label>
                                <input type="file" class="form-control form-control-user" id="hinh_anh_mon_an" name="hinh_anh_mon_an" accept="image/*">
                                <br>
                                <img src="<?php echo $mon_an['hinh_anh_mon_an']; ?>" height="100" alt="Hình ảnh món ăn">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="loai_mon_an" name="loai_mon_an" placeholder="Loại món ăn" value="<?php echo $mon_an['loai_mon_an']; ?>" required>
                            </div>
                            <div class="form-group">
                                <input type="number" class="form-control form-control-user" id="gia" name="gia" placeholder="Giá" value="<?php echo $mon_an['gia']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Danh mục món ăn</label>
                                <select class="form-control" name="id_danh_muc" required>
                                    <option value="">Chọn danh mục</option>
                                    <?php 
                                    $sql_str3 = "SELECT * FROM danh_muc_do_an ORDER BY ten_danh_muc";
                                    $result = mysqli_query($conn, $sql_str3);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $selected = ($row['id_danh_muc'] == $mon_an['id_danh_muc']) ? "selected" : "";
                                        echo "<option value='{$row['id_danh_muc']}' $selected>{$row['ten_danh_muc']}</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary btn-user btn-block" name="btnUpdate">Cập nhật</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
require('./include/footer.php');
ob_end_flush(); // Đẩy toàn bộ nội dung ra và tắt bộ đệm đầu ra
}
?>
