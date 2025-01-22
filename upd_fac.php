<?php
include "connection.php";
error_reporting(0);

$facultyid = $_GET['fID'];
$fn = $_GET['Fn'];
$ln = $_GET['Ln'];
$gmail = $_GET['gmail'];
$cont = $_GET['cont'];
$depart = $_GET['depart'];
$facultytype = $_GET['Ftype'];
$joinyear = $_GET['Jyear'];
$sal = $_GET['sal'];
$highquali = $_GET['Highquali'];
$texp = $_GET['Texp'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faculty</title>
</head>
<body>
<form action="" method="POST">
    <fieldset>
        <legend>Faculty Form</legend>
        
        <label for="id">Faculty ID</label><br>
        <input type="text" id="id" name="ID" value="<?php echo htmlspecialchars($facultyid); ?>" readonly><br>
        
        <label for="fname">First Name</label><br>
        <input type="text" id="fname" name="Fname" value="<?php echo htmlspecialchars($fn); ?>" required><br>
        
        <label for="lname">Last Name</label><br>
        <input type="text" id="lname" name="Lname" value="<?php echo htmlspecialchars($ln); ?>" required><br>
        
        <label for="mail">Gmail</label><br>
        <input type="email" id="mail" name="Mail" placeholder="example@gmail.com" value="<?php echo htmlspecialchars($gmail); ?>" readonly><br>
        
        <label for="contact">Contact</label><br>
        <input type="tel" id="contact" name="Cont" maxlength="10" pattern="[0-9]{10}" value="<?php echo htmlspecialchars($cont); ?>" required><br>
        
        <label for="dept">Department</label><br>
        <select id="dept" name="Dept" required>
            <option value="<?php echo htmlspecialchars($depart); ?>" selected><?php echo htmlspecialchars($depart); ?></option>
            <option value="Science">Science</option>
            <option value="Arts">Arts</option>
            <option value="Medical">Medical</option>
            <option value="Technical">Technical</option>
            <option value="Finance">Finance</option>
        </select><br>
        
        <label for="faculty">Faculty Type</label><br>
        <select name="faculty_type" id="faculty" >
            <option value="<?php echo htmlspecialchars($facultytype); ?>" selected><?php echo htmlspecialchars($facultytype); ?></option>
            <option value="Permanent" disabled>Permanent</option>
            <option value="Guest Teacher" disabled>Guest Teacher</option>
        </select><br>
        
        <label for="joining">Joining Year</label><br>
        <input type="text" id="joining" name="Jyear" value="<?php echo htmlspecialchars($joinyear); ?>" readonly><br>
        
        <label for="sal">Salary</label><br>
        <input type="text" id="sal" name="Sal" value="<?php echo htmlspecialchars($sal); ?>" readonly><br>
        
        <label for="edu">Highest Education</label><br>
        <input type="text" id="edu" name="Edu" value="<?php echo htmlspecialchars($highquali); ?>" required><br>
        
        <label for="exp">Teaching Experience</label><br>
        <input type="number" id="exp" min="0" max="100" name="Exp" value="<?php echo htmlspecialchars($texp); ?>" required><br>
        
        <button name="submit">Update Details</button>
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

    if($ID!="" && $Fname!="" && $Contact!="" && $Mail!="" && $Dept!="" && $facultytype!="" && $Jyear!="" && $Edu!="" && $Exp!=""){

        $query = "UPDATE faculty SET First_Name = '$Fname', Last_Name = '$Lname', Gmail = '$Mail', Contact = '$Contact', Department = '$Dept', Faculty_type = '$facultytype', Joining_year = '$Jyear', Salary = '$Sal', Highest_Qualification = '$Edu', Teaching_experience = '$Exp' WHERE Faculty_ID = '$ID'";
                  
        $data = mysqli_query($conn, $query);
        
        if($data){
            echo "<script>alert('Data updated successfully')</script>";
            echo "<meta http-equiv='refresh' content='0; url= http://localhost:8080/project/faculty-dashboard.php'>";
        } else {
            echo "<script>alert('Failed to update data')</script> : " . mysqli_error($conn);
            echo "<meta http-equiv='refresh' content='0; url= http://localhost:8080/project/faculty-dashboard.php'>";
        }
    } else{
        echo "Data insertion failed. Please fill in all required fields.";
    }
}
?>
