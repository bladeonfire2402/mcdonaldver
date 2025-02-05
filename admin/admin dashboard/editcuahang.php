<?php 

// Lấy ID cửa hàng để chỉnh sửa
$id = $_GET['id'];

// Kết nối đến cơ sở dữ liệu
require('../../db/conn.php');

// Lấy thông tin cửa hàng từ cơ sở dữ liệu
$sql_str = "SELECT * FROM cua_hang WHERE id_cua_hang = $id";
$res = mysqli_query($conn, $sql_str);
$cua_hang = mysqli_fetch_assoc($res);

if (isset($_POST['btnUpdate'])) {
    // Nếu nút Cập nhật được nhấn
    // Lấy dữ liệu từ form
    $ten_cua_hang = $_POST['ten_cua_hang'];
    $address = $_POST['address'];
    $gio_mo_cua = $_POST['gio_mo_cua'];
    $so_dien_thoai = $_POST['so_dien_thoai'];
    $link_gg_map = $_POST['link_gg_map'];
    $link_nhung = $_POST['link_nhung'];
    
    // Thực hiện cập nhật thông tin cửa hàng trong cơ sở dữ liệu
    $sql_str2 = "UPDATE cua_hang 
                 SET ten_cua_hang = '$ten_cua_hang', 
                     address = '$address', 
                     gio_mo_cua = '$gio_mo_cua', 
                     so_dien_thoai = '$so_dien_thoai', 
                     link_gg_map = '$link_gg_map', 
                     link_nhung = '$link_nhung' 
                 WHERE id_cua_hang = $id";
    
    mysqli_query($conn, $sql_str2);
    
    // Chuyển hướng về trang danh sách cửa hàng
    header("location: listcuahang.php");
} else {
    require('./include/header.php');
?>

<div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Cập nhật cửa hàng</h1>
                        </div>
                        <form class="user" method="post" action="#">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="ten_cua_hang" name="ten_cua_hang" placeholder="Tên cửa hàng" value="<?php echo $cua_hang['ten_cua_hang']; ?>" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="address" name="address" placeholder="Địa chỉ" value="<?php echo $cua_hang['address']; ?>" required>
                            </div>
                            <div class="form-group">
                                <input type="time" class="form-control form-control-user" id="gio_mo_cua" name="gio_mo_cua" placeholder="Giờ mở cửa" value="<?php echo $cua_hang['gio_mo_cua']; ?>" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="so_dien_thoai" name="so_dien_thoai" placeholder="Số điện thoại" value="<?php echo $cua_hang['so_dien_thoai']; ?>" required>
                            </div>
                            <div class="form-group">
                                <input type="url" class="form-control form-control-user" id="link_gg_map" name="link_gg_map" placeholder="Link Google Maps" value="<?php echo $cua_hang['link_gg_map']; ?>">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="link_nhung" name="link_nhung" placeholder="Link nhúng Google Maps" value="<?php echo $cua_hang['link_nhung']; ?>">
                            </div>
                            <button type="submit" class="btn btn-primary" name="btnUpdate">Cập nhật</button>
                        </form>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    require('./include/footer.php');
}
?>
