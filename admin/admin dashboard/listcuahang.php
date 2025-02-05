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
                            <th>Id cửa hàng</th>
                            <th>Tên cửa hàng</th>
                            <th>Địa chỉ</th>
                            <th>Giờ mở cửa</th>
                            <th>Số điện thoại</th>
                            <th>Link GG</th>
                            <th>Thao tác</th> <!-- Thêm cột Thao tác -->
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Id cửa hàng</th>
                            <th>Tên cửa hàng</th>
                            <th>Địa chỉ</th>
                            <th>Giờ mở cửa</th>
                            <th>Số điện thoại</th>
                            <th>Link GG</th>
                            <th>Thao tác</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        require('../../db/conn.php');
                        $sql_str = "SELECT * FROM `cua_hang` ORDER BY `id_cua_hang` ASC";
                        $result = mysqli_query($conn, $sql_str);
                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <tr>
                                <td><?= $row['id_cua_hang'] ?></td>
                                <td><?= $row['ten_cua_hang'] ?></td>
                                <td><?= $row['address'] ?></td>
                                <td><?= $row['gio_mo_cua'] ?></td>
                                <td><?= $row['so_dien_thoai'] ?></td>
                                <td><?= $row['link_gg_map'] ?></td>
                                <td>
                                    <a class="btn btn-warning" href="editcuahang.php?id=<?= $row['id_cua_hang'] ?>">Edit</a>
                                    <a class="btn btn-danger" href="deletecuahang.php?id=<?= $row['id_cua_hang'] ?>" onclick="return confirm('Bạn chắc chắn xóa mục này?');">Delete</a>
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
