<?php
// echo dirname(__FILE__);
require('./app/views/layout/admin_navbar.php');
?>
<div class="page-wrapper">
  <div class="page-breadcrumb">
    <div class="row">
      <div class="col-12 d-flex no-block align-items-center">
        <h4 class="page-title">Product</h4>
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
    <h1>Product</h1>
    <a href="/product_admin/create" class="btn btn-primary btn-rounded" style="margin: 10px;">Create</a>
    <div class="row">
      <table id="example" class="display" style="width:100%">
        <thead>
          <tr>
            <th>Id</th>
            <th>Tên sản phẩm</th>
            <th>Giá</th>
            <th>Số lượng</th>
            <th></th>
            <th></th>
            <!-- <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Salary</th> -->
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($SanPham as $sp) {
            echo '<tr>';
            echo '<td>' . $sp['MaSanPham'] . '</td>';
            echo '<td>' . $sp['TenSanPham'] . '</td>';
            echo '<td>' . $sp['GiaSanPham'] . '</td>';
            echo '<td>' . $sp['SoLuongSanPham'] . '</td>';
            echo '<td><a href="/product_admin/update?id=' . $sp['MaSanPham'] . '" class="btn btn-success  btn-rounded">Edit</a></td>';
            echo '<td><button onclick="deleteProduct(\''.$sp['MaSanPham'] .'\')" type="button" class="btn btn-danger btn-rounded" >Delete</button></td>';
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
<script src="../../../public/js/adminJs/product_admin.js"></script>
<?php
// echo dirname(__FILE__);
require('./app/views/layout/admin_footer.php');
?>