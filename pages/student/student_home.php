<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../css/style2.css">
    <link rel="stylesheet" href="../../css/view.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script defer src="../../css/bootstrap.min.js"></script>
</head>
<body>
    
    <!--Sidebar-->
    <div class="sidebar d-flex flex-column align-items-center">
        <div class="profile">
            <img src="../../img/student_profile.png" alt="Profile" class="profile-pic">
            <h2><?php echo $_SESSION['username'] ?></h2>
            <h6 class="stu-name">STUDENT</h6>
            <a href="student_profile.php">
            <button class="btn btn-primary" id="fetchButton">View Profile</button>
            </a>
        </div>
        <ul class="nav flex-column nav-links w-100 px-3">
            <li class="nav-item active">
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
        <!--<header class="d-flex justify-content-center align-content-center mb-4">
            <input type="text" placeholder="Serach Courses...." class="form-control w-25">
        </header> -->
        <div class="main-content">
            
    <div class="mhead h1">Take your carrer to the next level with us</div>
    </div>
    <div class="container">
    <div class="profile_container">


    </div>

    <div class="h4"><p class="pt-3">Facilities Provided by Us</p></div>
                <div class="box-container">
                    <div class="box">
                        <div class="ímage">
                            <img src="../../img/scholarship.png" class="img-fluid" alt="">
                        </div>
                        <div class="content">
                            <p><b>Scholarship Programs:</b> Opportunities for merit-based or need-based financial assistance</p>
                            <a href="#" class="btn">read more</a>
                            <div class="icons">
                                <span><i class="fas fa-calendar"></i>28th october, 2024</span>
                                <span><i class="fas fa-user"></i>by admin</span>
                            </div>
                        </div>
                    </div>

                    <div class="box">
                        <div class="ímage">
                            <img src="../../img/counciling.png" class="img-fluid" alt="">
                        </div>
                        <div class="content">
                            <p><b>Counseling Services:</b>Mental health support, including counseling, workshops, and crisis intervention</p>
                            <a href="#" class="btn">read more</a>
                            <div class="icons">
                                <span><i class="fas fa-calendar"></i>28th october, 2024</span>
                                <span><i class="fas fa-user"></i>by admin</span>
                            </div>
                        </div>
                    </div>

                    <div class="box">
                        <div class="ímage">
                            <img src="../../img/career.png" class="img-fluid" alt="">
                        </div>
                        <div class="content">
                            <p><b>Career Services:</b>Assistance with job placement, internships, resume writing, and interview preparation</p>
                            <a href="#" class="btn">read more</a>
                            <div class="icons">
                                <span><i class="fas fa-calendar"></i>28th october, 2024</span>
                                <span><i class="fas fa-user"></i>by admin</span>
                            </div>
                        </div>
                    </div>

                    <div class="box">
                        <div class="ímage">
                            <img src="../../img/laboratory.png" class="img-fluid" alt="">
                        </div>
                        <div class="content">
                            <p><b>Laboratories:</b>Equipped for hands-on experiments and research in fields like science, engineering, and health</p>
                            <a href="#" class="btn">read more</a>
                            <div class="icons">
                                <span><i class="fas fa-calendar"></i>28th october, 2024</span>
                                <span><i class="fas fa-user"></i>by admin</span>
                            </div>
                        </div>
                    </div>

                    <div class="box">
                        <div class="ímage">
                            <img src="../../img/sport.png" class="img-fluid" alt="">
                        </div>
                        <div class="content">
                            <p><b>Sports Centers:</b>Gyms, fitness centers, and sports fields for physical activities and team sports</p>
                            <a href="#" class="btn">read more</a>
                            <div class="icons">
                                <span><i class="fas fa-calendar"></i>28th october, 2024</span>
                                <span><i class="fas fa-user"></i>by admin</span>
                            </div>
                        </div>
                    </div>

                    <div class="box">
                        <div class="ímage">
                            <img src="../../img/on campus housing.png" class="img-fluid" alt="">
                        </div>
                        <div class="content">
                            <p><b>On-Campus Housing:</b>Dormitories and apartments available for students, often with communal living spaces</p>
                            <a href="#" class="btn">read more</a>
                            <div class="icons">
                                <span><i class="fas fa-calendar"></i>28th october, 2024</span>
                                <span><i class="fas fa-user"></i>by admin</span>
                            </div>
                        </div>
                    </div>

                    <div class="box">
                        <div class="ímage">
                            <img src="../../img/computer labs.png" class="img-fluid" alt="">
                        </div>
                        <div class="content">
                            <p><b>Computer Labs:</b>Access to computers and software for coursework and research</p>
                            <a href="#" class="btn">read more</a>
                            <div class="icons">
                                <span><i class="fas fa-calendar"></i>28th october, 2024</span>
                                <span><i class="fas fa-user"></i>by admin</span>
                            </div>
                        </div>
                    </div>

                    <div class="box">
                        <div class="ímage">
                            <img src="../../img/dining.png" class="img-fluid" alt="">
                        </div>
                        <div class="content">
                            <p><b>Dining Services:</b>Cafeterias, food courts, and coffee shops offering a variety of meal options, including dietary accommodations</p>
                            <a href="#" class="btn">read more</a>
                            <div class="icons">
                                <span><i class="fas fa-calendar"></i>28th october, 2024</span>
                                <span><i class="fas fa-user"></i>by admin</span>
                            </div>
                        </div>
                    </div>

                    <div class="box">
                        <div class="ímage">
                            <img src="../../img/library.png" class="img-fluid" alt="">
                        </div>
                        <div class="content">
                            <p><b>Libraries:</b>Access to extensive collections of books, journals, and digital resources</p>
                            <a href="#" class="btn">read more</a>
                            <div class="icons">
                                <span><i class="fas fa-calendar"></i>28th october, 2024</span>
                                <span><i class="fas fa-user"></i>by admin</span>
                            </div>
                        </div>
                    </div>

                    <div class="box">
                        <div class="ímage">
                            <img src="../../img/classroom.png" class="img-fluid" alt="">
                        </div>
                        <div class="content">
                            <p><b>Lecture Halls and Classrooms: </b>Modern spaces for lectures, seminars, and discussions, often equipped with audio-visual technology</p>
                            <a href="#" class="btn">read more</a>
                            <div class="icons">
                                <span><i class="fas fa-calendar"></i>28th october, 2024</span>
                                <span><i class="fas fa-user"></i>by admin</span>
                            </div>
                        </div>
                    </div>

                    <div class="box">
                        <div class="ímage">
                            <img src="../../img/clubs.png" class="img-fluid" alt="">
                        </div>
                        <div class="content">
                            <p><b>Clubs and Organizations:</b> Opportunities to join student-led organizations, cultural clubs, and interest groups</p>
                            <a href="#" class="btn">read more</a>
                            <div class="icons">
                                <span><i class="fas fa-calendar"></i>28th october, 2024</span>
                                <span><i class="fas fa-user"></i>by admin</span>
                            </div>
                        </div>
                    </div>

                    <div class="box">
                        <div class="ímage">
                            <img src="../../img/health.png" class="img-fluid" alt="">
                        </div>
                        <div class="content">
                            <p><b>Health Clinics:</b>On-campus medical services for general health, vaccinations, and emergency care</p>
                            <a href="#" class="btn">read more</a>
                            <div class="icons">
                                <span><i class="fas fa-calendar"></i>28th october, 2024</span>
                                <span><i class="fas fa-user"></i>by admin</span>
                            </div>
                        </div>
                    </div>

                    <div class="box">
                        <div class="ímage">
                            <img src="../../img/transport.png" class="img-fluid" alt="">
                        </div>
                        <div class="content">
                            <p><b>Campus Shuttle Services:</b>Transportation options for getting around campus or to nearby areas</p>
                            <a href="#" class="btn">read more</a>
                            <div class="icons">
                                <span><i class="fas fa-calendar"></i>28th october, 2024</span>
                                <span><i class="fas fa-user"></i>by admin</span>
                            </div>
                        </div>
                    </div>

                    <div class="box">
                        <div class="ímage">
                            <img src="../../img/language.png" class="img-fluid" alt="">
                        </div>
                        <div class="content">
                            <p><b>Language Assistance:</b>Resources for improving English language skills and academic writing</p>
                            <a href="#" class="btn">read more</a>
                            <div class="icons">
                                <span><i class="fas fa-calendar"></i>28th october, 2024</span>
                                <span><i class="fas fa-user"></i>by admin</span>
                            </div>
                        </div>
                    </div>

                    <div class="box">
                        <div class="ímage">
                            <img src="../../img/wifi.png" class="img-fluid" alt="">
                        </div>
                        <div class="content">
                            <p><b>Wi-Fi Access:</b>High-speed internet available throughout campus, including in libraries and dormitories</p>
                            <a href="#" class="btn">read more</a>
                            <div class="icons">
                                <span><i class="fas fa-calendar"></i>28th october, 2024</span>
                                <span><i class="fas fa-user"></i>by admin</span>
                            </div>
                        </div>
                    </div>

                </div>
                <div id="load-more">load more</div>
            </div>
        </div>
    </div>
</body>
</html>

