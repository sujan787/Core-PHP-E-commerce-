<?php include 'function.php'; ?>

<?php

if (isset($_POST['submit'])){

  store_category();

}


?>



<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">

<?php include("template-parts/head.php"); ?>


<body>


  <div id="wrapper">

    <?php include("template-parts/nav.php"); ?>
    <?php include("template-parts/sidebar.php"); ?>


    <div id="page-wrapper">
      <div class="header">
        <h1 class="page-header">
          Dashboard <small>Welcome John Doe</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#">Home</a></li>
          <li><a href="#">Dashboard</a></li>
          <li class="active">Data</li>
        </ol>

      </div>
      <div id="page-inner">
        <div class="title">

          <h3>Add categories</h3>
        </div>
        <form action="" method="POST">
          <div class="form-group">
            <label for="exampleInputEmail1" style="padding: 22px 0px 7px 0px;">category</label>
            <input type="text" name="category" class="form-control" placeholder="enter category">



            <input type="submit" name="submit" class="BUTTON" value="submit">
        </form>

      </div>


    </div>
    <?php include("template-parts/js.php"); ?>
</body>