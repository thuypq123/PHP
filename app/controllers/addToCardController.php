<?php
    require(dirname(__FILE__,2).'\models\addToCardModel.php');
    session_start();
    if (!$_SESSION["isLogin"]){
        header('Location: /login');
    }
    $MaSanPham = $_POST['MaSanPham'];
    $MaHoaDon = $_POST['MaHoaDon'];
    $SoLuong = $_POST['SoLuong'];
    $MaKhachHang = $_SESSION["MaKhachHang"];
    $addToCardModel = new addToCardModel();
    $addToCardModel->addToCard($MaKhachHang,$MaHoaDon,$MaSanPham,$SoLuong);
?>