<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Course</title>
    <link rel="stylesheet" href="../../css/style2.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        .main-content {
            margin-top: 50px;
            width: 80%;
        }
    </style>
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
            <li class="nav-item active"><a href="admin_course_view.php" class="nav-link">Courses</a></li>
            <li class="nav-item"><a href="admin_lecturer.php" class="nav-link">Lecturer</a></li>
            <li class="nav-item"><a href="admin_student.php" class="nav-link">Student</a></li>
            <li class="nav-item"><a href="../../logout.php" class="nav-link">Logout</a></li>
        </ul>
    </div>

    <!-- Head Content -->
    <div class="head-content">
        
        <!-- Main Content -->
        <div class="main-content container">
            <div class="card shadow-sm p-4 mb-7 bg-body rounded">
                <h2 class="text-center mb-4">Edit Course</h2>

                <?php
                // Include the database connection
                include '../../connection/admin_user.php';

                // Fetch existing course data 
                if (isset($_GET['course_code'])) {
                    $currentCourseCode = $adm_conn->real_escape_string($_GET['course_code']);
                    $query = "SELECT * FROM course WHERE cour_code = ?";
                    $stmt = $adm_conn->prepare($query);
                    $stmt->bind_param("s", $currentCourseCode);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $course = $result->fetch_assoc();
                    
                    $courseName = $course['cour_name'];
                    $courseContent = $course['cour_content'];

                    $stmt->close();
                }

                // Check if the form is submitted for updating
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    // Get updated form data and sanitize input
                    $courseCode = $adm_conn->real_escape_string($_POST['course_code']);
                    $courseName = $adm_conn->real_escape_string($_POST['course_name']);
                    $courseContent = $adm_conn->real_escape_string($_POST['course_content']);

                    // Prepare SQL statement for updating
                    $sql = "UPDATE course SET cour_name = ?, cour_content = ? WHERE cour_code = ?";
                    $stmt = $adm_conn->prepare($sql);
                    $stmt->bind_param("sss", $courseName, $courseContent, $courseCode);

                    // Execute the statement and check for success
                    if ($stmt->execute()) {
                        echo "<div class='alert alert-success mt-3'>Course updated successfully!</div>";
                    } else {
                        echo "<div class='alert alert-danger mt-3'>Error: " . $stmt->error . "</div>";
                    }

                    // Close the statement
                    $stmt->close();
                }
                ?>

                <form action="" method="post">
                    <div class="mb-3">
                        <label for="course_code" class="form-label">Course Code</label>
                        <input type="text" class="form-control" id="course_code" name="course_code" value="<?php echo htmlspecialchars($currentCourseCode); ?>" readonly>
                    </div>

                    <div class="mb-3">
                        <label for="course_name" class="form-label">Course Name</label>
                        <input type="text" class="form-control" id="course_name" name="course_name" value="<?php echo htmlspecialchars($courseName); ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="course_content" class="form-label">Course Content (URL)</label>
                        <input type="url" class="form-control" id="course_content" name="course_content" value="<?php echo htmlspecialchars($courseContent); ?>" required>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Update Course</button>
                </form>
            </div>
             
        </div>
        <!-- Back Button -->
        <div class="text-start mt-5">
            <a href="admin_course_view.php" class="btn btn-secondary">Back</a>
        </div>

    </div>

    <!-- Include Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
