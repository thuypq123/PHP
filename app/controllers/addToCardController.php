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
    if(isset($_POST['action'])){
        if ($_POST['action'] == "addCard") { addToCard($MaKhachHang,$MaHoaDon,$MaSanPham,$SoLuong); }
    }
    function addToCard($MaKhachHang,$MaHoaDon,$MaSanPham,$SoLuong){
        $addToCardModel = new addToCardModel();
        $addToCardModel->addToCard($MaKhachHang,$MaHoaDon,$MaSanPham,$SoLuong);
    }
?>