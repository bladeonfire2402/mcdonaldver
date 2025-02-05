<?php
session_start();
require('../db/conn.php');

// Kiểm tra nếu chưa đăng nhập thì chuyển hướng về trang đăng nhập
if (!isset($_SESSION['user_id'])) {
    header("Location: mcDeliver.php");
    exit;
}

// Lấy tên người dùng từ session
$user_name = $_SESSION['user_name'];

// URL base for images
$image_base_url = "http://localhost/a/admin/admin%20dashboard/";

// Lấy danh sách danh mục
$categories = [];
$query = "SELECT * FROM danh_muc_do_an";
$result = $conn->query($query);
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $categories[] = $row;
    }
}

// Lấy danh sách món ăn theo danh mục được chọn hoặc tất cả
$selected_category = isset($_GET['category']) ? $_GET['category'] : null;
$meals = [];

if ($selected_category) {
    // Lấy món ăn thuộc danh mục được chọn
    $stmt = $conn->prepare("SELECT * FROM mon_an WHERE id_danh_muc = ?");
    $stmt->bind_param("i", $selected_category);
} else {
    // Lấy tất cả món ăn nếu không chọn danh mục
    $stmt = $conn->prepare("SELECT * FROM mon_an");
}

$stmt->execute();
$result = $stmt->get_result();
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $meals[] = $row;
    }
}


$stmt->close();
$conn->close();
?>

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link rel="stylesheet" href="http://localhost/a/style/global.css">
    <link rel="stylesheet" href="http://localhost/a/style/mcdelivery.css">
    <link rel="stylesheet" href="http://localhost/a/style/banner.css">
    <link rel="stylesheet" href="http://localhost/a/style/index.css">
    <link rel="stylesheet" href="http://localhost/a/style/McMenu.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <div class="Mc-Menu justify-center">
        <div class="flex justify-center ">
            <div class="container MC-Delivery-Header-top cusor-pointer">
                <div class="flex gap-20">
                    <p class="cusor-pointer">Xin chào, <?php echo htmlspecialchars($user_name); ?></p>
                    <p>|</p>
                    <p class="cusor-pointer">Hàng Đặt</p>
                    <p>|</p>
                    <p class="cusor-pointer">Tìm kiếm đơn</p>
                </div>
                <div class="MC-Delivery-Header flex align-center radius over-hidden">
                    <!-- Điều hướng đến indexmcDelivery.php khi nhấn vào ảnh -->
                    <a href="indexmcDeliver.php" class="flex-1 flex bg-primary justify-center">
                        <img src="https://mcdelivery.vn/vn//static/1724754482442/assets/84/img/mcdelivery_logo_en.jpg" alt="">
                    </a>
                    <!-- Điều hướng đến mcMenu.php khi nhấn vào "Menu" -->
                    <a href="mcMenu.php" class="flex-1 text-white bg-mc h-full flex justify-center bor-r text-secondary">
                        <h2 class="cursor-pointer">Menu</h2>
                    </a>
                    <!-- Điều hướng đến mcProfile.php khi nhấn vào "Tài khoản của tôi" -->
                    <a href="mcProfile.php" class="flex-1 text-white bg-mc h-full flex justify-center">
                        <h2 class="cursor-pointer">Tài khoản của tôi</h2>
                    </a>
                </div>


            </div>
        </div>
        <!-- Danh mục đồ ăn -->
        <div class="flex flex-col align-center justify-center mc-menu">
            <div class="Mc-Menu flex">
                <!-- Sidebar: Danh mục đồ ăn -->
                <div class="sidebar w-25% bg-secondary p-20">
                    <h3>Danh mục</h3>
                    <?php foreach ($categories as $category): ?>
                        <div class="category-item">
                            <a href="mcMenu.php?category=<?php echo $category['id_danh_muc']; ?>">
                                <h4><?php echo htmlspecialchars($category['ten_danh_muc']); ?></h4>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="container flex mt-0 justify-between" style="align-items: flex-start;">


                <!-- Hiển thị các món ăn -->
                <div class="content w-75% p-20">
                    <h3>Danh sách món ăn</h3>
                    <div class="grid-container">
                        <?php if (!empty($meals)): ?>
                            <?php foreach ($meals as $meal): ?>
                                <div class="product-items flex flex-col">
                                    <!-- Hình ảnh món ăn -->
                                    <img
                                        class="produc-img"
                                        src="<?php echo $image_base_url . htmlspecialchars($meal['hinh_anh_mon_an']); ?>"
                                        alt="<?php echo htmlspecialchars($meal['ten_mon_an']); ?>"
                                        style="max-width: 200px; height: auto; object-fit: cover; border-radius: 10px;" />
                                    <!-- Thông tin và điều chỉnh số lượng -->
                                    <div class="flex mt-10 justify-between">
                                        <!-- Giá món ăn -->
                                        <p class="font-bold">
                                            <?php echo number_format($meal['gia']); ?> VND
                                        </p>
                                        <!-- Điều khiển thêm/bớt số lượng -->
                                        <div class="controls flex align-center gap-10">
                                            <button class="btn-decrease" data-price="<?php echo $meal['gia']; ?>">-</button>
                                            <div class="quantity">0</div>
                                            <button class="btn-increase" data-price="<?php echo $meal['gia']; ?>">+</button>
                                        </div>
                                    </div>
                                    <!-- Tên món ăn -->
                                    <h4 class="mt-10">
                                        <?php echo htmlspecialchars($meal['ten_mon_an']); ?>
                                    </h4>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p>Không có món ăn nào được tìm thấy.</p>
                        <?php endif; ?>
                    </div>
                </div>

            </div>
        </div>


        <!-- My Order Section -->
