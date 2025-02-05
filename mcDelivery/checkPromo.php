<?php
require('../db/conn.php');

header('Content-Type: application/json');

// Lấy dữ liệu từ yêu cầu AJAX
$data = json_decode(file_get_contents('php://input'), true);

if (!isset($data['promo_code'])) {
    echo json_encode(['success' => false, 'message' => 'Không có mã khuyến mãi được cung cấp.']);
    exit;
}

$promo_code = $data['promo_code'];

// Truy vấn cơ sở dữ liệu để kiểm tra mã khuyến mãi
$sql = "SELECT * FROM khuyen_mai WHERE code_khuyen_mai = ? AND (ngay_het_han >= NOW())";
$stmt = $conn->prepare($sql);

if (!$stmt) {
    echo json_encode(['success' => false, 'message' => 'Lỗi truy vấn cơ sở dữ liệu.']);
    exit;
}

$stmt->bind_param('s', $promo_code);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $promo = $result->fetch_assoc();
    echo json_encode([
        'success' => true,
        'description' => $promo['mo_ta']
    ]);
} else {
    echo json_encode([
        'success' => false,
        'message' => 'Mã khuyến mãi không hợp lệ hoặc đã hết hạn.'
    ]);
}

$stmt->close();
$conn->close();
?>
