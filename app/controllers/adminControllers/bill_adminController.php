<?php
    if (!isset($_SESSION)){
        session_start();
    }
        if (!$_SESSION["isLoginAdmin"]){
        header('Location: /login_admin');
    }
    // echo '<pre>' . print_r($_SESSION, TRUE) . '</pre>';
    require(dirname(__DIR__, 2).'\models\adminModels\bill_adminModel.php');
    class BillController {
        public function getAllBill() {
            $BillModel = new BillModel();
            $allBill = $BillModel->getAllBill();
            if (mysqli_num_rows($allBill) > 0) {
                // Tạo một mảng để chứa dữ liệu đó
                $bill = array();
                // Duyệt qua các bản ghi trong kết quả truy vấn và thêm chúng vào mảng dữ liệu
                while ($row = mysqli_fetch_assoc($allBill)) {
                    $bill[] = $row;
                }
            }
            require(dirname(__DIR__, 2).'\views\adminViews\billAdmin\bill_admin.php');
        }
        public function getBillById($id) {
            $BillModel = new BillModel();
            $bill = $BillModel->getBillById($id);
            return $bill;
        }    
        public function getDetailBillById($id) {
            $DetailBillModel = new BillModel();
            $detailbill = $DetailBillModel->getDetailBillById($id);
            return $detailbill;
        }    
        public function getLoaiSanPham() {
            $loaisanPhamModel = new SanPhamModel();
            $loaiSanPham = $loaisanPhamModel->getLoaiSanPham();
            if (mysqli_num_rows($loaiSanPham) > 0) {
                // Tạo một mảng để chứa dữ liệu đó
                $maloai = array();
                // Duyệt qua các bản ghi trong kết quả truy vấn và thêm chúng vào mảng dữ liệu
                while ($row = mysqli_fetch_assoc($loaiSanPham)) {
                    $maloai[] = $row;
                }
            }
            return $maloai;
        }
    }
?>