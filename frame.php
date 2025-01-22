<?php
session_start();
if(!isset($_SESSION['gmail'])){
    header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        *{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
        body{
            width: 100%;
            height: 100%;
        }
        /* Flex container for layout */
        .container {
            display: flex;
            height: 73vh; /* Full height */
        }
        
        /* Left column (menu) */
        .menu {
            width: 15%;
            border-right: 1px solid #ccc;
            align-items: center;
        }

        /* Right column (content) */
        .main-content {
            width: 85%;
        }

        /* Iframes styling */
        iframe {
            width: 100%;
            height: 100%;
            border: none;
        }

        .intro{
            align-items: center;
            width: 100vh;
            height: 100vh;
        }
        .header-admin{
            width: 100vw;
            height: 25vh;
            max-height: 80%;
            padding-top: 20px;
            background-image: linear-gradient(to top, #a7a6cb 0%, #8989ba 52%,#8989ba 100%);
            border: 2px solid black;
            align-items: center;
            overflow: hidden;
            color: #fff;
            text-align: center;
        }
        
    </style>
</head>
<body>

<!-- <section class="intro">
    <img src="images/logo.png" alt="">
    <h3> Welcome Admin </h3>
    <p>Logout.</p>
</section> -->

<section class="header-admin">
    <div class="sub-header-admin">
        <img src="images/logo.png" alt="">
        <h3> Welcome Admin </h3>
        <?php echo $_SESSION['gmail']; ?>
        <p><a href="logout-admin.php">Logout.</a></p>
    </div>
</section>

<div class="container">
    <!-- Menu iframe -->
    <div class="menu">
        <iframe src="menu1.html" name="menu1"></iframe>
    </div>

    <!-- Content iframe -->
    <div class="main-content">
        <iframe src="admin.html" name="admin"></iframe>
    </div>


</div>

</body>
</html>
