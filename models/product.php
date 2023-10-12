<?php

function get_product_by_cat($cat_name)
{
    $pdo = connect_db();

    try {
        $stmt = $pdo->prepare("SELECT * FROM `san_pham` JOIN `danh_muc` ON `san_pham`.`category_id` = `danh_muc`.`category_id` WHERE `category_name` LIKE ?");
        $stmt->execute([$cat_name]);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    } catch (PDOException $e) {
        echo "Loi" . $e->getMessage();
    }
}
