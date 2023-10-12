
<?php

$id = (int) $_GET['product_id'];
$product = get_product_by_id($id);

// show_array($product);
$qty = 1;

if (isset($_SESSION['cart']) && array_key_exists($id, $_SESSION['cart']['buy'])) {
    $qty = $_SESSION['cart']['buy'][$id]['qty'] + 1;
}

$_SESSION['cart']['buy'][$id] = array(
    'product_id' => $product['product_id'],
    'product_name' => $product['product_name'],
    'price' => $product['price'],
    'img' => $product['img'],
    'category_id' => $product['category_id'],
    'qty' => $qty,
    'sub_total' => $product['price'] * $qty

);

function update_info_cart()
{
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

update_info_cart();
// show_array($_SESSION['cart']);

// unset($_SESSION['cart']);

redirect("?mod=cart");
