<?php 
    $conn = mysqli_connect("localhost:3306", "root", "password", "Re-Books");

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    echo "connected";
?>