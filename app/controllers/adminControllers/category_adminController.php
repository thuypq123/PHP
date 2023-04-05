<?php
    if (!isset($_SESSION)){
        session_start();
    }
        if (!$_SESSION["isLoginAdmin"]){
        header('Location: /login_admin');
    }
    // echo '<pre>' . print_r($_SESSION, TRUE) . '</pre>';
    require(dirname(__DIR__, 2).'\models\adminModels\category_adminModel.php');
    class CategoryController {
        public function getAllLoaiSanpham() {
            $LoaiSanPhamModel = new LoaiSanPhamModel();
            $allLoaiSanPham = $LoaiSanPhamModel->getAllLoaiSanpham();
            if (mysqli_num_rows($allLoaiSanPham) > 0) {
                // Tạo một mảng để chứa dữ liệu đó
                $LoaiSanPham = array();
                // Duyệt qua các bản ghi trong kết quả truy vấn và thêm chúng vào mảng dữ liệu
                while ($row = mysqli_fetch_assoc($allLoaiSanPham)) {
                    $LoaiSanPham[] = $row;
                }
            }
            require(dirname(__DIR__, 2).'\views\adminViews\categoryAdmin\category_admin.php');
        }
        public function getLoaiSanPhamById($id) {
            $LoaiSanPhamModel = new LoaiSanPhamModel();
            $LoaiSanPham = $LoaiSanPhamModel->getLoaiSanPhamById($id);
            return $LoaiSanPham;
        }    
        public function getLoaiSanPham() {
            $loaisanPhamModel = new SanPhamModel();
            $loaiSanPham = $loaisanPhamModel->getLoaiSanPham();
            if (mysqli_num_rows($loaiSanPham) > 0) {
                // Tạo một mảng để chứa dữ liệu đó
                $maloai = array();
                // Duyệt qua các bản ghi trong kết quả truy vấn và thêm chúng vào mảng dữ liệu
                while ($row = mysqli_fetch_assoc($loaiSanPham)) {
                    $maloai[] = $row;
                }
            }
            return $maloai;
        }
    }
?>