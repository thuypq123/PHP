<?php
     if(!isset($_SESSION)){
        session_start();
    }
    require_once(dirname(__DIR__,2).'\config\db.php');
    class paymentUserModel{
        public function addPayment($MaKhachHang, $SDT, $DiaChi){
            $conn = Database::getInstance();
            // find MaHoaDon by MaKhachHang and ThanhToan = 0
            $query = "SELECT MaHoaDon FROM hoadon WHERE MaKhachHang = '$MaKhachHang' AND ThanhToan = 0";
            $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_assoc($result);
            // sum chitetHoaDon by MaHoaDon
            $query = "select sum(TongTien) as TongTien from chitiethoadon where MaHoaDon = '$row[MaHoaDon]'";
            $result = mysqli_query($conn, $query);
            $rowCTHD = mysqli_fetch_assoc($result);
            $TongTien = $rowCTHD["TongTien"];
            // update HoaDon with SDT, DiaChi 
            $query = "UPDATE HoaDon SET SDT = '$SDT', DiaChi = '$DiaChi', TongTien = '$TongTien' WHERE MaKhachHang = '$MaKhachHang' AND ThanhToan = 0";
            $result = mysqli_query($conn, $query);
            // update HoaDon with ThanhToan = 1
            $query = "UPDATE HoaDon SET ThanhToan = 1 WHERE MaKhachHang = '$MaKhachHang' AND ThanhToan = 0";
            $result = mysqli_query($conn, $query);
            // create new HoaDon with ThanhToan = 0 by MaKhachHang
            $query = "INSERT INTO HoaDon(MaKhachHang, ThanhToan) VALUES ('$MaKhachHang', 0)";
            $result = mysqli_query($conn, $query);
            // set session by MaHoaDon
            $query = "SELECT MaHoaDon FROM hoadon WHERE MaKhachHang = '$MaKhachHang' AND ThanhToan = 0";
            $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_assoc($result);
            $_SESSION["MaHoaDon"] = $row["MaHoaDon"];
            header('Content-Type: application/json; charset=utf-8');
            $data = array('data' => true, 'message' => 'Đăng ký thành công');
            echo json_encode($data);
        }
        public function getPaymentList($MaKhachHang){
            $conn = Database::getInstance();
            $query = "SELECT * FROM hoadon WHERE MaKhachHang = '$MaKhachHang' AND ThanhToan = 1";
            $result = mysqli_query($conn, $query);
            $data = array();
            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
            }
            for($i = 0; $i < count($data); $i++) {
                $query = "SELECT * FROM chitiethoadon WHERE MaHoaDon = ".$data[$i]["MaHoaDon"]."";
                $resultCTHD = mysqli_query($conn, $query);
                $row = mysqli_fetch_all($resultCTHD, MYSQLI_ASSOC);
                for($j = 0; $j < count($row); $j++) {
                    $query = "SELECT * FROM sanpham WHERE MaSanPham = '".$row[$j]["MaSanPham"]."'";
                    $resultSP = mysqli_query($conn, $query);
                    $rowSP = mysqli_fetch_assoc($resultSP);
                    $row[$j]["TenSanPham"] = $rowSP["TenSanPham"];
                    $row[$j]["AnhSanPham"] = $rowSP["AnhSanPham"];
                }
            } 
        }
    }
?>