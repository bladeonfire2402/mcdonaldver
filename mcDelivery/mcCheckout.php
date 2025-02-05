<?php
session_start();
require('../db/conn.php');

// Kiểm tra nếu chưa đăng nhập thì chuyển hướng về trang đăng nhập
if (!isset($_SESSION['user_id'])) {
    header("Location: mcDeliver.php");
    exit;
}

// Lấy thông tin người dùng từ session
$user_name = $_SESSION['user_name'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="http://localhost/a/style/global.css">
    <link rel="stylesheet" href="http://localhost/a/style/mcdelivery.css">
    <link rel="stylesheet" href="http://localhost/a/style/banner.css">
    <link rel="stylesheet" href="http://localhost/a/style/index.css">
    <link rel="stylesheet" href="http://localhost/a/style/McMenu.css">
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
                        <img src="https://mcdelivery.vn/vn//static/1724754482442/assets/84/img/mcdelivery_logo_en.jpg" alt="Logo">
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

        <!-- Checkout Form -->
        <div class="flex flex-col align-center justify-center checkout-container">
            <div class="container flex mt-0 justify-between" style="align-items: flex-start;">
                <div class="content w-75% p-20">
                    <h3>Checkout</h3>
                    <form method="POST" action="orderConfirmation.php">
                        <div class="form-group">
                            <label for="name">Tên:</label>
                            <input type="text" id="name" name="name" required class="input-field" value="<?php echo htmlspecialchars($user_name); ?>">
                        </div>
                        <div class="form-group">
                            <label for="address">Địa chỉ:</label>
                            <input type="text" id="address" name="address" required class="input-field">
                        </div>
                        <div class="form-group">
                            <label for="phone">Số điện thoại:</label>
                            <input type="text" id="phone" name="phone" required class="input-field">
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" id="email" name="email" required class="input-field">
                        </div>
                        <div class="form-group">
                            <label for="promo_code">Mã khuyến mãi:</label>
                            <input type="text" id="promo_code" name="promo_code" class="input-field">
                            <button type="button" id="check_promo" class="check-promo-button">Kiểm tra</button>
                            <p id="promo_feedback" class="promo-feedback"></p>
                        </div>
                        <!-- Thông tin đơn hàng -->
                        <input type="hidden" name="order_items" value='<?php echo isset($_POST['order_items']) ? htmlspecialchars($_POST['order_items']) : ''; ?>'>
                        <input type="hidden" name="subtotal" value="<?php echo isset($_POST['subtotal']) ? $_POST['subtotal'] : '0'; ?>">
                        <input type="hidden" name="tax" value="<?php echo isset($_POST['tax']) ? $_POST['tax'] : '0'; ?>">
                        <input type="hidden" name="delivery_charge" value="<?php echo isset($_POST['delivery_charge']) ? $_POST['delivery_charge'] : '0'; ?>">
                        <input type="hidden" name="total" value="<?php echo isset($_POST['total']) ? $_POST['total'] : '0'; ?>">

                        <button type="submit" class="checkout-button">Hoàn tất đặt hàng</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('check_promo').addEventListener('click', function () {
            const promoCode = document.getElementById('promo_code').value;
            const feedback = document.getElementById('promo_feedback');

            fetch('checkPromo.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ promo_code: promoCode })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    feedback.textContent = `Mã hợp lệ: ${data.description}`;
                    feedback.style.color = 'green';
                } else {
                    feedback.textContent = `Mã không hợp lệ hoặc đã hết hạn.`;
                    feedback.style.color = 'red';
                }
            })
            .catch(error => {
                feedback.textContent = `Lỗi kiểm tra mã khuyến mãi.`;
                feedback.style.color = 'red';
                console.error(error);
            });
        });
    </script>
</body>

</html>
