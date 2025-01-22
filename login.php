<?php
$login = 0;
$invalid = 0;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include "connection.php";
    $gmail = $_POST['Mail'];
    $pass = $_POST['password'];

    // Corrected SQL query with quotes around $gmail
    $query = "SELECT stu_login.Gmail, stu_login.Password, 
                student.Roll_No, student.First_Name, student.Last_Name, 
                student.Age, student.DOB, student.Contact, 
                student.Admission_year, student.Course, student.Semester, 
                student.Current_year 
              FROM stu_login 
              JOIN student ON stu_login.Gmail = student.Gmail
              WHERE stu_login.Gmail = '$gmail' AND stu_login.Password = '$pass'";

    $data = mysqli_query($conn, $query);

    // Check if query ran successfully
    if ($data) {
        // Check if there are any matching records
        if (mysqli_num_rows($data) > 0) {
            $login = 1;

            session_name("student_session");
            session_start();

            $user_data = mysqli_fetch_assoc($data);

            // Set session variables for each piece of data you need in other files
            $_SESSION['Gmail'] = $user_data['Gmail'];
            $_SESSION['Password'] = $user_data['Password'];
            $_SESSION['Roll_No'] = $user_data['Roll_No'];
            $_SESSION['First_Name'] = $user_data['First_Name'];
            $_SESSION['Last_Name'] = $user_data['Last_Name'];
            $_SESSION['Age'] = $user_data['Age'];
            $_SESSION['DOB'] = $user_data['DOB'];
            $_SESSION['Contact'] = $user_data['Contact'];
            $_SESSION['Admission_year'] = $user_data['Admission_year'];
            $_SESSION['Course'] = $user_data['Course'];
            $_SESSION['Semester'] = $user_data['Semester'];
            $_SESSION['Current_year'] = $user_data['Current_year'];

            // Redirect to student portal or other desired page
            header('location:student-portal.php');
            exit();
            
            // exit();

        } else {
            $invalid = 1; // Set invalid flag for feedback
        }
    } else {
        echo "Error in query execution: " . mysqli_error($conn);
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


<?php
if ($login) {
    echo '<strong> Success </strong> You are successfully logged in';
}

if ($invalid) {
    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong> Error.</strong> Invalid Credentials.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
}
?>




<!-- // if($invalid){
//     echo ' <div class="alert alert-warning alert-dismissible fade show" role="alert">
//   <strong>Error.</strong> Invalid Credentials.
//   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
// </div>';
// } -->



<!-- ?> -->
    
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
            <h2>Student Login</h2>
            <form action="login.php" method="POST">

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
                    <a href="login-faculty.php"> Login as a teacher. </a> <br>
                </div>
            </form>
        </div>
    </div>
</section>

<!-- <script>
    function checkDelete() {
        if (confirm('Enter correct values')) {
            // Place your deletion logic here, like hiding the div or redirecting
            alert('Deletion confirmed'); // This can be replaced with your actual deletion logic
            return true;
        } else {
            alert('Deletion canceled');
            return false;
        }
    }
</script> -->


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

<?php






// if(isset($_POST['submit']))
// {
//     $Mail = $_POST['Mail'];
//     $password = $_POST['password'];
 
//     if( $Mail!="" && $password!="" ){

//         $query = "INSERT INTO student VALUES ( '$Mail', '$password')";
//         $data = mysqli_query($conn, $query);
        
//         if($data){
//             echo "Data inserted";
//         }
//     } else{
//         echo "Data insertion Failed";
//     }
// }

// 

// <!-- <?php

// $login=0;
// $invalid=0;

// if($_SERVER['REQUEST_METHOD']=='POST'){
//     include "connection.php";
//     $gmail = $_POST['Mail'];
//     $pass = $_POST['password'];

//     // $query = "SELECT * FROM stu_login WHERE Gmail='$gmail' and Password='$pass'";
//     $query = "SELECT stu_login.Gmail, stu_login.Password, 
//     student.Roll_No, student.First_Name, student.Last_Name, 
//     student.Age, student.DOB, student.Contact, 
//     student.Admission_year, student.Course, student.Semester, 
//     student.Current_year 
//     FROM stu_login 
//     JOIN student ON stu_login.Gmail = student.Gmail
//     WHERE stu_login.Gmail = $gmail";

//     $data = mysqli_query($conn, $query);
//     if($data){
//         $result = mysqli_num_rows($data);
       
//             if ($result->num_rows > 0) {

//                 $login = 1;
//                 session_start();

//                 $user_data = $result->fetch_assoc();
                
//                 // Set session variables for each piece of data you need in other files
//                 $_SESSION['Gmail'] = $user_data['Gmail'];
//                 $_SESSION['Password'] = $user_data['Password'];
//                 $_SESSION['Roll_No'] = $user_data['Roll_No'];
//                 $_SESSION['First_Name'] = $user_data['First_Name'];
//                 $_SESSION['Last_Name'] = $user_data['Last_Name'];
//                 $_SESSION['Age'] = $user_data['Age'];
//                 $_SESSION['DOB'] = $user_data['DOB'];
//                 $_SESSION['Contact'] = $user_data['Contact'];
//                 $_SESSION['Admission_year'] = $user_data['Admission_year'];
//                 $_SESSION['Course'] = $user_data['Course'];
//                 $_SESSION['Semester'] = $user_data['Semester'];
//                 $_SESSION['Current_year'] = $user_data['Current_year'];
                
//                 // Redirect to student portal or other desired page
//                 header('location:student-portal.php');
//                 exit();
//             } else{
//                 $invalid = 1;
//             }


//     }
// }

// error_reporting(E_ALL);
// ?>  -->
