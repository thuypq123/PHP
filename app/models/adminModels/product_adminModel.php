<?php
    require_once(dirname(__DIR__,3).'\config\db.php');
    class SanPhamModel {
        public function getAllSanPham() {
            $conn = Database::getInstance();
            $query = "SELECT * FROM sanpham"; 
            $result = mysqli_query($conn, $query);
            return $result;
        }
        public function getSanPhamById($id) {
            $conn = Database::getInstance();
            $query = "SELECT * FROM sanpham WHERE MaSanPham = '$id'"; 
            $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_assoc($result);
            return $row;
        }
        public function getLimitSanPham($limit) {
            $conn = Database::getInstance();
            $query = "SELECT * FROM sanpham LIMIT $limit"; 
            $result = mysqli_query($conn, $query);
            mysqli_close($conn);
            return $result;
        }
    }
?>

