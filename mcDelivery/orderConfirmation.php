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
$user_name = $_SESSION['user_name'];

// Xử lý dữ liệu được gửi từ `mcCheckout.php`
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ form
    $name = $_POST['name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $promo_code = $_POST['promo_code'] ?? null;
    $subtotal = $_POST['subtotal'] ?? 0;
    $tax = $_POST['tax'] ?? 0;
    $delivery_charge = $_POST['delivery_charge'] ?? 0;
    $total = $_POST['total'] ?? 0;
    $order_items = isset($_POST['order_items']) ? json_decode($_POST['order_items'], true) : [];

    // Kiểm tra nếu không có món ăn thì chuyển hướng về menu
    if (empty($order_items)) {
        header("Location: mcMenu.php");
        exit;
    }

    // Xử lý mã khuyến mãi
    if ($promo_code) {
        $stmt_promo = $conn->prepare("SELECT * FROM khuyen_mai WHERE code_khuyen_mai = ? AND ngay_het_han >= NOW()");
        $stmt_promo->bind_param("s", $promo_code);
        $stmt_promo->execute();
        $result_promo = $stmt_promo->get_result();

        if ($result_promo->num_rows > 0) {
            $promo = $result_promo->fetch_assoc();
            // Ghi nhận ngày sử dụng mã khuyến mãi
            $stmt_update_promo = $conn->prepare("UPDATE khuyen_mai SET ngay_su_dung = NOW() WHERE code_khuyen_mai = ?");
            $stmt_update_promo->bind_param("s", $promo_code);
            $stmt_update_promo->execute();
            $stmt_update_promo->close();
        }
        $stmt_promo->close();
    }

    // Chèn từng sản phẩm trong giỏ hàng vào bảng `orders`
    $stmt = $conn->prepare(
        "INSERT INTO orders (id_user, quantity, name, address, phone, email, status, gia, id_san_pham, ngay_tao, ngay_cap_nhat)
         VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, NOW(), NOW())"
    );

    foreach ($order_items as $item) {
        $meal_id = $item['id'];
        $quantity = $item['quantity'];
        $gia = $item['price'] * $quantity; 
        $status = 'Processing'; 

        $stmt->bind_param("iissssisi", $user_id, $quantity, $name, $address, $phone, $email, $status, $gia, $meal_id);
        $stmt->execute();
    }

    $stmt->close();
    $conn->close();

    // Chuyển hướng đến trang xác nhận
    header("Location: orderConfirmation.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
    <link rel="stylesheet" href="http://localhost/a/style/global.css">
    <link rel="stylesheet" href="http://localhost/a/style/mcdelivery.css">
    <link rel="stylesheet" href="http://localhost/a/style/banner.css">
    <link rel="stylesheet" href="http://localhost/a/style/index.css">
    <link rel="stylesheet" href="http://localhost/a/style/McMenu.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
        }

        .thank-you-container {
            text-align: center;
            padding: 50px 20px;
            background-color: #f9f9f9;
        }

        .thank-you-container h1 {
            font-size: 36px;
            margin-bottom: 20px;
            color: #333;
        }

        .thank-you-container p {
            font-size: 18px;
            color: #555;
        }

        .thank-you-container a {
            display: inline-block;
            margin-top: 30px;
            padding: 15px 30px;
            font-size: 18px;
            color: #fff;
            background-color: #04AA6D;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        .thank-you-container a:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <div class="Mc-Menu justify-center">
        <div class="flex justify-center">
            <div class="container MC-Delivery-Header-top cursor-pointer">
                <div class="flex gap-20">
                    <p class="cursor-pointer">Xin chào, <?php echo htmlspecialchars($user_name); ?></p>
                    <p>|</p>
                    <p class="cursor-pointer">Hàng Đặt</p>
                    <p>|</p>
                    <p class="cursor-pointer">Tìm kiếm đơn</p>
                </div>
                <div class="MC-Delivery-Header flex align-center radius over-hidden">
                    <a href="indexmcDeliver.php" class="flex-1 flex bg-primary justify-center">
                        <img src="https://mcdelivery.vn/vn//static/1724754482442/assets/84/img/mcdelivery_logo_en.jpg" alt="">
                    </a>
                    <a href="mcMenu.php" class="flex-1 text-white bg-mc h-full flex justify-center bor-r text-secondary">
                        <h2 class="cursor-pointer">Menu</h2>
                    </a>
                    <a href="mcProfile.php" class="flex-1 text-white bg-mc h-full flex justify-center">
                        <h2 class="cursor-pointer">Tài khoản của tôi</h2>
                    </a>
                </div>
            </div>
        </div>

        <!-- Thank You Message Section -->
        <section class="thank-you-container">
            <h1>Cảm ơn bạn đã đặt hàng!</h1>
            <p>Chúng tôi đã nhận được đơn hàng của bạn và sẽ sớm liên hệ với bạn để xác nhận đơn hàng.</p>
            <a href="indexmcDeliver.php">Quay lại Trang Chủ</a>
        </section>
    </div>
</body>

</html>
