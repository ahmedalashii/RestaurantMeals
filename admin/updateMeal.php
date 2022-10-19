  <?php
  session_start();
  include("../database.php");
  $id = $_GET['id'];
  $result = mysqli_query($conn, "select * from meals where meal_id = '$id'");
  $data = mysqli_fetch_array($result);

  if (isset($_POST['btn_save'])) {
    $meal_name = $_POST['meal_name'];
    $meal_id = $_POST['meal_id'];
    $meal_category = $_POST['meal_category'];
    $meal_price = $_POST['meal_price'];
    $meal_type = $_POST['meal_type'];
    $meal_discount = $_POST['meal_discount'];
    $meal_keywords = $_POST['meal_keywords'];

    //picture coding
    $picture_name = $_FILES['picture']['name'];
    $picture_type = $_FILES['picture']['type'];
    $picture_tmp_name = $_FILES['picture']['tmp_name'];
    $picture_size = $_FILES['picture']['size'];

    if ($picture_type == "image/jpeg" || $picture_type == "image/jpg" || $picture_type == "image/png" || $picture_type == "image/gif") {
      if ($picture_size <= 50000000)

        move_uploaded_file($picture_tmp_name, "../images/meals/" . $picture_name);

      mysqli_query($conn, "UPDATE `meals` SET `meal_id`='$meal_id',`meal_category`='$meal_category',`meal_name`='$meal_name',`meal_type`='$meal_type',`meal_price`='$meal_price',`meal_image`='$picture_name',`meal_keywords`='$meal_keywords',`meal_discount`='$meal_discount' WHERE `meal_id` = '$id'");

      header("location: sumit_form.php?success=1");
    }

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
                <h5 class="title">Update Meal</h5>
              </div>
              <div class="card-body">

                <div class="row">

                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Meal ID</label>
                      <input type="number" id="meal_id" required name="meal_id" class="form-control" value="<?php echo $data['meal_id'] ?>" max="<?php echo $data['meal_id'] ?>" min="<?php echo $data['meal_id'] ?>">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Meal Name</label>
                      <input type="text" id="meal_name" required name="meal_name" class="form-control" value="<?php echo $data['meal_name'] ?>">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Price</label>
                      <input type="text" id="meal_price" name="meal_price" required class="form-control" value="<?php echo $data['meal_price'] ?>">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Meal Type</label>
                      <select name="meal_type" id="meal_type" required class="form-control" onChange="checkOption()">
                        <?php
                        if ($data['meal_type'] === 'normal') {
                          $data_discount_Temp = $data['meal_discount'];
                          echo "<option selected value='normal' style='color:black; font-weight: 600; font-size: 14px;'>normal</option>";
                          echo "<option value='discont' style='color:black; font-weight: 600; font-size: 14px;'>discont</option>
                          </select>
                    </div>
                  </div>";
                          echo "<div class='col-md-6'>
                            <div class='form-group'>
                              <label>Meal Discont</label>
                                <input type='number' id='meal_discount' name='meal_discount' required class='form-control' value= '$data_discount_Temp' min='0' max = '0'>
                            </div>
                          </div>";
                        } else {
                          echo "<option selected value='discont' style='color:black; font-weight: 600; font-size: 14px;'>discont</option>";
                          echo "<option  value='normal' style='color:black; font-weight: 600; font-size: 14px;'>normal</option>";
                          echo "<div class='col-md-6'>
                            <div class='form-group'>
                              <label>Meal Discont</label>
                                <input type='number' id='meal_discount' name='meal_discount' required class='form-control' value='$data_discount_Temp' min='0'>
                            </div>
                          </div>";
                        }
                        ?>


                        <div class="col-md-4">
                          <div class="">
                            <label for="">Add Image</label>
                            <input type="file" name="picture" required class="btn btn-fill btn-success" id="picture" value="<?php echo $data['meal_image'] ?>">
                          </div>
                        </div>
                    </div>



                  </div>

                </div>
              </div>
              <div class="col-md-5">
                <div class="card">
                  <div class="card-header card-header-primary">
                    <h5 class="title">Category</h5>
                  </div>
                  <div class="card-body">

                    <div class="row">

                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Meal Category</label>
                          <select name="meal_category" id="meal_category" class="form-control">
                            <?php
                            $result = mysqli_query($conn, "select id,name from categories");

                            while (list($id, $name) = mysqli_fetch_array($result)) {
                              echo "<option value='$id'style='color:black; font-weight: 600; font-size: 16px;'>$name</option>";
                            }
                            ?>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Meal Keywords</label>
                          <input type="text" id="meal_keywords" name="meal_keywords" required class="form-control" value="<?php echo $data['meal_keywords'] ?>">
                        </div>
                      </div>
                    </div>

                  </div>
                  <div class="card-footer">
                    <button type="submit" id="btn_save" name="btn_save" required class="btn btn-fill btn-primary">Update Meal</button>
                  </div>
                </div>
              </div>

            </div>
      </form>

    </div>
  </div>
  <script>
    function checkOption() {
      if (document.getElementById("meal_type").value == "normal") {
        document.getElementById("meal_discount").min = 0;
        document.getElementById("meal_discount").max = 0;
        document.getElementById("meal_discount").value = 0;
      } else {
        document.getElementById("meal_discount").min = 0;
        document.getElementById("meal_discount").max = 100;
      }
    }
  </script>