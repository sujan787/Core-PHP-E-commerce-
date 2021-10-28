<!DOCTYPE html>
<html lang="en">
<style>
	.cart_info table tr td {

		margin: 0px 20px;


	}
</style>
<?php session_start(); ?>
<?php include 'head.php'; ?>
<?php include 'function.php'; ?>
<?php
include 'db.php';
$uname = $_SESSION['name'];
$query = "select * from user_details where name='$uname'";
$result = mysqli_query($connection, $query);
$row =  mysqli_fetch_assoc($result);



?>
<?php checkout(); ?>

<body>
	<?php include 'header.php'; ?>
	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
					<li><a href="#">Home</a></li>
					<li class="active">Check out</li>
				</ol>
			</div>
			<!--/breadcrums-->

			<div class="step-one">
				<h2 class="heading">Step1</h2>
			</div>


			<div class="register-req">
				<p>Please use Register And Checkout to easily get access to your order history, or use Checkout as Guest</p>
			</div>
			<!--/register-req-->

			<div class="shopper-informations">
				<div class="row">

					<div class="col-sm-5 clearfix" style="width: 75%;">
						<div class="bill-to">
							<p>Bill To</p>
							<div class="form-one" style="width: 75%;">
								<form action="" method="POST">




									<input type="text" name="address" placeholder="address">


									<input type="text" name="number" placeholder="number">

									<input class="btn btn-default update" name="submit" type="submit" href="" style="width: 25vh;height:50px;margin-bottom: 20px;
                                      border-radius: 55px;text-align:center;margin-left: 185px;background-color: rgb(254, 152, 15);">
									

								</form>
							</div>

						</div>
					</div>

					<div class="col-sm-3">
						<div class="shopper-info">
							<p>Shopper Information</p>
							<form>
								<input type="text" placeholder=" Name" value="Name : <?php echo $row['name']; ?>" disabled>
								<input type="text" placeholder="email" value="Email : <?php echo $row['email']; ?>" disabled>
								<input type="text" placeholder="number" value="Number : <?php echo $row['number']; ?>" disabled>

							</form>

						</div>
					</div>



				</div>
			</div>
			<div class="review-payment">
				<h2>Review & Payment</h2>
			</div>

			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description"></td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>

						<?php view_cart(); ?>

					</tbody>
				</table>
			</div>

		</div>
	</section>
	<!--/#cart_items-->



	<?php include 'footer.php'; ?>


	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/jquery.prettyPhoto.js"></script>
	<script src="js/main.js"></script>
</body>

</html>