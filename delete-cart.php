<?php

session_start();

if(isset($_POST['da'])){
    $id=$_POST['da'];
unset($_SESSION['cart'][$id]);
}
?>