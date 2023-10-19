<?php

$order_id =  $_GET['order_id'];
$pdo = connect_db();
try {
    $stmt = $pdo->prepare("DELETE FROM `don_hang` WHERE `order_id` = ?");
    $stmt->execute([$order_id]);
} catch (PDOException $e) {
    echo "Lỗi: " . $e->getMessage();
    exit;
}

try {
    $stmt = $pdo->prepare("DELETE FROM `chi_tiet_don_hang` WHERE `order_id` = ?");
    $stmt->execute([$order_id]);
    echo "<script>alert('Hủy đơn hàng thành công'); setTimeout(()=>{window.location.href='?mod=user&act=account';}, 500)</script>";
} catch (PDOException $e) {
    echo "Lỗi: " . $e->getMessage();
    exit;
}
