<?php

    $lect_conn = mysqli_connect('localhost','lecturer_user','lecturer123','fot_lms');

    if ($lect_conn ->connect_error) {
        die("Connection  failed: " . $conn->connect_error);
        exit();
    }

?>