<?php
include "connection.php";
// error_reporting(0);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Faculty</title>
</head>
<body>
<form action="" method="POST">
    <fieldset>
        <legend>Faculty Form</legend>
        
        <label for="id">Faculty ID</label><br>
        <input type="text" id="id" name="ID" required><br>
        
        <label for="fname">First Name</label><br>
        <input type="text" id="fname" name="Fname" required><br>
        
        <label for="lname">Last Name</label><br>
        <input type="text" id="lname" name="Lname" required><br>
        
        <label for="mail">Gmail</label><br>
        <input type="email" id="mail" name="Mail" placeholder="example@gmail.com" required><br>
        
        <label for="contact">Contact</label><br>
        <input type="tel" id="contact" name="Cont" maxlength="10" pattern="[0-9]{10}" required><br>
        
        <label for="dept">Department</label><br>
        <select id="dept" name="Dept" required>
            <option value="" disabled selected>Select department</option>
            <option value="Science">Science</option>
            <option value="Arts">Arts</option>
            <option value="Medical">Medical</option>
            <option value="Technical">Technical</option>
            <option value="Finance">Finance</option>
        </select><br>
        
        <label for="faculty">Faculty Type</label><br>
        <select name="faculty_type" id="faculty" required>
            <option value="" disabled selected>Select faculty type</option>
            <option value="Permanent">Permanent</option>
            <option value="Guest Teacher">Guest Teacher</option>
        </select><br>
        
        <label for="joining">Joining Year</label><br>
        <input type="text" id="joining" name="Jyear" required><br>
        
        <label for="sal">Salary</label><br>
        <input type="text" id="sal" name="Sal"><br>
        
        <label for="edu">Highest Education</label><br>
        <input type="text" id="edu" name="Edu" required><br>
        
        <label for="exp">Teaching Experience</label><br>
        <input type="number" id="exp" min="0" max="100" name="Exp" required><br>

        <label for="pass">Password :</label>
            <input type="password" id="pass" name="pass">
        
        <button name="submit">Submit</button>
    </fieldset>
</form>
</body>
</html>

<?php
if(isset($_POST['submit']))
{
    $ID = $_POST['ID'];
    $Fname = $_POST['Fname'];
    $Lname = $_POST['Lname'];
    $Mail = $_POST['Mail'];
    $Contact = $_POST['Cont'];
    $Dept = $_POST['Dept'];
    $facultytype = $_POST['faculty_type'];
    $Jyear = $_POST['Jyear'];
    $Sal = $_POST['Sal'];
    $Edu = $_POST['Edu'];
    $Exp = $_POST['Exp'];
    $pass = $_POST['pass'];


    if($pass != "" && $ID!="" && $Fname!="" && $Contact!="" && $Mail!="" && $Dept!="" && $facultytype!="" && $Jyear!="" && $Edu!="" && $Exp!=""){

        $sql = "INSERT INTO fac_login VALUES ('$Mail', '$pass')";
        $result = mysqli_query($conn, $sql);

        $query = "INSERT INTO faculty VALUES ('$ID', '$Fname', '$Lname', '$Mail', '$Contact', '$Dept', '$facultytype', '$Jyear', '$Sal', '$Edu', '$Exp')";
        $data = mysqli_query($conn, $query);
        
        if($data){
            echo "Data inserted";
        } else {
            echo "Data insertion failed: " . mysqli_error($conn);
        }
    } else{
        echo "Data insertion failed. Please fill in all required fields.";
    }
}
?>
