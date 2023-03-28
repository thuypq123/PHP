<?php
    require(dirname(__DIR__,2).'\models\adminModels\register_adminModel.php');
    if(isset($_POST['action'])){
        if ($_POST['action'] == "register") { func1(); }
    }

    function func1(){
        $registeModel = new register_adminModel();
        $tk = $_POST['tk'];
        $mk = $_POST['mk'];    
        $registeModel->register($tk, $mk);
    }
?>