<?php
session_name("faculty_session");
session_start();
if(!isset($_SESSION['Gmail'])){
    header('location:login-faculty.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faculty-portal</title>

    <style>
        *{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
        body{
            width: 100%;
            height: 100vh;
        }

        .container {
            display: flex;
            height: 79vh; 
        }
        
        .menu {
            width: 15%;
            border-right: 1px solid #ccc;
            align-items: center;
        }

        .main-content {
            width: 85%;
        }

        iframe {
            width: 100%;
            height: 100%;
            border: none;
        }


        .header-admin{
            width: 100vw;
            height: 15vh;
            max-height: 80%;
            padding-top: 10px;
            background-image: linear-gradient(to top, #a7a6cb 0%, #8989ba 52%,#8989ba 100%);
            border: 1px solid black;
            overflow: hidden;
            color: #fff;
            text-align: center;
        }

        .welcome-header {
            width: 100wh;
            height: 5vh;
            background-image: linear-gradient(to top, #cfd9df 0%, #e2ebf0 100%);
            border: 2px solid black;
            color: black;
            /* overflow: hidden; */
        }
        
        .wel{
            text-align: center;
            padding-top: 7px;
            font-size: 1.3rem;
        }
        
        .logout-button .fa{
            display: block;
            cursor: pointer;
            position: absolute;
            align-items: right;
            margin-right: 5px;
            right: 20px;
            top: 112px;
            font-size: 1.3rem;
        }

        .logout-button p{
            display: block;
            cursor: pointer;
            position: absolute;
            text-align: right;
            margin-right: 5px;
            right: 50px;
            top: 110px;
            font-size: 1.3rem;
        }

        .logout-button p :hover{
            text-decoration: underline;
        }

    </style>

    <script src="https://kit.fontawesome.com/ee7e713503.js" crossorigin="anonymous"></script>
</head>
<body>


<section class="header-admin">
    <div class="sub-header-admin">
        <img src="images/ds logo.png" alt="">
    </div>
</section>

<section class="welcome-header">
    <div class="wel"> <strong>Welcome! <?php echo $_SESSION['First_Name']. ' '. $_SESSION['Last_Name']; ?></div> </strong>
    <div class="logout-button">
        <a href="logout-fac.php">
        <p> <strong> Logout</strong></p>
        <i class="fa -solid fa-right-from-bracket"></i>
        </a>
    </div>
</section>

<div class="container">
    <!-- Menu iframe -->
    <div class="menu">
        <iframe src="fac-menu.html" name="fac-menu"></iframe>
    </div>

    <!-- Content iframe -->
    <div class="main-content">
        <iframe src="fac-das.html" name="fac-das"></iframe>
    </div>


</div>

</body>
</html>
