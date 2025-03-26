<?php
require('./include/header.php');
?>

<div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <div class="row">
                <div class="col-lg-12">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Thêm món ăn mới</h1>
                        </div>
                        <form class="user" method="post" action="addmonan.php" enctype="multipart/form-data" onsubmit="return validatePrice()">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="ten_mon_an" name="ten_mon_an" placeholder="Tên món ăn" required>
                            </div>
                            <div class="form-group">
                                <label>Hình ảnh món ăn</label>
                                <input type="file" class="form-control form-control-user" id="hinh_anh_mon_an" name="hinh_anh_mon_an" accept="image/*" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="loai_mon_an" name="loai_mon_an" placeholder="Loại món ăn" required>
                            </div>
                            <div class="form-group">
                                <input type="number" class="form-control form-control-user" id="gia" name="gia" placeholder="Giá món ăn" min="1" required>
                            </div>
                            <div class="form-group">
                                <label>Danh mục</label>
                                <select class="form-control" id="id_danh_muc" name="id_danh_muc" required>
                                    <option value="">Chọn danh mục</option>
                                    <?php
                                    require('../../db/conn.php');
                                    $sql_str = "SELECT id_danh_muc, ten_danh_muc FROM danh_muc_do_an ORDER BY ten_danh_muc";
                                    $result = mysqli_query($conn, $sql_str);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<option value='{$row['id_danh_muc']}'>{$row['ten_danh_muc']}</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <button type="submit" id="btn-add-food" class="btn btn-primary btn-user btn-block">Tạo mới</button>
                            <hr>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Kiểm tra giá món ăn phải là số dương
function validatePrice() {
    const gia = document.getElementById('gia').value;
    if (gia <= 0) {
        alert('Giá món ăn phải lớn hơn 0.');
        return false;
    }
    return true;
}
</script>

<?php
require('./include/footer.php');
?>
