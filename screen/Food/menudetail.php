<?php
// Kết nối cơ sở dữ liệu
require('../../db/conn.php');

// Lấy dữ liệu từ bảng mon_an theo loai_mon_an
$loaiMonAn = "Phần Ăn EVM"; // Đặt loại đồ ăn mà bạn muốn lấy
$sql = "SELECT * FROM mon_an WHERE loai_mon_an = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $loaiMonAn);
$stmt->execute();
$result = $stmt->get_result();

$monAnItems = [];
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $monAnItems[] = $row;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/a/style/header.css">
    <link rel="stylesheet" href="http://localhost/a/style/index.css">
    <link rel="stylesheet" href="http://localhost/a/style/global.css">
    <link rel="stylesheet" href="http://localhost/a/style/mainscreen.css">
    <link rel="stylesheet" href="http://localhost/a/style/footer.css">
    <link rel="stylesheet" href="http://localhost/a/style/banner.css">
    <link rel="stylesheet" href="http://localhost/a/style/foodmain.css">
    <link rel="stylesheet" href="http://localhost/a/style/menudetail.css">

    <title>Menu chính - Phần ăn EVM</title>
</head>
<body>
    <header class="header bg-black relative  align-center flex flex-col p-0">
        <div class="head-navigation flex align-center ">
            <img class="logo " src="data:image/webp;base64,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" alt="logo" >
            <ul class="navigation-menu flex align-center">
                <li class="">
                    <a href="http://localhost/a/screen/index.html" class="text-white cursor-pointer decoration-none menu-text font-light home-navigation">Trang chủ</a>
                </li>
                <li class="relative">
                    <a href="" class="text-white cursor-pointer decoration-none menu-text font-light info-navigation ">Tìm hiểu</a>
                    <div class="absolute bg-transparent connectwithinfo"></div>
                </li>
                <li class="relative">
                    <a href="http://localhost/a/screen/Food/mainfood.php" class="text-white cursor-pointer decoration-none menu-text font-light food-navigation text-secondary">Thực đơn</a>
                    <div class="absolute bg-transparent connectwithfood"></div>
                </li>
                <li>
                    <a href="http://localhost/a/screen/discount.html" class="text-white cursor-pointer decoration-none menu-text font-light discount-navigation ">Khuyến mãi</a>
                </li>
                <li>
                    <a href="" class="text-white cursor-pointer decoration-none menu-text font-light news-navigation">Tin tức</a>
                </li>
                <li>
                    <a href="" class="text-white cursor-pointer decoration-none menu-text font-light contact-navigation">Liên hệ</a>
                </li>
            </ul>
           
            <div class="ml-10">
                <div class="flex gap-10">
                    <div class="navbtn-store othernav-btn bg-primary flex align-center cursor-pointer">
                        <img class="" src="data:image/webp;base64,UklGRlIDAABXRUJQVlA4TEUDAAAvI8AIEJfFoJEkRXXk3+LbwD0UMf8O2khyJPftZRTHn2H6b4eNJDnKz/8MkvcmABsfwRKG9zCHRkCS0AG7gaoHALhc+sx5bPlN3d9IF0FQmALvsOoSdLoEgkAA7S4BARCCIEwCwHhTwDBKQhCEPgSAAAigAUAIAEEARBvoAMYAAqfh1BxOMAEUGAVBgfEm2BJ0wE07WRSJGg0+CExGZIg2hDamSQFCOOKGW9JO+I07Jm2IECKknQRgmAKvkB99J797V3d1d7+bc8fYdIKCZQIwBmQa8kdQMAFAKIG9hdbe2nocwtijfdtugChJkmmrz3n32bZt2+9dPNu2bdu2beP84tndez8hov8TAGaDE2l2fmdHQanU7R8qXnzJu7WbGJL87czY3xa+LKpirSJjgwMjZ5Xxs6aMkNTsx0FJ/rQvSWDSVFToQ4X61QpNBsPGGAEq1YhpNKRw0ihQOd1V/ysXPQoQlcqRwmQ8xSY7cWXx6DIlQY/Cf10QzBoGQA790gZxpHyThIG8OVGlJ8jucmNQJUmDJPiWA3Co40naLcNg1Iql8EUOgNQJ5NBQANj1uFoAgCATEpykGGjVoGSZAdiUjR/XbAAYDqT8tRp6J4Ks1gMA0llg9gsAHih49r73oujmihqNAUmjEl5xn6MUvQZR7BkH/wdREs3ys1iXotZlDMDopUBetQNAI462XdwjUFBhB/HwMMT2pzTj3lZjmus7gZqsSRNaS7ZpRgXrLGvhoE+WfFnSYJWvSRv4kjAsfN15MeA8mXa/BUave8d4FiHTk7QSANYER6NWDQZMNk2LtN84lr+2P0gPWeBUwQNInAbroRRYzuFZ8BgMePqAlS9ZBlDuTDCP+JDlFu03zunfjdd3N7yGOKiLPCsBYK5hADCV1v96mmsAZsVPAwCw7XiX6wAMNJiJEPbFI80B1DNrUC3KoCa7AJFPvcZSTnqk5/weqJK5g/PvnCXcpPIkGNbeCrC+zmzvb66WyWSyioL+jrLoRWjc1hqCrvlToQ8xvz22uLi4aKkDAPrVCk2wGsc3+3FQkvPoexag5FpFhjXHwm1kyNehQtvEvF+7iaG/v6EZ+9vCRFuoeMpNmp3f2VlQKnXTBDMA" alt="">
                        <div class="othernavbtn-content flex flex-col">
                            <p class="text-white">Hệ thống</p>
                            <span class="text-secondary">Cửa hàng</span>
                        </div>
                    </div>
                    <div class="navbtn-delivery othernav-btn bg-primary flex align-center cursor-pointer">
                        <img class="" src="data:image/webp;base64,UklGRhwDAABXRUJQVlA4TBADAAAvI8AIEEflIJIkKcrBv0hs/AXciZh/Rm0jSXL17PFeBsuf40w5jiTJUWi2Z0+fBfxxHotwQGt1ogemDlgUAGD12+mK3RuXaZL5NpbUsNsQXwiCoGQNSyoQQJUECIAACAMBVJyAoYIlCRkJBiBhiQSAMFQAGABAACUA/jIkZHDAn4cSBkQiAUfAEXhBQ4AAiCccQuCH+B0Y4JjhcAQcivgJEEQxDHhBERAcPSnH+UAQHAHHlwJfOkChEOFQkwpGSOvF3OD44olnIvRY3WaLYbH36Rs+vCAMEP5xhOAQRDLnke7G3qTafAdItLXt2KL7+9ngZ+Z4svm92bZt15tt27brO0/9b2cQ0f8JgGLjHz7pIjcv44qfPAXjrZbLbtf9Y83Zx4pbd3rLFouFusQlDgo5x8T6BVuEh6JhDjaqfmc9CIr0cXUGMDRUx+kVmEqCBTDVBZeYZDg+AMwDYjgpH6Jip2rsl7AvPsInHl1uiGpH8akjNwDcy1TA/xtCCInfZqFKcwd4LwARr5RS2jHJAl48jgp0ormtra2tH2zOCkzj9xB9BYBVGU8yrgSt451jLKCKa7jYlxsLadpjgqnShGU5h6bUb6JBP0opDSyoJyT2H4CAwsUzuffUHEEEroJSSsv7KA3yB1Rlo8OQt2QXWCSwtvVQSr353O52M6BOEwgnJxSkvANoubu7e2vRAej09YYIgTUkrlviIKXRAZLaSjsA+B4TJTExcDs0cyax2fgyhi0nJyd81G6JJ0I9ogkh582/orb+1n4RjXV6hn6hlFLg5OIxszy8YnpLHOhctV7sP09FYZ7mAh0ktQ0z3dcuzVRaX7vbVmJ9AnCWfwZ+RgqRjl5urauQfd5xm+12BTDDAzvJKilDWG2DC+RNIbXxkwBUKTsAbn5KsR6tBYCN4qPPOCq2F8GnUcVOTfohqYrpZdcTo5KCqbRbYKPrLjVBXl9fZ2BhqI7TQ6kltGiYs4WbyGoVYONCXaITp4RbSoxdBEOX+8su1/3js7PjFbfu9HsXMD6c5JMucnMzrvhJPRQD" alt="">
                        <div class="othernavbtn-content flex flex-col">
                            <p class="text-white">Giao hàng</p>
                            <span class="text-secondary">Mc Delivery</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="Custom-Slider relative">
        <div class="submenu no-display  justify-center info absolute w-full align-center cursor-pointer">
            <div class="flex submenu-content justify-between  gap-10 ">
                <a href="" class="decoration-none text-center" ><img src="http://localhost/a/assets/img/submenuImg/submenuItem.jpg" alt=""><p class="text-white">Lịch sử</p></a>
                <a href="" class="decoration-none text-center" ><img src="http://localhost/a/assets/img/submenuImg/submenuItem1.jpg" alt=""><p class="text-white">Giới thiệu</p></a>
                <a href="" class="decoration-none text-center" ><img src="http://localhost/a/assets/img/submenuImg/submenuItem2.jpg" alt=""><p class="text-white">Xuất xứ</p></a>
                <a href="" class="decoration-none text-center" ><img src="http://localhost/a/assets/img/submenuImg/submenuItem3.jpg" alt=""><p class="text-white">Nhà cung cấp</p></a>
                <a href="" class="decoration-none text-center" ><img src="http://localhost/a/assets/img/submenuImg/submenuItem4.jpg" alt=""><p class="text-white">Dịch vụ</p></a>
                <a href="" class="decoration-none text-center" ><img src="http://localhost/a/assets/img/submenuImg/submenuItem5.jpg" alt=""><p class="text-white">An toàn</p></a>
            </div>
        </div>
        <div class="submenu no-display justify-center food absolute w-full align-center">
            <div class="flex submenu-content justify-between align-center text-white cursor-pointer ">
                <div class="main-menu-section flex flex-col">
                    <h2>Menu chính</h2>
                    <ul class="main-menu-items">
                        <li class=""><a href="#">Phần ăn EVM</a></li>
                        <li class=""><a href="#">Bánh Burger</a></li>
                        <li class=""><a href="#">Gà rán</a></li>
                        <li class=""><a href="#">Tráng miệng</a></li>
                        <li class=""><a href="#">Thức uống</a></li>
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

    <div class="menudetail-screen">
    <div class="flex justify-center mb-20">
        <div class="container">
            <h1 class="font-light">Phần ăn EVM</h1>
            <div class="display-food mt-10 grid-1vs4 grid gap-20">
                <?php foreach ($monAnItems as $monAn): ?>
                    <div class="food-item text-center align-center flex flex-col gap-10">
                        <?php
                        // Tạo đường dẫn đầy đủ đến ảnh
                        $imagePath = "http://localhost/a/admin/admin dashboard/" . $monAn['hinh_anh_mon_an'];

                        ?>
                        <img src="<?= $imagePath; ?>" alt="<?= htmlspecialchars($monAn['ten_mon_an']); ?>">
                        <h3 class="font-light"><?= htmlspecialchars($monAn['ten_mon_an']); ?></h3>
                        <h3 class=""><?= number_format($monAn['gia']); ?> VND</h3>
                        <button onclick="window.location.href='fooddetail.php?id=<?= $monAn['id_mon_an']; ?>'" class="detail-btn text-white font-light uppercase bg-primary">Xem chi tiết</button>

                    </div>
                <?php endforeach; ?>
            </div>
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
                    <div class="mb-15">Nhập email để nhận thông tin khuyến mãi</div>
                    <div class="inputemail relative w-full mb-15">
                        <input class="w-full" type="email" />
                        <div class="absolute bg-primary text-white btn-sent">Gửi</div>
                    </div>
                    <div>Bằng việc nhấn gửi, bạn đã đồng ý với các Điều kiện & Điều khoản của chúng tôi.</div>
                </div>
        </div>
        <div class="line mt-35 "/></div>
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

    <script src="http://localhost/a/js/mainfood.js"></script>
    <script src="http://localhost/a/js/header.js"></script>
    <script src="http://localhost/a/js/navigate.js"></script>
    <script src="http://localhost/a/js/banner.js"></script>
    
</body>
</html>