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
        <div class="col-md-6 shadow-4-strong">
            <div class="title d-flex justify-content-center text-black-50">
                <h2>Danh Sách Đơn Hàng</h2>
            </div>
            <div class="accordion accordion-borderless" id="accordionFlushExampleX" style="width:100%; overflow: auto; height: 60vh;">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingOneX">
                        <button class="accordion-button" type="button" data-mdb-toggle="collapse" data-mdb-target="#flush-collapseOneX" aria-expanded="true" aria-controls="flush-collapseOneX">
                            Đơn Hàng #1
                        </button>
                    </h2>
                    <div id="flush-collapseOneX" class="accordion-collapse collapse show" aria-labelledby="flush-headingOneX" data-mdb-parent="#accordionFlushExampleX">
                        <table class="table align-middle mb-0 bg-white ">
                            <thead class="bg-light border border-white">
                                <tr>
                                    <th>Tên Sản Phẩm</th>
                                    <th>Số Lượng</th>
                                    <th>Giá</th>
                                    <th>Tổng</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="https://mdbootstrap.com/img/new/avatars/8.jpg" alt="" style="width: 45px; height: 45px" class="rounded-circle" />
                                            <div class="ms-3">
                                                <p class="fw-bold mb-1">Ai Phôn Mười Bốn Bờ Rồ Măc</p>
                                                <p class="text-muted mb-0">john.doe@gmail.com</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="fw-normal mb-1">20</p>
                                    </td>
                                    <td>
                                        <span class="badge badge-primary rounded-pill d-inline">1000000</span>
                                    </td>
                                    <td>
                                    <span class="badge badge-success rounded-pill d-inline">1000000</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <!--Total Price-->
                    <div class="container text-muted d-flex justify-content-end" style="margin: 20px 0">
                        <h5 style="margin: 0 20px">Tổng Cộng:</h5>
                        <h5>100000</h5>
                    </div>
                    <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
require('./app/views/layout/footer.php');
?>
<script src="../../public//js/profile.js"></script>