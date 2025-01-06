<?php

    session_start();

    include '../../connection/lecturer_user.php';
    include '../../connection/admin_user.php';

    $user_id = $_SESSION['user_id'];
    $username = $_SESSION['username'];
    $sql = "SELECT * FROM lecturer WHERE user_id = '$user_id'";
    $result = $lect_conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "No data found.";
        echo $_SESSION['user_id'];
        exit();
    }

    if (isset($_POST['save_changes'])) {
        $lect_username = $_POST['lect_username'];
        $lect_first_name = $_POST['lect_first_name'];
        $lect_last_name = $_POST['lect_last_name'];
        $lect_email = $_POST['lect_email'];
        $lect_password = $_POST['lect_password'];
        $lect_mb_no = $_POST['lect_mb_no'];
        $lect_dob = $_POST['lect_dob'];
        $lect_gender = $_POST['lect_gender'];

        $update_lecturer = "UPDATE lecturer SET 
                    lect_username='$lect_username', 
                    lect_first_name='$lect_first_name', 
                    lect_last_name='$lect_last_name', 
                    lect_email='$lect_email', 
                    lect_password='$lect_password', 
                    lect_mb_no='$lect_mb_no', 
                    lect_dob='$lect_dob', 
                    lect_gender='$lect_gender' 
                    WHERE user_id='$user_id'";


        $update_user = "UPDATE user SET 
                    username='$lect_username', 
                    first_name='$lect_first_name', 
                    last_name='$lect_last_name', 
                    email='$lect_email', 
                    password='$lect_password', 
                    mb_no='$lect_mb_no', 
                    dob='$lect_dob', 
                    gender='$lect_gender' 
                    WHERE user_id = '$user_id'";

        if ($lect_conn->query($update_lecturer) === TRUE && $adm_conn->query($update_user) === TRUE) {
            echo "<div class='alert alert-success text-center'>Record updated successfully!</div>";
            header("Location: lecturer_profile.php");
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
            <img src="../../img/lecturer_profile.png" alt="Profile" class="profile-pic">
            <h2><?php echo $username ?></h2>
            <h6 class="lect-name">LECTURER</h6>
            <button class="btn btn-primary">View Profile</button>
        </div>
        <ul class="nav flex-column nav-links w-100 px-3">
            <li class="nav-item">
                <a href="lecturer_home.php" class="nav-link">Home</a>
            </li>
            <li class="nav-item">
                <a href="lecturer_view_course.php" class="nav-link">View Courses</a>
            </li>
            <li class="nav-item">
                <a href="lecturer_register_course.php" class="nav-link">Register Course</a>
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
                    <h3 class="stuheading text-center mb-4 p-2" style="background-color: #C3E7B3">Lecturer Profile</h3>

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped mb-5">
                            <tr>
                                <th>Lecturer ID</th>
                                <td><?php echo $row['lect_id']; ?></td>
                            </tr>
                            <tr>
                                <th>Username</th>
                                <td><?php echo $row['lect_username']; ?></td>
                            </tr>
                            <tr>
                                <th>First Name</th>
                                <td><?php echo $row['lect_first_name']; ?></td>
                            </tr>
                            <tr>
                                <th>Last Name</th>
                                <td><?php echo $row['lect_last_name']; ?></td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td><?php echo $row['lect_email']; ?></td>
                            </tr>
                            <tr>
                                <th>Password</th>
                                <td><?php echo '*************' ?></td>
                            </tr>
                            <tr>
                                <th>Mobile No</th>
                                <td><?php echo $row['lect_mb_no']; ?></td>
                            </tr>
                            <tr>
                                <th>Date of Birth</th>
                                <td><?php echo $row['lect_dob']; ?></td>
                            </tr>
                            <tr>
                                <th>Gender</th>
                                <td><?php echo $row['lect_gender']; ?></td>
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
                                        <h5 class="modal-title">Edit Lecturer Record</h5>
                                        <button type="button" class="btn-close" onclick="closeModal()" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" name="lect_id" id="lect_id" value="<?php echo $row['lect_id']; ?>">
                                        <div class="mb-3">
                                            <input type="hidden" name="lect_username" id="lect_username" class="form-control" value="<?php echo $row['lect_username']; ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="lect_first_name" class="form-label">First Name</label>
                                            <input type="text" name="lect_first_name" id="lect_first_name" class="form-control" value="<?php echo $row['lect_first_name']; ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="lect_last_name" class="form-label">Last Name</label>
                                            <input type="text" name="lect_last_name" id="lect_last_name" class="form-control" value="<?php echo $row['lect_last_name']; ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="lect_email" class="form-label">Email</label>
                                            <input type="email" name="lect_email" id="lect_email" class="form-control" value="<?php echo $row['lect_email']; ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="lect_password" class="form-label">Password</label>
                                            <input type="text" name="lect_password" id="lect_password" class="form-control" value="<?php echo $row['lect_password']; ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="lect_mb_no" class="form-label">Mobile No</label>
                                            <input type="text" name="lect_mb_no" id="lect_mb_no" class="form-control" value="<?php echo $row['lect_mb_no']; ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="lect_dob" class="form-label">Date of Birth</label>
                                            <input type="date" name="lect_dob" id="lect_dob" class="form-control" value="<?php echo $row['lect_dob']; ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="lect_gender" class="form-label">Gender</label>
                                            <select name="lect_gender" id="lect_gender" class="form-select">
                                                <option value="male" <?php echo ($row['lect_gender'] == 'male') ? 'selected' : ''; ?>>Male</option>
                                                <option value="female" <?php echo ($row['lect_gender'] == 'female') ? 'selected' : ''; ?>>Female</option>
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