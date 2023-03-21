<?php
    require_once(dirname(__DIR__,2).'\config\db.php');
    class registerModel {
        public function register($fullname, $password, $email, $sdt) {
            $conn = Database::getInstance();
            $query = "SELECT * FROM khachhang WHERE Email = '$email' OR SDT = '$sdt'";
            $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_assoc($result);
            if ($row) {
                // if user exists
                if ($row['Email'] === $email) {
                    header('Content-Type: application/json; charset=utf-8');
                    $data = array('data' => false, 'message' => 'Email đã tồn tại');
                    echo json_encode($data);
                    return false;
                }
                if ($row['SDT'] === $sdt) {
                    header('Content-Type: application/json; charset=utf-8');
                    $data = array('data' => false, 'message' => 'Số điện thoại đã tồn tại');
                    echo json_encode($data);
                    return false;
                }
            } else {
                // if user does not exist
                $query = "INSERT INTO khachhang (TenKhachHang, Password, Email, SDT) VALUES ('$fullname', '$password', '$email', '$sdt')";
                $result = mysqli_query($conn, $query);
                if ($result) {
                    header('Content-Type: application/json; charset=utf-8');
                    $data = array('data' => true, 'message' => 'Đăng ký thành công');
                    echo json_encode($data);
                } else {
                    echo "Đăng ký thất bại";
                }
            }
        }  
    }
?>