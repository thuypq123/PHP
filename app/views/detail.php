<?php
require('./app/views/layout/navbar.php');
if (!isset($_SESSION)) {
    session_start();
}

?>

<!-- Product section-->



<!-- Chi tiết sản phẩm - Iphone -->
<section class="py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="row gx-4 gx-lg-5 align-items-center">
            <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src=<?php echo $sanpham['AnhSanPham'] ?> alt="..." /></div>
            <div class="col-md-6">
                <div class="small mb-1">SKU: BST-498</div>
                <h1 class="display-5 fw-bolder">
                    <?php echo $sanpham['TenSanPham'] ?></h1>
                <div class="fs-5 mb-5">
                    <span class="text-decoration-line-through">
                        <?php echo $sanpham['GiaSanPham'] * 2 ?></span>
                    <span> - <?php echo $sanpham['GiaSanPham'] ?></span>
                </div>
                <p class="lead"><?php echo $sanpham['ChiTiet'] ?></p>
                <div class="d-flex">
                    <input class="form-control text-center me-3" id="soLuong" type="num" value="1" style="max-width: 3rem" />
                    <button onclick="addCard('<?php echo $sanpham['MaSanPham'] ?>','<?php echo $_SESSION['MaHoaDon']; ?>')" class="btn btn-outline-dark flex-shrink-0" type="button">
                        <i class="bi-cart-fill me-1"></i>
                        Thêm Vào Giỏ Hàng
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Front-end Chi tiet san pham -->
<!-- <section>
        <div class="intro-details">
            <div class="center-page">
                <aside class="slider-details-img">
                    <div class="details-img">
                    echo "<img src='$url' alt='$alt'>";
                    </div>
                </aside>
                <aside class="slider-details">
                    <h1>iPhone 14 Pro Max</h1>
                    <p>Giá và khuyến mãi tại: Hồ Chí Minh</p>
                    <strong class="price" data-price="34490000" data-disprice="29490000" data-percent="14">
                        29.490.000₫
                        <strike>34.490.000₫</strike>
                        <small>-14%</small>
                    </strong>
                    <div class="capacity">
                        <p>Dung Lượng:</p>
                        <ul>
                            <li>128GB</li>
                            <li>256GB</li>
                            <li>512GB</li>
                            <li>1TB</li>
                        </ul>
                    </div>
                    <div class="clear"></div>
                    <div class="promotion-detail">
                        <p>Khuyến mãi</p>
                        <p>Giá và khuyến mãi dự kiến áp dụng đến 23:59 | 24/02</p>
                    </div>
                    <hr style="margin-top: 10px;">
                    <div class="content-promo">
                        <p>
                            <span class="content-details">
                                <b>Chọn 1 trong 3 khuyến mãi:</b>
                                <li class="choose" data-index="0" data-promotion="1450484" data-group="1482976-0"
                                    data-ispercent="False" data-discount="1000000" data-productcode="DISCOUNT"
                                    data-tovalue="9000">
                                    Giảm giá 1,000,000đ<strong> *</strong>
                                </li><br>
                                <li class="choose" data-index="1" data-promotion="1450484" data-group="1482976-0"
                                    data-ispercent="False" data-discount="0" data-productcode="4644499000106       "
                                    data-tovalue="9000">
                                    Bảo hành 24 tháng (12 tháng chính hãng + 12 tháng bảo hành mở rộng) (Trị giá đến 2
                                    triệu)
                                    <a style="color: #1800EE;" href="https://www.topzone.vn/tekzone/khuyen-mai-den-50-goi-bao-hiem-roi-vo-khi-mua-kem-1494916">
                                        Xem chi tiết</a>
                                    <strong> *</strong>
                                </li>
                                <li class="choose" data-index="2" data-promotion="1450484" data-group="1482976-0"
                                    data-ispercent="False" data-discount="0" data-productcode="1644303000009       "
                                    data-tovalue="9000">
                                    Tặng gói bảo hiểm rơi vỡ 6 tháng (Trị giá đến 2 triệu) 
                                    <a style="color: #1800EE;"  
                                         href="https://www.topzone.vn/tekzone/khuyen-mai-den-50-goi-bao-hiem-roi-vo-khi-mua-kem-1494916">
                                        Xem chi tiết</a><strong> *</strong>
                                </li>
                                <li>Thu cũ Đổi mới: Giảm đến 2 triệu (Tùy model máy cũ, không kèm các hình thức thanh
                                    toán online, mua nhiều giảm nhiều) Xem chi tiết</li>
                                <b>
                                    Mua kèm iPhone ưu đãi thêm (Tùy model và không kèm khuyến mãi khác của sản phẩm mua
                                    kèm):"
                                    <span><br> - Phụ kiện Apple: Giảm đến 50%.
                                        <a
                                            href="https://www.topzone.vn/tekzone/ruoc-iphone-series-nhan-lien-uu-dai-giam-soc-1391646">
                                            Xem chi tiết</a>
                                    </span>
                                    <span><br>- Apple Watch: Giảm đến 30%.
                                        <a
                                            href="https://www.topzone.vn/tekzone/apple-watch-mua-kem-giam-den-30-tai-topzone-1487441">
                                            Xem chi tiết</a>
                                    </span>
                                    <span>
                                        - iPad: Giảm đến 50%.
                                        <a
                                            href="https://www.topzone.vn/tekzone/ipad-12-9-inch-2021-giam-gia-khi-mua-kem-iphone-13-1436134">
                                            Xem chi tiết</a>
                                    </span><br>
                                    <span>- Macbook: Giảm đến 30%.
                                        <a
                                            href="https://www.topzone.vn/tekzone/macbook-giam-them-3-khi-mua-kem-iphone-ipad-apple-watch-tai-topzone-1487449">
                                            Xem chi tiết</a>
                                    </span>
                                </b>
                                <li>Nhập mã khuyến mãi giảm đến 100.000đ khi thanh toán qua VNPAY-QR cho hóa đơn từ 8
                                    triệu
                                    <a
                                        href="https://www.topzone.vn/tekzone/san-ma-giam-gia-vnpay-giam-den-100k-cho-hoa-don-tu-10-trieu-1510642">
                                        (click xem chi tiết)</a>
                                </li>
                                <li>Nhập mã TGDD giảm 2% tối đa 100.000đ cho đơn hàng từ 500.000đ trở lên khi thanh toán
                                    qua Ví Moca trên ứng dụng Grab
                                    <a
                                        href="https://www.topzone.vn/tekzone/thanh-toan-vi-moca-giam-toi-da-100k-1496968">
                                        (click xem chi tiết)</a>
                                </li>
                            </span>
                        </p>
                    </div>
                    <div class="btn-buy">
                        <div class="btn-buy-muangay">
                            <p>Mua Ngay</p>
                        </div>
                        <div class="btn-buy-child">
                            <div class="btn-buy-muatragop">
                                <p>Mua trả góp 0%</p>
                                <small>Qua công ty tài chính</small>
                            </div>
                            <div class="btn-creadit-card">
                                Trả góp qua thẻ
                                <small>Visa, Mastercard, JCB, Amex</small>
                            </div>
                        </div>
                    </div>
                    <ul class="policy">
                        <li><i class="fa-solid fa-box-open"></i>
                            <span>Bộ sản phẩm gồm: Hộp, Sách hướng dẫn, Cây lấy sim, Cáp Lightning - Type C
                            </span>
                        </li>
                        <li><i class="fa-sharp fa-solid fa-rotate-left"></i>
                            <span>Hư gì đổi nấy 12 tháng tại 3485 siêu thị trên toàn quốc 
                                Xem chi tiết chính sách bảo hành, đổi trả</span>
                        </li>
                        <li><i class="fa-solid fa-shield"></i>
                            <span> Bảo hành chính hãng 1 năm</span>
                        </li>
                        <li><i class="fa-solid fa-truck"></i>
                            <span>  Giao hàng nhanh toàn quốc Xem chi tiết</span>
                        </li>
                        <li><i class="fa-solid fa-phone"></i>
                            <span>Tổng đài: 1900.9696.42 (9h00 - 21h00 mỗi ngày)</span>
                        </li>
                    </ul>
                </aside>
            </div>
        </div>
    </section> -->
<!-- Chi tiết sản phẩm - Iphone -->




<!-- Related items section-->
<section class="py-5 bg-light">
    <div class="container px-4 px-lg-5 mt-5">
        <h2 class="fw-bolder mb-4">Related products</h2>
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            <?php
            for ($i = 0; $i < 4; $i++) {
                echo '
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="' . $limitSanPham[$i]['AnhSanPham'] . '" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">' . $limitSanPham[$i]['TenSanPham'] . '</h5>
                                    <!-- Product price-->
                                    ' . $limitSanPham[$i]['GiaSanPham'] . ' VND
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="detail?id=' . $limitSanPham[$i]['MaSanPham'] . '">Xem Chi Tiết</a></div>
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