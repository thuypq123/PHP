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
                <!-- 2 column grid layout with text inputs for the first and last names -->
                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="form-outline">
                            <input id="MaLoai" disabled value="<?php echo $loaisanpham['MaLoai'] ?>" type="text" class="form-control" />
                            <label class="form-label" for="form6Example1">Mã loại sản phẩm</label>
                        </div>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="form-outline">
                            <input id="TenLoai" value="<?php echo $loaisanpham['TenLoai'] ?>" type="text" class="form-control" />
                            <label class="form-label" for="form6Example1">Tên loại sản phẩm</label>
                        </div>
                    </div>
                </div>


                <!-- Submit button -->
                <button onclick="updateCategory()" type="button" class="btn btn-primary btn-block mb-4">Update</button>
            </form>
        </div>
    </div>
</div>
<script src="../../../public/js/adminJs/category_admin.js"></script>

<?php
// echo dirname(__FILE__);
require('./app/views/layout/admin_footer.php');
?>