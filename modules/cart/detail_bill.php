<?php require "./inc/header.php"
?>

<div id="head-main-page" class="container-fluid mt-5" style="margin-top: 130px !important;">
    <h2 style="font-weight: 600; text-align:center;">CHI TIẾT ĐƠN HÀNG</h2>
    <h4>MÃ ĐƠN HÀNG: <i class="fas fa-circle" style="color:#84B0CA ;"></i> <span class="fw-bold">ID:</span>#<?php echo $_GET['order_id']
                                                                                                            ?></h4>
    <?php //show_array($list_order_and_detail) 
    ?>
    <table class="table table-striped">
        <thead>
            <th>STT</th>
            <th>Tên sản phẩm</th>
            <th>Giá</th>
            <th>Số lượng</th>
            <th>Thời gian</th>
            <th>Địa điểm</th>
            <th>Tổng tiền</th>
            <th>Trạng thái</th>
            <th></th>
        </thead>
        <tbody>
            <?php
            $i = 0;
            foreach ($list_order_and_detail as $item) {
                $i++;
                $list_product = get_product_by_id($item['product_id']);
            ?>
                <tr>

                    <td><?php echo $i;
                        ?></td>
                    <td><?php echo $list_product['product_name']
                        ?></td>
                    <td><?php echo currency_format($list_product['price'])
                        ?></td>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $item['quantity']
                                                ?></td>
                    <?php
                    if ($i == 1) {
                    ?>
                        <td><?php echo $item['bill_time']
                            ?></td>

                        <td><?php echo $_SESSION['address']
                            ?></td>
                        <td>&nbsp;&nbsp;<?php echo currency_format($item['total_cost'])
                                        ?></td>
                        <td><?php
                            if ($item['status_order'] === 1) {
                            ?>
                                <button style="font-size: 12px;" type="button" class="btn btn-success">ĐÃ ĐẶT</button>
                            <?php
                            } else if ($item['status_order'] === 2) {
                            ?>
                                <button style="font-size: 12px;" type="button" class="btn btn-success">ĐANG GIAO</button>
                            <?php
                            } else if ($item['status_order']) {
                            ?>
                                <button style="font-size: 12px;" type="button" class="btn btn-info">ĐÃ NHẬN</button>
                            <?php
                            } else {
                            ?>
                                <button style="font-size: 12px;" type="button" class="btn btn-dark">ĐÃ HỦY</button>
                            <?php
                            }
                            ?>
                        </td>
                        <td><button style="font-size: 12px;" type="button" class="btn btn-outline-dark" data-mdb-ripple-color="dark">HỦY</button></td>
                    <?php
                    } else {
                    ?>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    <?php
                    }
                    ?>
                </tr>
            <?php
            } ?>

        </tbody>
    </table>
</div>

<?php require "./inc/footer.php" ?>