<?php
session_start();
include "Model/pdo.php";
include "Model/cart.php";
include "Model/product.php";
include "Model/color.php";
include "Model/user.php";
include "Model/warranty.php";
include "Model/comment.php";
include "View/header.php";
if ((isset($_GET['act'])) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {
        case 'product_detail':
            $load_one = product_detail(1);
            $getMinPr = getMinPrice(1);
            $f_cl = full_color(1);
            $wa = full_warranty();
            include 'View/product_detail.php';
            break;
        case 'cart':
            include 'View/cart.php';
            break;
        case 'register':
            include 'View/register.php';
            break;
        case 'user_profile':
            include 'View/user_profile.php';
            break;
        case 'login':
            if(isset($_POST['login'])&&($_POST['login'])){
                $email=$_POST['email'];
                $password=$_POST['password'];
                $checkuser=checkuser($email, $password);
                if(is_array($checkuser)){
                    $_SESSION['email']=$checkuser;
                    $thongbao="Bạn đã đăng nhập thành công!";
                    header('Location: index.php');
                }else{
                    $thongbao="Tài khoản không tồn tại. Vui lòng kiểm tra lại hoặc đăng ký!";
                } 
            }
            include 'View/login.php';
            break;
        default:
            include 'View/home.php';
            break;
    }
} else {
    include 'View/home.php';
}
include 'View/footer.php';
