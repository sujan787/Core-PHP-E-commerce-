<!DOCTYPE html>
<html lang="en">
<?php include("head.php"); ?>
<?php include("function.php"); ?>
<?php session_start(); ?>

<body>
<?php include("header.php"); ?>


<section id="advertisement">
		<div class="container">
			<img src="images/shop/advertisement.jpg" alt="" />
		</div>
	</section>


<div class="section" style="display: flex; width: 90%; margin: auto;">
		<?php include("sidebar.php"); ?>


		<div class="col-sm-9 padding-right">
			<div class="features_items">
				<!--features_items-->
				<h2 class="title text-center">Features Items</h2>


				
				<?php  filterbrand() ?>

			</div>
		</div>


	</div>

	<?php include("footer.php"); ?>
    <script src="js/jquery.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
	<script>cart();</script>
</body>
</html>