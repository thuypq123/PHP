<?php
    session_start();
    require_once(dirname(__DIR__,3).'\config\db.php');
    class login_adminModel {
        public function login($tk, $mk) {
            $conn = Database::getInstance();
            $query = "SELECT * FROM admin WHERE TK = '$tk' AND MK = '$mk'"; 
            $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_array($result);
            if(!$row){
                header('Content-Type: application/json; charset=utf-8');
                $data = array('data' => false, 'message' => 'Sai tài khoản hoặc mật khẩu');
                echo json_encode($data);
                return false;
            } else {             
                $_SESSION["isLoginAdmin"] = true;
                $_SESSION["TK"] = $row["TK"];     
                header('Content-Type: application/json; charset=utf-8');     
                $data = array('data' => true, 'message' => 'Đăng nhập thành công ');
                echo json_encode($data);    
            }
        }
    }
?>