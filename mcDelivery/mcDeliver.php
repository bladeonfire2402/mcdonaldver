<?php
session_start();
require('../db/conn.php'); // Adjust this path as per your project structure

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Query the database for the user
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        // Verify password
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id']; // Store user ID in session
            $_SESSION['user_name'] = $user['name']; // Store user name in session
            header("Location: indexmcDeliver.php"); // Redirect after successful login
            exit;
        } else {
            echo "<script>alert('Sai mật khẩu!');</script>";
        }
    } else {
        echo "<script>alert('Không tìm thấy tài khoản với email này!');</script>";
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
    <link rel="stylesheet" href="http://localhost/a/style/mcdelivery.css">
    <link rel="stylesheet" href="http://localhost/a/style/banner.css">
    <link rel="stylesheet" href="http://localhost/a/style/index.css">
    <title>McDelivery</title>
</head>

<body class="relative Mc-Delivery-screen">
    <div class="flex justify-center ">
        <div class="container MC-Delivery-Header-top cusor-pointer">
            <div class="flex gap-20">
                <p class="cusor-pointer">Đăng nhập</p>
                <p>|</p>
                <p class="cusor-pointer">Hàng Đặt</p>
                <p>|</p>
                <p class="cusor-pointer">Tìm kiếm đơn</p>
            </div>
            <div class="MC-Delivery-Header flex align-center radius over-hidden">
                <div class="flex-1 flex bg-primary justify-center">
                    <img src="https://mcdelivery.vn/vn//static/1724754482442/assets/84/img/mcdelivery_logo_en.jpg" alt="">
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


    <!--Slider and form-->
    <div class="flex justify-center mt-30 ">
        <div class="container relative radius over-hidden">
            <div class="Custom-Slider relative">

                <div class="slider">
                    <div class="slides">
                        <div class="slide active">
                            <img src="http://localhost/a/assets/img/slider/sliderImg.png" alt="Slide 1">
                        </div>
                        <div class="slide">
                            <img src="http://localhost/a/assets/img/slider/sliderImg1.png" alt="Slide 2">
                        </div>
                        <div class="slide">
                            <img src="http://localhost/a/assets/img/slider/sliderImg2.png" alt="Slide 3">
                        </div>
                    </div>
                    <button class="prev btnSlides" onclick="changeSlide(-1)">&#10094;</button>
                    <button class="next btnSlides" onclick="changeSlide(1)">&#10095;</button>
                    <script src="http://localhost/a/js/banner.js"></script>
                </div>
            </div>

            <div class="absolute login-form radius">
                <div class="bg-white flex flex-col align-center p-10 radius">

                    <form method="post" action="" class="w-full px-10 flex flex-col">
                        <input class="p-10 mb-10" name="email" required type="email" placeholder="Nhập email">
                        <input class="p-10 mb-10" name="password" required type="password" placeholder="Nhập password">
                        <button type="submit" class="SignIn-btn mt-10 bg-primary text-white radius border-none">
                            <h2 class="uppercase">Đăng nhập</h2>
                        </button>
                        <hr class="line">
                    </form>
                    <button class="border-none mb-10 radius w-full" onclick="window.location.href='mcRegister.php'">
                        <h2 class="uppercase">Đăng kí</h2>
                    </button>

                </div>
            </div>
        </div>
    </div>

    <div class="flex justify-center mt-30">
        <div class="container flex gap-20">
            <img class="radius flex-1" src="https://mcdelivery.vn/vn//static/1720754797251/assets/84/banners/home_promo_2580_subhome_wos_faqs_en.jpg?subhome_wos_faqs_en" alt="">
            <img class="radius flex-1" src="https://mcdelivery.vn/vn//static/1720754797251/assets/84/banners/home_promo_74052_en.jpg?" alt="">

            <img class="radius flex-1" src="https://mcdelivery.vn/vn//static/1720754797251/assets/84/banners/home_promo_63811_happy_meal_bottom.jpg?" alt="">
        </div>
    </div>

    <div class="flex justify-center mt-10">
        <div class="container mb-20">
            <hr class="line mt-20">
            <h1 class="">Cách làm việc của chúng tôi</h1>
            <img onclick="NavigateToMcMenu()" src="https://mcdelivery.vn/vn//static/1720754797251/assets/84/img/how_mcdelivery_works_en.png" alt="">
        </div>
    </div>

    <!--Footer-->
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
    </footer>

    <div class="userLog-popUps-screen absolute flex justify-center no-display">
        <div class="userPopsUp-warn flex flex-col align-center">
            <h1 class="text-center text-primary">Vui lòng đăng nhập hoặc đăng kí</h1>
            <img src="../assets/img/burger.png" alt="">
            <div class="flex gap-10 mt-20">
                <button class="close mb-10 bg-primary text-white radius border-none uppercase">Quay lại</button>
                <button class=" border-none mb-10 radius uppercase" onclick="NavigateToMcRegister()">Đăng kí</button>
            </div>
        </div>

    </div>

    <script src="http://localhost/a/js/popUps.js"></script>
    <script src="http://localhost/a/js/navigate.js"></script>

</body>

</html>