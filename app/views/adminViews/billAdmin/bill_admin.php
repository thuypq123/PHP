<?php
// echo dirname(__FILE__);
require('./app/views/layout/admin_navbar.php');
?>
<div class="page-wrapper">
  <div class="page-breadcrumb">
    <div class="row">
      <div class="col-12 d-flex no-block align-items-center">
        <h4 class="page-title">Bill</h4>
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
    <h1>Bill</h1>
      <table id="example" class="display" style="width:100%">
        <thead>
          <tr>
            <th>Id</th>
            <th>KH</th>
            <th>Ngày lập</th>
            <th>Tổng tiền</th>
            <th>Địa chỉ</th>
            <th>SDT</th>
            <th>Số Lượng</th>
            <th>Vận chuyển</th>
            <th>Thanh toán</th>
            <th></th>
            <!-- <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Salary</th> -->
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($bill as $bill) {
            echo '<tr>';
            echo '<td>' . $bill['MaHoaDon'] . '</td>';
            echo '<td>' . $bill['MaKhachHang'] . '</td>';
            echo '<td>' . $bill['NgayLap'] . '</td>';
            echo '<td>' . $bill['TongTien'] . '</td>';
            echo '<td>' . $bill['DiaChi'] . '</td>';
            echo '<td>' . $bill['SDT'] . '</td>';
            echo '<td>' . $bill['SoLuong'] . '</td>';
            if ($bill['VanChuyen'] == 0) {
              echo '<td><button class="btn btn-outline-warning  btn-rounded">Chưa vận chuyển</button></td>';
            } else {
              echo '<td><button class="btn btn-outline-success  btn-rounded">Đã vận chuyển</button></td>';
            }
            if ($bill['ThanhToan'] == 0) {
              echo '<td><button class="btn btn-outline-warning  btn-rounded">Chưa thanh toán</button></td>';
            } else {
              echo '<td><button class="btn btn-outline-success  btn-rounded">Đã thanh toán</button></td>';
            }
            echo '<td><a href="/bill_admin/update?id=' . $bill['MaHoaDon'] . '" class="btn btn-success  btn-rounded">Edit</a></td>';  
            echo '</tr>';
          }
          ?>
        </tbody>
      </table>


    </div>
  </div>
</div>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    let table = new DataTable('#example');
  });
</script>
<script src="../../../public/js/adminJs/category_admin.js"></script>
<?php
// echo dirname(__FILE__);
require('./app/views/layout/admin_footer.php');
?>