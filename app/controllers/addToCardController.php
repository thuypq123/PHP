<?php
    session_start();
    if (!$_SESSION["isLogin"]){
        header('Location: /login');
    }
    $MaSanPham = $_POST['MaSanPham'];
    $MaHoaDon = $_POST['MaHoaDon'];
?>