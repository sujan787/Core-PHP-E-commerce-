<?php

include 'db.php';


function store_category()
{

    if (isset($_POST['submit'])) {

        $category = $_POST['category'];

        global $connection;

        if ($connection) {

            $data = "INSERT INTO add_category(category)values('$category')";
            $query = mysqli_query($connection, $data);

            if ($query) {
                header('location:add-category.php');
            } else {


                echo '<script>alert("try again")</script>';
            }
        } else {

            die("connection faild");
        }
    }
}



function store_product()
{

    if (isset($_POST['submit'])) {

        $product_name = $_POST['name'];
        $product_price = $_POST['price'];
        $product_description = $_POST['description'];
        $product_category = $_POST['category'];
        $file = $_FILES['photo'];
        $filename = $file['name'];
        $filepath = $file['tmp_name'];
        $fileerror = $file['error'];


        global $connection;

        if ($connection) {



            if ($fileerror == 0) {

                $destfile = 'upload/' . $filename;

                move_uploaded_file($filepath, $destfile);

                $data = "INSERT INTO add_product(name,price,description,category,photo)values('$product_name','$product_price','$product_description','$product_category','$destfile')";
                $query = mysqli_query($connection, $data);

                if ($query) {
                    header('location:add-product.php');
                } else {


                    echo '<script>alert("try again")</script>';
                }
            }
        } else {

            die("failed");
        }
    }
}


function show_category()
{

    global $connection;
    $query = "SELECT * FROM add_category";
    $result = mysqli_query($connection, $query);
    if (!$result) {
        die('Query FAILED');
    }

    while ($row = mysqli_fetch_assoc($result)) {




        echo ' <option value=' . $row['id'] . '>' . $row['category'] . '</option>';
    }
}

function view_product()
{

    global $connection;

    $selectquery = "select * from add_product";

    $query = mysqli_query($connection, $selectquery);


    while ($result = mysqli_fetch_array($query)) {
?>

        <tr>
            <td><?php echo $result['id']; ?></td>
            <td><?php echo $result['name']; ?></td>
            <td><?php echo $result['price']; ?></td>
            <td><?php echo $result['description']; ?></td>
            <td><?php echo $result['category']; ?></td>
            <td><img src="<?php echo $result['photo']; ?>" width="150" height="100"></td>
            <td flex-direction="row-reverse"><a href="update_product.php?id=<?php echo $result["id"]; ?>">Edit</a></td>
            <td flex-direction="row-reverse"><a href="view_product.php?id=<?php echo $result["id"]; ?>">Delete</a></td>


        </tr>

<?php

    }
}


// function update_product(){

//     if (isset($_GET['id'])) {

//         $user_id =  $_GET['id'];

//         global $connection;

//         if ($connection) {

//             $query  = "select * from add_product where id = $user_id ";
//             $result = mysqli_query($connection, $query);
//             $row =  mysqli_fetch_assoc($result);


//             if (isset($_POST['submit'])) {

//                 $category = $_POST['category'];
//                 $price = $_POST['price'];



//                 $query = "Update add_product Set name = '$name', price = '$price', description = '$description',category = '$category',photo ='$photo'   where id =   $user_id ";
//                 $data = mysqli_query($connection, $query);

//                 print_r($data);


//                 if ($data) {

//                     header('location:view-category.php');
//                 } else {
//                     echo '<script>alert("please try again") </script>';
//                 }
//             }
//         } else {

//             die("Database connection failed");
//         }
//     }



// }

function delete_product()
{
    global $connection;

    if (isset($_GET['id'])) {

        $id = $_GET['id'];

        $query = "DELETE FROM add_product WHERE id = $id ";

        $result = mysqli_query($connection, $query);
        if (!$result) {
            die("QUERY FAILED" . mysqli_error($connection));
        } else {


            header('location:view-product.php');
        }
    }
}

