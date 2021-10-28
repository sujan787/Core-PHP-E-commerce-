<?php

include 'db.php';

if(isset($_POST['submit'])){

$category=$_POST['category'];
$price=$_POST['price'];


if($conn){

$data="INSERT INTO pagedata(category,price)values('$category','$price')";
$query=mysqli_query($conn,$data);

if($query){
    header('location:add-category.php');


}else{


    echo'<script>alert("try again")</script>';
}



}else{

    die("connection faild");
}





}




?>