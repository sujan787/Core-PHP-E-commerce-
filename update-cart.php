<?php
include('db.php');
session_start();

function view_cart()
{

    global $connection;
    if(!empty($_SESSION['cart'])){

        $gtotal = 0;
    $array = array_keys ($_SESSION['cart']);
    
    //print_r($array);
    
    $astring = implode(',', $array);
    
    //print_r($astring);

    $query = "SELECT * FROM add_product WHERE id IN($astring)";
        $result = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_assoc($result)) {

            $total = $row['price']*$_SESSION['cart'][$row['id']];
            $gtotal += $total;
            echo '
                            <tr>
							<td class="cart_product">
								<a href=""><img src="admin/upload/'.$row["photo"].'" alt="" width="150" height="100"></a>
							</td>
							<td class="cart_description">
								<h4><a href="">'.$row["description"].'</a></h4>
								<p>'.$row["id"].'</p>
							</td>
							<td class="cart_price">
								<p>' .$row['price'] . '</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									
									<input id="change_cart" class="cart_quantity_input" type="text"
                                    pro-id="'.$row['id'].'" name="quantity"  value="'.$_SESSION['cart'][$row['id']].'" autocomplete="off" size="2">
								
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">'.$total.'</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>
							</td>
						</tr>';
        }
    }
}





if(isset($_POST['b'])){
    $id = $_POST['a'];
    $qty = $_POST['b'];

    if(array_key_exists($id,$_SESSION['cart'])){
        $_SESSION['cart'][$id]= $qty;
        echo view_cart();
    }
  
    
}









?>