<?php

    session_start();

    include '../../connection/student_user.php';
    include '../../connection/admin_user.php';

    $user_id = $_SESSION['user_id'];
    $username = $_SESSION['username'];
    $sql = "SELECT * FROM student WHERE user_id = '$user_id'";
    $result = $stu_conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "No data found.";
        echo $_SESSION['user_id'];
        exit();
    }

    if (isset($_POST['save_changes'])) {
        $stu_username = $_POST['stu_username'];
        $stu_first_name = $_POST['stu_first_name'];
        $stu_last_name = $_POST['stu_last_name'];
        $stu_email = $_POST['stu_email'];
        $stu_password = $_POST['stu_password'];
        $stu_mb_no = $_POST['stu_mb_no'];
        $stu_dob = $_POST['stu_dob'];
        $stu_gender = $_POST['stu_gender'];

        $update_student = "UPDATE student SET 
                    stu_username='$stu_username', 
                    stu_first_name='$stu_first_name', 
                    stu_last_name='$stu_last_name', 
                    stu_email='$stu_email', 
                    stu_password='$stu_password', 
                    stu_mb_no='$stu_mb_no', 
                    stu_dob='$stu_dob', 
                    stu_gender='$stu_gender' 
                    WHERE user_id='$user_id'";


        $update_user = "UPDATE user SET 
                    username='$stu_username', 
                    first_name='$stu_first_name', 
                    last_name='$stu_last_name', 
                    email='$stu_email', 
                    password='$stu_password', 
                    mb_no='$stu_mb_no', 
                    dob='$stu_dob', 
                    gender='$stu_gender' 
                    WHERE user_id = '$user_id'";

        if ($stu_conn->query($update_student) === TRUE && $adm_conn->query($update_user) === TRUE) {
            echo "<div class='alert alert-success text-center'>Record updated successfully!</div>";
            header("Location: student_profile.php");
        } else {
            echo "Error updating record: " . $conn->error;
        }
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
            <img src="../../img/student_profile.png" alt="Profile" class="profile-pic">
            <h2><?php echo $username ?></h2>
            <h6 class="stu-name">STUDENT</h6>
            <button class="btn btn-primary">View Profile</button>
        </div>
        <ul class="nav flex-column nav-links w-100 px-3">
            <li class="nav-item">
                <a href="student_home.php" class="nav-link">Home</a>
            </li>
            <li class="nav-item">
                <a href="student_view_course.php" class="nav-link">View Courses</a>
            </li>
            <li class="nav-item">
                <a href="student_register_course.php" class="nav-link">Register Course</a>
            </li>
            <li class="nav-item">
                <a href="contact_us.php" class="nav-link">Contact Us</a>
            </li>
            <li class="nav-item">
                <a href="../../logout.php" class="nav-link">Logout</a>
            </li>
        </ul>
    </div>

    <!--Head Content-->
        <div class="head-content">
            <div>
                <div class="container mt-5">
                    <h3 class="stuheading text-center mb-4 p-2" style="background-color: #C3E7B3">Student Profile</h3>

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped mb-5">
                            <tr>
                                <th>Student ID</th>
                                <td><?php echo $row['stu_id']; ?></td>
                            </tr>
                            <tr>
                                <th>Username</th>
                                <td><?php echo $row['stu_username']; ?></td>
                            </tr>
                            <tr>
                                <th>First Name</th>
                                <td><?php echo $row['stu_first_name']; ?></td>
                            </tr>
                            <tr>
                                <th>Last Name</th>
                                <td><?php echo $row['stu_last_name']; ?></td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td><?php echo $row['stu_email']; ?></td>
                            </tr>
                            <tr>
                                <th>Password</th>
                                <td><?php echo '*************' ?></td>
                            </tr>
                            <tr>
                                <th>Mobile No</th>
                                <td><?php echo $row['stu_mb_no']; ?></td>
                            </tr>
                            <tr>
                                <th>Date of Birth</th>
                                <td><?php echo $row['stu_dob']; ?></td>
                            </tr>
                            <tr>
                                <th>Gender</th>
                                <td><?php echo $row['stu_gender']; ?></td>
                            </tr>
                            <tr>
                                <td colspan="2" class="text-center">
                                    <button class="btn btn-primary btn-sm w-25" onclick="editRecord(<?php echo htmlspecialchars(json_encode($row)); ?>)">Edit Profile</button>
                                </td>
                            </tr>
                        </table>
                    </div>

                    <div id="editModal" class="modal" tabindex="-1" role="dialog">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <form method="post" action="">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Student Record</h5>
                                        <button type="button" class="btn-close" onclick="closeModal()" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" name="stu_id" id="stu_id" value="<?php echo $row['stu_id']; ?>">
                                        <div class="mb-3">
                                            <input type="hidden" name="stu_username" id="stu_username" class="form-control" value="<?php echo $row['stu_username']; ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="stu_first_name" class="form-label">First Name</label>
                                            <input type="text" name="stu_first_name" id="stu_first_name" class="form-control" value="<?php echo $row['stu_first_name']; ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="stu_last_name" class="form-label">Last Name</label>
                                            <input type="text" name="stu_last_name" id="stu_last_name" class="form-control" value="<?php echo $row['stu_last_name']; ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="stu_email" class="form-label">Email</label>
                                            <input type="email" name="stu_email" id="stu_email" class="form-control" value="<?php echo $row['stu_email']; ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="stu_password" class="form-label">Password</label>
                                            <input type="text" name="stu_password" id="stu_password" class="form-control" value="<?php echo $row['stu_password']; ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="stu_mb_no" class="form-label">Mobile No</label>
                                            <input type="text" name="stu_mb_no" id="stu_mb_no" class="form-control" value="<?php echo $row['stu_mb_no']; ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="stu_dob" class="form-label">Date of Birth</label>
                                            <input type="date" name="stu_dob" id="stu_dob" class="form-control" value="<?php echo $row['stu_dob']; ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="stu_gender" class="form-label">Gender</label>
                                            <select name="stu_gender" id="stu_gender" class="form-select">
                                                <option value="male" <?php echo ($row['stu_gender'] == 'male') ? 'selected' : ''; ?>>Male</option>
                                                <option value="female" <?php echo ($row['stu_gender'] == 'female') ? 'selected' : ''; ?>>Female</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" name="save_changes" class="btn btn-success">Save Changes</button>
                                        <button type="button" class="btn btn-secondary" onclick="closeModal()">Close</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    function editRecord(data) {
                        document.getElementById('editModal').style.display = 'block';
                    }

                    function closeModal() {
                        document.getElementById('editModal').style.display = 'none';
                    }
                </script>
            </div>       
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>