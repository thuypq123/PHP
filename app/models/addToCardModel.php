<?php
    require_once(dirname(__DIR__,2).'\config\db.php');
    class addToCardModel{
        public function addToCard($MaKhachHang, $MaHoaDon, $MaSanPham, $SoLuong){
            $conn = Database::getInstance();
            $query = "SELECT * FROM sanpham WHERE MaSanPham = '$MaSanPham'";
            $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_array($result);
            if($row["SoLuongSanPham"] < $SoLuong){
                mysqli_close($conn);
                header('Content-Type: application/json; charset=utf-8');
                $data = array('data' => false, 'message' => 'Số lượng sản phẩm trong kho không đủ');
                echo json_encode($data);
                return false;
            }else{
                $query = "SELECT * FROM chitiethoadon WHERE MaHoaDon = '$MaHoaDon' AND MaSanPham = '$MaSanPham'";
                $result = mysqli_query($conn, $query);
                $row = mysqli_fetch_array($result);
                if($row == null){
                    $query = "INSERT INTO chitiethoadon (MaHoaDon, MaSanPham, SoLuong) VALUES ('$MaHoaDon', '$MaSanPham', '$SoLuong')";
                    $result = mysqli_query($conn, $query);
                    $query = "UPDATE sanpham SET SoLuongSanPham = SoLuongSanPham - $SoLuong WHERE MaSanPham = '$MaSanPham'";
                    $result = mysqli_query($conn, $query);
                    mysqli_close($conn);
                    header('Content-Type: application/json; charset=utf-8');
                    $data = array('data' => true, 'message' => 'Thêm san phẩm vào giỏ hàng thành công');
                    echo json_encode($data);
                }else{
                    // update SoLuong in chitiethoadon table 
                    $query = "UPDATE ChiTietHoaDon SET SoLuong = SoLuong + $SoLuong WHERE MaHoaDon = '$MaHoaDon' AND MaSanPham = '$MaSanPham'";
                    $result = mysqli_query($conn, $query);
                    // minus SoLuong in sanpham table
                    $query = "UPDATE sanpham SET SoLuongSanPham = SoLuongSanPham - $SoLuong WHERE MaSanPham = '$MaSanPham'";
                    $result = mysqli_query($conn, $query);
                    mysqli_close($conn);
                    header('Content-Type: application/json; charset=utf-8');
                    $data = array('data' => true, 'message' => 'Thêm sản phẩm vào giỏ hàng thành công');
                    echo json_encode($data);
                }
            }
        }
    }
?>