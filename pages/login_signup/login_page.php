<?php
    session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../../css/bootstrap.css">
    <link rel="stylesheet" href="../../css/login_style.css">
    <script  src="../../js/jquery-3.7.1.min.js"></script>

<body class="bg-light">


    <div class="background-blur"></div>

    <div class="square-box"></div>


    <div class="container d-flex justify-content-center align-items-center mid-div">
        <div style="width: 100%; max-width: 400px; z-index: 1;">
            <h2 class="text-center mb-4">Login</h2>
            <form name="loginform" method = "POST" action="">
                <div class="mb-3">
                    <label for="username">Username</label>
                    <input type="text" name="uname" class="form-control" id="username" placeholder="Enter username">
                </div>
                <div class="mb-3">
                    <label for="password">Password</label>
                    <div class="d-flex bg-white">
                        <input type="password" name="pword" class="form-control" id="password" placeholder="Enter password (8-16 characters)">
                        <img src="../../img/eye.png" alt="eye" id="eye" style="width: 30px; height: 30px; padding-right: 10px;">
                    </div>

                </div>
                <input type="submit" value="Login" class="btn btn-primary w-100">
            </form>

            <?php

                include '../../connection/root_user.php';

                $_SESSION['errorMessage']  = '';

                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $uname = mysqli_real_escape_string($conn, $_POST['uname']);
                    $pword = mysqli_real_escape_string($conn, $_POST['pword']);

                    if (!empty($uname) || !empty($pword)) {
                        $uname_qry = "SELECT user_id, username, password FROM user WHERE username = '$uname'";
                        $run_uname_qry = mysqli_query($conn, $uname_qry);

                        if ($run_uname_qry) {
                            $fetch_qry = mysqli_fetch_assoc($run_uname_qry);

                            if ($fetch_qry) {
                                if ($fetch_qry['password'] === $pword) {
                                    $status = "SELECT  user_status AS status FROM user WHERE username = '$uname'";
                                    $run_status_qry = mysqli_query($conn, $status);
                                    $fetch_status = mysqli_fetch_assoc($run_status_qry);

                                    if ($fetch_status['status'] === 'Student') {
                                        $_SESSION['username'] = $uname;
                                        $_SESSION['user_id'] = $fetch_qry['user_id'];
                                        header("Location: ../student/student_home.php");
                                        exit();
                                    }elseif ($fetch_status['status'] === 'Lecturer') {
                                        $_SESSION['username'] = $uname;
                                        $_SESSION['user_id'] = $fetch_qry['user_id'];
                                        header("Location: ../lecturer/lecturer_home.php");
                                        exit();
                                    }elseif ($fetch_status['status'] === 'admin') {
                                        $_SESSION['username'] = $uname;
                                        $_SESSION['user_id'] = $fetch_qry['user_id'];
                                        header("Location: ../admin/admin_profile.php");
                                        exit();
                                    }else{
                                        $_SESSION['errorMessage'] = "Invalid User";
                                    }

                                } else {
                                    $_SESSION['errorMessage'] = "Invalid password!";
                                }
                            } else {
                                $_SESSION['errorMessage'] = "Username not found!";
                            }
                        } else {
                            $_SESSION['errorMessage'] = "Error in query execution!";
                        }
                    } else {
                        $_SESSION['errorMessage'] = "Please enter username or password!";
                    }
                }
            ?>


            <div id="errorMessage" class="text-center alert-danger mt-3">
                <?php
                    echo $_SESSION['errorMessage'];
                    unset($_SESSION['errorMessage']); 
                ?>
            </div>

        </div>
    </div>

    <div class="square-box"></div>


    <script>
            $(document).ready(function () {
                $('#eye').click(function () {
                    let passwordField = $('#password');
                    let eyeicon = $(this);

                    if (passwordField.attr('type') === 'password') {
                        passwordField.attr('type', 'text');
                        eyeicon.attr('src' , '../../img/hide.png');
                    }else{
                        passwordField.attr('type' , 'password');
                        eyeicon.attr('src', '../../img/eye.png');
                    }
                });
            });
    </script>

</body>
</html>
