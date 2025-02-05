<?php
require('./include/header.php');
?>

<div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Danh sách đơn hàng</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID User</th>
                            <th>Số lượng</th>
                            <th>Tên</th>
                            <th>Địa chỉ</th>
                            <th>Số điện thoại</th>
                            <th>Email</th>
                            <th>Trạng thái</th>
                            <th>Giá</th>
                            <th>ID Sản phẩm</th>
                            <th>Ngày tạo</th>
                            <th>Ngày cập nhật</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID User</th>
                            <th>Số lượng</th>
                            <th>Tên</th>
                            <th>Địa chỉ</th>
                            <th>Số điện thoại</th>
                            <th>Email</th>
                            <th>Trạng thái</th>
                            <th>Giá</th>
                            <th>ID Sản phẩm</th>
                            <th>Ngày tạo</th>
                            <th>Ngày cập nhật</th>
                            <th>Thao tác</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        require('../../db/conn.php');
                        $sql_str = "SELECT * FROM `orders` ORDER BY `id` ASC";
                        $result = mysqli_query($conn, $sql_str);
                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <tr>
                                <td><?= $row['id_user'] ?></td>
                                <td><?= $row['quantity'] ?></td>
                                <td><?= $row['name'] ?></td>
                                <td><?= $row['address'] ?></td>
                                <td><?= $row['phone'] ?></td>
                                <td><?= $row['email'] ?></td>
                                <td><?= $row['status'] ?></td>
                                <td><?= $row['gia'] ?></td>
                                <td><?= $row['id_san_pham'] ?></td>
                                <td><?= $row['ngay_tao'] ?></td>
                                <td><?= $row['ngay_cap_nhat'] ?></td>
                                <td>
                                    <a class="btn btn-warning" href="viewdonhang.php?id=<?= $row['id'] ?>">View</a>
                                </td>
                            </tr>
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
