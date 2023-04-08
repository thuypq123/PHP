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
            <div class="card text-center">
                <h2 class="card-header text-black-50">Thông Tin Cá Nhân</h2>
                <div class="card-body">
                    <h5 class="card-title">
                        <img src="https://ionicframework.com/docs/img/demos/avatar.svg" style="border-radius: 50%;" alt="Girl in a jacket" width="50" height="50">
                    </h5>
                    <form>
                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <input onmousedown="disableButton()" id="Fullname" class="form-control" />
                            <label class="form-label" for="form3Example3">Họ Và Tên</label>
                        </div>
                        <!-- 2 column grid layout with text inputs for the first and last names -->
                        <div class="row mb-4">
                            <div class="col">
                                <div class="form-outline">
                                    <input onmousedown="disableButton()" type="email" id="Email" class="form-control" />
                                    <label class="form-label" for="form3Example1">Email</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-outline">
                                    <input onmousedown="disableButton()" type="text" id="SDT" class="form-control" />
                                    <label class="form-label" for="form3Example2">Số Điện Thoại</label>
                                </div>
                            </div>
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-4">
                            <input onmousedown="disableButton()" type="text" id="DiaChi" class="form-control" />
                            <label class="form-label" for="form3Example4">Địa Chỉ</label>
                        </div>
                        <!-- Submit button -->
                        <button onclick="updateProfile()" id = "btn-profile" disabled class="btn btn-primary btn-block mb-4">Cập Nhật</button>
                    </form>
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
<script src="../../public/js/profile.js"></script>