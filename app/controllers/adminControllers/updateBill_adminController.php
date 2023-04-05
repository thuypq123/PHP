<?php
if (!isset($_SESSION)) {
    session_start();
}
if (!$_SESSION["isLoginAdmin"]) {
    header('Location: /login_admin');
}
require(dirname(__DIR__, 2) . '\models\adminModels\bill_adminModel.php');
if (isset($_POST['action'])) {
    if ($_POST['action'] == "update") {
        $MaHoaDon = $_POST['MaHoaDon'];
        $VanChuyen = $_POST['VanChuyen'];
        $ThanhToan = $_POST['ThanhToan'];
        $billModel = new BillModel();
        $result = $billModel->updateBill($MaHoaDon, $VanChuyen, $ThanhToan);
        if ($result) {
            header('Content-Type: application/json; charset=utf-8');
            $data = array('data' => true, 'message' => 'Cập nhật thành công');
            echo json_encode($data);
        } else {
            header('Content-Type: application/json; charset=utf-8');
            $data = array('data' => false, 'message' => 'Cập nhật thất bại');
            echo json_encode($data);
        }
        // echo $sanPhamModel;
        // header('Location: /product_admin');
    } 
}
?>