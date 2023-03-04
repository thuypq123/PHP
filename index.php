<?php 

    $GetURL =  parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    if ($GetURL == '/') {
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
    }
    else {
        // Nếu không phù hợp với bất kỳ route nào, trả về trang 404
        header('HTTP/1.0 404 Not Found');
        echo 'Page not found';
        echo $request_uri;  
    }
?>