<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
    session_start();
    $GetURL =  parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    if ($GetURL == '/' || $GetURL == '/index.php') {
        // Nếu yêu cầu là trang chủ, gọi đến HomeController
        require(dirname(__FILE__).'\app\controllers\SanPhamController.php');
        $sanPhamController = new SanPhamController();
        $sanPhamController->getAllSanPham();
    }elseif ($GetURL == '/detail') {
        // Nếu yêu cầu là trang chi tiết, gọi đến DetailController
        require(dirname(__FILE__).'\app\controllers\SanPhamController.php');
        $sanPhamController = new SanPhamController();
        $sanpham = $sanPhamController->getSanPhamById($_GET['id']);
        $limitSanPham = $sanPhamController->getLimitSanPham(4);
        require('./app/views/detail.php');
    }elseif($GetURL == '/register') {
        require('./app/views/register.php');
    }
    elseif($GetURL == '/login') {
        require('./app/views/login.php');
    }
    elseif( $GetURL == '/clear-session'){
        $_SESSION["isLogin"] = false;
        header('Location: /login');
        exit();
    }elseif( $GetURL == '/shopping'){
        require('./app/views/shoppingCrad.php');
    }
    elseif( $GetURL == '/admin'){
        if(!$_SESSION["isLoginAdmin"])
        {
            header('Location: /login_admin');
            exit();
        }
        require('./app/views/adminViews/admin.php');
    }elseif($GetURL == '/login_admin'){
        require('./app/views/adminViews/login_admin.php');
    }elseif( $GetURL == '/logout'){
        $_SESSION["isLoginAdmin"] = false;
        header('Location: /login_admin');
        exit();
    }elseif ($GetURL == '/product_admin') {
        // Nếu yêu cầu là trang chủ, gọi đến HomeController
        require(dirname(__FILE__).'\app\controllers\adminControllers\product_adminController.php');
        $ProductAdminController = new ProductController();
        $ProductAdminController->getAllSanPham();
    }elseif ($GetURL == '/product_admin/update') {
        require(dirname(__FILE__).'\app\controllers\adminControllers\product_adminController.php');
        $ProductAdminController = new ProductController();
        $sanpham = $ProductAdminController->getSanPhamById($_GET['id']);
        $loaisanpham = $ProductAdminController->getLoaiSanPham();
        require('./app/views/adminViews/productAdmin/updateProduct_admin.php');
    }elseif ($GetURL == '/product_admin/create') {
        require(dirname(__FILE__).'\app\controllers\adminControllers\product_adminController.php');   
        $ProductAdminController = new ProductController(); 
        $loaisanpham = $ProductAdminController->getLoaiSanPham();
        require('./app/views/adminViews/productAdmin/createProduct_admin.php');
    }elseif ($GetURL == '/category_admin') {
        require(dirname(__FILE__).'\app\controllers\adminControllers\category_adminController.php');
        $CategoryAdminController = new CategoryController();
        $CategoryAdminController->getAllLoaiSanpham();
    }elseif ($GetURL == '/category_admin/create') {
        require('./app/views/adminViews/categoryAdmin/createCategory_admin.php');
    }elseif ($GetURL == '/category_admin/update') {
        require(dirname(__FILE__).'\app\controllers\adminControllers\category_adminController.php');
        $CategoryAdminController = new CategoryController();
        $loaisanpham = $CategoryAdminController->getLoaiSanPhamById($_GET['id']);
        require('./app/views/adminViews/categoryAdmin/updateCategory_admin.php');
    }elseif ($GetURL == '/bill_admin') {
        require(dirname(__FILE__).'\app\controllers\adminControllers\bill_adminController.php');
        $BillAdminController = new BillController();
        $BillAdminController->getAllBill();
    }elseif ($GetURL == '/bill_admin/update') {
        require(dirname(__FILE__).'\app\controllers\adminControllers\bill_adminController.php');
        $BillAdminController = new BillController();
        $bill = $BillAdminController->getBillById($_GET['id']);
        $detailBill = $BillAdminController->getDetailBillById($_GET['id']);
        require('./app/views/adminViews/billAdmin/updateBill_admin.php');
    }elseif ($GetURL == '/profile'){
        require('./app/views/profile.php');
    }else {
        header('HTTP/1.0 404 Not Found');
        echo 'Page not found';
    }
