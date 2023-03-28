<?php
    require(dirname(__DIR__,3).'\config\db.php');
    class register_adminModel {
        public function register($tk, $mk) {

            $conn = Database::getInstance();
            $query = "SELECT * FROM admin WHERE TK = '$tk'";
            $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_assoc($result);
            if ($row) {
                // if user exists
                if ($row['TK'] === $tk) {
                    header('Content-Type: application/json; charset=utf-8');
                    $data = array('data' => false, 'message' => 'Tài khoản đã tồn tại');
                    echo json_encode($data);
                    return false;
                }              
            } else {
                // if user does not exist
                $query = "INSERT INTO admin (TK, MK) VALUES ('$tk', '$mk')";
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