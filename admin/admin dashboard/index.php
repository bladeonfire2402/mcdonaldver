<?php
require('./include/header.php'); // Header và navigation
require('../../db/conn.php'); // Kết nối tới CSDL

// Truy vấn số lượng cửa hàng
$queryStores = "SELECT COUNT(*) AS total FROM cua_hang";
$resultStores = mysqli_query($conn, $queryStores);
$totalStores = ($resultStores) ? mysqli_fetch_assoc($resultStores)['total'] : 0;

// Truy vấn số lượng món ăn
$queryDishes = "SELECT COUNT(*) AS totalDishes FROM mon_an";
$resultDishes = mysqli_query($conn, $queryDishes);
$totalDishes = ($resultDishes) ? mysqli_fetch_assoc($resultDishes)['totalDishes'] : 0;

// Truy vấn tổng số đơn hàng
$queryOrders = "SELECT COUNT(*) AS totalOrders FROM orders";
$resultOrders = mysqli_query($conn, $queryOrders);
$totalOrders = ($resultOrders) ? mysqli_fetch_assoc($resultOrders)['totalOrders'] : 0;

// Truy vấn doanh thu theo tháng
$querySales = "SELECT MONTH(ngay_tao) AS month, SUM(gia * quantity) AS total_sales 
                FROM orders 
                WHERE status = 'Delivered' 
                GROUP BY MONTH(ngay_tao)";
$resultSales = mysqli_query($conn, $querySales);

$months = [];
$totalSales = [];
while ($row = mysqli_fetch_assoc($resultSales)) {
    $months[] = $row['month'];
    $totalSales[] = $row['total_sales'];
}
$hasData = !empty($totalSales);

// Truy vấn top 3 món ăn được đặt nhiều nhất
$queryTopDishes = "
    SELECT mon_an.ten_mon_an AS product_name, SUM(orders.quantity) AS total_quantity
    FROM orders
    JOIN mon_an ON orders.id_san_pham = mon_an.id_mon_an
    GROUP BY orders.id_san_pham
    ORDER BY total_quantity DESC
    LIMIT 3";
$resultTopDishes = mysqli_query($conn, $queryTopDishes);

$dishNames = [];
$dishQuantities = [];
while ($row = mysqli_fetch_assoc($resultTopDishes)) {
    $dishNames[] = $row['product_name'];
    $dishQuantities[] = $row['total_quantity'];
}

// Truy vấn số lượng email đăng ký
$queryEmails = "SELECT COUNT(*) AS total FROM email_subscribers";
$resultEmails = $conn->query($queryEmails);
$totalEmails = $resultEmails->fetch_assoc()['total'];
?>

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">
    <!-- Main Content -->
    <div id="content">
        <!-- Begin Page Content -->
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            </div>

            <!-- Content Row -->
            <div class="row">
                <!-- Tổng số cửa hàng -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Tổng số cửa hàng
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $totalStores; ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-store fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Số Món Ăn Đã Tạo -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Số Món Ăn Đã Tạo
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $totalDishes; ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-utensils fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tổng số đơn hàng -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                        Tổng số đơn hàng
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $totalOrders; ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Số lượng email đăng ký -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                        Email Đăng Ký</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $totalEmails; ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-envelope fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content Row -->
            <div class="row">
                <!-- Biểu đồ doanh thu theo tháng -->
                <div class="col-xl-8 col-lg-7">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Doanh thu theo tháng</h6>
                        </div>
                        <div class="card-body">
                            <div class="chart-area">
                                <canvas id="myAreaChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Biểu đồ tròn món ăn được đặt nhiều nhất -->
                <div class="col-xl-4 col-lg-5">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Top 3 món ăn đặt nhiều nhất</h6>
                        </div>
                        <div class="card-body">
                            <div class="chart-pie pt-4 pb-2">
                                <canvas id="myPieChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- End of Main Content -->
</div>
<!-- End of Content Wrapper -->

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Biểu đồ doanh thu theo tháng
    const months = <?php echo json_encode($months); ?>;
    const totalSales = <?php echo json_encode($totalSales); ?>;
    const ctxArea = document.getElementById('myAreaChart').getContext('2d');
    new Chart(ctxArea, {
        type: 'line',
        data: {
            labels: months.map(month => `Tháng ${month}`),
            datasets: [{
                label: 'Doanh thu',
                data: totalSales,
                backgroundColor: 'rgba(78, 115, 223, 0.05)',
                borderColor: 'rgba(78, 115, 223, 1)',
            }],
        },
    });

    // Biểu đồ tròn món ăn đặt nhiều nhất
    const dishNames = <?php echo json_encode($dishNames); ?>;
    const dishQuantities = <?php echo json_encode($dishQuantities); ?>;
    const ctxPie = document.getElementById('myPieChart').getContext('2d');
    new Chart(ctxPie, {
        type: 'pie',
        data: {
            labels: dishNames,
            datasets: [{
                data: dishQuantities,
                backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
            }],
        },
    });
</script>

<?php
require('./include/footer.php'); // Footer
?>
