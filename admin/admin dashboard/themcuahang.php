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
                            <h1 class="h4 text-gray-900 mb-4">Thêm cửa hàng mới</h1>
                        </div>
                        <form class="user" method="post" action="addcuahang.php" enctype="multipart/form-data">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="store_name" name="store_name" placeholder="Tên cửa hàng" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="address" name="address" placeholder="Địa chỉ cửa hàng" required>
                            </div>
                            <div class="form-group">
                                <label>Giờ mở cửa</label>
                                <input type="time" class="form-control form-control-user" id="opening_hours" name="opening_hours" placeholder="Giờ mở cửa" step="900" required>
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="phone" name="phone" placeholder="Số điện thoại liên hệ" required>
                            </div>
                            <div class="form-group">
                                <input type="url" class="form-control form-control-user" id="google_link" name="google_link" placeholder="Link Google Map" pattern="https?://.+" title="Hãy nhập một URL hợp lệ bắt đầu bằng http hoặc https">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="embed_google_map" name="embed_google_map" placeholder="Link nhúng Google Maps">
                            </div>
                            <button type="submit" id="btn-add-store" class="btn btn-primary btn-user btn-block">Tạo mới</button>
                            <hr>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
require('./include/footer.php');
?>