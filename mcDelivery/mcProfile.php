<?php
session_start();
require('../db/conn.php');

// Kiểm tra nếu chưa đăng nhập thì chuyển hướng về trang đăng nhập
if (!isset($_SESSION['user_id'])) {
    header("Location: mcDeliver.php");
    exit;
}

// Lấy thông tin người dùng từ session
$user_id = $_SESSION['user_id'];

// Lấy dữ liệu người dùng từ bảng users
$query = "SELECT * FROM users WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user_data = $result->fetch_assoc();

// Cập nhật thông tin người dùng khi form được gửi
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_profile'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];

    $update_query = "UPDATE users SET name = ?, email = ?, address = ?, phone = ? WHERE id = ?";
    $update_stmt = $conn->prepare($update_query);
    $update_stmt->bind_param("sssii", $name, $email, $address, $phone, $user_id);
    $update_stmt->execute();
    $update_stmt->close();

    // Cập nhật lại thông tin người dùng từ database sau khi cập nhật
    header("Location: mcProfile.php");
    exit;
}

// Lấy danh sách đơn hàng từ bảng orders
$order_query = "SELECT * FROM orders WHERE id_user = ?";
$order_stmt = $conn->prepare($order_query);
$order_stmt->bind_param("i", $user_id);
$order_stmt->execute();
$order_result = $order_stmt->get_result();
$orders = [];
if ($order_result->num_rows > 0) {
    while ($row = $order_result->fetch_assoc()) {
        $orders[] = $row;
    }
}

$stmt->close();
$order_stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="http://localhost/a/style/global.css">
    <link rel="stylesheet" href="http://localhost/a/style/mcdelivery.css">
    <link rel="stylesheet" href="http://localhost/a/style/banner.css">
    <link rel="stylesheet" href="http://localhost/a/style/index.css">
    <link rel="stylesheet" href="http://localhost/a/style/McMenu.css">
    <link rel="stylesheet" href="http://localhost/a/style/mcProfile.css">

</head>

<body>
<div class=" ">
        <div class="flex justify-center">
            <div class="container MC-Delivery-Header-top cursor-pointer">
                <div class="MC-Delivery-Header flex align-center radius over-hidden">
                    <a href="indexmcDeliver.php" class="flex-1 flex bg-primary justify-center">
                        <img src="https://mcdelivery.vn/vn//static/1724754482442/assets/84/img/mcdelivery_logo_en.jpg" alt="">
                    </a>
                    <a href="mcMenu.php" class="flex-1 text-white bg-mc h-full flex justify-center bor-r text-secondary">
                        <h2 class="cursor-pointer">Menu</h2>
                    </a>
                    <a href="mcProfile.php" class="flex-1 text-white bg-mc h-full flex justify-center text-secondary">
                        <h2 class="cursor-pointer">Tài khoản của tôi</h2>
                    </a>
                </div>
            </div>
        </div>

        <div class="flex justify-center">
            <div class="container p-10">
                <div class="profile-content">
                    <h1 class="">Trang cá nhân</h1>
                    <form method="POST" action="">
                        <div class="p-10 box-shadow-1">
                            <h3 class="text-secondary uppercase">Thông tin của bạn</h3>
                            <div class="flex gap-20">
                                <div class="w-1phan2">
                                    <h4>Tên:</h4>
                                    <input type="text" name="name" value="<?php echo htmlspecialchars($user_data['name']); ?>" class="text-box" required>
                                </div>
                            </div>
                            <h4>Email</h4>
                            <input type="email" name="email" value="<?php echo htmlspecialchars($user_data['email']); ?>" class="text-box-pro" required>
                            
                            <h4>Số điện thoại</h4>
                            <input type="text" name="phone" value="<?php echo htmlspecialchars($user_data['phone']); ?>" class="text-box-pro" required>

                            <h4>Địa chỉ</h4>
                            <input type="text" name="address" value="<?php echo htmlspecialchars($user_data['address']); ?>" class="text-box-pro" required>

                            <button type="submit" name="update_profile" class="btn-update">Cập nhật thông tin</button>
                        </div>
                    </form>
                </div>

                <div class="order-content mt-20">
                    <h1>Đơn hàng của bạn</h1>
                    <div class="p-20 box-shadow-1">
                        <?php if (!empty($orders)): ?>
                            <?php foreach ($orders as $order): ?>
                                <div class="order-items box-shadow-1 p-10 relative mb-10">
                                    <div class="flex gap-20">
                                        <div class="flex gap-5">
                                            <p>Mã đơn hàng:</p>
                                            <p><?php echo htmlspecialchars($order['id']); ?></p>
                                        </div>
                                        <div class="flex gap-5">
                                            <p>Trạng thái:</p>
                                            <p><?php echo htmlspecialchars($order['status']); ?></p>
                                        </div>
                                    </div>
                                    <div class="flex gap-5">
                                        <p>Họ Tên:</p>
                                        <p><?php echo htmlspecialchars($order['name']); ?></p>
                                    </div>
                                    <div class="flex gap-5">
                                        <p>Địa chỉ:</p>
                                        <p><?php echo htmlspecialchars($order['address']); ?></p>
                                    </div>
                                    <div class="flex gap-5">
                                        <p>Số điện thoại:</p>
                                        <p><?php echo htmlspecialchars($order['phone']); ?></p>
                                    </div>
                                    <div class="flex gap-5">
                                        <p>Email:</p>
                                        <p><?php echo htmlspecialchars($order['email']); ?></p>
                                    </div>
                                    <div class="flex gap-5">
                                        <p>Tổng giá trị:</p>
                                        <p><?php echo number_format($order['gia']); ?> VND</p>
                                    </div>
                                    <div class="flex gap-5">
                                        <p>Ngày tạo:</p>
                                        <p><?php echo htmlspecialchars($order['ngay_tao']); ?></p>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p>Không có đơn hàng nào được tìm thấy.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

        <footer class="flex justify-center mt-10 bg-black">
            <div class="container mb-20 text-white flex justify-between cursor-pointer">
                <div>
                    <h3 class="font-bold">Menu</h3>
                </div>
                <div class="">
                    <h3 class="font-bold">Support</h3>
                    <ul>
                        <li>Terms & Conditions</li>
                        <li>Chính sách bảo mật</li>
                        <li>Chính sách đặt hàng</li>
                        <li>FAQ</li>
                        <li>Liên hệ với chúng tôi</li>
                    </ul>
                </div>
                <div class="">
                    <h3 class="font-bold">Theo dõi ngay</h3>
                    <div class="flex">Facebook</div>
                    <div class="flex">Youtube</div>
                    <div class="flex">Instagram</div>
                </div>
            </div>
        </footer>
    </div>

</body>

</html>