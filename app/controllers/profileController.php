<?php
    if(!isset($_SESSION)){
        session_start();
    }
    require(dirname(__DIR__,1).'\models\profileModel.php');
    if(isset($_POST['action'])){
        if ($_POST['action'] == "getProfile") { func1(); }
        elseif ($_POST['action'] == "updateProfile") { func2(); }
    }
    function func1(){
        $MaKhachHang = $_SESSION['MaKhachHang'];
        $profileModel = new profileModel();
        $profileModel->getProfile($MaKhachHang);
    }
    function func2(){
        $MaKhachHang = $_SESSION['MaKhachHang'];
        $Email = $_POST['Email'];
        $SDT = $_POST['SDT'];
        $DiaChi = $_POST['DiaChi'];
        $HoTen = $_POST['HoTen'];
        $profileModel = new profileModel();
        $profileModel->updateProfile($MaKhachHang, $Email, $SDT, $DiaChi, $HoTen);
    }
?>