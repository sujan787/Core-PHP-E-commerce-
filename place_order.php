<?php

include 'db.php';
session_start();

if(!isset($_SESSION['name'])){
    header('location:login.php');
}else{

    header('location:checkout.php');

}





?>