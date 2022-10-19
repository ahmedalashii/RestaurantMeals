 <?php
    session_start();
    include("../database.php");
    if (isset($_SESSION['user'])) { // if it's user
        header("location: cantAccess.php");
    } elseif (isset($_SESSION['admin'])) { // if it's admin
        error_reporting(0);
        if (isset($_GET['action']) && $_GET['action'] != "" && $_GET['action'] == 'delete') {
            $meal_id = $_GET['meal_id'];
            $result = mysqli_query($conn, "SELECT meal_image FROM meals WHERE meal_id='$meal_id'");
    
            list($picture) = mysqli_fetch_array($result);
            $path = "../images/meals/$picture";
    
            if (file_exists($path) == true) {
                unlink($path);
            } else {
            }
            /*this is delete query*/
            mysqli_query($conn, "DELETE FROM meals WHERE meal_id='$meal_id'");
            header("location: sumit_form.php?success=1");
        }
        ///pagination
        include "sidenav.php";
        include "topheader.php";
    } else { // otherwise go to login page
        header("location: ../login.php");
    }
    ?>
 <!-- End Navbar -->
 <div class="content">
     <div class="container-fluid">


         <div class="col-md-14">
             <div class="card ">
                 <div class="card-header card-header-primary">
                     <h4 class="card-title">Meal List</h4>

                 </div>
                 <div class="card-body">
                     <div class="table-responsive ps">
                         <table class="table tablesorter ">
                             <thead class=" text-primary">
                                 <tr>
                                     <th>Image</th>
                                     <th>ID</th>
                                     <th>Name</th>
                                     <th>Category ID</th>
                                     <th>Price</th>
                                     <th>Type</th>
                                     <th>Discount</th>
                                     <th>
                                         <a class=" btn btn-primary" href="addMeal.php">Add New</a>
                                     </th>
                                 </tr>
                             </thead>
                             <tbody>
                                 <?php
                                    $result = mysqli_query($conn, "select * from meals");

                                    while (list($meal_id, $meal_category, $meal_name, $meal_type, $meal_price, $meal_image, $meal_keywords, $meal_discont) = mysqli_fetch_array($result)) {
                                        echo "<tr><td><img src='../images/meals/$meal_image' style='width:100px; height:70px;'></td><td>$meal_id</td><td>$meal_name</td>
                        <td>$meal_category</td><td>$meal_price</td><td>$meal_type</td><td>$meal_discont</td>
                        <td> <a class=' btn btn-success' href='updateMeal.php?id=$meal_id&action=update'>update</a>
                      </td><td><a class=' btn btn-fail' href='mealList.php?meal_id=$meal_id&action=delete'>Delete</a>
                      </td></tr>";
                                    }

                                    ?>
                             </tbody>
                         </table>
                         <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                             <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                         </div>
                         <div class="ps__rail-y" style="top: 0px; right: 0px;">
                             <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
                         </div>
                     </div>
                 </div>
             </div>