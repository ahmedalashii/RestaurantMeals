<?php
  if (isset($_SESSION['user'])) { // if it's user
      header("location: cantAccess.php");
  } elseif(!isset($_SESSION['admin'])){ // if it's not admin
      header("location: ../login.php");
  }
?>
<!doctype html>
<html lang="en">

<head>
  <title>Control Panel</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="assets/css/Material+Icons.css" />
  <link rel="stylesheet" href="assets/css/font-awesome.min.css">
  <!-- Material Kit CSS -->
  <link href="assets/css/material-dashboard.css?v=2.1.0" rel="stylesheet" />
  <link href="assets/css/black-dashboard.css" rel="stylesheet" />

</head>

<body class="dark-edition">
  <div class="wrapper ">
    <div class="sidebar">
      <div class="logo">
      </div>
      <div class="sidebar-wrapper ps-container ps-theme-default">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="index.php">
              <i class="material-icons">home</i>
              <p>Home</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="addCat.php">
              <i class="material-icons">add</i>
              <p>Add Category</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="addMeal.php">
              <i class="material-icons">add</i>
              <p>Add Meal</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="categoryList.php">
              <i class="material-icons">list</i>
              <p>Category List</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="mealList.php">
              <i class="material-icons">list</i>
              <p>Meal List</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="../logout.php">
              <i class="material-icons">logout</i>
              <p>Logout</p>
            </a>
          </li>
        </ul>
      </div>
    </div>