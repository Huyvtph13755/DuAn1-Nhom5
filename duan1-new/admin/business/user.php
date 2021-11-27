<?php
function user_index()
{
    $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : "";
    // lấy danh sách danh mục
    $sql = "SELECT * FROM user WHERE email like '%$keyword%'  ORDER BY role DESC";
    // $sql = "select * from product where name_product like '%$keyword%'";
    $user_index = exeQuery($sql, true);

    // hiển thị view
    admin_render('user/index.php', compact('user_index', 'keyword'), 'admin-assets/custom/category_index.js');
}
function update_user()
{
    if (isset($_GET['role'])) {
        $user_id = $_GET['user_id'];
        $sql = "SELECT * FROM user WHERE user_id= '$user_id' AND role = 1";
        $detail_user = exeQuery($sql, false);
        admin_render('user/update-user.php', compact('detail_user'), 'admin-assets/custom/category_index.js');
    } else {
        header('Location:cp-admin/user');
    }
}
function creat_user_admin()
{
    admin_render('user/creat-new-user-admin.php', [], 'admin-assets/custom/category_add.js');
}

function save_creat_user_admin()
{
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $contract_number = $_POST['contract_number'];
    $password = $_POST['password'];
    $repassword = $_POST['repassword'];
    $address = $_POST['address'];
    $errors = "";
    $sql1 = "SELECT * FROM user WHERE email = '$email'";
    $a = exeQuery($sql1, false);
    if (strcasecmp($a['email'], $email) == 0) {
        $errors .= "email-err=Tài khoản đã tồn tại&";
    }
    if (empty($email)) {
        $errors .= "email-err=Hãy nhập email&";
    } else {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors .= "email-err=Email không hợp lệ&";
        }
    }
    if (empty($fullname)) {
        $errors .= "fullname-err=Hãy nhập tên&";
    }
    if ($repassword != $password) {
        $errors .= "repassword-err=Mật khẩu không khớp&";
    }
    if (strlen($password) < 6) {
        $errors .= "password-err=Mật khẩu phải có ít nhất 6 kí tự&";
    }
    if (strlen($contract_number) < 10) {
        $errors .= "contract_number-err=Số điện thoại không hợp lệ&";
    }
    if (empty($address)) {
        $errors .= "address-err=Hãy nhập địa chỉ&";
    }
    $errors = rtrim($errors, '&');
    if (strlen($errors) > 0) {
        header("location: " . ADMIN_URL . 'user/creat-new-user-admin?' . $errors);
        die;
    }
    $pass = md5($_POST['password']);
    $sql10 = "INSERT INTO user (fullname, email, password, address, contract_number, role) values('$fullname', '$email', '$pass', '$address', $contract_number, 1)";
    exeQuery($sql10, false);
    header("location: " . ADMIN_URL . 'user?msg=Tạo mới thành công');
}

function save_update_user(){
    $user_id = $_POST["user_id"];
    $role = $_POST["role"];
    $fullname = $_POST["fullname"];
    $address = $_POST["address"];
    $sql11 = "UPDATE user SET fullname = '$fullname', address = '$address' WHERE user_id = '$user_id'";
    exeQuery($sql11);
    header("location: " . ADMIN_URL . 'user?msg=Cập nhật thành công');
}
function lock_user(){
    $user_id = $_GET['user_id'];
    $status = $_GET['status'];
    if($status == 1){
        $sql14 = "UPDATE user SET status = '0' WHERE user_id = '$user_id'";
        exeQuery($sql14);
        header("location:" . ADMIN_URL . 'user?msg=Cập nhật thành công');
    }elseif($status == 0){
        $sql15 = "UPDATE user SET status = '1' WHERE user_id = '$user_id'";
        exeQuery($sql15);
        header("location:" . ADMIN_URL . 'user?msg=Cập nhật thành công');
    }
}
