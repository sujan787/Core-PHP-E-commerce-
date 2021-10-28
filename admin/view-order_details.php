<!DOCTYPE html>
<!-- 
Template Name: BRILLIANT Bootstrap Admin Template
Version: 4.5.6
Author: WebThemez
Website: http://www.webthemez.com/ 
-->
<html xmlns="http://www.w3.org/1999/xhtml">

<?php include("template-parts/head.php"); ?>
<?php include("function.php"); ?>

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
                    <li><a href="index.php">Dashboard</a></li>

                    <li><a href="add-category.php">add-category</a></li>
                    <li class="active">view-category</li>
                </ol>

                <div class="panel panel-default">
                    <div class="panel-heading">
                        Responsive Table Example
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">

                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>order id</th>
                                        <th>user name</th>
                                        <th>product id & quentity</th>
                                        <th>address</th>
                                        <th>phone number</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php

                                      view_order();

                                    ?>


                                </tbody>
                            </table>

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>

</body>
<?php include("template-parts/js.php"); ?>

</html>