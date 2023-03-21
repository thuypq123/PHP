<?php
    require(dirname(__DIR__,1).'\models\registerModel.php');
    if(isset($_POST['action'])){
        if ($_POST['action'] == "register") { func1(); }
    }

    function func1(){
        $registeModel = new registerModel();
        $fullname = $_POST['fullname'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $sdt = $_POST['SDT'];
        $registeModel->register($fullname, $password, $email, $sdt);
    }
?>