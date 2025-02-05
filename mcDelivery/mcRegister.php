<?php
session_start();
require('../db/conn.php'); // Đảm bảo kết nối tới cơ sở dữ liệu

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    // Hash mật khẩu
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Tạo user_id duy nhất
    $user_id = uniqid('user_');

    // Kiểm tra xem email đã tồn tại hay chưa
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<script>alert('Email đã tồn tại. Vui lòng sử dụng email khác.');</script>";
    } else {
        // Thêm người dùng mới vào cơ sở dữ liệu
        $stmt = $conn->prepare("INSERT INTO users (user_id, name, email, password, phone, address) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $user_id, $name, $email, $hashed_password, $phone, $address);

        if ($stmt->execute()) {
            echo "<script>alert('Đăng kí thành công! Vui lòng đăng nhập.');</script>";
            header("Location: mcDeliver.php"); // Chuyển hướng tới trang đăng nhập
            exit;
        } else {
            echo "<script>alert('Có lỗi xảy ra. Vui lòng thử lại sau.');</script>";
        }
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/a/style/global.css">
    <link rel="stylesheet" href="http://localhost/a/style/mcRegister.css">
    <link rel="stylesheet" href="http://localhost/a/style/banner.css">
    <link rel="stylesheet" href="http://localhost/a/style/index.css">
    <link rel="stylesheet" href="http://localhost/a/style/mcdelivery.css">
    <title>Đăng kí</title>
</head>
<body>
    <!--Header-->
    <div class="flex justify-center ">
        <div class="container MC-Delivery-Header-top cusor-pointer mt-10">
            <div class="MC-Delivery-Header flex align-center radius over-hidden">
                <div class="flex-1 flex bg-primary justify-center">
                   <img onclick="NavigateToMcDeliver()" src="https://mcdelivery.vn/vn//static/1724754482442/assets/84/img/mcdelivery_logo_en.jpg" alt="">
                </div>
                <div class="flex-1 text-white bg-mc h-full flex  justify-center bor-r" onclick=" NavigateToMcMenu()">
                    <h2 class="cursor-pointer">Menu</h2>
                </div>
                <div class="flex-1 text-white bg-mc h-full flex  justify-center" onclick="NavigateToMcProfile()">
                    <h2 class="cursor-pointer">Tài khoản của tôi</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="flex justify-center mt-30">
        <div class="container flex gap-100">
            <div class="Register-section">
                <h2 class="text-secondary uppercase line-h-0">
                    NEW ACCESS to McDelivery™
                </h2>
                <p class="font-light mb-20">
                    Setup a McDonald's App account that will give you access to both McDonald's App and McDelivery™ service.<br>
This allows you to earn loyalty points with every purchase, enjoy easy access to exclusive offers and promotions.
                </p>

                <!-- Registration Form -->
                <form method="post" class="register-form">
                    <h2 class="text-secondary line-h-0">Create a New Account</h2>
                    
                    <label for="email">Email</label><br>
                    <input type="email" id="email" name="email" placeholder="Enter your email" required>
                    <br>
                    
                    <label for="password">Password</label><br>
                    <input type="password" id="password" name="password" placeholder="Enter your password" required>
                    <br>

                    <h2 class="text-secondary line-h-0">Thông tin về bạn</h2>
                    
                    <label for="name">Full Name</label><br>
                    <input type="text" id="name" name="name" placeholder="Enter your full name" required>
                    <br>
                    
                    <label for="phone">Phone Number</label><br>
                    <input type="tel" id="phone" name="phone" placeholder="Enter your phone number" required>
                    <br>
                    
                    <label for="address">Address</label><br>
                    <input type="text" id="address" name="address" placeholder="Enter your address" required>
                    <br>

                    <p class="font-light">
                        The purpose of this account is to provide you with offers based on your preferences and account usage. If you do not want McDonald's to use your preferences and account usage in this way then you should not proceed to registration. See our Privacy Policy.
                    </p>
                    <div class="flex term-section">
                        <input type="checkbox" id="terms" name="terms" required>
                        <label for="terms">I agree to the terms and conditions</label>
                    </div>
                    
                    <button type="submit" class="px-20 bg-thirdly radius text-white border-none uppercase"><h2>Đăng kí</h2></button>
                </form>
            </div>
            <div class="promotion-banner">
                <h1 class="t">Promotion</h1>
                <img class="" src="https://mcdelivery.vn/vn//static/1720754797251/assets/84/banners/registration_banner_638_promotion_registration_page.jpg" alt="">
                <h2 class="">Creating an account lets you enjoy</h2>
                <ul>
                    <li>Thanh toán nhanh chóng</li>
                    <li>Hóa đơn tiết kiệm</li>
                    <li>Các ưu đãi đặc biệt khác</li>
                </ul>
            </div>
        </div>
    </div>

    <footer class="flex justify-center mt-10 bg-black">
        <div class="container mb-20 text-white flex justify-between cursor-pointer">
            <div>
                <h3 class="font-bold">Menu</h3>
            </div>
            <div>
                <h3 class="font-bold">Support</h3>
                <ul>
                    <li>Terms & Conditions</li>
                    <li>Chính sách bảo mật</li>
                    <li>Chính sách đặt hàng</li>
                    <li>FAQ</li>
                    <li>Liên hệ với chúng tôi</li>
                </ul>
            </div>
            <div>
                <h3 class="font-bold">Theo dõi ngay</h3>
                <div class="flex">Facebook</div>
                <div class="flex">Youtube</div>
                <div class="flex">Instagram</div>
            </div>
        </div>
    </footer>
    <script src="http://localhost/a/js/navigate.js"></script>
</body>
</html>
