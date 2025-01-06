<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="../../css/bootstrap.css">
    <link rel="stylesheet" href="../../css/signup_style.css">
    <script src="../../js/jquery-3.7.1.min.js"></script>
</head>
<body>
    
    <div class="background-blur"></div>

    <div class="square-box"></div>

    <div class="container d-flex justify-content-center align-items-center mid-div">
        <div style="width: 100%; max-width: 400px; z-index: 1">
            <h2 class="text-center mb-3">Sign Up</h2>
            <div class="btn-div d-flex justify-content-center">
                <!-- <button type="button" value="Student" name="roles" class="stu-div" id="stubtn" required>Student</button>
                <button type="button" value="Lecturer" name="roles" class="lec-div" id="lecbtn" required>Lecturer</button>
             -->
             <button type="button" onclick="setRole('Student')" class="stu-div" id="stubtn">Student</button>
             <button type="button" onclick="setRole('Lecturer')" class="lec-div" id="lecbtn">Lecturer</button>
            </div>
           
            
            <form name="signupform" method="post" action="register1.php" onsubmit="return validateForm()">
                <input type="hidden" name="role" id="role">

                <div class="mb-3">
                    <label for="username">Username</label>
                    <input type="text" name="uname" id="unameid" class="form-control" placeholder="Enter username">
                </div>
                <div class="mb-3">
                    <label for="first_name">First Name</label>
                    <input type="text" name="fname" id="fnameid" class="form-control" placeholder="Enter first name">
                </div>
                <div class="mb-3">
                    <label for="last_name">Last Name</label>
                    <input type="text" name="lname" id="lnameid" class="form-control" placeholder="Enter last name">
                </div>
                <div class="mb-3">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="emailid" class="form-control" placeholder="Enter email">
                </div>
                
                <!-- Gender Field -->
                <div class="mb-3">
                  <label for="Gender">Gender</label><br>
                    <div class="form-check form-check-inline">
                      <input type="radio" name="gender" id="male" value="Male" class="form-check-input">
                 <label for="male" class="form-check-label">Male</label>
                </div>
                   <div class="form-check form-check-inline">
                      <input type="radio" name="gender" id="female" value="Female" class="form-check-input">
                 <label for="female" class="form-check-label">Female</label>
                </div>
                <div class="form-check form-check-inline">
                   <input type="radio" name="gender" id="other" value="Other" class="form-check-input">
                <label for="other" class="form-check-label">Other</label>
                </div>
               </div>


                <div class="mb-3">
                    <label for="dob">Date of Birth</label>
                    <input type="date" name="dob" class="form-control" id="dob">
                </div>
                <div class="mb-3">
                    <label for="mobile_no">Mobile number</label>
                    <input type="text" name="mobileno" id="mobilenoid" class="form-control" placeholder="Enter mobile number">
                </div>
                <div class="mb-3">
                    <label for="password">Password</label>
                    <input type="password" name="pword" id="pwordid" class="form-control" placeholder="Enter password (8-12 characters)">
                </div>
                <div class="mb-3">
                    <label for="confirm_password">Confirm Password</label>
                    <input type="password" name="cpword" id="cpwordid" class="form-control" placeholder="Enter confirm password">
                </div>
                <button type="submit" class="btn btn-primary w-100">Register</button>
            </form>

        </div>
    </div>

    <div class="square-box"></div>


    <!-- SCRIPT START -->

   <script>

    function setRole(role) {
        document.getElementById('role').value = role; // Set hidden role value
    }

        $(document).ready(function () {
            $('#stubtn').click(function () {
                $(this).css('background-color', 'orange');
                $('#lecbtn').css('background-color', 'white');
                $('#lecbtn').val(''); 
            });

            $('#lecbtn').click(function () {
                $(this).css('background-color', 'orange');
                $('#stubtn').css('background-color', 'white');
                $('#stubtn').val(''); // Clear student input
            });
        });

        function validateForm() {
            const username = $('#unameid').val();
            const password = $('#pwordid').val();
            const confirmPassword = $('#cpwordid').val();
            const mobileNo = $('#mobilenoid').val();
            const dob = $('#dob').val();
            const gender = $("input[name='gender']:checked").val(); // Get selected gender

            // Check for empty fields
            if (!username || !password || !confirmPassword || !mobileNo || !dob || !gender) {
                alert("Please fill in all required fields.");
                return false;
            }
            
             // Mobile number validation: exactly 10 digits, only numbers
             const mobilePattern = /^[0-9]{10}$/;
            if (!mobilePattern.test(mobileNo)) {
            alert("Mobile number must be exactly 10 digits and contain only numbers.");
            return false;
            }

            
            // Check password criteria
            const passwordPattern = /^[A-Za-z0-9]+$/;
            if (password.length < 8 || password.length > 12 || !passwordPattern.test(password)) {
                alert("Password must be 8-12 characters and contain no special characters.");
                return false;
            }

            // Check if passwords match
            if (password !== confirmPassword) {
                alert("Passwords do not match.");
                return false;
            }

            // Check age (minimum 18 years)
            const today = new Date();
            const birthDate = new Date(dob);
            const age = today.getFullYear() - birthDate.getFullYear();
            const m = today.getMonth() - birthDate.getMonth();
            if (age < 18 || (age === 18 && m < 0)) {
                alert("You must be at least 18 years old.");
                return false;
            }

            return true; // All checks passed
        }
    </script>

</body>
</html>
