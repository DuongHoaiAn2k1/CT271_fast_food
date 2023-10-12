<?php
function check_admin_login($username, $password)
{
    $pdo = connect_db();
    try {
        $stmt = $pdo->prepare("SELECT * FROM `admin` WHERE `username` = ? AND `password` = ?");
        $stmt->execute([$username, $password]);
        $checkAdmin = $stmt->rowCount();
        if ($checkAdmin > 0) {
            return true;
        }
        return false;
    } catch (PDOException $e) {
        echo "Dang nhap that bai" . $e->getMessage();
    }
}

function get_infor_admin($username)
{
    $pdo = connect_db();
    try {
        $stmt = $pdo->prepare("SELECT * `admin` WHERE `username` = ?");
        $stmt->execute([$username]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    } catch (PDOException $e) {
        echo "Truy van that bai" . $e->getMessage();
    }
}


function get_category($category_id)
{
    $pdo = connect_db();
    try {
        $stmt = $pdo->prepare(("SELECT * FROM `danh_muc` WHERE `category_id` = ?"));
        $stmt->execute([$category_id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    } catch (PDOException $e) {
        echo "Truy van that bai" . $e->getMessage();
    }
}

function get_product($product_id)
{
    $pdo = connect_db();
    try {
        $stmt = $pdo->prepare("SELECT * FROM `san_pham` WHERE `product_id` = ?");
        $stmt->execute([$product_id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    } catch (PDOException $e) {
        echo "Truy van that bai" . $e->getMessage();
    }
}

function get_list_order_and_detail()
{
    $pdo = connect_db();
    $stmt = $pdo->prepare("SELECT * FROM `don_hang` JOIN `chi_tiet_don_hang` on `don_hang`.order_id = `chi_tiet_don_hang`.order_id");
    $stmt->execute();
    try {
        $result = $stmt->fetchALL(PDO::FETCH_ASSOC);
        return $result;
    } catch (PDOException $e) {
        echo "Loi truy van" . $e->getMessage();
    }
}

// Lấy danh sách đơn hàng và chi tiết của từng đơn hàng theo mã người dùng
function get_list_order_and_detail_by_id($user_id)
{
    $pdo = connect_db();
    $stmt = $pdo->prepare("SELECT * FROM `don_hang` JOIN `chi_tiet_don_hang` on `don_hang`.order_id = `chi_tiet_don_hang`.order_id WHERE `don_hang`.user_id = ?");
    $stmt->execute([$user_id]);
    try {
        $result = $stmt->fetchALL(PDO::FETCH_ASSOC);
        return $result;
    } catch (PDOException $e) {
        echo "Loi truy van" . $e->getMessage();
    }
}

// Lấy danh sách người dùng có trên hệ thống
function get_list_user()
{
    $pdo = connect_db();
    try {
        $stmt = $pdo->prepare("SELECT * FROM `khach_hang`");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    } catch (PDOException $e) {
        echo "Truy van that bai" . $e->getMessage();
    }
}



// Lấy đơn hàng theo mã đơn hàng
function get_order_by_id($order_id)
{
    $pdo = connect_db();
    try {
        $stmt = $pdo->prepare("SELECT * FROM `don_hang` WHERE `order_id` = ?");
        $stmt->execute([$order_id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    } catch (PDOException $e) {
        echo "Truy van that bai" . $e->getMessage();
    }
}

// function get_user_by_id($user_id)
// {
//     $pdo = connect_db();
//     try {
//         $stmt = $pdo->prepare("SELECT * FROM `khach_hang` WHERE `user_id` = ?");
//         $stmt->execute([$user_id]);
//         $result = $stmt->fetch(PDO::FETCH_ASSOC);
//         return $result;
//     } catch (PDOException $e) {
//         echo "Truy van that bai" . $e->getMessage();
//     }
// }
function get_product_by_product_id($product_id)
{
    $pdo = connect_db();
    try {
        $stmt = $pdo->prepare("SELECT * FROM `san_pham` WHERE `product_id` = ?");
        $stmt->execute([$product_id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    } catch (PDOException $e) {
        echo "Lỗi: " . $e->getMessage();
    }
}

function count_user()
{
    $pdo = connect_db();
    try {
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM `khach_hang`");
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_COLUMN);
        return $result;
    } catch (PDOException $e) {
        echo "Lỗi: " . $e->getMessage();
    }
}
