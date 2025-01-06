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
    <link rel="stylesheet" href="../../css/lect_home.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
            <li class="nav-item active">
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
        <header class="d-flex justify-content-center align-content-center mb-4">
            <input type="text" placeholder="Serach Courses...." class="form-control w-25">
        </header>
        <div class="main-content">
          <div class="container">

            <h1 class="heading">LECTURERS</h1>
            <div class="box-container">
                <div class="box">
                    <div class="image">
                    <img src="../../img/LECURE01.jpeg" alt="LECTURE01"> 
                    </div>
                    <div class="content">
                        <h3>DR. Kusnadi</h3>
                      <p>Lecturer</p>
                      <div class="icon">
                        <span> JOIN DATE   <i class="fas fa-calender"></i>22<sup>th</sup> APRIL 2015</span>
                      </div>  
                    </div>
                </div>

                <div class="box">
                    <div class="image">
                    <img src="../../img/LETCURE02.jpeg" alt="LECTURE01"> 
                    </div>
                    <div class="content">
                        <h3>DR.Kumaranadan </h3>
                      <p>Lecturer</p>
                      <div class="icon">
                        <span> JOIN DATE   <i class="fas fa-calender"></i>16<sup>th</sup> MARCH 2010</span>
                      </div>  
                    </div>
                </div>
                <div class="box">
                    <div class="image">
                    <img src="../../img/LETCURE03.jpeg" alt="LECTURE01"> 
                    </div>
                    <div class="content">
                        <h3>DR.Akmal</h3>
                      <p>Professor</p>
                      <div class="icon">
                        <span> JOIN DATE   <i class="fas fa-calender"></i>22<sup>th</sup> APRIL 2015</span>
                      </div>  
                    </div>
                </div>
                <div class="box">
                    <div class="image">
                    <img src="../../img/LETCURE04.jpeg" alt="LECTURE01"> 
                    </div>
                    <div class="content">
                        <h3>DR.Michael Sandel</h3>
                      <p>Professor</p>
                      <div class="icon">
                        <span> JOIN DATE   <i class="fas fa-calender"></i>22<sup>th</sup> APRIL 2015</span>
                      </div>  
                    </div>
                </div>
                <div class="box">
                    <div class="image">
                    <img src="../../img/LETCURE05.jpeg" alt="LECTURE01"> 
                    </div>
                    <div class="content">
                        <h3>DR.Steven Pinker</h3>
                      <p>Lecturer</p>
                      <div class="icon">
                        <span> JOIN DATE   <i class="fas fa-calender"></i>22<sup>th</sup> APRIL 2015</span>
                      </div>  
                    </div>
                </div>
                <div class="box">
                    <div class="image">
                    <img src="../../img/LETCURE06.jpeg" alt="LECTURE01"> 
                    </div>
                    <div class="content">
                        <h3>DR.Susanthi</h3>
                      <p>Professor</p>
                      <div class="icon">
                        <span> JOIN DATE   <i class="fas fa-calender"></i>22<sup>th</sup> APRIL 2015</span>
                      </div>  
                    </div>
                </div>
                <div class="box">
                    <div class="image">
                    <img src="../../img/LETCURE07.jpeg" alt="LECTURE01"> 
                    </div>
                    <div class="content">
                        <h3>Dra. Rohini </h3>
                      <p>Lecturer</p>
                      <div class="icon">
                        <span> JOIN DATE   <i class="fas fa-calender"></i>22<sup>th</sup> APRIL 2015</span>
                      </div>  
                    </div>
                </div>
                <div class="box">
                    <div class="image">
                    <img src="../../img/LETCURE08.jpeg" alt="LECTURE01"> 
                    </div>
                    <div class="content">
                        <h3>DR. Pankaja</h3>
                      <p>Lecturer</p>
                      <div class="icon">
                        <span> JOIN DATE   <i class="fas fa-calender"></i>22<sup>th</sup> APRIL 2015</span>
                      </div>  
                    </div>
                </div>

                <div class="box">
                    <div class="image">
                    <img src="../../img/LETCURE09.jpeg" alt="LECTURE01"> 
                    </div>
                    <div class="content">
                        <h3>DR.David Alvarez</h3>
                      <p>LECURE</p>
                      <div class="icon">
                        <span> JOIN DATE   <i class="fas fa-calender"></i>22<sup>th</sup> APRIL 2015</span>
                      </div>  
                    </div>
                </div>


            </div>

            <div id="load-more">Load More</div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>

