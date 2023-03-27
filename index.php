<?php 
    session_start();
    $GetURL =  parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    // echo $GetURL;
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
    }
    elseif( $GetURL == '/admin'){
        require('./app/views/home/admin.php');
    }
    else {
        header('HTTP/1.0 404 Not Found');
        echo 'Page not found';
    }
