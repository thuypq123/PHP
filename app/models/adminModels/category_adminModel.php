<?php
require_once(dirname(__DIR__, 3) . '\config\db.php');
class LoaiSanPhamModel
{
    public function getAllLoaiSanpham()
    {
        $conn = Database::getInstance();
        $query = "SELECT * FROM loaisanpham";
        $result = mysqli_query($conn, $query);
        return $result; 
    }
    public function getLoaiSanPhamById($id)
    {
        $conn = Database::getInstance();
        $query = "SELECT * FROM loaisanpham WHERE MaLoai = '$id'";
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
    public function updateCategory($MaLoai, $TenLoai)
    {
        $conn = Database::getInstance();
        $sql = "UPDATE loaisanpham SET TenLoai='$TenLoai' WHERE MaLoai='$MaLoai'";
        $result = mysqli_query($conn, $sql);
        //close connection
        mysqli_close($conn);
        if ($result) {
            
            return true;
        }
        return false;
    }
    public function createCategory($MaLoai, $TenLoai)
    {
        $conn = Database::getInstance();
        $sql = "INSERT INTO loaisanpham (MaLoai, TenLoai) VALUES ('$MaLoai', '$TenLoai')";
        $result = mysqli_query($conn, $sql);
        //close connection
        mysqli_close($conn);
        if ($result) {     
            return true;
        }
        return false;
    }

    public function deleteCategory($MaLoai)
    {
        $conn = Database::getInstance();
        $sql = "DELETE FROM loaisanpham WHERE MaLoai = '$MaLoai'";
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