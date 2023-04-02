<?php
if (!isset($_SESSION)) {
    session_start();
}
if (!$_SESSION["isLogin"]) {
    header('location:/');
};
require('./app/views/layout/navbar.php');
?>
<div class="container" style="height: 70vh; margin:20px auto">
    <div class="row justify-content-around" style="height:70vh">
        <!--Profile-->
        <div class="col-md-5 ">
            <div class="title d-flex justify-content-center text-black-50">
                <h2>Thông Tin</h2>
            </div>
            <div class="card text-center">
                <div class="card-header">Featured</div>
                <div class="card-body">
                    <h5 class="card-title">Special title treatment</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a href="#" class="btn btn-primary">Button</a>
                </div>
                <div class="card-footer text-muted">2 days ago</div>
            </div>
        </div>
        <!--List Crad Shopping-->
        <div class="col-md-7 shadow-4-strong">
            <div class="title d-flex justify-content-center text-black-50">
                <h2>Danh Sách Đơn Hàng</h2>
            </div>
            <div class="accordion accordion-borderless" id="renderList" style="width:100%; overflow: auto; height: 60vh;">
                <!--Render List-->
            </div>
        </div>
    </div>
</div>
<?php
require('./app/views/layout/footer.php');
?>
<script src="../../public//js/profile.js"></script>