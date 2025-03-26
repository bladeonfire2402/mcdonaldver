<?php
ob_start(); // Bắt đầu bộ đệm đầu ra
require('./include/header.php'); 
require('../../db/conn.php'); 

// Lấy ID mã khuyến mãi từ URL
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Lấy dữ liệu mã giảm giá từ cơ sở dữ liệu
$sql_str = "SELECT * FROM khuyen_mai WHERE id_ma_khuyen_mai = $id";
$res = mysqli_query($conn, $sql_str);
$khuyen_mai = mysqli_fetch_assoc($res);

if (!$khuyen_mai) {
    echo "Mã khuyến mãi không tồn tại.";
    exit();
}

// Xử lý khi người dùng nhấn nút Cập nhật
if (isset($_POST['btnUpdate'])) {
    // Lấy dữ liệu từ form
    $code_khuyen_mai = mysqli_real_escape_string($conn, $_POST['code_khuyen_mai']);
    $ngay_het_han = mysqli_real_escape_string($conn, $_POST['ngay_het_han']);
    $ngay_phat_hanh = mysqli_real_escape_string($conn, $_POST['ngay_phat_hanh']);
    $mo_ta = mysqli_real_escape_string($conn, $_POST['mo_ta']);

    // Câu lệnh cập nhật thông tin mã giảm giá
    $sql_str2 = "UPDATE khuyen_mai 
                 SET code_khuyen_mai = '$code_khuyen_mai', 
                     ngay_het_han = '$ngay_het_han', 
                     ngay_phat_hanh = '$ngay_phat_hanh', 
                     mo_ta = '$mo_ta' 
                 WHERE id_ma_khuyen_mai = $id";

    if (mysqli_query($conn, $sql_str2)) {
        // Chuyển hướng về trang danh sách mã khuyến mãi sau khi cập nhật thành công
        header("Location: listmagiamgia.php");
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
                            <h1 class="h4 text-gray-900 mb-4">Cập nhật mã giảm giá</h1>
                        </div>
                        <form class="user" method="post" action="#" onsubmit="return validateDates()">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="code_khuyen_mai" name="code_khuyen_mai" placeholder="Mã khuyến mãi" value="<?php echo $khuyen_mai['code_khuyen_mai']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Ngày phát hành</label>
                                <input type="date" class="form-control form-control-user" id="ngay_phat_hanh" name="ngay_phat_hanh" value="<?php echo $khuyen_mai['ngay_phat_hanh']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Ngày hết hạn</label>
                                <input type="date" class="form-control form-control-user" id="ngay_het_han" name="ngay_het_han" value="<?php echo $khuyen_mai['ngay_het_han']; ?>" required>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control form-control-user" id="mo_ta" name="mo_ta" placeholder="Mô tả khuyến mãi" rows="4"><?php echo $khuyen_mai['mo_ta']; ?></textarea>
                            </div>
                            <button type="submit" id="btn-update-discount" class="btn btn-primary btn-user btn-block" name="btnUpdate">Cập nhật</button>
                            <hr>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Kiểm tra ngày phát hành và ngày hết hạn
function validateDates() {
    const ngayPhatHanh = document.getElementById("ngay_phat_hanh").value;
    const ngayHetHan = document.getElementById("ngay_het_han").value;

    const datePhatHanh = new Date(ngayPhatHanh);
    const dateHetHan = new Date(ngayHetHan);

    // Kiểm tra ngày hết hạn phải lớn hơn ngày phát hành ít nhất 7 ngày
    const minHetHan = new Date(datePhatHanh);
    minHetHan.setDate(minHetHan.getDate() + 7);

    if (dateHetHan < minHetHan) {
        alert("Ngày hết hạn phải ít nhất sau 7 ngày từ ngày phát hành.");
        return false;
    }

    return true;
}
</script>

<?php
    require('./include/footer.php');
    ob_end_flush(); // Đẩy toàn bộ nội dung ra và tắt bộ đệm đầu ra
}
?>
