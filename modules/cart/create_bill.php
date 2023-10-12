<?php

$pdo = connect_db();
try {
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}


$total_cost = $_SESSION['cart']['info']['total_money'];
$total_order = $_SESSION['cart']['info']['total_order'];
$user_id = $_SESSION['user_id'];
$bill_time = $_SESSION['time_create_bill'];


// Insert data into the database using a prepared statement
$stmt = $pdo->prepare("INSERT INTO don_hang (total_cost, total_order, user_id, bill_time) VALUES (:total_cost, :total_order, :user_id, :bill_time)");

$stmt->bindParam(':total_cost', $total_cost);
$stmt->bindParam(':total_order', $total_order);
$stmt->bindParam(':user_id', $user_id);
$stmt->bindParam(':bill_time', $bill_time);
try {
    $stmt->execute();
    // echo '<script>alert("Thanh toán thành công");setTimeout(function(){window.location.href="?";}, 500);</script>';
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

//Lay danh sach hoa don
global $list_bill;
$order_id = $list_bill[sizeof($list_bill) - 1]['order_id'] + 1;

$stmt = $pdo->prepare("INSERT INTO chi_tiet_don_hang (product_id, order_id, quantity, price) VALUES (:product_id, :order_id, :quantity, :price)");
foreach ($_SESSION['cart']['buy'] as $item) {
    $stmt->bindParam(':product_id', $item['product_id']);
    $stmt->bindParam(':order_id', $order_id);
    $stmt->bindParam(':quantity', $item['qty']);
    $stmt->bindParam(':price', $item['price']);

    try {
        $stmt->execute();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        exit();
    }
}
echo '<script>alert("Thanh toán thành công");setTimeout(function(){window.location.href="?";}, 500);</script>';

// Close the database connection
$pdo = null;
