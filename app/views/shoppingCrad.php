<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
    if(!$_SESSION["isLogin"]){
        header('location:/');
    };
    require('./app/views/layout/navbar.php');
?>
<section class="h-100 h-custom" style="background-color: #eee;">
  <div class="container h-100 py-5">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col">
        <div class="card shopping-cart" style="border-radius: 15px;">
          <div class="card-body text-black">

            <div class="row">
              <div class="col-lg-6 px-5 py-4">

                <h3 class="mb-5 pt-2 text-center fw-bold text-uppercase">Your products</h3>
                <div class="" style="overflow: auto; height:50vh">
                    <div class="d-flex align-items-center mb-5">
                        <div class="flex-shrink-0">
                            <img src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/E-commerce/Products/13.webp"
                            class="img-fluid" style="width: 150px;" alt="Generic placeholder image">
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <a href="#!" class="float-end text-black"><i class="fas fa-times"></i></a>
                            <h5 class="text-secondary">Samsung Galaxy M11 64GB</h5>
                            <h6 style="color: #9e9e9e;">Color: white</h6>
                            <div class="d-flex align-items-center">
                            <p class="fw-bold mb-0 me-5 pe-3">799$</p>
                            <div class="def-number-input number-input safari_only">
                                <button type="button p-1" class="btn btn-dark" onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                                class="minus">-</button>
                                <input class="w-50 p-1" min="0" name="quantity" value="1"
                                type="number">
                                <button type="button w-50 p-1" class="btn btn-dark" onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                                class="plus">+</button>
                            </div>
                        </div>
                    </div>
                </div>

                </div>
                <hr class="mb-4" style="height: 2px; background-color: #1266f1; opacity: 1;">

                <div class="d-flex justify-content-between px-x">
                  <p class="fw-bold">Discount:</p>
                  <p class="fw-bold">95$</p>
                </div>
                <div class="d-flex justify-content-between p-2 mb-5 bg-secondary" style="background-color: #e1f5fe;">
                  <h5 class="text-light fw-bold mb-0">Total:</h5>
                  <h5 class="text-light fw-bold mb-0">2261$</h5>
                </div>

              </div>
              <div class="col-lg-6 px-5 py-4">

                <h3 class="mb-5 pt-2 text-center fw-bold text-uppercase">Payment</h3>

                <form class="mb-5">

                  <div class="form-outline mb-5">
                    <input type="text" id="typeText" class="form-control form-control-lg" siez="17"
                      value="1234 5678 9012 3457" minlength="19" maxlength="19" />
                    <label class="form-label" for="typeText">Card Number</label>
                  </div>

                  <div class="form-outline mb-5">
                    <input type="text" id="typeName" class="form-control form-control-lg" siez="17"
                      value="John Smith" />
                    <label class="form-label" for="typeName">Name on card</label>
                  </div>

                  <div class="row">
                    <div class="col-md-6 mb-5">
                      <div class="form-outline">
                        <input type="text" id="typeExp" class="form-control form-control-lg" value="01/22"
                          size="7" id="exp" minlength="7" maxlength="7" />
                        <label class="form-label" for="typeExp">Expiration</label>
                      </div>
                    </div>
                    <div class="col-md-6 mb-5">
                      <div class="form-outline">
                        <input type="password" id="typeText" class="form-control form-control-lg"
                          value="&#9679;&#9679;&#9679;" size="1" minlength="3" maxlength="3" />
                        <label class="form-label" for="typeText">Cvv</label>
                      </div>
                    </div>
                  </div>

                  <p  class="mb-5">Lorem ipsum dolor sit amet consectetur, adipisicing elit <a class="text-secondary" 
                      href="#!">obcaecati sapiente</a>.</p>

                  <button type="button" class="bg-dark text-light btn-block btn-lg">Buy now</button>

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
<?php
    require('./app/views/layout/footer.php');
?>