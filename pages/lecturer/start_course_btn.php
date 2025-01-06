<?php

    session_start();
    include '../../connection/lecturer_user.php';

    $uids = $_SESSION['user_id'];

    $cour_code = mysqli_real_escape_string($lect_conn, $_POST['cour_code']);
    $lect_id = $_SESSION['lect_id'];

    $sql3 = "SELECT lect_id FROM lecturer WHERE user_id =  '$uids'";
    $result3 = $lect_conn->query($sql3);
    $uid = mysqli_fetch_assoc($result3);
    $uidr =  $uid['lect_id'];

    $_SESSION['lect_id'] = $uidr;



    $sql = "INSERT INTO lect_course (cour_code, lect_id) VALUES ('$cour_code','$lect_id')";

    if (mysqli_query($lect_conn, $sql)) {
        header("Location: lecturer_register_course.php?status=success");
        exit();
    } else {

        error_log("MySQL Error: " . mysqli_error($lect_conn));
        header("Location: lecturer_register_course.php?status=error");
        exit();
    }


    mysqli_close($lect_conn);
?>