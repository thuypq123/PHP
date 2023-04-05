<?php
// echo dirname(__FILE__);
require('./app/views/layout/admin_navbar.php');
require('./app/controllers/adminControllers/product_adminController.php');
require_once('./config/db.php');
?>

<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Upload</h4>
                <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Library</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid" style="background-color: white;">
        <div class="row">
            <form method="post">
                <div class="row">
                    <h2>Thông tin hóa đơn</h2>
                    <div class="col-6">
                        <h5>Mã hóa đơn:
                            <?php echo $bill['MaHoaDon'] ?>
                        </h5>
                        <input type="hidden" id="MaHoaDon" value="<?php echo $bill['MaHoaDon'] ?>">
                        <h5>Tên khách hàng:
                            <?php
                            $conn = Database::getInstance();
                            $query = "SELECT * FROM khachhang WHERE MaKhachHang = " . $bill['MaKhachHang'];
                            $result = mysqli_query($conn, $query);
                            $khachhang = mysqli_fetch_assoc($result);
                            echo $khachhang['TenKhachHang'] ?>
                        </h5>
                        <h5>Ngày Lập:
                            <?php echo $bill['NgayLap'] ?>
                        </h5>
                        <h5>Địa chỉ:
                            <?php echo $bill['DiaChi'] ?>
                        </h5>
                        <h5>SDT:
                            <?php echo $bill['SDT'] ?>
                        </h5>
                    </div>
                    <div class="col-6">
                        <h5>Trạng thái vận chuyển</h5>
                        <select id="VanChuyen" class="browser-default custom-select">
                            <option value="<?php echo $bill['VanChuyen'] ? '1' : '0' ?>"><?php echo $bill['VanChuyen'] ? 'Đã vận chuyển' : 'Chưa vận chuyển' ?></option>
                            <option value="<?php echo $bill['VanChuyen'] ? '0' : '1' ?>"><?php echo $bill['VanChuyen'] ? 'Chưa vận chuyển' : 'Đã vận chuyển' ?></option>
                        </select>

                        <h5>Trạng thái thanh toán</h5>
                        <select id="ThanhToan" class="browser-default custom-select">
                            <option value="<?php echo $bill['ThanhToan'] ? '1' : '0' ?>"><?php echo $bill['ThanhToan'] ? 'Đã thanh toán' : 'Chưa thanh toán' ?></option>
                            <option value="<?php echo $bill['ThanhToan'] ? '0' : '1' ?>"><?php echo $bill['ThanhToan'] ? 'Chưa thanh toán' : 'Đã thanh toán' ?></option>
                        </select>
                    </div>
                </div>

                <br>
                <div class="row">
                    <table class="table align-middle mb-0 bg-white">
                        <thead class="bg-light">
                            <tr>
                                <th>Ảnh</th>
                                <th>Tên sản phẩm</th>
                                <th>Số lượng</th>
                                <th>Đơn giá</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $product = new ProductController();

                            foreach ($detailBill as $detail) {
                                $productInfo = $product->getSanPhamById($detail['MaSanPham']);
                                echo '<tr>';
                                echo '<td> <img src= "' . $productInfo['AnhSanPham'] . '" height="50" > </td>';
                                echo '<td>' . $productInfo['TenSanPham'] . '</td>';
                                echo '<td>' . $detail['SoLuong'] . '</td>';
                                echo '<td>' . $detail['TongTien'] . ' VND</td>';
                                echo '</tr>';
                            }

                            ?>
                        </tbody>
                    </table>
                </div>
                <br>
                <div class="row justify-content-end">
                    <div class="col-4">
                        <h5>Tổng tiền:
                            <?php echo $bill['TongTien'] ?> VND
                        </h5>
                    </div>
                </div>
                <!-- Submit button -->
                <button onclick="updateBill()" type="button" class="btn btn-primary btn-block mb-4">Update</button>
            </form>
        </div>
    </div>
</div>
<script src="../../../public/js/adminJs/bill_admin.js"></script>

<?php
// echo dirname(__FILE__);
require('./app/views/layout/admin_footer.php');
?>