<?php
    $conn = mysqli_connect("localhost", "root", "", "PG-Finder");
    
    if(mysqli_connect_errno()){
        echo "Connection Error: ".mysqli_connect_error();
        return;
    }
?>
