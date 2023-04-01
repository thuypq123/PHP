<?php
if (!isset($_SESSION)) {
  session_start();
}
if (!$_SESSION["isLogin"]) {
  header('location:/');
}
;
require('./app/views/layout/navbar.php');
?>
<section class="h-100 h-custom" style="background-color: #eee;">
  <div class="container h-100 py-5">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col">
        <div class="card shopping-cart" style="border-radius: 15px;">
          <div class="card-body text-black">

            <div class="row">
              <div class="col-lg-7 px-12 py-4">

                <h3 class="mb-5 pt-2 text-center fw-bold text-uppercase">Your products</h3>
                <div id = "inner_card" class="inner_card" style="overflow: auto; height:50vh">
                  <!-- render card here -->
                </div>
                <hr class="mb-4" style="height: 2px; background-color: #1266f1; opacity: 1;">

                <div class="d-flex justify-content-between px-x">
                  <p class="fw-bold">Discount:</p>
                  <p class="fw-bold">0 VND</p>
                </div>
                <div class="d-flex justify-content-between p-2 mb-5 bg-secondary" style="background-color: #e1f5fe;">
                  <h5 class="text-light fw-bold mb-0">Total:</h5>
                  <h5 id="total" class="text-light fw-bold mb-0">2261$</h5>
                </div>

              </div>
              <div class="col-lg-5 px-5 py-4">

                <h3 class="mb-5 pt-2 text-center fw-bold text-uppercase">Payment</h3>

                <form class="mb-5">

                  <div class="form-outline mb-5">
                    <input id= "SDT" type="text" id="typeText" class="form-control form-control-lg" siez="17"
                      value='<?php echo $_SESSION["SDT"]?>'  />
                    <label class="form-label" for="typeText">Số Điện Thoại</label>
                  </div>
                  <div class="form-outline mb-5">
                    <input id = "DiaChi" type="text" id="typeName" class="form-control form-control-lg" siez="17"
                    value='' />
                    <label class="form-label" for="typeName">Địa Chỉ</label>
                  </div>

                  <p class="mb-5">Lorem ipsum dolor sit amet consectetur, adipisicing elit <a class="text-secondary"
                      href="#!">obcaecati sapiente</a>.</p>

                  <button onclick = "addToHoaDon()" type="button" class="bg-dark text-light btn-block btn-lg"><i class="bi bi-cash-coin" style="font-size: 2rem; margin: auto"></i></button>
                  

                  <h5 class="fw-bold mb-5" style="position: absolute; bottom: 0;">
                    <a class="text-secondary" href="/"><i class="fas fa-angle-left me-2"></i>Back to shopping</a>
                  </h5>

                </form>

              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="../../public/js/addToCard.js"></script>
<script src="../../public/js/payment.js"></script>
<?php
require('./app/views/layout/footer.php');
?>