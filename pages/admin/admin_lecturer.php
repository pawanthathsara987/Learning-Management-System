<?php

    session_start();

    INCLUDE "../../connection/admin_user.php";  
    
    if(isset($_GET['delete_id'])){
        $delete_id = $_GET['delete_id'];
        $lect_id_query = "SELECT lect_id FROM lecturer WHERE user_id = '$delete_id'";
        $lect_id =  mysqli_query($adm_conn, $lect_id_query);
        $result =  mysqli_fetch_assoc($lect_id);
        $lect_id_r = $result['lect_id'];
        $delete_lect_course = "DELETE FROM lect_course WHERE lect_id = '$lect_id_r'";
        $delete_lect = "DELETE FROM lecturer WHERE user_id='$delete_id'";
        $delete_user = "DELETE FROM user WHERE user_id='$delete_id'";
        mysqli_query($adm_conn, $delete_lect_course);
        mysqli_query($adm_conn, $delete_lect);
        mysqli_query($adm_conn, $delete_user);
        header("Location: admin_lecturer.php");
        exit();
    }else {
        echo "Error deleting record: " . mysqli_error($adm_conn);
    }

    $edit_data = null;
    if(isset($_GET['edit_id'])){
        $edit_id = $_GET['edit_id'];
        $edit_lect = "SELECT * FROM lecturer WHERE user_id = '$edit_id'";
        $query = mysqli_query($adm_conn, $edit_lect);
        $edit_data = mysqli_fetch_array($query);
    }
    
    if (isset($_POST['save'])) {
        $lect_id = $_POST['lect_id'];
        $username = $_POST['lect_username'];
        $first_name = $_POST['lect_first_name'];
        $last_name = $_POST['lect_last_name'];
        $email = $_POST['lect_email'];
        $password = $_POST['lect_password'];
        $mobile_no = $_POST['lect_mb_no'];
        $dob = $_POST['lect_dob'];
        $gender = $_POST['lect_gender'];
    
        $update_query = "UPDATE lecturer SET
                            lect_username='$username',
                            lect_first_name='$first_name',
                            lect_last_name='$last_name', 
                            lect_email='$email',
                            lect_password='$password', 
                            lect_mb_no='$mobile_no', 
                            lect_dob='$dob', 
                            lect_gender='$gender'

                            WHERE user_id='$edit_id'";


        $update_user = "UPDATE user SET
                            username='$username',
                            first_name='$first_name',
                            last_name='$last_name', 
                            email='$email',
                            password ='$password', 
                            mb_no='$mobile_no', 
                            dob='$dob', 
                            gender='$gender'
                            WHERE user_id='$edit_id'";

        
       if (mysqli_query($adm_conn, $update_query) && mysqli_query($adm_conn, $update_user)) { 
        header("Location: admin_lecturer.php");
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($adm_conn);
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
            <li class="nav-item active">
                <a href="admin_lecturer.php" class="nav-link">Lecturer</a>
            </li>
            <li class="nav-item ">
                <a href="admin_student.php" class="nav-link">Student</a>
            </li>
            <li class="nav-item">
                <a href="../../logout.php" class="nav-link">Logout</a>
            </li>
        </ul>
    </div>

    <div class="head-content">
        <header class="d-flex justify-content-center align-content-center mb-4">
            <input type="text" placeholder="Search Lecturer...." class="form-control w-25">
        </header>
        <div class="main-content">
            <h2 class="d-flex justify-content-center align-content-center">
             Lecture Information
            </h2>
            <?php

            $get_lecturer = "SELECT lect_id, user_id,lect_username,lect_first_name, lect_last_name, lect_email, lect_password, lect_mb_no, lect_dob, lect_gender FROM lecturer;";
            $result = mysqli_query($adm_conn,$get_lecturer);

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
                    echo "<td>".$fetch_data['lect_id']."</td>";
                    echo "<td>".$fetch_data['user_id']."</td>";
                    echo "<td>".$fetch_data['lect_username']."</td>";
                    echo "<td>".$fetch_data['lect_first_name']."</td>";
                    echo "<td>".$fetch_data['lect_last_name']."</td>";
                    echo "<td>".$fetch_data['lect_email']."</td>";
                    echo "<td>".$fetch_data['lect_password']."</td>";
                    echo "<td>".$fetch_data['lect_mb_no']."</td>";
                    echo "<td>".$fetch_data['lect_dob']."</td>";
                    echo "<td>".$fetch_data['lect_gender']."</td>";
                    echo "<td>
                            <a href='?edit_id=" . $fetch_data['user_id'] . "' class='btn btn-sm btn-primary'>Edit</a>
                            <a href='?delete_id=" . $fetch_data['user_id'] . "' class='btn btn-sm btn-danger' onclick='return confirm(\"Are you sure you want to delete?\")'>Delete</a>
                        </td>";

            }
               
                echo "</tr>";
                echo "</thead>"; 
                echo "</table>";
            }else {
                echo "<p class='text-center'>No Lecturer records found.</p>";
            }
            ?>

<?php if (isset($edit_data)): ?>
                <div class="card my-4">
                    <div class="card-header bg-primary text-white">Edit Lecturer Information</div>
                    <div class="card-body">
                        <form action="" method="post">
                            <input type="hidden" name="lect_id" value="<?php echo $edit_data['lect_id']; ?>">

                            <div class="mb-3">
                                <label class="form-label">Username</label>
                                <input type="text" name="lect_username" class="form-control" value="<?php echo $edit_data['lect_username']; ?>">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">First Name</label>
                                <input type="text" name="lect_first_name" class="form-control" value="<?php echo $edit_data['lect_first_name']; ?>">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Last Name</label>
                                <input type="text" name="lect_last_name" class="form-control" value="<?php echo $edit_data['lect_last_name']; ?>">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" name="lect_email" class="form-control" value="<?php echo $edit_data['lect_email']; ?>">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="text" name="lect_password" class="form-control" value="<?php echo $edit_data['lect_password']; ?>">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Mobile Number</label>
                                <input type="text" name="lect_mb_no" class="form-control" value="<?php echo $edit_data['lect_mb_no']; ?>">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">DOB</label>
                                <input type="text" name="lect_dob" class="form-control" value="<?php echo $edit_data['lect_dob']; ?>">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Gender</label>
                                <input type="text" name="lect_gender" class="form-control" value="<?php echo $edit_data['lect_gender']; ?>">
                            </div>

                            <button type="submit" name="save" class="btn btn-success">Save</button>
                            <a href="admin_lecturer.php" class="btn btn-secondary">Cancel</a>
                        </form>
                    </div>
                </div>
                <?php endif; ?>
        </div>
    </div>
</body>
</html>