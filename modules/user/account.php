<?php
// require "./models/database.php";
require "inc/header.php";

$user = get_user_by_id($_SESSION['user_id']);
$_SESSION['address'] = $user['address'];

?>
<style>
    .nav-pills .nav-link.active {
        background-color: #a23232;
        ;
    }
</style>

<section style="background-color: #eee;">
    <div class="container py-5">
        <div class="row mt-5">
            <div class="col-xl-4 mt-3">
                <!-- Profile picture card-->
                <div class="card mb-4 mb-xl-0">
                    <div class="card-header">Ảnh đại diện</div>
                    <div class="card-body text-center">
                        <!-- Profile picture image-->
                        <img class="img-account-profile rounded-circle mb-2" src="http://bootdey.com/img/Content/avatar/avatar1.png" alt="" style="width: 40%;">
                        <!-- Profile picture help block-->
                        <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                        <!-- Profile picture upload button-->
                        <button style="background-color: #a23232;" class="btn btn-primary" type="button">Upload new image</button>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 mt-3">
                <div class="card mb-4">
                    <div class="card-body">
                        <form action="" method="POST">
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Họ và tên:</p>
                                </div>
                                <div class="col-sm-9">
                                    <input style="border: none; width: 50%;" type="text" class="mb-0" value="<?php echo $user['name'] ?>">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Email:</p>
                                </div>
                                <div class="col-sm-9">
                                    <input style="border: none;  width: 50%;" type="text" class="mb-0" value="<?php echo $user['email'] ?>">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Số điện thoại:</p>
                                </div>
                                <div class="col-sm-9">
                                    <input style="border: none;  width: 50%;" type="text" class="mb-0" value="<?php echo $user['phone'] ?>">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Địa chỉ:</p>
                                </div>
                                <div class="col-sm-9">
                                    <input style="border: none;  width: 50%;" type="text" class="mb-0" value="<?php echo $user['address'] ?>">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-4"></div>
                                <div class="col-sm-4 d-flex justify-content-center">
                                    <button style="background-color: #a23232;" type="submit" name="update-btn" value="update-btn" class="btn btn-danger btn-rounded">Cập nhật</button>
                                </div>
                                <div class="col-sm-4"></div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-4">
                <!-- Tab navs -->
                <div class="nav flex-column nav-pills text-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" id="v-pills-home-tab" data-mdb-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Đơn hàng đã đặt</a>
                    <a class="nav-link" id="v-pills-profile-tab" data-mdb-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Xóa tài khoản</a>
                    <a class="nav-link" id="v-pills-messages-tab" data-mdb-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Đăng xuất</a>
                </div>
                <!-- Tab navs -->
            </div>

            <div class="col-lg-8">
                <!-- Tab content -->
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                        <div class="card mb-4">
                            <div class="card-body">
                                <h4 style="font-weight: 600;" class="mb-2">Đơn hàng của bạn</h4>
                                <?php
                                $i = 0;
                                if (!empty($list_order_user)) {
                                    foreach ($list_order_user as $item) {
                                        $i++;
                                ?>
                                        <hr>
                                        <hr>
                                        <table class="table table-striped">
                                            <thead>
                                                <th>STT</th>
                                                <th>Mã đơn hàng</th>
                                                <th>Thời gian</th>
                                                <th>Tổng tiền</th>
                                                <th>Chi tiết đơn hàng</th>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><?php echo $i; ?></td>
                                                    <td><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span class="fw-bold">ID:</span>#<?php echo $item['order_id'] ?></td>
                                                    <td><?php echo $item['bill_time'] ?></td>
                                                    <td><?php echo currency_format($item['total_cost']) ?></td>
                                                    <td><a href="?mod=cart&act=detail_bill&order_id=<?php echo $item['order_id'] ?>">Ấn vào để xem</a></td>
                                                </tr>
                                            </tbody>
                                        </table>

                                <?php
                                    }
                                }
                                ?>
                                <hr>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                        <div class="card mb-4">
                            <div class="card-body">
                                <h4 class="mb-2">Bạn có chắc muốn xóa tài khoản không?</h4>
                                <hr>
                                <p>Xóa tài khoản của bạn cũng sẽ xóa vĩnh các viễn thông tin bên dưới.</p>
                                <ul>
                                    <li>Đơn hàng trước đây</li>
                                    <li>Thông tin tài khoản</li>
                                    <li>Địa chỉ nhận hàng</li>
                                </ul>
                                <button style="background-color: #a23232;" type="submit" name="update-btn" value="update-btn" class="btn btn-danger btn-rounded" data-mdb-toggle="modal" data-mdb-target="#exampleModal">Xóa tài khoản</button>
                            </div>
                        </div>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form action="">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel" style="font-weight: 600;">VUI LÒNG NHẬP LẠI MẬT KHẨU ĐỂ XÓA TÀI KHOẢN</h5>
                                        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="text-center">
                                            <input type="password" name="password">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-danger">Xóa</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                        <div class="card mb-4">
                            <div class="card-body">
                                <h4 class="mb-2">Bạn có chắc muốn đăng xuất không?</h4>
                                <hr>
                                <button style="background-color: #a23232;" style="background-color: #a23232;" type="submit" id="logOut-btn" name="logOut-btn" class="btn btn-danger btn-rounded">Đăng xuất</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Tab content -->
            </div>
        </div>
    </div>
</section>


<style>
    /* Styles required only for the example above */
    .scrollspy-example-collapsible {
        position: relative;
        height: 200px;
        overflow: auto;
    }
</style>

<script>
    $(document).ready(function() {
        $("#logOut-btn").click(() => {
            window.location.href = "?mod=user&act=logout";
        })
    })
</script>


<?php
// show_array($_SESSION);
// show_array($user);
require "./inc/footer.php";

?>