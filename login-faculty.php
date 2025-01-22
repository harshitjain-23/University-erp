<?php

$login=0;
$invalid=0;

if($_SERVER['REQUEST_METHOD']=='POST'){
    include "connection.php";
    $gmail = $_POST['Mail'];
    $pass = $_POST['password'];

    $query = "
SELECT f.Faculty_ID, f.First_Name, f.Last_Name, f.Gmail, f.Contact, 
       f.Department, f.Faculty_type, f.Joining_year, f.Salary, 
       f.Highest_Qualification, f.Teaching_experience, fl.Password
FROM faculty f
JOIN fac_login fl
ON f.Gmail = fl.Gmail
WHERE f.Gmail='$gmail' AND fl.Password='$pass'
";


    $data = mysqli_query($conn, $query);
    if($data){
        $total = mysqli_num_rows($data);
        if($total > 0){
            $login = 1;

            session_name("faculty_session");
            session_start();

            $user_data = mysqli_fetch_assoc($data);

            $_SESSION['Gmail'] = $user_data['Gmail'];
            $_SESSION['Password'] = $user_data['Password'];
            $_SESSION['Faculty_ID'] = $user_data['Faculty_ID'];
            $_SESSION['First_Name'] = $user_data['First_Name'];
            $_SESSION['Last_Name'] = $user_data['Last_Name'];
            $_SESSION['Contact'] = $user_data['Contact'];
            $_SESSION['Department'] = $user_data['Department'];
            $_SESSION['Faculty_type'] = $user_data['Faculty_type'];
            $_SESSION['Joining_year'] = $user_data['Joining_year'];
            $_SESSION['Salary'] = $user_data['Salary'];
            $_SESSION['Highest_Qualification'] = $user_data['Highest_Qualification'];
            $_SESSION['Teaching_experience'] = $user_data['Teaching_experience'];

            header('location:faculty-portal.php');
            exit();
        } else{
            $invalid = 1;
        }
    }
}

error_reporting(E_ALL);
?> 


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style_sheet.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@0,400..800;1,400..800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.6.0/css/fontawesome.min.css">
    <script src="https://kit.fontawesome.com/ee7e713503.js" crossorigin="anonymous"></script>
</head>
<body>
    
<section class="sub-header-login">
    <nav>
        <a href="home_page.html"><img src="images/dseu_logo.png" alt="logo"></a>
        <div class="nav-links" id="navlinks">
            <i class="fa -regular fa-circle-xmark" onclick="hidemenu()"></i>
            <ul>
                <li><a href="home_page.html">Home</a></li>
                <li><a href="about.html">About</a></li>
                <!-- <li><a href="">Course</a></li> -->
                <li><a href="disclaimer.html">Disclaimer</a></li>
                <li><a href="contact-us.php">Contact</a></li>
                
            </ul>
        </div>
        <i class="fa -solid fa-bars" onclick="showmenu()"></i>
    </nav>

    <div class="login">
        <div class="text-box-login">
            <div class="content-login">
                <h1>Know more about us</h1>
                <p class="login-p"> Delhi Skill and Entrepreneur University focuses on skill development and entrepreneurship, aiming to bridge the gap between education and industry needs.</p>
                <a href="about.html" class="btn">Click Here</a>
            </div>
        </div>
        
        <div class="wrapper-login">
            <h2>Teacher Login</h2>
            <form action="login-faculty.php" method="POST">

                <div class="input-box">
                    <span class="email-icon"><i class="fa -solid fa-envelope"></i></span>
                    <input type="email" id="email" placeholder="Email" name = "Mail" required>
                    <!-- <label for="email" required>Email</label> -->
                </div>
                <div class="input-box">
                    <span class="password-icon"><i class="fa -solid fa-key"></i></span>
                    <input type="password" name="password" id="password" placeholder="Password" required>
                    <!-- <label for="password">Password</label> -->
                </div>

                <div class="remember-forget">
                    
                    <div class="remember-forget-a">
                        <label><input type="checkbox">Remember me</label>
                        <a href="#">Forget Password? </a> <br>
                    </div>
                    <br>
                
                </div>
                <button type="submit" class="btn-login" name= "submit"> <b>Login</b></button>
                <br><br>
                <div class="remember-forget">
                    <a href="login.php"> Login as a student. </a> <br>
                </div>

            </form>
        </div>
    </div>
</section>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        const emailInput = document.getElementById('email');
        const passwordInput = document.getElementById('password');

    // Function to toggle icon visibility
        function toggleIconVisibility(input, iconSelector) {
            const icon = input.parentElement.querySelector(iconSelector);
            if (input.value) {
                icon.style.display = 'none';
            } else {
                icon.style.display = 'block';
            }
        }

    // Event listeners for the email input
        emailInput.addEventListener('input', function () {
        toggleIconVisibility(emailInput, '.email-icon');
        });

    // Event listeners for the password input
        passwordInput.addEventListener('input', function () {
        toggleIconVisibility(passwordInput, '.password-icon');
        });
    });

</script>


</body>

</html>