<!-- Checkout Section: Chỉnh sửa -->
<div class="order-section bg-white p-20">
    <h3>My Order</h3>
    <div id="order-summary">
        <p>Sub Total: <span id="subtotal">0</span> VND</p>
        <p>Delivery Charge: <span id="delivery-charge">0</span> VND</p>
        <p>Tax: <span id="tax">0</span> VND</p>
        <p class="total">Total: <span id="total">0</span> VND</p>
    </div>
    <!-- Form gửi đơn hàng đến mcCheckout.php -->
    <form id="checkout-form" method="POST" action="mcCheckout.php">
        <input type="hidden" name="order_items" id="order-items">
        <input type="hidden" name="subtotal" id="input-subtotal">
        <input type="hidden" name="tax" id="input-tax">
        <input type="hidden" name="delivery_charge" id="input-delivery-charge">
        <input type="hidden" name="total" id="input-total">
        <button type="submit" class="checkout-button">CHECKOUT</button>
    </form>
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
    <script src="http://localhost/a/js/navigate.js"></script>
    <script>
    $(document).ready(function() {
        let subtotal = 0;
        let orderItems = [];

        // Các sự kiện tăng/giảm số lượng và tính toán tổng
        $(".btn-increase").click(function() {
            const mealId = $(this).closest('.product-items').data('meal-id');
            const price = parseInt($(this).data("price"));
            const quantityElement = $(this).siblings(".quantity");
            let quantity = parseInt(quantityElement.text());
            quantity++;
            quantityElement.text(quantity);
            updateOrderItems(mealId, price, quantity);
        });

        $(".btn-decrease").click(function() {
            const mealId = $(this).closest('.product-items').data('meal-id');
            const price = parseInt($(this).data("price"));
            const quantityElement = $(this).siblings(".quantity");
            let quantity = parseInt(quantityElement.text());
            if (quantity > 0) {
                quantity--;
                quantityElement.text(quantity);
                updateOrderItems(mealId, price, quantity);
            } else {
                alert("Không thể giảm số lượng dưới 0.");
            }
        });

        function updateOrderItems(mealId, price, quantity) {
            const existingItem = orderItems.find(item => item.id === mealId);
            if (existingItem) {
                existingItem.quantity = quantity;
                if (quantity === 0) {
                    orderItems = orderItems.filter(item => item.id !== mealId);
                }
            } else if (quantity > 0) {
                orderItems.push({ id: mealId, price: price, quantity: quantity });
            }
            updateOrderSummary();
        }

        function updateOrderSummary() {
            subtotal = orderItems.reduce((total, item) => total + (item.price * item.quantity), 0);
            const tax = subtotal * 0.1; // 10% thuế
            const deliveryCharge = subtotal > 0 ? 20000 : 0; // Phí giao hàng cố định nếu subtotal > 0
            const total = subtotal + tax + deliveryCharge;

            $("#subtotal").text(subtotal.toLocaleString());
            $("#tax").text(tax.toLocaleString());
            $("#delivery-charge").text(deliveryCharge.toLocaleString());
            $("#total").text(total.toLocaleString());

            // Cập nhật các giá trị trong form
            $("#input-subtotal").val(subtotal);
            $("#input-tax").val(tax);
            $("#input-delivery-charge").val(deliveryCharge);
            $("#input-total").val(total);
            $("#order-items").val(JSON.stringify(orderItems));
        }
    });
</script>
</body>

</html>