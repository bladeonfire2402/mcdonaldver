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
                            <h1 class="h4 text-gray-900 mb-4">Thêm tin tức mới</h1>
                        </div>
                        <form class="user" method="post" action="addnews.php" enctype="multipart/form-data">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="title" name="title" placeholder="Tiêu đề tin tức" required>
                            </div>
                            <div class="form-group">
                                <label>Hình ảnh đại diện</label>
                                <input type="file" class="form-control form-control-user" id="avatar" name="avatar" accept="image/*" required>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control form-control-user" id="content" name="content" placeholder="Nội dung tin tức" rows="5" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary btn-user btn-block">Tạo mới</button>
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
