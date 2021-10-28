<?php include("db.php"); ?>
<?php

if (isset($_GET['id'])) {

  $user_id =  $_GET['id'];

  global $connection;

  if ($connection) {

      $query  = "select * from add_category where id = $user_id ";
      $result = mysqli_query($connection, $query);
      $row =  mysqli_fetch_assoc($result);


      if (isset($_POST['submit'])) {

         
        $category = $_POST['category'];


          $query = "Update add_category Set category = '$category'   where id =   $user_id ";
          $data = mysqli_query($connection, $query);

          print_r($data);


          if ($data) {
             
              header('location:view_category.php');
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
        <form action="" method="POST">
          <div class="form-group">
            <label for="exampleInputEmail1" style="padding: 22px 0px 7px 0px;">category</label>
            <input type="text" name="category" class="form-control" placeholder="enter category" value="<?php echo
                                                                                                                        $row['category'] ?>">



            <input type="submit" name="submit" class="BUTTON" value="submit">
        </form>

      </div>


    </div>
    <?php include("template-parts/js.php"); ?>
</body>