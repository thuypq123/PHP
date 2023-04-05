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
    public function updateBill($MaHoaDon, $VanChuyen, $ThanhToan)
    {      
        $conn = Database::getInstance();
        $sql = "UPDATE hoadon SET VanChuyen='$VanChuyen', ThanhToan='$ThanhToan' WHERE MaHoaDon='$MaHoaDon'";
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