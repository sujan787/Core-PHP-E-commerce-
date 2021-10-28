<?php include("function.php"); ?>
<?php

if (isset($_GET['id'])) {

  $user_id =  $_GET['id'];

  global $connection;

  if ($connection) {

    $query  = "select * from add_product where id = $user_id ";
    $result = mysqli_query($connection, $query);
    $row =  mysqli_fetch_assoc($result);


    if (isset($_POST['submit'])) {


      $name = $_POST['name'];
      $price = $_POST['price'];
      $description = $_POST['description'];
      $image =  $_FILES['photo']['name'];

      if (!empty($image)) {
        $image_tmp =  $_FILES['photo']['tmp_name'];
        $target_dir = "upload/";

        move_uploaded_file($image_tmp, $target_dir . $image);
        $query = "Update add_product Set name = '$name', price = '$price', description = '$description', photo='$image'   where id =   $user_id ";
      } else {

        $query = "Update add_product Set name = '$name', price = '$price', description = '$description'   where id =   $user_id ";
      }


      $data = mysqli_query($connection, $query);

      print_r($data);


      if ($data) {

        header('location:view-product.php');
      } else {
        echo '<script>alert("please try again") </script>';
      }
    }
  } else {

    die("Database connection failed");
  }
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
        <form action="" method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <label for="exampleInputEmail1" style="padding: 22px 0px 7px 0px;">product name</label>
            <input type="text" name="name" class="form-control" placeholder="enter category" value="<?php echo
                                                                                                    $row['name'] ?>">
            <label for="exampleInputEmail1" style="padding: 22px 0px 7px 0px;">product price</label>
            <input type="text" name="price" class="form-control" placeholder="Enter price" value="<?php echo
                                                                                                  $row['price'] ?>">
            <label for="exampleInputEmail1" style="padding: 22px 0px 7px 0px;">product description</label>
            <input type="text" name="description" class="form-control" placeholder="Enter price" value="<?php echo
                                                                                                        $row['description'] ?>">
            <label for="exampleInputEmail1" style="padding: 22px 0px 7px 0px;">product category</label>
            <select name="category">
              <option disabled="disabled" selected="selected">select category</option>
              <?php show_category() ?>
            </select>
            <label for="exampleInputEmail1" style="padding: 22px 0px 7px 0px;">product brand</label>
            <select name="brand">
              <option disabled="disabled" selected="selected">select brand</option>
              <?php show_brand() ?>
            </select>

            <div>
              <label for="exampleInputEmail1" style="padding: 22px 0px 7px 0px;">Select Product Image</label>
              <input type="file" class="form-control" placeholder="Enter price" name="photo" class="form-control-file">
            </div>
            <input type="submit" name="submit" class="BUTTON" value="submit" style="margin: 22px 0px 7px 0px;">
          </div>


        </form>

      </div>


    </div>
    <?php include("template-parts/js.php"); ?>
</body>