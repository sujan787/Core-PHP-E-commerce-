<header id="header">
	<!--header-->
	<div class="header_top">
		<!--header_top-->
		<div class="container">
			<div class="row">
				<div class="col-sm-6">
					<div class="contactinfo">
						<ul class="nav nav-pills">
							<li><a href="#"><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
							<li><a href="#"><i class="fa fa-envelope"></i> info@domain.com</a></li>
						</ul>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="social-icons pull-right">
						<ul class="nav navbar-nav">
							<li><a href="#"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#"><i class="fa fa-twitter"></i></a></li>
							<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
							<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
							<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--/header_top-->

	<div class="header-middle">
		<!--header-middle-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4">
					<div class="logo pull-left">
						<a href="index.html"><img src="images/home/logo.png" alt="" /></a>
					</div>
					<div class="btn-group pull-right">
						<div class="btn-group">
							<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
								USA
								<span class="caret"></span>
							</button>
							<ul class="dropdown-menu">
								<li><a href="#">Canada</a></li>
								<li><a href="#">UK</a></li>
							</ul>
						</div>

						<div class="btn-group">
							<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
								DOLLAR
								<span class="caret"></span>
							</button>
							<ul class="dropdown-menu">
								<li><a href="#">Canadian Dollar</a></li>
								<li><a href="#">Pound</a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-sm-8">
					<div class="shop-menu pull-right">
						<ul class="nav navbar-nav">
							<li><a href="#"><i class="fa fa-user"></i> Account</a></li>
							<li><a href="#"><i class="fa fa-star"></i> Wishlist</a></li>
							<li><a href="checkout.php"><i class="fa fa-crosshairs"></i> Checkout</a></li>
							<li><a href="cart-view.php" style="display: flex;width: 84px;"><i class="fa fa-shopping-cart"></i> Cart <div id="cat" style="background-color: #FE980F;
    color: white;
    border-radius: 47px;
    height: 50%;
    text-align: center;
    width: 50%;
	margin: 0px 5px;"></div></a></li>
							<li id="login_bt"><a style="width: 83px;background-color: #FE980F; color: white;text-align: center;
    line-height: 28px;
    border-radius: 7px;" href="login.php"><i class="fa fa-lock"></i> Login </a></li>
							<li id="logout_bt" style="display: none;"><a style="width: 83px;background-color: #FE980F; color: white;text-align: center;
    line-height: 28px;
    border-radius: 7px;" href="logout.php"><i class="fa fa-lock"></i> Logout </a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--/header-middle-->

	<div class="header-bottom">
		<!--header-bottom-->
		<div class="container">
			<div class="row">
				<div class="col-sm-9">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div>
					<div class="mainmenu pull-left">
						<ul class="nav navbar-nav collapse navbar-collapse">
							<li><a href="index.php" class="active">Home</a></li>
							<li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
								<ul role="menu" class="sub-menu">
									<li><a href="shop.html">Products</a></li>
									<li><a href="product-details.html">Product Details</a></li>
									<li><a href="checkout.php">Checkout</a></li>
									<li><a href="cart-view.php">Cart</a></li>
									<li><a href="login.php">Login</a></li>
								</ul>
							</li>


							<li><a href="#">Contact</a></li>
						

						</ul>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="search_box pull-right">
						<form action="search.php" method="get" style="display: flex;">
							<input type="text" name="search" placeholder="Search" style="margin: 0px 9px" />
							<input type="submit" name="submit" value="search" style="background-color: #FE980F; color: #fff; width:90px;background-image:none;" />
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--/header-bottom-->

	<?php

	if (isset($_SESSION['name'])) {

	?>
		<script>
			$("#logout_bt").show();
			$("#login_bt").hide();
		</script>
	<?php
		
	} else {
	?>
		<script>
			$("#logout_bt").hide();
			$("#login_bt").show();
		</script>
	<?php


	}


	if(isset($_SESSION['cart'])){

	$num=	count($_SESSION['cart']);
		?>
		<script>
		var num='<?php echo $num ;?>';
		$("#cat").text(num);
		</script>
	<?php

	}


	?>

</header>
<!--/header-->