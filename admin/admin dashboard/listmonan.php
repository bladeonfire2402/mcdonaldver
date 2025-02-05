<?php
require('./include/header.php');
?>

<div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Danh sách các món ăn</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id món ăn</th>
                            <th>Tên món ăn</th>
                            <th>Hình ảnh món ăn</th>
                            <th>Loại món ăn</th>
                            <th>Giá</th>
                            <th>Danh mục</th> <!-- Chỉ hiển thị tên danh mục -->
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Id món ăn</th>
                            <th>Tên món ăn</th>
                            <th>Hình ảnh món ăn</th>
                            <th>Loại món ăn</th>
                            <th>Giá</th>
                            <th>Danh mục</th>
                            <th>Thao tác</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        require('../../db/conn.php');
                        $sql_str = "
                            SELECT mon_an.id_mon_an, mon_an.ten_mon_an, mon_an.hinh_anh_mon_an, mon_an.loai_mon_an, 
                                   mon_an.gia, danh_muc_do_an.ten_danh_muc
                            FROM mon_an
                            JOIN danh_muc_do_an ON mon_an.id_danh_muc = danh_muc_do_an.id_danh_muc
                            ORDER BY mon_an.id_mon_an ASC";
                        $result = mysqli_query($conn, $sql_str);
                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <tr>
                                <td><?= $row['id_mon_an'] ?></td>
                                <td><?= $row['ten_mon_an'] ?></td>
                                <td><img src="<?= $row['hinh_anh_mon_an'] ?>" alt="Hình ảnh món ăn" height="100"></td>
                                <td><?= $row['loai_mon_an'] ?></td>
                                <td><?= $row['gia'] ?></td>
                                <td><?= $row['ten_danh_muc'] ?></td> <!-- Hiển thị tên danh mục -->
                                <td>
                                    <a class="btn btn-warning" href="editfood.php?id=<?= $row['id_mon_an'] ?>">Edit</a>
                                    <a class="btn btn-danger" href="deletefood.php?id=<?= $row['id_mon_an'] ?>" onclick="return confirm('Bạn chắc chắn xóa món ăn này?');">Delete</a>
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
