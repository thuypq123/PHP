<?php
// echo dirname(__FILE__);
require('./app/views/layout/admin_navbar.php');
?>
<div class="page-wrapper">
  <div class="page-breadcrumb">
    <div class="row">
      <div class="col-12 d-flex no-block align-items-center">
        <h4 class="page-title">Category</h4>
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
    <h1>Category</h1>
    <a href="/category_admin/create" class="btn btn-primary btn-rounded" style="margin: 10px;">Create</a>
    <div class="row">
      <table id="example" class="display" style="width:100%">
        <thead>
          <tr>
            <th>Id</th>
            <th>Tên loại sản phẩm</th>
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
          foreach ($LoaiSanPham as $lsp) {
            echo '<tr>';
            echo '<td>' . $lsp['MaLoai'] . '</td>';
            echo '<td>' . $lsp['TenLoai'] . '</td>';
            echo '<td><a href="/category_admin/update?id=' . $lsp['MaLoai'] . '" class="btn btn-success  btn-rounded">Edit</a></td>';
            echo '<td><button onclick="deleteCategory(\''.$lsp['MaLoai'] .'\')" type="button" class="btn btn-danger btn-rounded" >Delete</button></td>';
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