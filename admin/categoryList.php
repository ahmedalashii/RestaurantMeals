 <?php
  session_start();
  include("../database.php");
  if (isset($_SESSION['user'])) { // if it's user
      header("location: cantAccess.php");
  } elseif (isset($_SESSION['admin'])) { // if it's admin
      error_reporting(0);
      if (isset($_GET['action']) && $_GET['action'] != "" && $_GET['action'] == 'delete') {
          $id = $_GET['id'];
          /*this is delet query*/
          mysqli_query($conn, "delete from categories where id='$id'");
          header("location: sumit_form.php?success=1");
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


     <div class="col-md-14">
       <div class="card ">
         <div class="card-header card-header-primary">
           <h4 class="card-title">Category List</h4>

         </div>
         <div class="card-body">
           <div class="table-responsive ps">
             <table class="table tablesorter ">
               <thead class=" text-primary">
                 <tr>
                   <th>ID</th>
                   <th>Name</th>
                   <th>Discription</th>
                   <th>
                     <a class=" btn btn-primary" href="addCat.php">Add New</a>
                   </th>
                 </tr>
               </thead>
               <tbody>
                 <?php

                  $result = mysqli_query($conn, "select * from categories");

                  while (list($id, $name, $description) = mysqli_fetch_array($result)) {
                      echo "<tr><td>$id<td>$name</td>
                        <td>$description</td><td>
                        <a class=' btn btn-success' href='updateCat.php?id=$id&action=update'>Update</a>
                        </td><td>
                        <a class=' btn btn-fail' href='categoryList.php?id=$id&action=delete'>Delete</a>
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