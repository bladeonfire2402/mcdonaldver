<?php
require('./include/header.php');
?>

<div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Danh sách cửa hàng</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id mã giảm giá</th>
                            <th>Mã giảm giá</th>
                            <th>Ngày sử dụng</th>
                            <th>Ngày hết hạn</th>
                            <th>Ngày phát hành</th>
                            <th>Mô tả</th>
                            <th>Thao tác</th> 
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Id mã giảm giá</th>
                            <th>Mã giảm giá</th>
                            <th>Ngày sử dụng</th>
                            <th>Ngày hết hạn</th>
                            <th>Ngày phát hành</th>
                            <th>Mô tả</th>
                            <th>Thao tác</th> 
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        require('../../db/conn.php');
                        $sql_str = "SELECT * FROM `khuyen_mai` ORDER BY `id_ma_khuyen_mai` ASC";
                        $result = mysqli_query($conn, $sql_str);
                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <tr>
                                <td><?= $row['id_ma_khuyen_mai'] ?></td>
                                <td><?= $row['code_khuyen_mai'] ?></td>
                                <td><?= $row['ngay_su_dung'] ?></td>
                                <td><?= $row['ngay_het_han'] ?></td>
                                <td><?= $row['ngay_phat_hanh'] ?></td>
                                <td><?= $row['mo_ta'] ?></td>
                                <td>
                                    <a class="btn btn-warning" href="editmagiamgia.php?id=<?= $row['id_ma_khuyen_mai'] ?>">Edit</a>
                                    <a class="btn btn-danger" href="deletemagiamgia.php?id=<?= $row['id_ma_khuyen_mai'] ?>" onclick="return confirm('Bạn chắc chắn xóa mục này?');">Delete</a>
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
