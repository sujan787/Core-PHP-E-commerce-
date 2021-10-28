<?php
include 'db.php';


$name = mysqli_real_escape_string($connection, $_POST['name']);
$email = mysqli_real_escape_string($connection, $_POST['email']);
$number = mysqli_real_escape_string($connection, $_POST['number']);
$pass = mysqli_real_escape_string($connection, $_POST['password']);
$password = password_hash($pass, PASSWORD_BCRYPT);

$email_query = "select * from user_details where email='$email'";
$email_result = mysqli_query($connection, $email_query);
$email_num = mysqli_num_rows($email_result);
if ($email_num > 0) {
    echo 0;
} else {

    if ($connection) {

        $data = "INSERT INTO user_details(name,email,number,password)values('$name','$email','$number','$password')";
        $query = mysqli_query($connection, $data);

        if ($query) {
            echo "1";
        } else {


            echo "2";
        }
    } else {
        echo "connection faild";
    }
}
