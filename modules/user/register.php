<?php
include "./helper/user.php";
global $error;
register();
require "inc/header.php";

?>



<link rel="stylesheet" href="public/css/user.css">
<div id="head-main-page" class="container-fluid">
  <section class="vh-100" style="background-color: #fff">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-12 col-xl-11">
          <div class="card text-black" style="border: none; ">
            <div class="card-body p-md-5">
              <div class="row justify-content-center">
                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                  <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">
                    Đăng ký
                  </p>
                  <form class="mx-1 mx-md-4" method="POST">
                    <?php echo form_error('account'); ?>

                    <div class="d-flex flex-row align-items-center mb-4 contain-form">
                      <label class="form-label" for="form3Example1c"><i class="user-icon-login fa fa-user" aria-hidden="true" style="margin-right: 4px"></i></label>

                      <div class="form-outline flex-fill mb-0 contain-input">
                        <input type="text" id="form3Example1c" class="form-control" placeholder="Họ và tên của bạn" name="full_name" value="<?php if (isset($_POST['full_name'])) echo $_POST['full_name'] ?>" />
                      </div>
                    </div>
                    <?php echo form_error('full_name'); ?>
                    <div class="d-flex flex-row align-items-center mb-4">
                      <label class="form-label" for="form3Example3c"><i class="icon-register fa fa-envelope" aria-hidden="true"></i></label>

                      <div class="form-outline flex-fill mb-0 contain-input">
                        <input type="email" id="form3Example3c" class="form-control" placeholder="Email của bạn" name="email" value="<?php if (isset($_POST['email'])) echo $_POST['email'] ?>" />
                      </div>
                    </div>
                    <?php echo form_error('email'); ?>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <label class="form-label" for="form3Example4c"><i class="icon-register fa fa-key" aria-hidden="true"></i></label>

                      <div class="form-outline flex-fill mb-0 contain-input">
                        <input type="password" id="form3Example4c" class="form-control" placeholder="Vui lòng nhập mật khẩu" name="password" />
                      </div>
                    </div>
                    <?php echo form_error('password'); ?>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <label class="form-label" for="form3Example4cd"><i class="icon-register fa fa-key" aria-hidden="true"></i></label>

                      <div class="form-outline flex-fill mb-0 contain-input">
                        <input type="password" id="form3Example4cd" class="form-control" placeholder="Vui lòng nhập lại mật khẩu" name="confirm_password" />
                      </div>
                    </div>
                    <?php echo form_error('confirm_password'); ?>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <label class="form-label" for="form3Example4cd">
                        <i class="fa fa-phone-square" aria-hidden="true" style="margin-right: 4px"></i>
                      </label>

                      <div class="form-outline flex-fill mb-0 contain-input">
                        <input type="text" id="form3Example4cd" class="form-control" placeholder="Vui lòng nhập số điện thoại" name="phone" value="<?php if (isset($_POST['phone'])) echo $_POST['phone'] ?>" />
                      </div>
                    </div>
                    <?php echo form_error('phone'); ?>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <label class="form-label" for="form3Example4cd">
                        <i class="fa fa-address-card-o" aria-hidden="true"></i>
                      </label>

                      <div class="form-outline flex-fill mb-0 contain-input">
                        <input type="text" id="form3Example4cd" class="form-control" placeholder="Vui lòng nhập địa chỉ" name="address" value="<?php if (isset($_POST['address'])) echo $_POST['address'] ?>" />
                      </div>
                    </div>
                    <?php echo form_error('address'); ?>
                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                      <button type="submit" style="background-color: #49491b" class="btn btn-primary btn-lg" name="register-btn" value="register-btn">
                        Đăng ký
                      </button>
                    </div>
                  </form>
                </div>
                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
                  <img src="public/img/user/draw1.webp" class="img-fluid" alt="Sample image" />
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php

  ?>
</div>

<?php
require "./inc/footer.php";

?>