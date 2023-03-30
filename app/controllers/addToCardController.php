<?php
    require(dirname(__FILE__,2).'\models\addToCardModel.php');
    session_start();
    if (!$_SESSION["isLogin"]){
        header('Location: /login');
    }
    $MaKhachHang = $_SESSION["MaKhachHang"];
    if(isset($_POST['action'])){
        if ($_POST['action'] == "addCard") {
            $MaSanPham = $_POST['MaSanPham'];
            $MaHoaDon = $_POST['MaHoaDon'];
            $SoLuong = $_POST['SoLuong'];
            addToCard($MaKhachHang,$MaHoaDon,$MaSanPham,$SoLuong); 
        }elseif ($_POST['action'] == "getCard") {
            $MaHoaDon = $_SESSION['MaHoaDon'];
            getListSanPhamInCard($MaHoaDon);
        }elseif ($_POST['action'] == "updateCard") {
            $MaSanPham = $_POST['MaSanPham'];
            $MaHoaDon = $_POST['MaHoaDon'];
            $SoLuong = $_POST['SoLuong'];
            updateCardModel($MaHoaDon,$MaSanPham,$SoLuong);
        }
    }
    function addToCard($MaKhachHang,$MaHoaDon,$MaSanPham,$SoLuong){
        $addToCardModel = new addToCardModel();
        $addToCardModel->addToCard($MaKhachHang,$MaHoaDon,$MaSanPham,$SoLuong);
    }
    function getListSanPhamInCard($MaHoaDon){
        $addToCardModel = new addToCardModel();
        $listCard = $addToCardModel->getListSanPhamInCard($MaHoaDon);
        echo json_encode($listCard);
    }
    function updateCardModel($MaHoaDon,$MaSanPham,$SoLuong){
        $addToCardModel = new addToCardModel();
        $addToCardModel->updateCardModel($MaHoaDon,$MaSanPham,$SoLuong);
    }
?>