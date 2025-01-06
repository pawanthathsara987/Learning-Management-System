<?php

    session_start();

    INCLUDE "../../connection/admin_user.php";  
    
    if(isset($_GET['delete_id'])){
        $delete_id = $_GET['delete_id'];
        $stu_id_query = "SELECT stu_id FROM student WHERE user_id = '$delete_id'";
        $stu_id =  mysqli_query($adm_conn, $stu_id_query);
        $result =  mysqli_fetch_assoc($stu_id);
        $stu_id_r = $result['stu_id'];
        $delete_stu_course = "DELETE FROM stu_course WHERE stu_id = '$stu_id_r'";
        $delete_student = "DELETE FROM student WHERE user_id = '$delete_id'";
        $delete_user = "DELETE FROM user WHERE user_id = '$delete_id'";
        mysqli_query($adm_conn, $delete_stu_course);
        mysqli_query($adm_conn, $delete_student);
        mysqli_query($adm_conn, $delete_user);
        header("Location: admin_student.php");
        exit();
    }

    $edit_data = null;
    if(isset($_GET['edit_id'])){
        $edit_id = $_GET['edit_id'];
        $edit_student = "SELECT * FROM student WHERE user_id = '$edit_id'";
        $query = mysqli_query($adm_conn, $edit_student);
        $edit_data = mysqli_fetch_array($query);
    }
    
    if (isset($_POST['save'])) {
        $stu_id = $_POST['stu_id'];
        $username = $_POST['stu_username'];
        $first_name = $_POST['stu_first_name'];
        $last_name = $_POST['stu_last_name'];
        $email = $_POST['stu_email'];
        $password = $_POST['stu_password'];
        $mobile_no = $_POST['stu_mb_no'];
        $dob = $_POST['stu_dob'];
        $gender = $_POST['stu_gender'];

        $update_user = "UPDATE user SET
                                        username = '$username',
                                        first_name = '$first_name',
                                        last_name = '$last_name',
                                        email = '$email',
                                        password = '$password',
                                        mb_no = '$mobile_no',
                                        dob = '$dob',
                                        gender = '$gender',
                                        user_status = 'student'

                                        WHERE user_id = '$edit_id'";
    
        $update_student = "UPDATE student SET 
                            stu_username='$username',
                            stu_first_name='$first_name', 
                            stu_last_name='$last_name', 
                            stu_email='$email',
                            stu_password='$password', 
                            stu_mb_no='$mobile_no', 
                            stu_dob='$dob', 
                            stu_gender='$gender'

                            WHERE user_id = '$edit_id'";
        mysqli_query($adm_conn, $update_user);
        mysqli_query($adm_conn, $update_student);
        header("Location: admin_student.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../css/style2.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    
    <div class="sidebar d-flex flex-column align-items-center">
        <div class="profile">
            <img src="../../img/admin_profile.png" alt="Profile" class="profile-pic w-100">
            <h2><?php echo $_SESSION['username'] ?></h2>
            <h6 class="stu-name">ADMIN</h6>
            <a href="admin_profile.php">
            <button class="btn btn-primary">View Profile</button>
            </a>
        </div>
        <ul class="nav flex-column nav-links w-100 px-3">
            <li class="nav-item">
                <a href="admin_course_view.php" class="nav-link">Courses</a>
            </li>
            <li class="nav-item">
                <a href="admin_lecturer.php" class="nav-link">Lecturer</a>
            </li>
            <li class="nav-item active">
                <a href="admin_student.php" class="nav-link">Student</a>
            </li>
            <li class="nav-item">
                <a href="../../logout.php" class="nav-link">Logout</a>
            </li>
        </ul>
    </div>

    <div class="head-content">
        <header class="d-flex justify-content-center align-content-center mb-4">
            <input type="text" placeholder="Serach Courses...." class="form-control w-25">
        </header>
        <div class="main-content">
            <h2 class="d-flex justify-content-center align-content-center">
                Student Information
            </h2>
            <?php

            $get_students = "SELECT stu_id, user_id,stu_username,stu_first_name, stu_last_name, stu_email, stu_password,stu_mb_no,stu_dob, stu_gender FROM student;";
            $result = mysqli_query($adm_conn,$get_students);

            if(mysqli_num_rows($result) > 0){
                echo "<table id='dataTable'>";
                   echo "<thead>";
                       echo "<tr>";
                           echo "<th>ID</th>";
                           echo "<th>User ID</th>";
                           echo "<th>Username</th>";
                           echo "<th>First Name </th>";  
                           echo "<th>Last Name</th>";
                           echo "<th>Email</th>";
                           echo "<th>Password</th>";
                           echo "<th>Mobile Number</th>";
                           echo "<th>DOB</th>";
                           echo "<th>Gender</th>";
                           echo "<th>Actions</th>";
                      echo "</tr>";
        
            while($fetch_data = mysqli_fetch_assoc($result)){
                echo "<tr>";
                    echo "<td>".$fetch_data['stu_id']."</td>";
                    echo "<td>".$fetch_data['user_id']."</td>";
                    echo "<td>".$fetch_data['stu_username']."</td>";
                    echo "<td>".$fetch_data['stu_first_name']."</td>";
                    echo "<td>".$fetch_data['stu_last_name']."</td>";
                    echo "<td>".$fetch_data['stu_email']."</td>";
                    echo "<td>".$fetch_data['stu_password']."</td>";
                    echo "<td>".$fetch_data['stu_mb_no']."</td>";
                    echo "<td>".$fetch_data['stu_dob']."</td>";
                    echo "<td>".$fetch_data['stu_gender']."</td>";
                    echo "<td>
                            <a href='?edit_id=" . $fetch_data['user_id'] . "' class='btn btn-sm btn-primary'>Edit</a>
                            <a href='?delete_id=" . $fetch_data['user_id'] . "' class='btn btn-sm btn-danger' onclick='return confirm(\"Are you sure you want to delete?\")'>Delete</a>
                        </td>";

                echo "</tr>";
            }
                echo "</thead>"; 
                echo "</table>";
            }else {
                echo "<p class='text-center'>No student records found.</p>";
            }
            ?>

<?php if (isset($edit_data)): ?>
                <div class="card my-4">
                    <div class="card-header bg-primary text-white">Edit Student Information</div>
                    <div class="card-body">
                        <form action="" method="post">
                            <input type="hidden" name="stu_id" value="<?php echo $edit_data['stu_id']; ?>">

                            <div class="mb-3">
                                <label class="form-label">Username</label>
                                <input type="text" name="stu_username" class="form-control" value="<?php echo $edit_data['stu_username']; ?>">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">First Name</label>
                                <input type="text" name="stu_first_name" class="form-control" value="<?php echo $edit_data['stu_first_name']; ?>">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Last Name</label>
                                <input type="text" name="stu_last_name" class="form-control" value="<?php echo $edit_data['stu_last_name']; ?>">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" name="stu_email" class="form-control" value="<?php echo $edit_data['stu_email']; ?>">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="text" name="stu_password" class="form-control" value="<?php echo $edit_data['stu_password']; ?>">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Mobile Number</label>
                                <input type="text" name="stu_mb_no" class="form-control" value="<?php echo $edit_data['stu_mb_no']; ?>">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">DOB</label>
                                <input type="text" name="stu_dob" class="form-control" value="<?php echo $edit_data['stu_dob']; ?>">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Gender</label>
                                <input type="text" name="stu_gender" class="form-control" value="<?php echo $edit_data['stu_gender']; ?>">
                            </div>

                            <button type="submit" name="save" class="btn btn-success">Save</button>
                            <a href="admin_student.php" class="btn btn-secondary">Cancel</a>
                        </form>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>