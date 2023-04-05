<?php
require_once(dirname(__DIR__, 3) . '\config\db.php');
class BillModel
{
    public function getAllBill()
    {
        $conn = Database::getInstance();
        $query = "SELECT * FROM hoadon WHERE TinhTrang = 1";
        $result = mysqli_query($conn, $query);
        return $result; 
    }
    public function getBillById($id)
    {
        $conn = Database::getInstance();
        $query = "SELECT * FROM hoadon WHERE MaHoaDon = '$id'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
        return $row;
    }
    public function getDetailBillById($id)
    {
        $conn = Database::getInstance();
        $query = "SELECT * FROM chitiethoadon WHERE MaHoaDon = '$id'";
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