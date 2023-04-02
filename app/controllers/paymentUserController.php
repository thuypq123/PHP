<?php
    session_start();
    if (!$_SESSION["isLogin"]){
        header('Location: /login');
    }
    require(dirname(__DIR__,2).'\app\models\paymentUserModel.php');
    if(isset($_POST['action'])){
        if ($_POST['action'] == "addPayMent") {
            $MaHoaDon = $_SESSION["MaHoaDon"];
            $MaKhachHang = $_SESSION["MaKhachHang"];
            $SDT = $_POST["SDT"];
            $DiaChi = $_POST["DiaChi"];
            $paymentUserModel = new paymentUserModel();
            $paymentUserModel->addPayment($MaKhachHang, $SDT, $DiaChi);
        }else if ($_POST['action'] == "getPaymentList") {
            $paymentUserModel = new paymentUserModel();
            $MaKhachHang = $_SESSION["MaKhachHang"];
            $paymentUserModel->getPaymentList($MaKhachHang);
        }
    }
?>