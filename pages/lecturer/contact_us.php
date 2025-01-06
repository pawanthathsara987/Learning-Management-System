<?php 
    session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="../../css/style2.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
        }

        .back-image {
            background-image: url('../../img/back.jpg');
            background-size: cover;
            background-position: center;
            height: 100%;
            color: rgb(255, 255, 255);
            padding: 50px 0;
            background-attachment: fixed;
        }

        .container {
            background: rgba(0, 0, 0, 0.7);
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            width: 70%;
            margin: 0 auto;
        }

        .contact-info {
            background: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 10px rgba(208, 182, 182, 0.2);
            margin-bottom: 20px;
            color: #333;
        }

        

        .icon-frame {
            border: 2px solid #000;
            padding: 5px;
            border-radius: 100%;
            transition: transform 0.3s, background-color 0.3s, border-color 0.3s;
        }

        .icon-frame:hover {
            transform: scale(1.1);
            border-color: #007bff;
        }

        .social-icons img {
            width: 40px;
            height: 40px;
            background-color: black;
        }

        .social-icons {
    background-color: gray; /* Set background to black */
    padding: 10px; /* Add padding around the icons */
    
}

        h5, h6 {
            color: #000;
        }

        .flex-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            margin-bottom: 20px;
        }



        @media (max-width: 768px) {
            .container {
                width: 90%;
            }

            .contact-info {
                width: 100%;
            }
        }

         

        .facebook:hover {
            background-color: #2a62bb;
            
        }

        .whatsapp:hover {
            background-color: #25D366; 
        }

        .youtube:hover {
            background-color: #FF0000; 
        }

        .linkedin:hover {
            background-color: #0077B5; 
        }

        .contact-heading {
    font-size: 3rem;    
    font-weight: 1000;    
    background: linear-gradient(90deg,#99FFFF, #ffffff); 
    -webkit-background-clip: text;  
    -webkit-text-fill-color: transparent; 
    text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1); 
    padding: 5px 10px;             
    border-radius: 8px;              
    text-transform: uppercase;      
            
          
}

    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar d-flex flex-column align-items-center">
        <div class="profile">
            <img src="../../img/lecturer_profile.png" alt="Profile" class="profile-pic">
            <h2><?php echo $_SESSION['username'] ?></h2>
            <h6 class="stu-name">LECTURER</h6>
            <a href="lecturer_profile.php">
            <button class="btn btn-primary">View Profile</button>
            </a>
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
            <li class="nav-item  active">
                <a href="contact_us.php" class="nav-link">Contact Us</a>
            </li>
            <li class="nav-item">
                <a href="../../logout.php" class="nav-link">Logout</a>
            </li>
        </ul>
    </div>

    <!-- Head Content -->
    <div class="head-content">
        <div class="back-image">
    <h1 class="text-center contact-heading ">Contact Us</h1>



    <div class="container p-4 contact-info">
    <h4 class="text-center ">Have questions or need help?</h4>
    <p class="text-center">Our support team is here to assist. If you are having technical difficulties or need assistance with our learning platform, please contact us using the form below. We strive to respond quickly to ensure a smooth learning experience.</p>
<br>
    <div class="text-center ">
    <h4 class="font-weight-bold text-center mb-3">Contact Information</h4>

        <div class="mb-2">
            <img src="../../img/call.png" alt="Call" style="width: 30px;"> 
            <strong>Call Us:</strong> <span>+37 456432798</span>
        </div>
        <div class="mb-2">
            <img src="../../img/email.png" alt="Email" style="width: 30px;"> 
            <strong>Email:</strong> <span>info@learn.com</span>
        </div>
        <div class="mb-2">
            <img src="../../img/call.png" alt="Call" style="width: 30px;"> 
            <strong>Alternative:</strong> <span>+94 779988453</span>
        </div>
        <div class="mb-2">
            <img src="../../img/location.png" alt="Location" style="width: 30px;"> 
            <strong>Location:</strong> <span>Kamburupitiya, Matara</span>
        </div>
        <div class="d-flex justify-content-center gap-3 mt-3">
               <a href="https://web.facebook.com/" ><img class="icon-frame facebook social-icons" width="40px" height="40px" src="../../img/face.png" alt="" ></a>
               <a href="https://web.whatsapp.com/" ><img class="icon-frame whatsapp social-icons" width="40px" height="40px" src="../../img/whats.png" alt=""></a>
               <a href="https://www.youtube.com/" ><img class="icon-frame youtube social-icons" width="40px" height="40px" src="../../img/you.png" alt=""></a>
               <a href="https://www.linkedin.com/" ><img class="icon-frame linkedin social-icons" width="40px" height="40px" src="../../img/link.png" alt=""></a>
        </div>
    </div>
</div>


     <div class="container">
                <h3 class="text-center mb-4">Get In Touch</h3>
                <form method="post" action="sendmail.php" onsubmit="return validateForm()">
    <div class="mb-3">
        <label for="firstName" class="form-label">First Name</label>
        <input type="text" class="form-control" name="fname" id="firstName" placeholder="Enter your first name" value="<?php echo htmlspecialchars($_POST['fname'] ?? ''); ?>">
        <?php if (isset($_SESSION['errors']['fname'])): ?>
            <div class="text-danger"><?php echo $_SESSION['errors']['fname']; ?></div>
        <?php endif; ?>
    </div>
    <div class="mb-3">
        <label for="lastName" class="form-label">Last Name</label>
        <input type="text" class="form-control" name="lname" id="lastName" placeholder="Enter your last name" value="<?php echo htmlspecialchars($_POST['lname'] ?? ''); ?>">
        <?php if (isset($_SESSION['errors']['lname'])): ?>
            <div class="text-danger"><?php echo $_SESSION['errors']['lname']; ?></div>
        <?php endif; ?>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email Address</label>
        <input type="email" class="form-control" name="mail" id="email" placeholder="Enter your email" value="<?php echo htmlspecialchars($_POST['mail'] ?? ''); ?>">
        <?php if (isset($_SESSION['errors']['mail'])): ?>
            <div class="text-danger"><?php echo $_SESSION['errors']['mail']; ?></div>
        <?php endif; ?>
    </div>
    <div class="mb-3">
        <label for="phone" class="form-label">Phone Number</label>
        <input type="tel" class="form-control" name="phone" id="phone" placeholder="Enter your phone number" value="<?php echo htmlspecialchars($_POST['phone'] ?? ''); ?>">
        <?php if (isset($_SESSION['errors']['phone'])): ?>
            <div class="text-danger"><?php echo $_SESSION['errors']['phone']; ?></div>
        <?php endif; ?>
    </div>
    <div class="mb-3">
        <label for="message" class="form-label">Message</label>
        <textarea class="form-control" id="message" name="msg" rows="4" placeholder="Enter your message"><?php echo htmlspecialchars($_POST['msg'] ?? ''); ?></textarea>
        <?php if (isset($_SESSION['errors']['msg'])): ?>
            <div class="text-danger"><?php echo $_SESSION['errors']['msg']; ?></div>
        <?php endif; ?>
    </div>
    <button type="submit" name="send" class="btn btn-primary">Submit</button>
</form>

            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
       

        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script>
    var messageText = "<?= $_SESSION['STATUS'] ?? ''; ?>";
    if (messageText !== '') {
        Swal.fire({
            title: "Notification",
            text: messageText,
            icon: "success"
        }).then(() => {
            <?php unset($_SESSION['STATUS']); ?> // Clear the session variable after use
        });
    }
</script>

    </body>
</html>
