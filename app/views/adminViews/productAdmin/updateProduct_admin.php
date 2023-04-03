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
  <div class="container-fluid">
    <div class="row">
      <h1>Upload</h1>
      <form>
        <!-- 2 column grid layout with text inputs for the first and last names -->
        <div class="row mb-4">
          <div class="col">
            <div class="form-outline">
              <input type="text" id="form6Example1" class="form-control" />
              <label class="form-label" for="form6Example1">Tên sản phẩm</label>
            </div>
          </div>
          <div class="col">
            <div class="form-outline">
              <input type="datetime-local" id="form6Example2" class="form-control" />
              <label class="form-label" for="form6Example2">Loại sản phẩm</label>
            </div>
          </div>
        </div>

        <!-- Text input -->
        <div class="form-outline mb-4">
          <input type="text" id="form6Example3" class="form-control" />
          <label class="form-label" for="form6Example3">Company name</label>
        </div>

        <!-- Text input -->
        <div class="form-outline mb-4">
          <input type="text" id="form6Example4" class="form-control" />
          <label class="form-label" for="form6Example4">Address</label>
        </div>

        <!-- Email input -->
        <div class="form-outline mb-4">
          <input type="email" id="form6Example5" class="form-control" />
          <label class="form-label" for="form6Example5">Email</label>
        </div>

        <!-- Number input -->
        <div class="form-outline mb-4">
          <input type="number" id="form6Example6" class="form-control" />
          <label class="form-label" for="form6Example6">Phone</label>
        </div>
        <div class="row mb-4">
          <div class="col">
            <div class="form-outline">
              <input type="datetime-local" id="form6Example1" class="form-control" />
              <label class="form-label" for="form6Example1">Ngày nhập</label>
            </div>
          </div>
          <div class="col">
            <div class="form-outline">
              <input type="datetime-local" id="form6Example2" class="form-control" />
              <label class="form-label" for="form6Example2">Ngày cập nhật</label>
            </div>
          </div>
        </div>

        <!-- Message input -->
        <div class="form-outline mb-4">
          <textarea class="form-control" id="form6Example7" rows="4"></textarea>
          <label class="form-label" for="form6Example7">Additional information</label>
        </div>

        <!-- Submit button -->
        <button type="submit" class="btn btn-primary btn-block mb-4">Place order</button>
      </form>
    </div>
  </div>
</div>

<?php
// echo dirname(__FILE__);
require('./app/views/layout/admin_footer.php');
?>