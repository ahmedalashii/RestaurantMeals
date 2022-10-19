  <?php
  session_start();
  include("../database.php");
  $id = $_GET['id'];
  $result = mysqli_query($conn, "select * from categories where id = '$id'");
  $data = mysqli_fetch_array($result);
  if (isset($_POST['btn_save'])) {
    $category_name = $_POST['category_name'];
    $category_id = $_POST['category_id'];
    $category_description = $_POST['category_description'];


    mysqli_query($conn, "update categories set  id ='$category_id', name ='$category_name', description = '$category_description' where id = '$id'");
    header("location: sumit_form.php?success=1");



    mysqli_close($conn);
  }
  include "sidenav.php";
  include "topheader.php";

  ?>
  <!-- End Navbar -->
  <div class="content">
    <div class="container-fluid">
      <form action="" method="post" type="form" name="form" enctype="multipart/form-data">
        <div class="row">


          <div class="col-md-7">
            <div class="card">
              <div class="card-header card-header-primary">
                <h5 class="title">Update Category</h5>
              </div>
              <div class="card-body">

                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Category ID</label>
                      <input type ="number" id="category_id" required name="category_id" class="form-control" value="<?php echo $data['id'] ?>" max="<?php echo $data['id'] ?>" min="<?php echo $data['id'] ?>">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Category Name</label>
                      <input type="text" id="category_name" required name="category_name" class="form-control" value="<?php echo $data['name'] ?>">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Description</label>
                      <textarea rows="4" cols="80" id="category_description" required name="category_description" class="form-control" value="<?php echo $data['description'] ?>"><?php echo $data['description'] ?></textarea>
                    </div>
                  </div>
                </div>
                <button type="submit" id="btn_save" name="btn_save" required class="btn btn-fill btn-primary">Update Category</button>

              </div>
            </div>
      </form>
    </div>