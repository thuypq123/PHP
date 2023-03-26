<?php
    require(dirname(__DIR__,1).'\models\loginModel.php');
    if(isset($_POST['action'])){
        if ($_POST['action'] == "login") { func1(); }
    }
    
    function func1(){
        $registeModel = new loginModel();
        $password = $_POST['password'];
        $email = $_POST['email'];
        $registeModel->login($email, $password);
    }
?>