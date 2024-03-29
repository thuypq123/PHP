<?php
    if (!isset($_SESSION)){
        session_start();
    }
        if (!$_SESSION["isLoginAdmin"]){
        header('Location: /login_admin');
    }
    // echo '<pre>' . print_r($_SESSION, TRUE) . '</pre>';
    require(dirname(__DIR__, 2).'\models\adminModels\product_adminModel.php');
    class ProductController {
        public function getAllSanPham() {
            $sanPhamModel = new SanPhamModel();
            $allSanPham = $sanPhamModel->getAllSanPham();
            if (mysqli_num_rows($allSanPham) > 0) {
                // Tạo một mảng để chứa dữ liệu đó
                $SanPham = array();
                // Duyệt qua các bản ghi trong kết quả truy vấn và thêm chúng vào mảng dữ liệu
                while ($row = mysqli_fetch_assoc($allSanPham)) {
                    $SanPham[] = $row;
                }
            }
            require(dirname(__DIR__, 2).'\views\adminViews\productAdmin\product_admin.php');
        }
        public function getSanPhamById($id) {
            $sanPhamModel = new SanPhamModel();
            $SanPham = $sanPhamModel->getSanPhamById($id);
            return $SanPham;
        }
        public function getLimitSanPham($limit) {
            $sanPhamModel = new SanPhamModel();
            $allSanPham = $sanPhamModel->getLimitSanPham($limit);
            if (mysqli_num_rows($allSanPham) > 0) {
                // Tạo một mảng để chứa dữ liệu đó
                $SanPham = array();
            
                // Duyệt qua các bản ghi trong kết quả truy vấn và thêm chúng vào mảng dữ liệu
                while ($row = mysqli_fetch_assoc($allSanPham)) {
                    $SanPham[] = $row;
                }
            }
            return $SanPham;
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