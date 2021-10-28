<?php include("function.php"); ?>

<!DOCTYPE html>
<html lang="en">
<!--/head-->
<?php include("head.php"); ?>
<script src="jquery-3.6.0.min.js"></script>
<?php
session_start();



?>

<style>
	#cart-loader {

		position: fixed;
		margin: auto;
		top: 0;
		right: 0;
		bottom: 0;
		left: 0;
		height: 100px;
		width: 100px;


		z-index: 100;
		display: none;
	}
</style>


<body>
	<div id="cart-loader">
		<img src="https://c.tenor.com/5o2p0tH5LFQAAAAj/hug.gif" "   />
      </div>
	<?php include('header.php'); ?>
	<!--/header-->
	<section id=" form">
		<!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form">
						<!--login form-->
						<h2>Login to your account</h2>
						<form action="form-login.php" method="POST">
							<input name="email" type="email" placeholder="Email Address" />
							<input name="password" type="password" placeholder="password" />
							<span>
								<input type="checkbox" class="checkbox">
								Keep me signed in
							</span>
							<button type="submit" name="submit" class="btn btn-default">Login</button>
						</form>
					</div>
					<!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form">
						<!--sign up form-->
						<h2>New User Signup!</h2>
						<form id="addform">
							<input id="name" type="text" placeholder="Name" />
							<input id="email" type="email" placeholder="Email Address" />
							<input id="number" type="number" placeholder="phone number" />
							<input id="password" type="password" placeholder="Password" />
							<button type="submit" name="submit" id="submit" class="btn btn-default">Signup</button>
						</form>
					</div>
					<!--/sign up form-->
				</div>
			</div>
		</div>
		</section>
		<!--/form-->


		<?php include 'footer.php'; ?>
		<script>
			$(document).ready(function() {
				$('#submit').click(function(e) {
					e.preventDefault();


					var name = $('#name').val();
					var email = $('#email').val();
					var number = $('#number').val();
					var password = $('#password').val();


					$('#cart-loader').show();

					$.ajax({
						url: "user_reg.php",
						method: "POST",
						data: {

							name,
							email,
							number,
							password
						},
						success: function(data) {
							$('#cart-loader').hide();
						
							if (data == 1) {

								alert("user registered sccessfully");
							}

							if (data == 0) {

								alert("user have aleady registered");
							}

							











							// console.log(data);


						}
					});

				});
			});
		</script>


		<script src="js/jquery.js"></script>
		<script src="js/price-range.js"></script>
		<script src="js/jquery.scrollUp.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/jquery.prettyPhoto.js"></script>
		<script src="js/main.js"></script>


</body>

</html>