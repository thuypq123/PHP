<?php
    require('./app/views/layout/navbar.php')
?>
<!-- Product section-->
<section class="py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="row gx-4 gx-lg-5 align-items-center">
            <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src=<?php echo $sanpham['AnhSanPham'] ?> alt="..." /></div>
            <div class="col-md-6">
                <div class="small mb-1">SKU: BST-498</div>
                <h1 class="display-5 fw-bolder"><?php echo $sanpham['TenSanPham'] ?></h1>
                <div class="fs-5 mb-5">
                    <span class="text-decoration-line-through"><?php echo $sanpham['GiaSanPham']*2 ?></span>
                    <span> - <?php echo $sanpham['GiaSanPham'] ?></span>
                </div>
                <p class="lead"><?php echo $sanpham['ChiTiet'] ?></p>
                <div class="d-flex">
                    <input class="form-control text-center me-3" id="inputQuantity" type="num" value="1" style="max-width: 3rem" />
                    <button onclick="testClick('<?php echo $sanpham['MaSanPham']; ?>')" class="btn btn-outline-dark flex-shrink-0" type="button">
                        <i class="bi-cart-fill me-1"></i>
                        Thêm Vào Giỏ Hàng
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Related items section-->
<section class="py-5 bg-light">
    <div class="container px-4 px-lg-5 mt-5">
        <h2 class="fw-bolder mb-4">Related products</h2>
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            <?php
                for($i = 0; $i < 4; $i++){
                    echo '
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="'.$limitSanPham[$i]['AnhSanPham'].'" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">'.$limitSanPham[$i]['TenSanPham'].'</h5>
                                    <!-- Product price-->
                                    '.$limitSanPham[$i]['GiaSanPham'].' VND
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="detail?id='.$limitSanPham[$i]['MaSanPham'].'">Xem Chi Tiết</a></div>
                            </div>
                        </div>
                    </div>';
                }
            ?>
        </div>
    </div>
    <script src="../../public/js/addToCard.js"></script>
<?php 
    require('./app/views/layout/footer.php')
?>
