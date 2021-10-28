<!DOCTYPE html>
<html lang="en">
<style>
	.cart_info table tr td {

		margin: 0px 20px;


	}
</style>
<?php include("head.php"); ?>
<?php include("function.php"); ?>
<?php

session_start();

?>

<script src="jquery-3.6.0.min.js"></script>

<body>
	<?php include("header.php") ?>
	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
					<li><a href="#">Home</a></li>
					<li class="active">Shopping Cart</li>
				</ol>
			</div>
			<div class="table-responsive cart_info" style="display: grid;place-items:center;">
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
					<tbody id="cart_box">

						<?php view_cart(); ?>

					</tbody>
				</table>
				<a class="btn btn-default update" href="place_order.php" style="width: 40vh;height:50px;margin-bottom: 20px;
    border-radius: 55px;text-align:center;">
					<h3 style="margin: 8px;">place order</h3>
				</a>
			</div>
		</div>
	</section>
	<!--/#cart_items-->


	<!--/#do_action-->

	<?php include 'footer.php'; ?>



	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/jquery.prettyPhoto.js"></script>
	<script src="js/main.js"></script>
	<script>
		$(document).ready(function() {
			$(document).on("change", '.cart_quantity_input', function() {

				var a = $(this).attr('pro-id');
				var b = $(this).val();

				$.ajax({
					url: "update-cart.php",
					type: "POST",
					data: {
						a,
						b
					},
					success: function(data) {

						$('#cart_box').html(data);

					}
				});

			});
		});
		$(document).on("click", ".cart_quantity_delete", function() {


			var da = $(this).attr('data-id');

			$.ajax({
				url: "delete-cart.php",
				type: "post",
				data: {
					da
				},
				success: function(data) {
					$(da).parent('tr').remove();
				}
			});

		});
	</script>
</body>

</html>