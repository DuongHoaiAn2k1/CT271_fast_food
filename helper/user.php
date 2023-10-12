<?php

?>

<?php

function is_username($username)
{
    $pattern = "/^[A-Za-z0-9_\.]{6,32}$/";
    if (!preg_match($pattern, $username, $matchs))
        return false;
    return true;
}
function is_password($password)
{
    $pattern = "/^(?=.*[A-Za-z]).{6,20}$/";
    if (!preg_match($pattern, $password, $matchs))
        return false;
    return true;
}
function form_error($label_field)
{
    global $error;
    if (!empty($error[$label_field]))
        return "<p class='error'>{$error[$label_field]}!</p>";
}


function is_email($email)
{
    $partten = "/^[A-Za-z0-9_.]{6,32}@([a-zA-Z0-9]{2,12})(.[a-zA-Z]{2,12})+$/";
    if (!preg_match($partten, $email, $matchs))
        return false;
    return true;
}


function register()
{
    global $error, $password, $email, $fullname;
    if (isset($_POST['register-btn'])) {
        $error = array();
        if (empty($_POST['full_name'])) {
            $error['full_name'] = "Không được để trống họ tên";
        } else {
            $fullname = $_POST['full_name'];
        }

        if (empty($_POST['email'])) {
            $error['email'] = "Không được để trống email";
        } else {
            if (!is_email($_POST['email'])) {
                $error['email'] = "Email không đúng định dạng";
            } else {
                $email = $_POST['email'];
            }
        }
        if (empty($_POST['password'])) {
            $error['password'] = "Không được để trống mật khẩu";
        } else {
            if (!is_password($_POST['password'])) {
                $error['password'] = "Mật khẩu không đúng định dạng";
            } else {
                $password = md5($_POST['password']);
            }
        }

        if (empty($_POST['confirm_password'])) {
            $error['confirm_password'] = "Mật khẩu nhập lại không được để trống";
        } else {
            if ($_POST['confirm_password'] != $_POST['password']) {
                $error['confirm_password'] = "Mật khẩu nhập lại không khớp";
            } else {
            }
        }

        if (empty($_POST['phone'])) {
            $error['phone'] = "Không được để trống số điện thoại";
        } else {
            $phone = $_POST['phone'];
        }

        if (empty($_POST['address'])) {
            $error['address'] = "Không được để trống địa chỉ";
        } else {
            $address = $_POST['address'];
        }

        if (empty($error)) {
            if (!user_exists($email)) {
                $data = array(
                    'name' => $fullname,
                    'email' => $email,
                    'pass' => $password,
                    'phone' => $phone,
                    'address' => $address,
                    'time' => date("y/m/d h:m:s"),
                );

                add_user($data);
                echo '<script>alert("Đăng ký thành công!");setTimeout(function(){window.location.href="?mod=user&act=login";}, 1000);</script>';
                // echo "<script>alert('Đăng ký thành công')</script>";
                // sleep(3);
                // redirect("?mod=users&action=login");
            } else {
                $error['account'] = "Email hoặc username đã tồn tại trên hệ thống";
            }
        } else {
            // show_array($error);
        }
    }
}

function login()
{
    global $error, $email, $password;
    if (isset($_POST['login-btn'])) {
        $error = array();
        if (empty($_POST['email'])) {
            $error['email'] = "Không được để trống tên đăng nhập";
        } else {
            $email = $_POST['email'];
        }

        if (empty($_POST['password'])) {
            $error['password'] = "Không được để trống mật khẩu";
        } else {
            if (!is_password($_POST['password'])) {
                $error['password'] = "Mật phải bắt đầu bằng ký tự in hoa và >=5 ký tự";
            } else {
                $password = md5($_POST['password']);
            }
        }
        if (empty($error)) {
            if (check_login($email, $password)) {
                $_SESSION['is_login'] = true;
                $_SESSION['user_login'] = $email;
                $_SESSION['user_id'] = get_id_user($email);
                echo '<script>alert("Đăng nhập thành công");setTimeout(function(){window.location.href="?";}, 500);</script>';
            } else {
                $error['account'] = "Tên đăng nhập hoặc mật khẩu không tồn tại";
            }
        }
    }
}

function logOut()
{
    unset($_SESSION['is_login']);
    unset($_SESSION['user_login']);
    unset($_SESSION['user_id']);
    redirect("?mod=user&act=login");
}
