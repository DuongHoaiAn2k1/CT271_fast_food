
<?php

if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];
    unset($_SESSION['cart']['buy'][$product_id]);
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
}
redirect("?mod=cart&act=main");
