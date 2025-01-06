<?php

    $conn = mysqli_connect('localhost','root','','fot_lms');

    if ($conn ->connect_error) {
        die("Connection  failed: " . $conn->connect_error);
        exit();
    }

?>