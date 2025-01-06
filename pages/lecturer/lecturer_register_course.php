<?php
    session_start();
    include '../../connection/lecturer_user.php';



    // Fetch courses from the database
    $sql = "SELECT cour_code, cour_name, cour_content FROM course";
    $result = $lect_conn->query($sql);




?>






<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../css/style2.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

    <!--Sidebar-->
    <div class="sidebar d-flex flex-column align-items-center">
        <div class="profile">
            <img src="../../img/lecturer_profile.png" alt="Profile" class="profile-pic">
            <h2><?php echo $_SESSION['username']; ?></h2>
            <h6 class="stu-name">LECTURER</h6>
            <a href="lecturer_profile.php">
            <button class="btn btn-primary">View Profile</button>
            </a>
        </div>
        <ul class="nav flex-column nav-links w-100 px-3">
            <li class="nav-item ">
                <a href="lecturer_home.php" class="nav-link">Home</a>
            </li>
            <li class="nav-item">
                <a href="lecturer_view_course.php" class="nav-link">View Courses</a>
            </li>
            <li class="nav-item active">
                <a href="lecturer_register_course.php" class="nav-link active">Register Course</a>
            </li>
            <li class="nav-item">
                <a href="contact_us.php" class="nav-link">Contact Us</a>
            </li>
            <li class="nav-item">
                <a href="../../logout.php" class="nav-link">Logout</a>
            </li>
        </ul>
    </div>

    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4" style="margin-left: 250px;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">All Courses</a>
        </div>
    </nav>




    <!--Head Content-->
    <div class="head-content">
        <header class="d-flex justify-content-center align-content-center mb-4">
            <input type="text" placeholder="Serach Courses...." class="form-control w-25 me-2">
            <div class="search-icon">
                <i class="fas fa-search" style="color: #FFD700; font-size: 24px;"></i>

            </div>




        </header>
        <div class="main-content">
            <!--Your Content-->

            <!-- Course Grid -->
            <div class="row">


                <div class="main-content container mt-4">
                    <div class="row">
                        <?php if ($result->num_rows > 0): ?>
                            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                                <div class="col-md-4 mb-4">
                                    <div class="card h-100">
                                        <img src="https://via.placeholder.com/250x140" class="card-img-top" alt="Course Image">
                                        <div class="card-body">
                                            <h5 class="course-title"><?php echo htmlspecialchars($row['cour_name']); ?></h5>
                                            <p class="course-author">Course Code:
                                                <?php echo htmlspecialchars($row['cour_code']); ?>
                                            </p>
        

                                            <!-- <div class="star-rating">★★★★★</div> -->
                                            <!-- Start course button-->
                                            <div>
                                                

                                                <form action="start_course_btn.php" method="POST">
                                                    <input type="hidden" name="cour_code" value="<?php echo htmlspecialchars($row['cour_code']); ?>">
                                                    <input type="hidden" name="lect_id" value="<?php echo $uidr; ?>">
                                                    <button class="btn btn-primary w-50 start-button" type="submit">
                                                        <span>Start course</span>
                                                    </button>
                                                </form>

                                            </div>
                                            <script>
                                            document.querySelectorAll('.start-button').forEach(button => {
                                                button.addEventListener('click', function () {
                                                    this.classList.remove('btn-primary');
                                                    this.classList.add('btn-danger');
                                                    this.innerText = 'Course started';
                                                    this.disabled = true;
                                                });
                                            });
                                        </script>




                                            

                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <p>No courses available.</p>
                        <?php endif; ?>
                    </div>
                </div>


                <!-- Add more course cards as needed -->
            </div>
        </div>



    </div>



    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>