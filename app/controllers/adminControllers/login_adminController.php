<?php
    require(dirname(__DIR__,2).'\models\adminModels\login_adminModel.php');
    if(isset($_POST['action'])){
        if ($_POST['action'] == "login") { func1(); }
    }
    
    function func1(){
        $registeModel = new login_adminModel();
        $tk = $_POST['tk'];
        $mk = $_POST['mk'];
        $registeModel->login($tk, $mk);
    }
?>