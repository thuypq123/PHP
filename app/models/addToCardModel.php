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
                    // find and caculate total price of product with quantity
                    $query = "SELECT * FROM sanpham WHERE MaSanPham = '$MaSanPham'";
                    $result = mysqli_query($conn, $query);
                    $row = mysqli_fetch_array($result);
                    $GiaSanPham = $row["GiaSanPham"];
                    $ThanhTien = $GiaSanPham * $SoLuong;
                    $query = "INSERT INTO chitiethoadon (MaHoaDon, MaSanPham, SoLuong, TongTien) VALUES ('$MaHoaDon', '$MaSanPham', '$SoLuong', '$ThanhTien')";
                    $result = mysqli_query($conn, $query);
                    // $query = "UPDATE sanpham SET SoLuongSanPham = SoLuongSanPham - $SoLuong WHERE MaSanPham = '$MaSanPham'";
                    // $result = mysqli_query($conn, $query);
                    mysqli_close($conn);
                    header('Content-Type: application/json; charset=utf-8');
                    $data = array('data' => true, 'message' => 'Thêm san phẩm vào giỏ hàng thành công');
                    echo json_encode($data);
                }else{
                    // update SoLuong in chitiethoadon table 
                    $query = "UPDATE ChiTietHoaDon SET SoLuong = SoLuong + $SoLuong WHERE MaHoaDon = '$MaHoaDon' AND MaSanPham = '$MaSanPham'";
                    $result = mysqli_query($conn, $query);
                    // find and update total price of product with quantity
                    $query = "SELECT * FROM sanpham WHERE MaSanPham = '$MaSanPham'";
                    $result = mysqli_query($conn, $query);
                    $row = mysqli_fetch_array($result);
                    $GiaSanPham = $row["GiaSanPham"];
                    // find so luong in chitiethoadon table
                    $query = "SELECT * FROM chiTietHoaDon WHERE MaHoaDon = '$MaHoaDon' AND MaSanPham = '$MaSanPham'";
                    $result = mysqli_query($conn, $query); 
                    $row = mysqli_fetch_array($result);
                    $ThanhTien = $GiaSanPham * $row["SoLuong"];
                    $query = "UPDATE ChiTietHoaDon SET TongTien = $ThanhTien WHERE MaHoaDon = '$MaHoaDon' AND MaSanPham = '$MaSanPham'";
                    $result = mysqli_query($conn, $query);
                    // minus SoLuong in sanpham table
                    // $query = "UPDATE sanpham SET SoLuongSanPham = SoLuongSanPham - $SoLuong WHERE MaSanPham = '$MaSanPham'";
                    // $result = mysqli_query($conn, $query);
                    mysqli_close($conn);
                    header('Content-Type: application/json; charset=utf-8');
                    $data = array('data' => true, 'message' => 'Thêm sản phẩm vào giỏ hàng thành công');
                    echo json_encode($data);
                }
            }
        }
        public function getListSanPhamInCard($MaHoaDon){
            $conn = Database::getInstance();
            $query = "SELECT * FROM chitiethoadon WHERE MaHoaDon = '$MaHoaDon'";
            $result = mysqli_query($conn, $query);
            $listSanPham = array();
            while($row = mysqli_fetch_array($result)){
                $listSanPham[] = $row;
            }
            // get all product in chitiethoadon table
            for($i = 0; $i < count($listSanPham); $i++){
                $MaSanPham = $listSanPham[$i]["MaSanPham"];
                $query = "SELECT * FROM sanpham WHERE MaSanPham = '$MaSanPham'";
                $result = mysqli_query($conn, $query);
                $row = mysqli_fetch_array($result);
                $listSanPham[$i]["TenSanPham"] = $row["TenSanPham"];
                $listSanPham[$i]["GiaSanPham"] = $row["GiaSanPham"];
                $listSanPham[$i]["AnhSanPham"] = $row["AnhSanPham"];
            }
            mysqli_close($conn);
            return $listSanPham;
        }
        public function updateCardModel($MaHoaDon,$MaSanPham,$SoLuong){
            $conn = Database::getInstance();
            if ($SoLuong == 0){
                // delete product in chitiethoadon table
                $query = "DELETE FROM chitiethoadon WHERE MaHoaDon = '$MaHoaDon' AND MaSanPham = '$MaSanPham'";
                $result = mysqli_query($conn, $query);
                mysqli_close($conn);
                header('Content-Type: application/json; charset=utf-8');
                $data = array('data' => true, 'message' => 'Xóa sản phẩm khỏi giỏ hàng thành công');
            }
        }
    }
?>