<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
    session_start();
    $GetURL =  parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    echo $GetURL;
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
    }
    else {
        header('HTTP/1.0 404 Not Found');
        echo 'Page not found';
    }
