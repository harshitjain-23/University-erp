<?php
include "connection.php";
// error_reporting(0);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>
</head>
<body>
    
    <form action="" method="POST">

        <fieldset> <!-- Feildset is like a container-->
            <legend>Add Student</legend>

            <br><br>
            &emsp;&emsp;&emsp;
            <label for="rollno" >Roll no. :</label>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp; 
            <input type="text"  id="rollno" name="rollno"> 
            &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;

            <label for="pass">Password :</label>
            <input type="password" id="pass" name="pass">

            <br><br><br><br>            
            
            &emsp;&emsp;&emsp;
            <label for="fname" >First name :</label>&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;
            <input type="text" id="fname" name="fname">
            &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
            
            
            
            <label for="Lname" >Last name :</label> &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;           
            <input type="text" id="Lname" name="lname" >
            
            <br><br><br><br>
            
            &emsp;&emsp;&emsp;
            <label for="age">Age  :</label>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
            <input type ="number" id="age" name="Age"  >
            &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;            
            
            
            <label for="dob">Date of birth  :</label>  &emsp;&emsp;&emsp;&emsp;&emsp;&ensp;&nbsp;     
            <input type="date" id="dob" name="Dob">         
            
            <br><br><br><br>
            
            &emsp;&emsp;&emsp;
            <label for="conatct">Contact no. :</label>&emsp;&emsp;&emsp;&emsp;&emsp;
            <input type="tel" id="conatct" name="cont" >
            
            &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;            
            <label for="mail">Gmail  :</label>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;
            <input type="text" id="mail" placeholder="Absd@gamil...." name="gmail" >
            
            <br><br><br><br>
            
            &emsp;&emsp;&emsp;
            <label for="year">Admission year  :</label>&emsp;&emsp;&emsp;&nbsp;
            <select id="year" name="option">
                <option value=""></option>
                <option value="2020-21">2020-21</option>
                <option value="2021-22">2021-22</option>
                <option value="2022-23">2022-23</option>
                <option value="2023-24">2023-24</option>
                <option value="2024-25" disabled>2024-25</option>
            </select>

            
            &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;          
            <label for="course"> Choose a course  :</label>&emsp;&emsp;&emsp;&emsp;&ensp;&nbsp;
            <select name="courses" id="course"> 
                <option value="BCA"> BCA </option>
                <option value="BBA"> BBA </option>
                <option value="MLT"> MLT </option>
                <option value="DCE"> DCE </option>
                <option value="DMDA"> DMDA </option>
                <option value="BECH"> BTech </option>
                <option value="BA"> BA </option>
                <option value="Pharmacy"> Pharmacy </option>
                <option value="" selected>NA</option>
            </select>

            <br><br><br><br>

            &emsp;&emsp;&emsp;
            <label for="sem">Semester  :</label>&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;&nbsp;
            <input name="sem"  type="number" id="sem" min="1" max="8">

            &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;          
            <label for="year">current year  :</label>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;
            <select id="year" name="year">
                <option value="1st year">1</option>
                <option value="2nd year">2</option>
                <option value="3rd year">3</option>
                <option value="4th year">4</option>
            </select><br><br>

            <button name="submit">Submit</button>


        </fieldset>

    </form>

</body>
</html>

<?php

if(isset($_POST['submit']))
{
    $Rollno = $_POST['rollno'];
    $Fname = $_POST['fname'];
    $Lname = $_POST['lname'];
    $Age = $_POST['Age'];
    $Dob = $_POST['Dob'];
    $Contact = $_POST['cont'];
    $Mail = $_POST['gmail'];
    $Ayear = $_POST['option'];
    $Course = $_POST['courses'];
    $Sem = $_POST['sem'];
    $Cyear = $_POST['year'];
    $pass = $_POST['pass'];


    if( $pass != "" && $Rollno!="" && $Fname!="" && $Age!="" && $Dob!="" && $Contact!="" && $Mail!="" && $Ayear!="" && $Course!="" && $Sem!="" && $Cyear!="" ){

        $sql = "INSERT INTO stu_login VALUES ('$Mail', '$pass')";
        $result = mysqli_query($conn, $sql);

        $query = "INSERT INTO student VALUES ('$Rollno', '$Fname', '$Lname', '$Age', '$Dob', '$Contact', '$Mail', '$Ayear', '$Course', '$Sem', '$Cyear' )";
        $data = mysqli_query($conn, $query);
        
        if($data){
            echo "Data inserted";
        }
    } else{
        echo "Data insertion Failed";
    }
}

?>