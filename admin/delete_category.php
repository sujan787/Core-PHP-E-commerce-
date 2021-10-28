<?php
$conn = mysqli_connect('localhost', 'root', '', 'grocery'); 

if(isset($_GET['id'])){
	
	$id = $_GET['id'];

	$query = "DELETE FROM add_category WHERE id = $id ";
    
    $result = mysqli_query($conn, $query);
    if(!$result) {
     die("QUERY FAILED" . mysqli_error($conn));    
    }else {
    
     
    header('location:view_category.php');
    
    }

}

?>