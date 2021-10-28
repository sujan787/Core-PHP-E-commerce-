<?php
session_start();
include 'db.php';
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = mysqli_real_escape_string($connection, $_POST['password']);



    $query = "select * from user_details where email='$email'";

    $result = mysqli_query($connection, $query);
    $num = mysqli_num_rows($result);

    if ($num) {

        $row = mysqli_fetch_assoc($result);
        $pass = $row['password'];
        echo $pass;
        echo "<br/>";


        // $password1= password_hash($password, PASSWORD_BCRYPT);

        //  echo $password;
        // echo "<br/>";

        $_SESSION['name']=$row['name'];
        $_SESSION['id']=$row['id'];
        $pass_decode = password_verify($password, $pass);
        echo $pass_decode;

        if ($pass_decode) {
if(!isset($_SESSION['cart'])){
    header('location:index.php');
}else{
    header('location:checkout.php'); 
}
          
        } else {
            ?>
           <script>
           alert("wrong password");

           location.replace("login.php");
           
           </script>
           <?php
        }
    } else {
         echo '<script>alert("wrong email")</script>';
    }
}
