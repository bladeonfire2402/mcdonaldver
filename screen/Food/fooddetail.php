<?php
// Connect to the database
require('../../db/conn.php');

// Check if the `id` parameter is present in the URL
if (isset($_GET['id'])) {
    $id_mon_an = $_GET['id'];

    // Prepare the SQL query to fetch the food item details
    $sql = "SELECT * FROM mon_an WHERE id_mon_an = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_mon_an);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if the item exists in the database
    if ($result && $result->num_rows > 0) {
        $foodDetail = $result->fetch_assoc();
    } else {
        echo "Không tìm thấy thông tin món ăn.";
        exit;
    }
} else {
    echo "Không tìm thấy thông tin món ăn.";
    exit;
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
    <link rel="stylesheet" href="http://localhost/a/style/fooddetail.css">
    <title>Chi tiết món ăn - <?= htmlspecialchars($foodDetail['ten_mon_an']); ?></title>
</head>
<body>
    <header class="header bg-black relative align-center flex flex-col p-0">
        <!-- Add your header content here -->
        <div class="head-navigation flex align-center">
            <img class="logo" src="data:image/webp;base64,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" alt="logo">
            <ul class="navigation-menu flex align-center">
                <li><a href="http://localhost/a/screen/index.html" class="text-white menu-text font-light">Trang chủ</a></li>
                <li><a href="" class="text-white menu-text font-light">Tìm hiểu</a></li>
                <li><a href="http://localhost/a/screen/Food/mainfood.html" class="text-white menu-text font-light text-secondary">Thực đơn</a></li>
                <li><a href="http://localhost/a/screen/discount.html" class="text-white menu-text font-light">Khuyến mãi</a></li>
                <li><a href="" class="text-white menu-text font-light">Tin tức</a></li>
                <li><a href="" class="text-white menu-text font-light">Liên hệ</a></li>
            </ul>
        </div>
    </header>

    <div class="fooddetails-wrapper">
        <div class="bg-thirdly pt-35 pb-35 flex justify-center">
            <div class="fooddetails-banner container relative flex justify-between">
                <img class="foodImg-responsive" src="http://localhost/a/admin/admin dashboard/<?= htmlspecialchars($foodDetail['hinh_anh_mon_an']); ?>" alt="<?= htmlspecialchars($foodDetail['ten_mon_an']); ?>">
                <div class="text-white w-5phan12">
                    <h1><?= htmlspecialchars($foodDetail['ten_mon_an']); ?></h1>
                    <h2>Giá: <?= number_format($foodDetail['gia']); ?> VND</h2>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <div class="footer-content">
            <p>©2017-2018 McDonald's. All Rights Reserved.</p>
        </div>
    </footer>

</body>
</html>
