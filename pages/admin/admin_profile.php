<?php

    session_start();

    include '../../connection/admin_user.php';

    $admin_profile = "SELECT * FROM user WHERE username = 'admin'";
    $result = mysqli_query($adm_conn, $admin_profile);
    $fetch_result = mysqli_fetch_assoc($result);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $first_name = mysqli_real_escape_string($adm_conn, $_POST['first_name']);
        $last_name = mysqli_real_escape_string($adm_conn, $_POST['last_name']);
        $email = mysqli_real_escape_string($adm_conn, $_POST['email']);
        $password = mysqli_real_escape_string($adm_conn, $_POST['password']); // Apply hashing in production
        $mb_no = mysqli_real_escape_string($adm_conn, $_POST['mb_no']);
        $dob = mysqli_real_escape_string($adm_conn, $_POST['dob']);
        $gender = mysqli_real_escape_string($adm_conn, $_POST['gender']);


        $update_user = "UPDATE user SET 
            first_name = '$first_name', 
            last_name = '$last_name', 
            email = '$email', 
            password = '$password', 
            mb_no = '$mb_no', 
            dob = '$dob', 
            gender = '$gender'
            WHERE username = 'admin'";

        $username = $_SESSION['username'];

        $update_admin = "UPDATE admin SET 
            adm_first_name = '$first_name', 
            adm_last_name = '$last_name', 
            adm_email = '$email', 
            adm_password = '$password', 
            adm_mb_no = '$mb_no', 
            adm_dob = '$dob', 
            adm_gender = '$gender'
            WHERE adm_username = '$username'";


        $user_updated = mysqli_query($adm_conn, $update_user);
        $admin_updated = mysqli_query($adm_conn, $update_admin);


        if ($user_updated && $admin_updated) {
            header("Location: admin_profile.php");
            exit;
        } else {
            echo "<p class='text-danger'>Error updating profile: " . mysqli_error($adm_conn) . "</p>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Profile</title>
    <link rel="stylesheet" href="../../css/style2.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar d-flex flex-column align-items-center">
        <div class="profile">
            <img src="../../img/admin_profile.png" alt="Profile" class="profile-pic">
            <h2><?php echo $_SESSION['username'] ?></h2>
            <h6 class="stu-name">ADMIN</h6>
            <a href="admin_profile.php">
            <button class="btn btn-primary">View Profile</button>
            </a>
        </div>
        <ul class="nav flex-column nav-links w-100 px-3">
            <li class="nav-item"><a href="admin_course_view.php" class="nav-link">Course</a></li>
            <li class="nav-item"><a href="admin_lecturer.php" class="nav-link">Lecturer</a></li>
            <li class="nav-item"><a href="admin_student.php" class="nav-link">Student</a></li>
            <li class="nav-item"><a href="../../logout.php" class="nav-link">Logout</a></li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="head-content">
        <div class="main-content">
            <h2 class="text-center">Admin Profile</h2>
            <hr>
            <form action="" name="adminprofile" method="POST">
                <table class="w-50 mb-4">
                    <?php 

                        $fields = [
                            "first_name" => "First name",
                            "last_name" => "Last Name",
                            "email" => "Email",
                            "password" => "Password",
                            "mb_no" => "Mobile number",
                            "dob" => "Date of Birth",
                            "gender" => "Gender"
                        ];
                        foreach ($fields as $field => $label) {
                            echo "
                            <tr class='mb-3'>
                                <th><label for='{$field}'>{$label}</label></th>
                                <td class='form-control'>
                                    <span class='view-mode'>{$fetch_result[$field]}</span>
                                    <input type='text' name='{$field}' class='edit-mode form-control' value='{$fetch_result[$field]}' style='display:none;'>
                                </td>
                                <td class='form-control border-0'></td>
                            </tr>
                            ";
                        }
                    ?>
                    <tr class="mb-3">
                        <th colspan="2" class="pt-4">
                            <input type="button" value="Edit" class="btn btn-success" id="editBtn" onclick="toggleEditMode()">
                            <input type="submit" value="Save" class="btn btn-primary" id="saveBtn" style="display:none;">
                        </th>
                    </tr>                       
                </table>
            </form>
        </div>
    </div>

    <script>
        function toggleEditMode() {
            document.querySelectorAll('.view-mode').forEach(el => el.style.display = 'none');
            document.querySelectorAll('.edit-mode').forEach(el => el.style.display = 'block');
            document.getElementById('editBtn').style.display = 'none';
            document.getElementById('saveBtn').style.display = 'inline-block';
        }
    </script>
</body>
</html>