function readproducts()
{


    $id = 0;
    $start = 0;


    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $start = $id * 6 - 6;
    }

    global $connection;


    $selectquery = "select * from add_product order by id  limit $start,6";

    $query = mysqli_query($connection, $selectquery);


    while ($result = mysqli_fetch_array($query)) {



        echo '<div class="col-sm-4">
    <div class="product-image-wrapper">
        <div class="single-products">
                <div class="productinfo text-center">
                    <a href="product_details.php?id=' . $result["id"] . '"><img src="admin/upload/' . $result['photo'] . '" alt="" /></a>
                    <h2>' . $result['price'] . '</h2>
                    <p>' . $result['name'] . '</p>
                    <a data-id=' . $result['id'] . ' name="cart" id="cart-btn" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                </div>
               <div class="product-overlay">
                    <div class="overlay-content">
                        <h2>' . $result['price'] . '</h2>
                        <p>' . $result['name'] . '</p>
                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                    </div>
                </div>
                 <div class="product-overlay" >
                    <div class="overlay-content">
                    <a href="product_details.php?id=' . $result["id"] . '"><img src="admin/upload/' . $result['photo'] . '" alt="" /  style="opacity: 0;"></a>
                    <a data-id=' . $result['id'] . ' name="cart" id="cart-btn" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                    </div>
                </div>
        </div>
        <div class="choose">
            <ul class="nav nav-pills nav-justified">
                <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
            </ul>
        </div>
    </div>
</div>';
    }
}

function readcategory()
{


    global $connection;

    $selectquery = "select * from add_category order by category";

    $query = mysqli_query($connection, $selectquery);


    while ($result = mysqli_fetch_array($query)) {

        echo ' <div class="panel panel-default">
    <div class="panel-heading">
        <h4 class="panel-title"><a href="product.php?id=' . $result["id"] . ' ">' . $result['category'] . '</a></h4>
    </div>
</div>';
    }
}


function readbrand()
{


    global $connection;

    $selectquery = "select * from add_brand order by brand";

    $query = mysqli_query($connection, $selectquery);


    while ($result = mysqli_fetch_array($query)) {

        echo ' <li><a href="brand.php?id=' . $result['id'] . '"> ' . $result['brand'] . '</a></li>';
    }
}

function filterproduct()
{


    if (isset($_GET['id'])) {

        $user_id =  $_GET['id'];

        global $connection;



        $query  = "select * from add_product where category = $user_id ";
        $data = mysqli_query($connection, $query);


        while ($result = mysqli_fetch_array($data)) {



            echo '<div class="col-sm-4">
            <div class="product-image-wrapper">
                <div class="single-products">
                        <div class="productinfo text-center">
                            <a href="product_details.php?id=' . $result["id"] . '"><img src="admin/upload/' . $result['photo'] . '" alt="" /></a>
                            <h2>' . $result['price'] . '</h2>
                            <p>' . $result['name'] . '</p>
                            <a data-id=' . $result['id'] . ' name="cart" id="cart-btn" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                        </div>
                       <div class="product-overlay">
                            <div class="overlay-content">
                                <h2>' . $result['price'] . '</h2>
                                <p>' . $result['name'] . '</p>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                            </div>
                        </div>
                         <div class="product-overlay" >
                            <div class="overlay-content">
                            <a href="product_details.php?id=' . $result["id"] . '"><img src="admin/upload/' . $result['photo'] . '" alt="" /  style="opacity: 0;"></a>
                            <a data-id=' . $result['id'] . ' name="cart" id="cart-btn" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                            </div>
                        </div>
                </div>
                <div class="choose">
                    <ul class="nav nav-pills nav-justified">
                        <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                        <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
                    </ul>
                </div>
            </div>
        </div>';
        }
    }
}


