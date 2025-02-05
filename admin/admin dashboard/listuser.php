<?php
require('./include/header.php');
?>

<div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Danh sách người dùng</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên</th>
                            <th>User ID</th>
                            <th>Email</th>
                            <th>Mật khẩu</th>
                            <th>Số điện thoại</th>
                            <th>Địa chỉ</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Tên</th>
                            <th>User ID</th>
                            <th>Email</th>
                            <th>Mật khẩu</th>
                            <th>Số điện thoại</th>
                            <th>Địa chỉ</th>
                            <th>Thao tác</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        // Kết nối cơ sở dữ liệu
                        require('../../db/conn.php');

                        // Truy vấn bảng `user`
                        $sql_str = "SELECT * FROM `users` ORDER BY `id` ASC";
                        $result = mysqli_query($conn, $sql_str);

                        // Kiểm tra nếu bảng tồn tại và có dữ liệu
                        if ($result && mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <tr>
                                <td><?= $row['id'] ?></td>
                                <td><?= $row['name'] ?></td>
                                <td><?= $row['user_id'] ?></td>
                                <td><?= $row['email'] ?></td>
                                <td><?= $row['password'] ?></td>
                                <td><?= $row['phone'] ?></td>
                                <td><?= $row['address'] ?></td>
                                <td>
                                    <a class="btn btn-warning" href="edituser.php?id=<?= $row['id'] ?>">Edit</a>
                                    <a class="btn btn-danger" href="deleteuser.php?id=<?= $row['id'] ?>" onclick="return confirm('Bạn chắc chắn xóa người dùng này?');">Delete</a>
                                </td>
                            </tr>
                        <?php
                            }
                        } else {
                            echo "<tr><td colspan='8' class='text-center'>Không có dữ liệu người dùng</td></tr>";
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
