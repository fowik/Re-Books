<?php 
    $conn = new mysqli('localhost', 'root', '', 're-books');

    /* Set the desired charset after establishing a connection */
    $conn->set_charset('utf8mb4');

    //printf("Success... %s\n", $conn->host_info);
?>
