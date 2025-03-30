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
                            <h1 class="h4 text-gray-900 mb-4">Thêm mã khuyến mãi mới</h1>
                        </div>
                        <form class="user" method="post" action="addmagiamgia.php" onsubmit="return validateDates()">
                        <form class="user" method="post" action="addmagiamgia.php" onsubmit="return validateDates()">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="code_khuyen_mai" name="code_khuyen_mai" placeholder="Mã khuyến mãi" required>
                            </div>
                            <div class="form-group">
                                <label>Ngày phát hành</label>
                                <input type="date" class="form-control form-control-user" id="ngay_phat_hanh" name="ngay_phat_hanh" required>
                            </div>
                            <div class="form-group">
                                <label>Ngày hết hạn</label>
                                <input type="date" class="form-control form-control-user" id="ngay_het_han" name="ngay_het_han" required>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control form-control-user" id="mo_ta" name="mo_ta" placeholder="Mô tả khuyến mãi"></textarea>
                            </div>
                            <button type="submit" id="btn-add-discount" class="btn btn-primary btn-user btn-block">Tạo mới</button>
                            <hr>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function validateDates() {
    const ngayPhatHanh = new Date(document.getElementById('ngay_phat_hanh').value);
    const ngayHetHan = new Date(document.getElementById('ngay_het_han').value);
    const diffTime = ngayHetHan - ngayPhatHanh;
    const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));

    if (diffDays < 7) {
        alert('Ngày hết hạn phải ít nhất là 7 ngày sau ngày phát hành.');
        return false;
    }
    return true;
}
</script>

<?php
require('./include/footer.php');
?>
