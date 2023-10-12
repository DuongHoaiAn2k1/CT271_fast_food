<?php

$id = $_POST['id'];
$qty = $_POST['qty'];

$item = get_product_by_id($id);

if (isset($_SESSION['cart']) && array_key_exists($id, $_SESSION['cart']['buy'])) {
    // Cap nhat so luong
    $_SESSION['cart']['buy'][$id]['qty'] = $qty;
    // Cap nhat tong tien

    $sub_total = $qty * $item['price'];
    $_SESSION['cart']['buy'][$id]['sub_total'] = $sub_total;

    // Cap nhat toan bo gio hang
    if (isset($_SESSION['cart'])) {
        $total_order = 0;
        $total_money = 0;
        foreach ($_SESSION['cart']['buy'] as $item) {
            $total_order += $item['qty'];
            $total_money += $item['sub_total'];
        }

        $_SESSION['cart']['info'] = array(
            'total_order' => $total_order,
            'total_money' => $total_money
        );
    }
    // $total_money = 0;
    // $total_order = 0;
    // Lay tong gia tri trong gio hang
    if (isset($_SESSION['cart']['info'])) {
        $total_money = $_SESSION['cart']['info']['total_money'];
    }

    if (isset($_SESSION['cart']['info'])) {
        $total_order = $_SESSION['cart']['info']['total_order'];
    }
    // Gia tri tar ve
    $data = array(
        // 'sub_total' => currency_format($sub_total),
        'sub_total' => $sub_total,
        // 'total_money' => currency_format($total_money),s
        'total_money' => $total_money,
        'total_order' => $total_order,

    );
    header('Content-Type: application/json');
    echo json_encode($data);
}
