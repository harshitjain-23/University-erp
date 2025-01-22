<?php
include "connection.php";
// error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
</head>
<body>
    <a href="index.html" class="home-button">Home</a>
    <div class="signup">
        <form action="" method="post">
            <h1>SIGN UP</h1>
            <label>Username</label>
            <input type="text" name="username" placeholder="Enter a username" required>
            <label>Password</label>
            <input type="password" name="password" placeholder="Enter a password" required>
            <label>Email</label>
            <input type="email" name="email" placeholder="Enter your email" required>
            <button name="submit">SIGN UP</button>
            <div align="center">
                <p>Already have an account? <a href="login.html">Log In</a></p>
            </div>
        </form>
    </div>
</body>


</html>
<?php


if(isset($_POST['submit']))
{   
    $Username = $_POST['username'];
    $Pass = $_POST['password'];
    $Email = $_POST['email'];
    
 


    $query = "INSERT INTO signup VALUES('$Username', '$Pass', '$Email')";
    $data = mysqli_query($conn, $query);

        if($data){
            echo "Data inserted";
        }
    } else{
        echo "Data insertion Failed";
    }

if (!$data) {
        echo "Error: " . mysqli_error($conn);
    }


?>