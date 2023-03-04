<?php
    require(dirname(__DIR__).'\models\SanPhamModel.php');
    class SanPhamController {
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
            require(dirname(__DIR__).'\views\home\SanPham.php');
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
    }
?>