<?php
session_start();
if(isset($_SESSION['name'])){
session_destroy();
    ?>

    <script>
    
    location.replace("login.php");
    
    </script>


    <?php
}


?>