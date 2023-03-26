<?php
    session_start();
    require_once(dirname(__DIR__,2).'\config\db.php');
    class loginModel {
        public function login($email, $password) {
            $conn = Database::getInstance();
            $query = "SELECT * FROM khachhang WHERE Email = '$email' AND Password = '$password'"; 
            $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_array($result);
            if(!$row){
                header('Content-Type: application/json; charset=utf-8');
                $data = array('data' => false, 'message' => 'Sai tài khoản hoặc mật khẩu');
                echo json_encode($data);
                return false;
            } else {
                // echo "id: " . $row["MaKhachHang"]. " - Name: " . $row["TenKhachHang"]. " " . $row["Email"]. "<br>";
                $_SESSION["isLogin"] = true;
                $_SESSION["MaKhachHang"] = $row["MaKhachHang"];
                $_SESSION["TenKhachHang"] = $row["TenKhachHang"];
                $_SESSION["Email"] = $row["Email"];
                $_SESSION["SDT"] = $row["SDT"];
                header('Content-Type: application/json; charset=utf-8');
                // find and check the HoaDon    
                $query = "SELECT * FROM khachhang INNER JOIN hoadon 
                WHERE khachhang.MaKhachHang = hoadon.MaKhachHang 
                and khachhang.MaKhachHang = ".$row["MaKhachHang"].
                " and hoadon.ThanhToan = 0"; 
                $result = mysqli_query($conn, $query);
                $row = mysqli_fetch_array($result);
                if(!$row){
                    $query = "INSERT INTO hoadon (MaKhachHang, thanhtoan, SDT, NgayLap) VALUES ('".$_SESSION["MaKhachHang"]."', '0', ".$_SESSION["SDT"].", now())";
                    $result = mysqli_query($conn, $query);
                    $HoaDonrow = mysqli_fetch_array($result);
                    $_SESSION["MaHoaDon"] =  $HoaDonrow["MaHoaDon"];
                }else{
                    $_SESSION["MaHoaDon"] = $row["MaHoaDon"];
                }
                $data = array('data' => true, 'message' => 'Bạn có thể mua sắm');
                echo json_encode($data);    
            }
        }
    }
?>