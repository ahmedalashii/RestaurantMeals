  <?php
    session_start();
    include("../database.php");
    if (isset($_SESSION['user'])) { // if it's user
        header("location: cantAccess.php");
    } elseif (isset($_SESSION['admin'])) { // if it's admin
        $result = mysqli_query($conn, "SELECT id FROM categories WHERE id=(SELECT max(id) FROM categories)");
        $data = mysqli_fetch_array($result);
        if (isset($_POST['btn_save'])) {
            $category_name = $_POST['category_name'];
            $category_id = $_POST['category_id'];
            $category_description = $_POST['category_description'];

            mysqli_query($conn, "insert into categories (id,name,description) values ($category_id,'$category_name','$category_description')");
           
            header("location: sumit_form.php?success=1");

            mysqli_close($conn);
        }
        include "sidenav.php";
        include "topheader.php";
    } else { // otherwise go to login page
        header("location: ../login.php");
    }
    
    ?>
  <!-- End Navbar -->
  <div class="content">
      <div class="container-fluid">
          <form action="" method="post" type="form" name="form" enctype="multipart/form-data">
              <div class="row">


                  <div class="col-md-7">
                      <div class="card">
                          <div class="card-header card-header-primary">
                              <h5 class="title">Add Category</h5>
                          </div>
                          <div class="card-body">

                              <div class="row">
                                  <div class="col-md-12">
                                      <div class="form-group">
                                          <label>Category ID</label>
                                          <input type="number" id="category_id" required name="category_id" class="form-control" value="<?php echo $data['id'] + 1; ?>" max="<?php echo $data['id'] + 1; ?>" min="<?php echo $data['id'] + 1; ?>">
                                      </div>
                                  </div>
                                  <div class="col-md-12">
                                      <div class="form-group">
                                          <label>Category Name</label>
                                          <input type="text" id="category_name" required name="category_name" class="form-control">
                                      </div>
                                  </div>
                                  <div class="col-md-12">
                                      <div class="form-group">
                                          <label>Description</label>
                                          <textarea rows="4" cols="80" id="category_description" required name="category_description" class="form-control"></textarea>
                                      </div>
                                  </div>
                              </div>
                              <button type="submit" id="btn_save" name="btn_save" required class="btn btn-fill btn-primary">Add Category</button>

                          </div>
                      </div>
          </form>
      </div>