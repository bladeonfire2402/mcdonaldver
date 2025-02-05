<?php
// Kết nối cơ sở dữ liệu
require('../db/conn.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/a/style/header.css">
    <link rel="stylesheet" href="http://localhost/a/style/index.css">
    <link rel="stylesheet" href="http://localhost/a/style/global.css">
    <link rel="stylesheet" href="http://localhost/a/style/footer.css">
    <link rel="stylesheet" href="http://localhost/a/style/banner.css">
    <link rel="stylesheet" href="http://localhost/a/style/history.css">
    <link rel="stylesheet" href="http://localhost/a/style/location.css">
    <link rel="stylesheet" href="http://localhost/a/style/storelocation.css">
    <link rel="shortcut icon" href="http://localhost/a/assets/logo.png" type="image/.png">
    <style>
        .btn-view-map {
    background-color: #ff0000; /* Màu nền đỏ */
    color: #ffffff; /* Màu chữ trắng */
    border: none; /* Không có viền */
    padding: 10px 20px; /* Khoảng cách padding để có kích thước nút hợp lý */
    text-align: center; /* Canh giữa chữ */
    text-decoration: none; /* Bỏ gạch dưới của link */
    font-size: 16px; /* Cỡ chữ */
    cursor: pointer; /* Con trỏ chuột chuyển thành hình bàn tay khi hover */
    border-radius: 4px; /* Bo tròn các góc của nút */
}

.btn-view-map:hover {
    background-color: #cc0000; /* Màu nền tối hơn khi hover */
}

    </style>
    <title>Danh sách cửa hàng</title>
</head>
<body>
    <!-- Header giữ nguyên như cũ -->
    <?php 
   require('./header.php');
?>
    <div class="Custom-Slider relative">
        <div class="submenu no-display  justify-center info absolute w-full align-center cursor-pointer">
            <div class="flex submenu-content justify-between  gap-10 ">
                <a href="../screen/Info/history.html" class="decoration-none text-center" ><img src="../assets/img/submenuImg/submenuItem.jpg" alt=""><p class="text-white">Lịch sử</p></a>
                <a href="../screen/Info/about.html" class="decoration-none text-center" ><img src="../assets/img/submenuImg/submenuItem1.jpg" alt=""><p class="text-white">Giới thiệu</p></a>
                <a href="../screen/Info/made.html" class="decoration-none text-center" ><img src="../assets/img/submenuImg/submenuItem2.jpg" alt=""><p class="text-white">Xuất xứ</p></a>
                <a href="../screen/Info/producer.html" class="decoration-none text-center" ><img src="../assets/img/submenuImg/submenuItem3.jpg" alt=""><p class="text-white">Nhà cung cấp</p></a>
                <a href="../screen/Info/service.html" class="decoration-none text-center" ><img src="../assets/img/submenuImg/submenuItem4.jpg" alt=""><p class="text-white">Dịch vụ</p></a>
                <a href="../screen/Info/safe.html" class="decoration-none text-center" ><img src="../assets/img/submenuImg/submenuItem5.jpg" alt=""><p class="text-white">An toàn</p></a>
            </div>
        </div>
        <div class="submenu no-display justify-center food absolute w-full align-center">
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

    <!-- Phần bản đồ Google Map giữ nguyên -->
    <div class="w-full location relative">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.2448365976393!2d106.69390487596537!3d10.792550731480617!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317529c032abd229%3A0x3f28cabceeca1a32!2sMcDonald&#39;s%20%C4%90a%20Kao!5e0!3m2!1svi!2s!4v1729665740031!5m2!1svi!2s" height="550" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        <div class="absolute bg-white p-20 radius">
            <h2 class="text-primary agency">Trụ sở của ChickenFast</h2>
            <p>Địa chỉ: <strong class="location">2-6 Bis Điện Biên Phủ, P.Đa Kao, Quận 1, Tp Hồ Chí</strong></p>
            <p>Tổng đài chăm sóc khách hàng:<strong class="text-primary">1900 9001</strong></p>
            <p>Email:<strong class="text-primary">1900 9001</strong></p>
        </div>
    </div>



        <div class="flex justify-center mt-30">
            <div class="container mt-20">
                <div class="grid-1vs2 gap-10 storelocation-item-list">
                    <?php
                    // Lấy dữ liệu từ bảng cua_hang
                    $sql = "SELECT * FROM cua_hang";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        // Lặp qua kết quả để hiển thị các cửa hàng
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<div class="store-item">';
                            echo '<h2 class="text-primary">' . htmlspecialchars($row['ten_cua_hang']) . '</h2>';
                            echo '<p>Địa chỉ: ' . htmlspecialchars($row['address']) . '</p>';
                            echo '<p>Giờ mở cửa: ' . htmlspecialchars($row['gio_mo_cua']) . '</p>';
                            echo '<p>Số điện thoại: ' . htmlspecialchars($row['so_dien_thoai']) . '</p>';
                            echo '<a href="' . htmlspecialchars($row['link_gg_map']) . '" target="_blank" class="btn-view-map bg-primary text-white">Xem trên bản đồ</a>';
                            echo '</div>';
                        }
                    } else {
                        echo '<p>Không có cửa hàng nào được tìm thấy.</p>';
                    }

                    // Đóng kết nối
                    mysqli_close($conn);
                    ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer giữ nguyên -->
    <div class="flex flex-col  align-center mt-20">
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
    
    </div>

</body>
</html>
