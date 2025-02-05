<?php
require('./include/header.php');
?>

<div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Danh mục đồ ăn</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id danh mục</th>
                            <th>Tên danh mục</th>
                            <th>Thao tác</th> <!-- Cột thêm cho thao tác -->
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Id danh mục</th>
                            <th>Tên danh mục</th>
                            <th>Thao tác</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        require('../../db/conn.php');
                        $sql_str = "SELECT * FROM `danh_muc_do_an` ORDER BY `id_danh_muc` ASC";
                        $result = mysqli_query($conn, $sql_str);
                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <tr>
                                <td><?= $row['id_danh_muc'] ?></td>
                                <td><?= $row['ten_danh_muc'] ?></td>
                                <td>
                                    <a class="btn btn-warning" href="editdanhmuc.php?id=<?= $row['id_danh_muc'] ?>">Edit</a>
                                    <a class="btn btn-danger" href="deletedanhmuc.php?id=<?= $row['id_danh_muc'] ?>" onclick="return confirm('Bạn chắc chắn xóa mục này?');">Delete</a>
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

<?php require('./include/footer.php'); ?>
