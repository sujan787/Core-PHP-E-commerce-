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



    $product_name = $_POST['name'];
    $product_price = $_POST['price'];
    $product_description = $_POST['description'];
    $product_category = $_POST['category'];
    $product_brand = $_POST['brand'];
    $image =  $_FILES['photo']['name'];

    $image_tmp =  $_FILES['photo']['tmp_name'];





    global $connection;

    if ($connection) {





        $target_dir = "upload/";

        move_uploaded_file($image_tmp, $target_dir . $image);

        $data = "INSERT INTO add_product(name,price,description,category,brand,photo)values('$product_name','$product_price','$product_description','$product_category','$product_brand','$image')";
        $query = mysqli_query($connection, $data);

        if ($query) {
            header('location:add-products.php');
        } else {


            echo mysqli_error($query);
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

function show_brand()
{

    global $connection;
    $query = "SELECT * FROM add_brand";
    $result = mysqli_query($connection, $query);
    if (!$result) {
        die('Query FAILED');
    }

    while ($row = mysqli_fetch_assoc($result)) {




        echo ' <option value=' . $row['id'] . '>' . $row['brand'] . '</option>';
    }
}



function view_product()
{

    global $connection;

    $selectquery = "SELECT add_product.id,add_product.name,add_product.price,
    add_product.description,add_category.category,add_brand.brand,add_product.photo
    FROM add_product
    INNER JOIN add_category ON add_product.category=add_category.id
    INNER JOIN add_brand ON add_product.brand=add_brand.id";

    $query = mysqli_query($connection, $selectquery);


    while ($result = mysqli_fetch_array($query)) {
?>

        <tr>
            <td><?php echo $result['id']; ?></td>
            <td><?php echo $result['name']; ?></td>
            <td><?php echo $result['price']; ?></td>
            <td><?php echo $result['description']; ?></td>
            <td><?php echo $result['category']; ?></td>
            <td><?php echo $result['brand']; ?></td>
            <td><img src="<?php echo "upload/" . $result['photo']; ?>" width="150" height="100"></td>
            <td flex-direction="row-reverse"><a href="update.php?id=<?php echo $result["id"]; ?>">Edit</a></td>
            <td flex-direction="row-reverse"><a href="delete.php?id=<?php echo $result["id"]; ?>">Delete</a></td>
        </tr>
    <?php

    }
}
function view_user_details()
{

    global $connection;

    $selectquery = "select * from user_details";

    $query = mysqli_query($connection, $selectquery);


    while ($result = mysqli_fetch_array($query)) {
    ?>

        <tr>
            <td><?php echo $result['id']; ?></td>
            <td><?php echo $result['name']; ?></td>
            <td><?php echo $result['email']; ?></td>
            <td><?php echo $result['number']; ?></td>
            <td><?php echo $result['password']; ?></td>


        </tr>

    <?php

    }
}

function update_product()
{
}

function view_category()
{

    global $connection;

    $selectquery = "select * from add_category";

    $query = mysqli_query($connection, $selectquery);


    while ($result = mysqli_fetch_array($query)) {
    ?>

        <tr>


            <td><?php echo $result['id']; ?></td>
            <td><?php echo $result['category']; ?></td>


            <td flex-direction="row-reverse"><a href="update_category.php?id=<?php echo $result["id"]; ?>">Edit</a></td>
            <td flex-direction="row-reverse"><a href="delete_category.php?id=<?php echo $result["id"]; ?>">Delete</a></td>


        </tr>

    <?php

    }
}

function store_brands()
{



    if (isset($_POST['submit'])) {

        $brand = $_POST['brand'];

        global $connection;

        if ($connection) {

            $data = "INSERT INTO add_brand(brand)values('$brand')";
            $query = mysqli_query($connection, $data);

            if ($query) {
                header('location:add-brand.php');
            } else {


                echo '<script>alert("try again")</script>';
            }
        } else {

            die("connection faild");
        }
    }
}

function view_brand()
{

    global $connection;

    $selectquery = "select * from add_brand";

    $query = mysqli_query($connection, $selectquery);


    while ($result = mysqli_fetch_array($query)) {
    ?>

        <tr>


            <td><?php echo $result['id']; ?></td>
            <td><?php echo $result['brand']; ?></td>


            <td flex-direction="row-reverse"><a href="update_brand.php?id=<?php echo $result["id"]; ?>">Edit</a></td>
            <td flex-direction="row-reverse"><a href="delete_brand.php?id=<?php echo $result["id"]; ?>">Delete</a></td>


        </tr>

<?php

    }
}


function view_order()
{



    global $connection;

    $selectquery = "SELECT bil.id,user_details.name,bil.product,
    bil.address,bil.number
    FROM bil
    INNER JOIN user_details ON bil.user_id=user_details.id";




    $query = mysqli_query($connection, $selectquery);


    while ($result = mysqli_fetch_array($query)) {

        echo '
        <tr>


            <td> ' . $result['id'] . '</td>
            <td> ' . $result['name'] . '</td>
            <td><a href="product.php?id=' . $result['id'] . '">click herer</a></td>
            <td> ' . $result['address'] . '</td>
            <td> ' . $result['number'] . '</td>


        </tr>';
    }
}

function pro()
{

    global $connection;
    $id = $_GET['id'];
    $query = "select * from bil where id='$id'";
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($result);
    $product = $row['product'];
    $product_details = json_decode($product, true);

    $array = array_keys($product_details);
    $values = array_values($product_details);

    $astring = implode(',', $array);
    $query1 = "SELECT * FROM add_product WHERE id IN($astring)";
    $result1 = mysqli_query($connection, $query1);


    foreach ($values as $val) {


        while ($row1 = mysqli_fetch_assoc($result1)) {

            $gtotal = $row1['price'] * $val;
            echo '
        <tr>

       
            <td> ' . $row1['name'] . '</td>
            <td> ' . $row1['price'] . '</td>
           
           
            <td> ' . $val . '</td>
            <td> ' . $gtotal . '</td>
            <td><img src=" upload/' . $row1['photo'] . '" width="150" height="100"></td>


        </tr>';
            break;
        }
    }
}

?>