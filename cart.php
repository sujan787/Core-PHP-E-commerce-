<?php

session_start();

if(isset($_POST['id'])){
    
   $id = $_POST['id'];
    
    $qty = 1;
//create session array

    if(!isset($_SESSION['cart'])){

    $_SESSION['cart']= array();
    $_SESSION['cart'][$id]= $qty;
    }
  
    else{
        if(!array_key_exists($id,$_SESSION['cart'])){
        $_SESSION['cart'][$id]= $qty;
        }
        
        else{
              "already added";
        }

    }
       
    echo count($_SESSION['cart']);
}

?>