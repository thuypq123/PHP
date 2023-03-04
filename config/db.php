<?php
class Database {
    private static $instance = null;
    private $conn;

    private $host = 'localhost';
    private $db_name = 'phone_shop';
    private $username = 'root';
    private $password = '';

    // Phương thức khởi tạo private để ngăn chặn việc tạo đối tượng từ bên ngoài
    private function __construct() {
        $this->conn = mysqli_connect($this->host, $this->username, $this->password, $this->db_name);

        if (!$this->conn) {
            die('Connection error: ' . mysqli_connect_error());
        }
    }

    // Phương thức static để trả về đối tượng kết nối
    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new Database();
        }

        return self::$instance->conn;
    }
}

?>