function filterbrand()
{


    if (isset($_GET['id'])) {

        $user_id =  $_GET['id'];

        global $connection;



        $query  = "select * from add_product where brand = $user_id ";
        $data = mysqli_query($connection, $query);


        while ($result = mysqli_fetch_array($data)) {



            echo '<div class="col-sm-4">
    <div class="product-image-wrapper">
        <div class="single-products">
                <div class="productinfo text-center">
                    <a href="product_details.php?id=' . $result["id"] . '"><img src="admin/upload/' . $result['photo'] . '" alt="" /></a>
                    <h2>' . $result['price'] . '</h2>
                    <p>' . $result['name'] . '</p>
                    <a data-id=' . $result['id'] . ' name="cart" id="cart-btn" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                </div>
               <div class="product-overlay">
                    <div class="overlay-content">
                        <h2>' . $result['price'] . '</h2>
                        <p>' . $result['name'] . '</p>
                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                    </div>
                </div>
                 <div class="product-overlay" >
                    <div class="overlay-content">
                    <a href="product_details.php?id=' . $result["id"] . '"><img src="admin/upload/' . $result['photo'] . '" alt="" /  style="opacity: 0;"></a>
                    <a data-id=' . $result['id'] . ' name="cart" id="cart-btn" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                    </div>
                </div>
        </div>
        <div class="choose">
            <ul class="nav nav-pills nav-justified">
                <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
            </ul>
        </div>
    </div>
</div>';
        }
    }
}



function product_details()
{

    $user_id = $_GET['id'];

    global $connection;
    $query  = "select * from add_product where id = $user_id ";
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($result);

    echo '

    <div class="product-details"><!--product-details-->
    <div class="col-sm-5">
        <div class="view-product">
            <img src="admin/upload/' . $row['photo'] . '" />
            <h3>ZOOM</h3>
        </div>
        <div id="similar-product" class="carousel slide" data-ride="carousel">
            
             

              <!-- Controls -->
              <a class="left item-control" href="#similar-product" data-slide="prev">
                <i class="fa fa-angle-left"></i>
              </a>
              <a class="right item-control" href="#similar-product" data-slide="next">
                <i class="fa fa-angle-right"></i>
              </a>
        </div>

    </div>
    <div class="col-sm-7">
        <div class="product-information"><!--/product-information-->
            <img src="images/product-details/new.jpg" class="newarrival" alt="" />
            <h2>' . $row['name'] . '</h2>
            <p>Web ID: ' . $row['id'] . '</p>
            <img src="images/product-details/rating.png" alt="" />
            <span>
                <span>₹ ' . $row['price'] . '</span>
               
                <a data-id=' . $row['id'] . ' name="cart" id="cart-btn" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
            </span>
            <p><b>Availability:</b> In Stock</p>
            <p><b>Condition:</b> New</p>
            <p><b>Brand:</b> E-SHOPPER</p>
            <a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
        </div><!--/product-information-->
    </div>
</div>';
}

function search()
{

    if (isset($_GET['submit'])) {
        $search = $_GET['search'];
        global $connection;
        $str = mysqli_real_escape_string($connection, $search);
        $sql = "select *  from add_product where name like '%$str%' ";

        $query = mysqli_query($connection, $sql);
        $num = mysqli_num_rows($query);
        if ($num != 0) {
            while ($result = mysqli_fetch_array($query)) {

                echo '<div class="col-sm-4">
    <div class="product-image-wrapper">
        <div class="single-products">
                <div class="productinfo text-center">
                    <a href="product_details.php?id=' . $result["id"] . '"><img src="admin/upload/' . $result['photo'] . '" alt="" /></a>
                    <h2>' . $result['price'] . '</h2>
                    <p>' . $result['name'] . '</p>
                    <a data-id=' . $result['id'] . ' name="cart" id="cart-btn" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                </div>
               <div class="product-overlay">
                    <div class="overlay-content">
                        <h2>' . $result['price'] . '</h2>
                        <p>' . $result['name'] . '</p>
                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                    </div>
                </div>
                 <div class="product-overlay" >
                    <div class="overlay-content">
                    <a href="product_details.php?id=' . $result["id"] . '"><img src="admin/upload/' . $result['photo'] . '" alt="" /  style="opacity: 0;"></a>
                    <a data-id=' . $result['id'] . ' name="cart" id="cart-btn" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                    </div>
                </div>
        </div>
        <div class="choose">
            <ul class="nav nav-pills nav-justified">
                <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
            </ul>
        </div>
    </div>
</div>';
            }
        } else {
            echo "<h1>no data found</h1>";
        }
    }
}

function pagination()
{
    global $connection;

    $query = "select * from add_product";
    $result = mysqli_query($connection, $query);
    $num = mysqli_num_rows($result);
    $perpage = 5;

    $totalpage = ceil($num / $perpage);
    for ($id = 1; $id <= $totalpage; $id++) {

        echo '<li class="active"><a href="index.php?id=' . $id . '">' . $id . '</a></li>';
    }
}




