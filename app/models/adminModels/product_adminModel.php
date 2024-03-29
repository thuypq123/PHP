<?php
require_once(dirname(__DIR__, 3) . '\config\db.php');
class SanPhamModel
{
    public function getAllSanPham()
    {
        $conn = Database::getInstance();
        $query = "SELECT * FROM sanpham";
        $result = mysqli_query($conn, $query);
        return $result;
    }
    public function getSanPhamById($id)
    {
        $conn = Database::getInstance();
        $query = "SELECT * FROM sanpham WHERE MaSanPham = '$id'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
        return $row;
    }
    public function getLoaiSanPham()
    {
        $conn = Database::getInstance();
        $query = "SELECT * FROM loaisanpham";
        $result = mysqli_query($conn, $query);
        return $result;
    }
    public function updateProduct($MaLoai, $MaSanPham, $TenSanPham, $GiaSanPham, $SoLuongSanPham, $AnhSanPham, $NgayCapNhat, $ChiTiet)
    {
        $conn = Database::getInstance();
        $sql = "UPDATE sanpham SET MaLoai='$MaLoai', TenSanPham='$TenSanPham', GiaSanPham='$GiaSanPham', SoLuongSanPham='$SoLuongSanPham', AnhSanPham='$AnhSanPham', NgayCapNhat='$NgayCapNhat', ChiTiet='$ChiTiet' WHERE MaSanPham='$MaSanPham'";
        $result = mysqli_query($conn, $sql);
        //close connection
        mysqli_close($conn);
        if ($result) {
            
            return true;
        }
        return false;
    }
    public function createProduct($MaLoai, $MaSanPham, $TenSanPham, $GiaSanPham, $SoLuongSanPham, $AnhSanPham, $NgayNhap, $NgayCapNhat, $ChiTiet)
    {
        $conn = Database::getInstance();
        $sql = "INSERT INTO sanpham (MaLoai, MaSanPham, TenSanPham, GiaSanPham, SoLuongSanPham, AnhSanPham, NgayNhap, NgayCapNhat, ChiTiet) VALUES ('$MaLoai', '$MaSanPham', '$TenSanPham', '$GiaSanPham', '$SoLuongSanPham', '$AnhSanPham', '$NgayNhap', '$NgayCapNhat', '$ChiTiet')";
        $result = mysqli_query($conn, $sql);
        //close connection
        mysqli_close($conn);
        if ($result) {     
            return true;
        }
        return false;
    }

    public function deleteProduct($MaSanPham)
    {
        $conn = Database::getInstance();
        $sql = "DELETE FROM sanpham WHERE MaSanPham = '$MaSanPham'";
        $result = mysqli_query($conn, $sql);
        //close connection
        mysqli_close($conn);
        if ($result) {
            return true;
        }
        return false;
    }
}
?>