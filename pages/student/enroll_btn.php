<?php

    include '../../connection/lecturer_user.php';

    $cour_code = mysqli_real_escape_string($conn, $_POST['cour_code']);
    $stu_id = mysqli_real_escape_string($conn, $_POST['stu_id']);

    $sql = "INSERT INTO stu_course (cour_code, stu_id) VALUES ('$cour_code', '$stu_id')";//VALUES ($cour_code, $stu_id)

    if (mysqli_query($conn, $sql)) {
        header("Location: Student _Register_course.php?status=success");
        exit();
    } else {
        // Log error for debugging
        error_log("MySQL Error: " . mysqli_error($conn));
        header("Location: Student _Register_course.php?status=error");
        exit();
    }


    // Close connection
    mysqli_close($conn);
?>