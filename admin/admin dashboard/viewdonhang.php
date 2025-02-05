<?php
// Kết nối cơ sở dữ liệu và header
ob_start();
require('./include/header.php'); 
require('../../db/conn.php'); 

// Lấy ID đơn hàng từ URL
$id = intval($_GET['id']);

// Truy vấn để lấy thông tin cơ bản của đơn hàng
$sql_order = "SELECT * FROM orders WHERE id = $id";
$result_order = mysqli_query($conn, $sql_order);
$order = mysqli_fetch_assoc($result_order);

if (!$order) {
    echo "Đơn hàng không tồn tại.";
    exit();
}

// Xử lý cập nhật trạng thái đơn hàng khi người dùng nhấn nút "Cập nhật"
if (isset($_POST['btnUpdate'])) {
    $status = $_POST['status'];

    // Cập nhật trạng thái đơn hàng
    $sql_update_status = "UPDATE orders SET status = '$status' WHERE id = $id";
    mysqli_query($conn, $sql_update_status);

    // Chuyển hướng về trang danh sách đơn hàng sau khi cập nhật
    header("location: listdonhang.php");
    exit();
}

$gia = $order['gia']; // Giả sử 'total_price' là trường chứa tổng tiền của đơn hàng
?>

<div class="container">
    <div class="card shadow-lg my-5">
        <div class="card-body">
            <div class="text-center mb-4">
                <h2 class="text-gray-900">Chi tiết đơn hàng</h2>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <h5>Thông tin khách hàng</h5>
                    <p><strong>Khách hàng:</strong> <?= htmlspecialchars($order['name']) ?></p>
                    <p><strong>Địa chỉ:</strong> <?= htmlspecialchars($order['address']) ?></p>
                    <p><strong>Số điện thoại:</strong> <?= htmlspecialchars($order['phone']) ?></p>
                    <p><strong>Email:</strong> <?= htmlspecialchars($order['email']) ?></p>
                    <form method="post" action="#">
                        <div class="form-group">
                            <label for="status">Trạng thái đơn hàng:</label>
                            <select class="form-control" name="status" id="status">
                                <option value="Processing" <?= $order['status'] == 'Processing' ? 'selected' : '' ?>>Processing</option>
                                <option value="Confirmed" <?= $order['status'] == 'Confirmed' ? 'selected' : '' ?>>Confirmed</option>
                                <option value="Shipping" <?= $order['status'] == 'Shipping' ? 'selected' : '' ?>>Shipping</option>
                                <option value="Delivered" <?= $order['status'] == 'Delivered' ? 'selected' : '' ?>>Delivered</option>
                                <option value="Cancelled" <?= $order['status'] == 'Cancelled' ? 'selected' : '' ?>>Cancelled</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary" name="btnUpdate">Cập nhật trạng thái</button>
                    </form>
                </div>

                <div class="col-md-6">
                    <h5>Thông tin đơn hàng</h5>
                    <p><strong>Trạng thái đơn hàng:</strong> <?= htmlspecialchars($order['status']) ?></p>
                    <p><strong>Giá trị đơn hàng:</strong> <?= number_format($gia, 'Processing', '', '.') . " $" ?></p>  <!-- Hiển thị tổng tiền là 'gia' -->
                </div>
            </div>
        </div>
    </div>
</div>

<?php
require('./include/footer.php');
ob_end_flush(); // Đẩy toàn bộ nội dung ra và tắt bộ đệm đầu ra
?>
