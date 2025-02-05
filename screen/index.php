<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="">
<link rel="stylesheet" href="../style/header.css">
<link rel="stylesheet" href="../style/index.css">
<link rel="stylesheet" href="../style/global.css">
<link rel="stylesheet" href="../style/mainscreen.css">
<link rel="stylesheet" href="../style/footer.css">
<link rel="stylesheet" href="../style/banner.css">
<link rel="shortcut icon" href="../assets/logo.png" type="image/.png">
<title>Chicken-Fast</title>
</head>

<body class="block">
    <!--Header -->
    <?php
    require('./header.php');
    ?>
    <!--Slider -->
    <div class="Custom-Slider relative">
        <div class="submenu no-display  justify-center info absolute w-full align-center cursor-pointer">
            <div class="flex submenu-content justify-between  gap-10 ">
                <a href="http://localhost/a/screen/Info/history.html" class="decoration-none text-center"><img src="http://localhost/a/assets/img/submenuImg/submenuItem.jpg" alt="">
                    <p class="text-white">Lịch sử</p>
                </a>
                <a href="http://localhost/a/screen/Info/about.html" class="decoration-none text-center"><img src="http://localhost/a/assets/img/submenuImg/submenuItem1.jpg" alt="">
                    <p class="text-white">Giới thiệu</p>
                </a>
                <a href="http://localhost/a/screen/Info/made.html" class="decoration-none text-center"><img src="http://localhost/a/assets/img/submenuImg/submenuItem2.jpg" alt="">
                    <p class="text-white">Xuất xứ</p>
                </a>
                <a href="http://localhost/a/screen/Info/producer.html" class="decoration-none text-center"><img src="http://localhost/a/assets/img/submenuImg/submenuItem3.jpg" alt="">
                    <p class="text-white">Nhà cung cấp</p>
                </a>
                <a href="http://localhost/a/screen/Info/service.html" class="decoration-none text-center"><img src="http://localhost/a/assets/img/submenuImg/submenuItem4.jpg" alt="">
                    <p class="text-white">Dịch vụ</p>
                </a>
                <a href="http://localhost/a/screen/Info/safe.html" class="decoration-none text-center"><img src="http://localhost/a/assets/img/submenuImg/submenuItem5.jpg" alt="">
                    <p class="text-white">An toàn</p>
                </a>
            </div>
        </div>


        <div class="submenu no-display  justify-center food absolute w-full align-center">
            <div class="flex submenu-content justify-between align-center text-white cursor-pointer">
                <div class="main-menu-section flex flex-col">
                    <h2>Menu chính</h2>
                    <ul class="main-menu-items">
                        <li class=""><a href="#">Phần ăn EVM</a></li>
                        <li class=""><a href="#">Bánh Burger</a></li>
                        <li class=""><a href="#">Gà rán</a></li>
                        <li class=""><a href="#">Thức uống</a></li>
                        <li class=""><a href="#">Tráng miệng</a></li>
                    </ul>
                </div>
                <div class="dersert-menu-section">
                    <h2>Điểm tâm</h2>
                    <ul class="desert-menu-items">
                        <li class=""><a href="#">Phần ăn EVM</a></li>
                        <li class=""><a href="#">Bánh Muffin</a></li>
                        <li class=""><a href="#">Nước uống</a></li>
                        <li class=""><a href="#">Tráng miệng</a></li>
                        <li class=""><a href="#">Món ăn nhẹ</a></li>
                    </ul>
                </div>

                <div class="mcoffee-menu-section">
                    <h2>McCafe</h2>
                    <ul class="desert-menu-items">
                        <li class=""><a href="#">Thức uống nóng</a></li>
                        <li class=""><a href="#">Thức uống đá</a></li>
                        <li class=""><a href="#">Sữa chua trái cây</a></li>
                        <li class=""><a href="#">Thức uống trà</a></li>
                        <li class=""><a href="#">Thức uống đá xay</a></li>
                    </ul>
                </div>

            </div>
        </div>
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


    </div>
    <div class="Main">
        <div class="Main-screen flex flex-col align-center">
            <div class="banner ">
                <div class="relative first-banner section-banner-1">
                    <img alt="banner" class="w-full radius" src="http://localhost/a/assets/img/main/bannerProduct.png">
                    <div class="absolute text-white ">
                        <p class="font-light">Tích điểm đổi quà và ưu đãi</p>
                        <h2>ỨNG DỤNG McDONALD'S</h2>
                        <button class=" text-center bg-primary text-white font-light">
                            Tải ứng dụng
                        </button>
                    </div>
                </div>

                <div class="section-banner-2 text-white font-light cursor-pointer">
                    <div class="flex gap-30">
                        <div class="w-1phan2 McCafe-section relative ">
                            <img class="radius" src="../assets/img/main/bannerProduct2.png" alt="">
                            <div class="absolute  ">
                                McCAFÉ
                            </div>
                        </div>
                        <div class="w-1phan2 ">
                            <div class="flex gap-30">
                                <div class="w-1phan2 relative McDonald-story">
                                    <img class="w-full radius" src="../assets/img/main/bannerProduct3.png" alt="">
                                    <div class="absolute">CÂU CHUYỆN VỀ McDONALD'S</div>
                                </div>
                                <div class="w-1phan2 relative McDonald-hire">
                                    <img class="w-full radius" src="../assets/img/main/bannerProduct4.png" alt="" />
                                    <div class="absolute">TUYỂN DỤNG</div>
                                </div>
                            </div>

                            <div class="relative McDonald-Hamburger margintop-30">
                                <img class="w-full radius " src="../assets/img/main/bannerProduct5.png" alt="">
                                <div class="absolute ">
                                    <div class="">HAMBUGER <br /> KHÁM PHÁ VỊ NGON LỪNG DANH
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="margin top-30 w-full McDelivery-section flex align-center justify-center">
                <div class="flex flex-col align-center gap-10">
                    <h1 class="text-white">McDELIVERY™</h1>
                    <div class="text-white">Dịch vụ giao hàng của McDonald's. Đặt hàng đơn giản, giao hàng nhanh chóng</div>
                    <button class="btn-McDeliver text-primary">
                        ĐẶT HÀNG NGAY
                    </button>
                </div>
            </div>
        </div>

        <div class="flex flex-col  align-center">
            <div class="footer">
                <div class=" flex font-light justify-between mt-25">
                    <div class="w-3phan12">
                        <div class="mb-15">
                            Nhấn vào đây để phản ánh đánh giá dịch vụ và nhận 1 phần quà từ McDonald’s
                        </div>
                        <button class="btn-feedback bg-primary text-white">
                            Chúng tôi lắng nghe bạn
                        </button>
                    </div>
                    <div class="w-8phan12 font-light">
                        <form action="process_email.php" method="POST" style="font-family: Arial, sans-serif; max-width: 500px; margin: auto;">
                            <div class="mb-15" style="margin-bottom: 10px; font-size: 16px; color: #333;">
                                Nhập email để nhận thông tin khuyến mãi
                            </div>
                            <div class="inputemail relative w-full mb-15" style="position: relative; display: flex; align-items: center; gap: 10px;">
                                <input
                                    class="w-full"
                                    type="email"
                                    name="email"
                                    required
                                    style="flex-grow: 1; padding: 10px; border: 1px solid #ccc; border-radius: 25px; font-size: 14px; outline: none;"
                                    placeholder="Nhập email của bạn..." />
                                <button
                                    type="submit"
                                    style="padding: 10px 20px; background-color: #dc3545; color: white; border: none; border-radius: 25px; font-size: 14px; cursor: pointer;">
                                    Gửi
                                </button>
                            </div>
                            <div style="font-size: 12px; color: #555;">
                                Bằng việc nhấn gửi, bạn đã đồng ý với các Điều kiện & Điều khoản của chúng tôi.
                            </div>
                        </form>
                    </div>



                </div>
                <div class="line mt-35 " />
            </div>
            <div class="flex">
                <div class="w-3phan12 footer-info-menu">
                    <h3>Tìm hiểu</h3>
                    <p class="font-light">Lịch sử McDonalds</p>
                    <p class="font-light">Giới thiệu McDonald's Việt Nam</p>
                    <p class="font-light">Xuất xứ</p>
                    <p class="font-light">Nhà cung cấp</p>
                    <p class="font-light">Dịch vụ</p>
                    <p class="font-light">An toàn thực phẩm </p>
                </div>
                <div class="w-3phan12 footer-info-menu">
                    <h3>Cơ hội nghề nghiệp</h3>
                    <p class="font-light">Thông tin tuyển dụng</p>
                </div>
                <div class="w-3phan12 footer-info-menu">
                    <h3>Cơ hội nghề nghiệp</h3>
                    <p class="font-light">Các câu hỏi thường gặp</p>
                    <p class="font-light">Điều khoản và chính sách</p>
                    <p class="font-light">Chính sách và quyền riêng tư</p>
                    <h3>Ngôn ngữ</h3>
                    <div class="flex gap-10">
                        <img src="https://mcdonalds.vn/public/images/icon/xunited-states.png.pagespeed.ic.WBlgDjKPgk.webp" alt="">
                        <img src="https://mcdonalds.vn/public/images/icon/xvietnam.png.pagespeed.ic.HtLmrRqaUb.webp" alt="">

                    </div>
                </div>
                <div class="w-3phan12 footer-info-menu">
                    <h3>Liên hệ với chúng tôi</h3>
                    <p class="font-light">Liên hệ</p>
                    <p class="font-light">Phản hồi chất lượng dịch vụ</p>

                    <div class="flex gap-10">
                        <img class="img-social" src="https://mcdonalds.vn/uploads/2018/icon/xfacebook.png.pagespeed.ic.zGOhsTdnOy.webp" alt="">
                        <img class="img-social" src="https://mcdonalds.vn/uploads/2018/icon/xinstagram.png.pagespeed.ic.QLFygi5mXF.webp" alt="">
                        <img class="img-social" src="https://mcdonalds.vn/uploads/2018/icon/xyoutube.png.pagespeed.ic.YHlyEumD7N.webp" alt="">
                    </div>
                </div>

            </div>
        </div>
        <div class="bg-black w-full footer-last mt-35 text-white font-light">
            ©2017-2018 McDonald's. All Rights Reserved.
        </div>
    </div>

    <script src="../js/header.js"></script>
    <script src="../js/navigate.js"></script>


    </div>
</body>

</html>