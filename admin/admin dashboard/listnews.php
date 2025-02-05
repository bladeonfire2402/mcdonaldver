<?php
require('./include/header.php');
?>

<div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Danh sách tin tức</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID tin tức</th>
                            <th>Tiêu đề</th>
                            <th>Hình đại diện</th>
                            <th>Nội dung</th>
                            <th>Ngày đăng</th>
                            <th>Ngày cập nhật</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID tin tức</th>
                            <th>Tiêu đề</th>
                            <th>Hình đại diện</th>
                            <th>Nội dung</th>
                            <th>Ngày đăng</th>
                            <th>Ngày cập nhật</th>
                            <th>Thao tác</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        require('../../db/conn.php');
                        $sql_str = "SELECT * FROM `tin_tuc` ORDER BY `id_tin_tuc` ASC";
                        $result = mysqli_query($conn, $sql_str);
                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <tr>
                                <td><?= $row['id_tin_tuc'] ?></td>
                                <td><?= $row['title'] ?></td>
                                <td><img src="<?= $row['avatar'] ?>" alt="Hình đại diện" height="100"></td>
                                <td><?= $row['content'] ?></td>
                                <td><?= $row['ngay_dang'] ?></td>
                                <td><?= $row['ngay_cap_nhat'] ?></td>
                                <td>
                                    <a class="btn btn-warning" href="editnews.php?id=<?= $row['id_tin_tuc'] ?>">Edit</a>
                                    <a class="btn btn-danger" href="deletenews.php?id=<?= $row['id_tin_tuc'] ?>" onclick="return confirm('Bạn chắc chắn xóa tin tức này?');">Delete</a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php
require('./include/footer.php');
?>
