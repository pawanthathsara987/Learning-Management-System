<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/style1.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar">
        <div class="container-fluid">
            <a class="navbar-brand">
                
            </a>
            <form class="d-flex">
                <a href="./pages/login_signup/login_page.php">
                <button class="btn btn-outline-primary" type="button">Login</button>
                </a>
                <a href="./pages/login_signup/signup_page.php">
                <button class="btn btn-outline-primary ms-2" type="button">Signup</button>
                </a>
            </form>
        </div>
    </nav>

    <div class="container-fluid main-section">
        <div class="row align-items-left">
            <div class="col-6 home-logo">
                <div id="homeIconCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="2000">
                    <div class="carousel-inner">
                        <div class="carousel-item active img-fluid">
                            <img src="./img/HomeLogo.png" alt="Home_Image_1" class="d-block w-75">
                        </div>
                        <div class="carousel-item">
                            <img src="./img/HomeLogo2.png" alt="Hom_Image_2" class="d-block w-75">
                        </div>
                        <div class="carousel-item">
                            <img src="./img/HomeLogo5.png" alt="Hom_Image5" class="d-block w-100">
                        </div>
                        <div class="carousel-item">
                            <img src="./img/HomeLogo4.png" alt="Hom_Image5" class="d-block w-100">
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-6 text-content mt-5 pt-5 ">
                <h1 class="fade-in mt-5">Welcome to Our Learning Management System</h1>
                <div>
                    <p>
                        Our LMS provides a dynamic platform for learners to access courses, resources, and tools to enhance their educational journey. Whether you’re looking to acquire new skills, track your progress, or engage with peers, our system offers a user-friendly experience tailored to support your learning needs.
                    </p>
                </div>  
                <a href="./pages/login_signup/signup_page.php" class="btn btn-primary">Learn More ....</a>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
