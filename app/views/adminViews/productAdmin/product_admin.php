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
  <div class="container-fluid">
    <div class="row">
      <h1>Product</h1>
      <table id="example" class="display" style="width:100%">
        <thead>
          <tr>
            <th>Id</th>
            <th>TenSanPham</th>
            <th>GiaSanPham</th>
            <th>SoLuongSanPham</th>
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
            echo '<td><a href="/product_admin/edit?id='.$sp['MaSanPham'].'">Edit</a></td>';
            echo '<td><a href="/admin/product/delete/' . $sp['MaSanPham'] . '">Delete</a></td>';
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

<?php
// echo dirname(__FILE__);
require('./app/views/layout/admin_footer.php');
?>
