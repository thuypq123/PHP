<?php
if (!isset($_SESSION)) {
    session_start();
}
if (!$_SESSION["isLoginAdmin"]) {
    header('Location: /login_admin');
}
require(dirname(__DIR__, 2) . '\models\adminModels\category_adminModel.php');
if (isset($_POST['action'])) {
    if ($_POST['action'] == "update") {
        $MaLoai = $_POST['MaLoai'];
        $TenLoai = $_POST['TenLoai'];
        $loaisanPhamModel = new LoaiSanPhamModel();
        $result = $loaisanPhamModel->updateCategory($MaLoai, $TenLoai);
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
    } else if ($_POST['action'] == "create") {
        $MaLoai = $_POST['MaLoai'];
        $TenLoai = $_POST['TenLoai'];
        $loaisanPhamModel = new LoaiSanPhamModel();
        $check = $loaisanPhamModel->getLoaiSanPhamById($MaLoai);
        if ($check) {
            header('Content-Type: application/json; charset=utf-8');
            $data = array('data' => false, 'message' => 'Mã loại sản phẩm đã tồn tại');
            echo json_encode($data);
            return;
        } else {
           
            $result = $loaisanPhamModel->createCategory($MaLoai, $TenLoai);
           
            if ($result) {
                
                header('Content-Type: application/json; charset=utf-8');
                $data = array('data' => true, 'message' => 'Thêm thành công');
                echo json_encode($data);
            } else {
                
                header('Content-Type: application/json; charset=utf-8');
                $data = array('data' => false, 'message' => 'Thêm thất bại');
                echo json_encode($data);
            }
        }

    }else if($_POST['action'] == "delete"){
        $MaLoai = $_POST['MaLoai'];
        $LoaiSanPhamModel = new LoaiSanPhamModel();
        $result = $LoaiSanPhamModel->deleteCategory($MaLoai);
        if ($result) {
            header('Content-Type: application/json; charset=utf-8');
            $data = array('data' => true, 'message' => 'Xóa thành công');
            echo json_encode($data);
        } else {
            header('Content-Type: application/json; charset=utf-8');
            $data = array('data' => false, 'message' => 'Xóa thất bại');
            echo json_encode($data);
        }
    }
}
?>