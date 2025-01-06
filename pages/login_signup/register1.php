<?php

    include '../../connection/root_user.php';

    $role = $_POST['role'];
    $username = $_POST['uname'];
    $firstName = $_POST['fname'];
    $lastName = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['pword'];
    $mobileNo = $_POST['mobileno'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];


    $stmt = $conn->prepare("SELECT * FROM user WHERE username = ? OR email = ? OR mb_no = ?");
    $stmt->bind_param("ssi", $username, $email, $mobileNo);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<script>alert('Error: Username, email, or mobile number already exists.');</script>";
    } else {

        $stmt = $conn->prepare("SELECT MAX(user_id) as max_id FROM user");
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        

        $newUserId = isset($row['max_id']) ? $row['max_id'] + 1 : 1; // Start from 1 if no users exist


        $stmt = $conn->prepare("INSERT INTO user (user_id, username, first_name, last_name, email, password, mb_no, dob, gender, user_status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("isssssssss", $newUserId, $username, $firstName, $lastName, $email, $password, $mobileNo, $dob, $gender, $role);

        if ($stmt->execute()) {

            if ($role === 'Student') {
                $stuId = 'S' . str_pad($newUserId, 3, '0', STR_PAD_LEFT);
                $stmt = $conn->prepare("INSERT INTO student (stu_id, user_id, stu_username, stu_first_name, stu_last_name, stu_email, stu_password, stu_mb_no, stu_dob, stu_gender) 
                                        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                $stmt->bind_param("ssssssssss", $stuId, $newUserId, $username, $firstName, $lastName, $email, $password, $mobileNo, $dob, $gender);
            
            } elseif ($role === 'Lecturer') {
                $lecId = 'L' . str_pad($newUserId, 3, '0', STR_PAD_LEFT);
                $stmt = $conn->prepare("INSERT INTO lecturer (lect_id, user_id, lect_username, lect_first_name, lect_last_name, lect_email, lect_password, lect_mb_no, lect_dob, lect_gender) 
                                        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                $stmt->bind_param("ssssssssss", $lecId, $newUserId, $username, $firstName, $lastName, $email, $password, $mobileNo, $dob, $gender);
            }


            if ($stmt->execute()) {
                echo "<script>alert('Registration successful!');</script>";
                echo "<script>window.location.href = '../../home_page.php';</script>";
            } else {
                echo "<script>alert('Error inserting into the student/lecturer table: " . $stmt->error . "');</script>";
            }
        } else {
            echo "<script>alert('Error inserting into user table: " . $stmt->error . "');</script>";
        }
    }


    $stmt->close();
    $conn->close();

?>