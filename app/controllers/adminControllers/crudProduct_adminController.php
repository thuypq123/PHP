<?php
if (!isset($_SESSION)) {
    session_start();
}
if (!$_SESSION["isLoginAdmin"]) {
    header('Location: /login_admin');
}
require(dirname(__DIR__, 2) . '\models\adminModels\product_adminModel.php');
if (isset($_POST['action'])) {
    if ($_POST['action'] == "update") {
        $MaLoai = $_POST['MaLoai'];
        $MaSanPham = $_POST['MaSanPham'];
        $TenSanPham = $_POST['TenSanPham'];
        $GiaSanPham = $_POST['GiaSanPham'];
        $SoLuongSanPham = $_POST['SoLuongSanPham'];
        $AnhSanPham = $_POST['AnhSanPham'];
        $NgayCapNhat = $_POST['NgayCapNhat'];
        $ChiTiet = $_POST['ChiTiet'];
        $sanPhamModel = new SanPhamModel();
        $result = $sanPhamModel->updateProduct($MaLoai, $MaSanPham, $TenSanPham, $GiaSanPham, $SoLuongSanPham, $AnhSanPham, $NgayCapNhat, $ChiTiet);
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
        $MaSanPham = $_POST['MaSanPham'];
        $TenSanPham = $_POST['TenSanPham'];
        $GiaSanPham = $_POST['GiaSanPham'];
        $SoLuongSanPham = $_POST['SoLuongSanPham'];
        $AnhSanPham = $_POST['AnhSanPham'];
        $NgayNhap = $_POST['NgayNhap'];
        $NgayCapNhat = $_POST['NgayCapNhat'];
        $ChiTiet = $_POST['ChiTiet'];
        $sanPhamModel = new SanPhamModel();
        $check = $sanPhamModel->getSanPhamById($MaSanPham);
        if ($check) {
            header('Content-Type: application/json; charset=utf-8');
            $data = array('data' => false, 'message' => 'Mã sản phẩm đã tồn tại');
            echo json_encode($data);
            return;
        } else {
           
            $result = $sanPhamModel->createProduct($MaLoai, $MaSanPham, $TenSanPham, $GiaSanPham, $SoLuongSanPham, $AnhSanPham, $NgayNhap, $NgayCapNhat, $ChiTiet);
           
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
        $MaSanPham = $_POST['MaSanPham'];
        $sanPhamModel = new SanPhamModel();
        $result = $sanPhamModel->deleteProduct($MaSanPham);
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