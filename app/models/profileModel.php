<?php
     if(!isset($_SESSION)){
        session_start();
    }
    require_once(dirname(__DIR__,2).'\config\db.php');
    class profileModel{
        function getProfile($MaKhachHang){
            $conn = Database::getInstance();
            $sql = "SELECT * FROM khachhang WHERE MaKhachHang = '$MaKhachHang'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            if ($row) {
                header('Content-Type: application/json; charset=utf-8');
                echo json_encode($row);
            } else {
                header('Content-Type: application/json; charset=utf-8');
                $data = array('data' => false, 'message' => 'Lấy thông tin thất bại');
                echo json_encode($data);
            }
        }
        function updateProfile($MaKhachHang, $Email, $SDT, $DiaChi, $HoTen){
            $conn = Database::getInstance();
            // query to update khachhang table
            $query = "UPDATE KhachHang SET Email='$Email', SDT='$SDT', DiaChi='$DiaChi', TenKhachHang='$HoTen' WHERE MaKhachHang=$MaKhachHang";
            $result = mysqli_query($conn, $query);
            if ($result) {
                header('Content-Type: application/json; charset=utf-8');
                $data = array('data' => true, 'message' => 'Cập nhật thông tin thành công');
                echo json_encode($data);
            } else {
                header('Content-Type: application/json; charset=utf-8');
                $data = array('data' => false, 'message' => 'Cập nhật thông tin thất bại');
                echo json_encode($data);
            }
        }
        
    }
?>