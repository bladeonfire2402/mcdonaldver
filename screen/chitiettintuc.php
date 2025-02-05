<?php
require('../db/conn.php');

// Lấy id từ URL
$id_tin_tuc = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Truy vấn chi tiết tin tức
$query = "SELECT * FROM tin_tuc WHERE id_tin_tuc = $id_tin_tuc";
$result = $conn->query($query);

// Kiểm tra xem tin tức có tồn tại không
$news = null;
if ($result && $result->num_rows > 0) {
    $news = $result->fetch_assoc();
} else {
    echo "Tin tức không tồn tại.";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="">
    <link rel="stylesheet" href="http://localhost/a/style/header.css">
    <link rel="stylesheet" href="http://localhost/a/style/index.css">
    <link rel="stylesheet" href="http://localhost/a/style/global.css">
    <link rel="stylesheet" href="http://localhost/a/style/mainscreen.css">
    <link rel="stylesheet" href="http://localhost/a/style/news.css">
    <link rel="stylesheet" href="http://localhost/a/style/footer.css">
    <link rel="stylesheet" href="http://localhost/a/style/banner.css">
    <title>Tin tức </title>
</head>

<body>
    <!--Header-->
    <?php
    require('./header.php');
    ?>
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
    </div>


    <div class="news-detail-section flex justify-center">
        <div class="container">
            <h1 class="font-light"><?php echo $news['title']; ?></h1>
            <div class="news-detail">
                <img src="<?php echo "http://localhost/a/admin/admin%20dashboard/" . $news['avatar']; ?>" alt="news-avatar" style="width: 100%; height: auto; margin-bottom: 20px;">
                <p><?php echo nl2br($news['content']); ?></p>
                <p><strong>Ngày đăng:</strong> <?php echo date('d/m/Y', strtotime($news['ngay_dang'])); ?></p>
            </div>
        </div>
    </div>

    <div class="flex flex-col  align-center">
        <div class="footer">
            <div class="line mt-35 "></div>
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



    <script src="http://localhost/a/js/header.js"></script>
    <script src="http://localhost/a/js/navigate.js"></script>


</body>

</html>