function view_cart()
{

    global $connection;
    if (!empty($_SESSION['cart'])) {

        $gtotal = 0;
        $array = array_keys($_SESSION['cart']);

        //print_r($array);

        $astring = implode(',', $array);

        //print_r($astring);

        $query = "SELECT * FROM add_product WHERE id IN($astring)";
        $result = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_assoc($result)) {

            $total = $row['price'] * $_SESSION['cart'][$row['id']];
            $gtotal += $total;
            echo '
                            <tr>
							<td class="cart_product">
								<a href=""><img src="admin/upload/' . $row["photo"] . '" alt="" width="150" height="100"></a>
							</td>
							<td class="cart_description">
								<h4><a href="">' . $row["description"] . '</a></h4>
								<p>' . $row["id"] . '</p>
							</td>
							<td class="cart_price">
								<p>' . $row["price"] . '</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									
									<input id="change_cart" class="cart_quantity_input" type="text"
                                    pro-id="' . $row['id'] . '" name="quantity"  value="' . $_SESSION['cart'][$row['id']] . '" autocomplete="off" size="2">
								
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">' . $total . '</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="" data-id=' . $row['id'] . '><i class="fa fa-times" ></i></a>
							</td>
						</tr>';
        }
    }
}

function checkout()
{
    if (isset($_POST['submit'])) {
        global $connection;
        $array = ($_SESSION['cart']);
        $product = json_encode($array);
        $user_id = $_SESSION['id'];
        $address = $_POST['address'];
        $number = $_POST['number'];

        $data = "INSERT INTO bil(user_id,product,address,number)values('$user_id','$product','$address','$number')";

        $query = mysqli_query($connection, $data);
        if ($query) {
            echo '<script>alert("oder placed")</script>';
            unset($_SESSION['cart']);
            header("Location: index.php"); 

        } else {

            echo '<script>alert("try again")</script>';
        }
    }
}

?>

<script>
    function cart() {

        $(document).on("click", ".add-to-cart", function() {


            var userid = $(this).attr("data-id");
            // alert(userid);

            $.ajax({
                url: "cart.php",
                type: "POST",
                data: {
                    id: userid
                },
                success: function(data) {

                    $("#cat").text(data);
                    alert(data);

                }
            })

        })
    }
</script>


<?php

function related_producrt()
{
    $user_id = $_GET['id'];
    global $connection;
    $query = "select * from add_product where id='$user_id'";
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($result);
    $brand_id = $row['brand'];
    $query1 = "select * from add_product where brand='$brand_id' order by id desc limit 1,3";
    $result1 = mysqli_query($connection, $query1);
    while ($row1 = mysqli_fetch_assoc($result1)) {


        echo '
    
                                   <div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="admin/upload/' . $row1['photo'] . '" alt="" />
													<h2>' . $row1['price'] . '</h2>
													<p>Easy Polo Black Edition</p>
                                                    <a data-id=' . $row1['id'] . ' name="cart" id="cart-btn" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												</div>
											</div>
										</div>
									</div>
    
    
    
    
    ';
    }
}

function related_producrt1()
{
    $user_id = $_GET['id'];
    global $connection;
    $query = "select * from add_product where id='$user_id'";
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($result);
    $category_id = $row['category'];
    $query1 = "select * from add_product where category='$category_id' order by id desc limit 1,3";
    $result1 = mysqli_query($connection, $query1);
    while ($row1 = mysqli_fetch_assoc($result1)) {


        echo '

    <div class="col-sm-4">
            <div class="product-image-wrapper">
                <div class="single-products">
                    <div class="productinfo text-center">
                        <img src="admin/upload/' . $row1['photo'] . '" alt="" />
                        <h2>' . $row1['price'] . '</h2>
                        <p>Easy Polo Black Edition</p>
                        <a data-id=' . $row1['id'] . ' name="cart" id="cart-btn" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                    </div>
                </div>
            </div>
        </div>

    
    
    
    ';
    }
}
?>