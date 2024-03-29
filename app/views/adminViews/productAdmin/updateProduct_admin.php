<?php
// echo dirname(__FILE__);
require('./app/views/layout/admin_navbar.php');
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
      <h1>Upload</h1>
      <form method="post">
        <div class="mb-4">
          <label class="form-label" for="form6Example3">Loại sản phẩm</label>
          <select id="MaLoai" class="form-select form-control">
            <?php
            foreach ($loaisanpham as $loai) {
              echo "<option value='" . $loai['MaLoai'] . "'>" . $loai['TenLoai'] . "</option>";
            }
            ?>
          </select>
        </div>
        <!-- 2 column grid layout with text inputs for the first and last names -->
        <div class="row mb-4">
          <div class="col">
            <div class="form-outline">
              <input id="MaSanPham" disabled type="text" value="<?php echo $sanpham['MaSanPham'] ?>"
                class="form-control" />
              <label class="form-label" for="form6Example1">Mã sản phẩm</label>
            </div>
          </div>
          <div class="col">
            <div class="form-outline">
              <input id="TenSanPham" value="<?php echo $sanpham['TenSanPham'] ?>" type="text" class="form-control" />
              <label class="form-label" for="form6Example1">Tên sản phẩm</label>
            </div>
          </div>
        </div>
        <div class="row mb-4">
          <div class="col">
            <div class="form-outline">
              <input id="GiaSanPham" value="<?php echo $sanpham['GiaSanPham'] ?>" type="number "
                class="form-control" />
              <label class="form-label" for="form6Example1">Giá sản phẩm</label>
            </div>
          </div>
          <div class="col">
            <div class="form-outline">
              <input id="SoLuongSanPham" value="<?php echo $sanpham['SoLuongSanPham'] ?>" type="text"
                class="form-control" />
              <label class="form-label" for="form6Example1">Số lượng sản phẩm</label>
            </div>
          </div>
        </div>


        <!-- Text input -->
        <div class="form-outline mb-4">
          <input id="AnhSanPham" value="<?php echo $sanpham['AnhSanPham'] ?>" type="text" class="form-control" />
          <label class="form-label" for="form6Example3">Ảnh sản phẩm</label>
        </div>
        <div class="row mb-4">
          <div class="col">
            <div class="form-outline">
              <input disabled value="<?php echo $sanpham['NgayNhap'] ?>" type="datetime-local"
                class="form-control" />
              <label class="form-label" for="form6Example1">Ngày nhập</label>
            </div>
          </div>
          <div class="col">
            <div class="form-outline">
              <input id="NgayCapNhat" type="datetime-local" class="form-control" />
              <label class="form-label" for="form6Example2">Ngày cập nhật</label>
            </div>
          </div>
        </div>

        <!-- Message input -->
        <div class="form-outline mb-4">
          <textarea id="ChiTiet" class="form-control" rows="4"><?php echo $sanpham['ChiTiet'] ?></textarea>
          <label class="form-label" for="form6Example7">Thông tin chi tiết</label>
        </div>

        <!-- Submit button -->
        <button onclick="updateProduct()" type="button" class="btn btn-primary btn-block mb-4">Update</button>
      </form>
    </div>
  </div>
</div>
<script type="text/javascript">
  var now = new Date();
  now.setMinutes(now.getMinutes() - now.getTimezoneOffset());
  document.getElementById('NgayCapNhat').value = now.toISOString().slice(0, 16);
</script>
<script src="../../../public/js/adminJs/product_admin.js"></script>

<?php
// echo dirname(__FILE__);
require('./app/views/layout/admin_footer.php');
?>