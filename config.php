<?php
    $conn = new mysqli("localhost", "root", "", "webtech");
    if($conn-> connect_error)
    {
        die("Connection Failed!!!".$conn->connect_error);
    }
?>