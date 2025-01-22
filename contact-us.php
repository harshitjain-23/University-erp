<?php
include "connection.php";
// error_reporting(0);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="style_sheet.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@0,400..800;1,400..800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.6.0/css/fontawesome.min.css">
    <script src="https://kit.fontawesome.com/ee7e713503.js" crossorigin="anonymous"></script>
</head>

<body>

    <section class="sub-header-about">
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
                    <li><a href="login.php">Login</a></li>

                </ul>
            </div>
            <i class="fa -solid fa-bars" onclick="showmenu()"></i>
        </nav>
        <h1>Contact Us</h1>
    </section>

    <!------------contact us----------->
    
    <div class="container">
        <section class="sec1">
            <div class="left-header">
                <h1>Delhi Skills And Entrepreneurship University</h1>
                <p>Delhi Skill and Entrepreneurship University (DSEU) was established by the Delhi
                    Legislative  Assembly as an unitary and teaching university in August 2020 by Government of NCT
                    of Delhi
                    with a vision to empower students with high-quality education, practical skills, and
                    entrepreneurial abilities to meet the demands of today’s evolving job market.
                </p>
            </div>
            <div class="left-contact">
                <p class="Address"> <b>Address :</b> <br><br> G/Floor, Integrated Institute Of Technology, Complex, Dwarka Sector 9, Dwarka, New Delhi, Delhi, 110077.</p>
                <p class="contact">
                    <b>Conatct : </b> <br>1800 309 3209 <br> 011-4116 9950
                </p>
                <p><b>Email:</b> 
                    <br>dseuonline@gmail.com</p>

            </div>

        </section>
        <section class="sec2">
            <div class="sec_form">
                <header>Contact Us </header>
                <form action="" class="form" method="POST">
                    <div class="input-box">
                        <label for="name">Full Name:</label>
                        <input type="text" id="name" name="Name" placeholder="Enter full name">
                    </div>
                    <div class="input-box">
                        <label for="mail">Email Address :</label>
                        <input type="text" id="mail" name="Mail" required placeholder="abcd@gmail.com">
                    </div>
                    <div class="input-box">
                        <label for="high"> Qualification:</label>
                        <input type="text" id="high" name="High" required placeholder="highest Qualification">
                    </div>
                    <div class="input-box">
                        <label for="course">Course :</label>
                        <input type="text" id="course" name="Course" required placeholder="Course you're intrested in">
                    </div>
                    <div class="input-box">
                        <label for="state">State:</label>
                        <select id="state" name="states" required class="sdropdowm">
                            <option value="" hidden>--Select State--</option>
                            <option value="Andhra Pradesh">Andhra Pradesh</option>
                            <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                            <option value="Assam">Assam</option>
                            <option value="Bihar">Bihar</option>
                            <option value="Chhattisgarh">Chhattisgarh</option>
                            <option value="Goa">Goa</option>
                            <option value="Gujarat">Gujarat</option>
                            <option value="Haryana">Haryana</option>
                            <option value="Himachal Pradesh">Himachal Pradesh</option>
                            <option value="Jharkhand">Jharkhand</option>
                            <option value="Karnataka">Karnataka</option>
                            <option value="Kerala">Kerala</option>
                            <option value="Madhya Pradesh">Madhya Pradesh</option>
                            <option value="Maharashtra">Maharashtra</option>
                            <option value="Manipur">Manipur</option>
                            <option value="Meghalaya">Meghalaya</option>
                            <option value="Mizoram">Mizoram</option>
                            <option value="Nagaland">Nagaland</option>
                            <option value="Odisha">Odisha</option>
                            <option value="Punjab">Punjab</option>
                            <option value="Rajasthan">Rajasthan</option>
                            <option value="Sikkim">Sikkim</option>
                            <option value="Tamil Nadu">Tamil Nadu</option>
                            <option value="Telangana">Telangana</option>
                            <option value="Tripura">Tripura</option>
                            <option value="Uttar Pradesh">Uttar Pradesh</option>
                            <option value="Uttarakhand">Uttarakhand</option>
                            <option value="West Bengal">West Bengal</option>
                            <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                            <option value="Chandigarh">Chandigarh</option>
                            <option value="Dadra and Nagar Haveli and Daman and Diu">Dadra and Nagar Haveli and Daman
                                and Diu</option>
                            <option value="Delhi">Delhi</option>
                            <option value="Lakshadweep">Lakshadweep</option>
                            <option value="Puducherry">Puducherry</option>
                            <option value="Ladakh">Ladakh</option>
                            <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                        </select>
                    </div>
                    <div class="input-box">
                        <label for="num">Number :</label>
                        <input type="tel" id="num" maxlength="10" pattern="[0-9]{10}" placeholder="+91" name = "Number" required>
                    </div>


                    <button class="button" name = "submit" >Submit</button>

                </form>
            </div>
        </section>
    </div>
    <section class="location">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3503.5775505215374!2d77.06009187549894!3d28.582445675692163!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390d1b1939555555%3A0x5cb3da8201a9355b!2sDelhi%20Skill%20and%20Entrepreneurship%20University!5e0!3m2!1sen!2sin!4v1730288662886!5m2!1sen!2sin"
            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
    </section>







    <footer>
        <h2>Footer</h2>
        <div class="footer-content">
            <div class="footer_left">
                <div class="footer-logo">
                    <img class="logo" src ="images/Dseu_logoo.png" >
                </div>
                <div class="footer-icon">
                    <ul>
                        <li><a href="#" target="_blank" name="instagram"><i class="fa -brands fa-instagram"></i></a></li>
                        <li><a href="#" target="_blank"><i class="fa -brands fa-facebook"></i></a></li>
                        <li><a href="#" target="_blank"><i class="fa -brands fa-linkedin"></i></a></li>
                        <li><a href="#" target="_blank"><i class="fa -brands fa-twitter"></i></a></li>
                        <li><a href="#" target="_blank"><i class="fa -brands fa-whatsapp"></i></a></li>
                    </ul>
                </div>
                <script src="https://kit.fontawesome.com/aed9932724.js" crossorigin="anonymous"></script>
            </div>
            <div class="footer-links">
                <div >
                    <h4>Menu</h4>
                    <a href="home_page.html">Home</a>
                    <a href="about.html">About</a>
                    <a href="disclaimer.html">Disclaimer</a>
                    <a href="contact-us.php">Contact</a>
                    <a href="login.php">Login</a>
                </div>
                <div class="inform">
                    <h4>Information</h4>
                    <p class="Address"> <b>Address :</b>  G/Floor, Integrated Institute Of Technology, Complex, Dwarka
                        Sector 9, Dwarka, New Delhi, Delhi, 110077.</p>
                        
                    <p class="contact">
                        <b>Conatct : </b> 1800 309 3209 , 011-4116 9950
                    </p>
                    
                    <a target="_blank"  href="https://dseuonline.in/"><b>Email:</b>dseuonline@gmail.com</a>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p>Copyright © 2024 All Right Reserve with AcedamiX Pvt Ltd </p>
        </div>
    </footer>

</body>

</html>


<?php

if(isset($_POST['submit']))
{
    $Name = $_POST['Name'];
    $Mail = $_POST['Mail'];
    $High = $_POST['High'];
    $Course = $_POST['Course'];
    $states = $_POST['states'];
    $Number = $_POST['Number'];
 

    if( $Name!="" && $Mail!="" && $High!="" && $Course!="" && $states!="" && $Number!=""){

        $query = "INSERT INTO contact_us VALUES ('$Name', '$Mail', '$High', '$Course', '$states', '$Number')";
        $data = mysqli_query($conn, $query);
        
        if($data){
            echo "Data inserted";
        }
    } else{
        echo "Data insertion Failed";
    }
}

?>