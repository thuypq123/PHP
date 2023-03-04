<?php
// echo dirname(__FILE__);
    require('./app/views/layout/navbar.php');
?>
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-4 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            <?php
                for($i = 0; $i < count($SanPham); $i++) {
                    echo '<div class="col mb-4">
                            <div class="card h-100">
                                <!-- Product image-->
                                <img class="card-img-top" src="'.$SanPham[$i]['AnhSanPham'].'" alt="..." />
                                <!-- Product details-->
                                <div class="card-body p-3">
                                    <div class="text-center">
                                        <!-- Product name-->
                                        <h5 class="fw-bolder">'.$SanPham[$i]['TenSanPham'].'</h5>
                                        <!-- Product price-->
                                        '.$SanPham[$i]['GiaSanPham'].' VND
                                    </div>
                                </div>
                                <!-- Product actions-->
                                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                    <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="/detail?id='.$SanPham[$i]['MaSanPham'].'">View options</a></div>
                                </div>
                            </div>
                        </div>';
                }
            ?>
        </div>
    </div>
</section>
<!-- Footer-->
<?php
    require('./app/views/layout/footer.php');
?>