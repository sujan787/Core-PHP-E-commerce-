<?php include 'function.php'; ?>

<?php

if (isset($_POST['submit'])) {

  store_product();
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
            <input type="text" name="name" class="form-control" placeholder="enter name">
            <label for="exampleInputEmail1" style="padding: 22px 0px 7px 0px;">product price</label>
            <input type="text" name="price" class="form-control" placeholder="Enter price">
            <label for="exampleInputEmail1" style="padding: 22px 0px 7px 0px;">product description</label>
            <input type="text" name="description" class="form-control" placeholder="Enter description">
            <label for="exampleInputEmail1" style="padding: 22px 0px 7px 0px;">product category</label>
            <select name="category" value="">
              <option disabled="disabled" selected="selected">select category</option>
              <?php show_category() ?>
            </select>
            <label for="exampleInputEmail1" style="padding: 22px 0px 7px 0px;">product brand</label>
            <select name="brand" value="">
              <option disabled="disabled" selected="selected">select brand</option>
              <?php show_brand() ?>
            </select>
            <div>
              <label for="exampleInputEmail1" style="padding: 22px 0px 7px 0px;">Select Product Image</label>
              <input type="file" class="form-control" placeholder="Enter price" name="photo" class="form-control-file" value="">
            </div>
            <div class="img-holder1"></div>
            <input type="submit" name="submit" class="BUTTON" value="submit" style="margin: 22px 0px 7px 0px;">

          </div>


        </form>

      </div>


    </div>
    <?php include("template-parts/js.php"); ?>
</body>
<script src="jquery.js"></script>
<script>
  $(document).ready(function() {

    $('input[type="file"][name="photo"]').on('change', function() {
      var img_path = $(this)[0].value;
      var img_holder = $('.img-holder1');
      var extension = img_path.substring(img_path.lastIndexOf('.') + 1).toLowerCase();
      if (extension == 'jpg' || extension == 'jpeg' || extension == 'png') {

        if (typeof(FileReader) != 'undefined') {

          img_holder.empty();
          var reader = new FileReader();
          reader.onload = function(e) {

            $('<img/>', {
              'src': e.target.result,
              'calss': 'img-fluid',
              'style': 'max-width:100px;margin-bottom:10px'
            }).appendTo(img_holder);
          }

          img_holder.show();
          reader.readAsDataURL($(this)[0].files[0]);
        } else {
          $(img_holder).html(
            ' this browser not support filereader'
          )
        }
      } else {
        $(img_holder).empty();
      }

    })




  });
</script>