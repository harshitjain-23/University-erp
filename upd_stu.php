<?php
include "connection.php";
error_reporting(0);

// Fetch data from URL parameters (GET request)
$roll = $_GET['roll'];
$Fn = $_GET['Fn'];
$Ln = $_GET['Ln'];
$age = $_GET['age'];
$dob = $_GET['dob'];
$con = $_GET['con'];
$gmail = $_GET['gmail'];
$adyear = $_GET['adyear'];
$course = $_GET['course'];
$sem = $_GET['sem'];
$curyear = $_GET['curyear'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>
</head>
<body>
    <form action="" method="POST">
        <fieldset>
            <legend>Edit Student</legend>

            <!-- Roll number field (Read-only) -->
            <label for="rollno">Roll no.</label><br>
            <input type="text" value="<?php echo htmlspecialchars($roll); ?>" id="rollno" name="rollno" readonly>
            <br><br>

            <!-- First and Last Name fields -->
            <label for="fname">First name</label><br>
            <input type="text" value="<?php echo htmlspecialchars($Fn); ?>" id="fname" name="fname">
            <br><br>

            <label for="lname">Last name</label><br>
            <input type="text" value="<?php echo htmlspecialchars($Ln); ?>" id="lname" name="lname">
            <br><br>

            <!-- Age field -->
            <label for="age">Age</label><br>
            <input type="number" id="age" name="Age" value="<?php echo htmlspecialchars($age); ?>" min="1">
            <br><br>

            <!-- Date of Birth (DOB) field -->
            <label for="dob">Date of Birth</label><br>
            <input type="date" id="dob" name="Dob" value="<?php echo htmlspecialchars($dob); ?>">
            <br><br>

            <!-- Contact and Gmail fields -->
            <label for="contact">Contact no.</label><br>
            <input type="tel" id="contact" name="cont" value="<?php echo htmlspecialchars($con); ?>">
            <br><br>

            <label for="mail">Gmail</label><br>
            <input type="email" id="mail" name="gmail" value="<?php echo htmlspecialchars($gmail); ?>" readonly>
            <br><br>

            <!-- Admission Year field (Dropdown) -->
            <label for="year">Admission Year:</label><br>
            <select id="year" name="option" readonly>
                <option value="<?php echo htmlspecialchars($adyear); ?>" selected><?php echo htmlspecialchars($adyear); ?></option>
                <option value="2020-21" disabled>2020-21</option>
                <option value="2021-22" disabled>2021-22</option>
                <option value="2022-23" disabled>2022-23</option>
                <option value="2023-24" disabled>2023-24</option>
            </select>
            <br><br>

            <!-- Course field (Dropdown) -->
            <label for="course">Course</label><br>
            <select name="courses" id="course" readonly>
                <option value="<?php echo htmlspecialchars($course); ?>" selected><?php echo htmlspecialchars($course); ?></option>
                <option value="BCA" disabled>BCA</option>
                <option value="BBA" disabled>BBA</option>
                <option value="MLT" disabled>MLT</option>
                <option value="DCE" disabled>DCE</option>
                <option value="DMDA" disabled>DMDA</option>
                <option value="BECH" disabled>BTech</option>
                <option value="BA" disabled>BA</option>
                <option value="Pharmacy" disabled>Pharmacy</option>
            </select>
            <br><br>

            <!-- Semester field -->
            <label for="sem">Semester</label><br>
            <input name="sem" type="number" id="sem" value="<?php echo htmlspecialchars($sem); ?>" min="1" max="8" readonly>
            <br><br>

            <!-- Current Year field (Dropdown) -->
            <label for="curyear">Current Year</label><br>
            <select id="curyear" name="year" readonly>
                <option value="<?php echo htmlspecialchars($curyear); ?>" selected><?php echo htmlspecialchars($curyear); ?></option>
                <option value="1st year" disabled>1st year</option>
                <option value="2nd year" disabled>2nd year</option>
                <option value="3rd year" disabled>3rd year</option>
                <option value="4th year" disabled>4th year</option>
            </select>
            <br><br>

            <button name="submit">Update Details</button>
        </fieldset>
    </form>
</body>
</html>

<?php
if (isset($_POST['submit'])) {
    // Collect updated values from POST request
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

    if ($Rollno && $Fname && $Lname && $Age && $Dob && $Contact && $Mail && $Ayear && $Course && $Sem && $Cyear) {
        $query = "UPDATE student SET First_Name='$Fname', Last_Name='$Lname', Age='$Age', DOB='$Dob', 
                  Contact='$Contact', Gmail='$Mail', Admission_year='$Ayear', Course='$Course', 
                  Semester='$Sem', Current_year='$Cyear' WHERE Roll_No='$Rollno'";

        $data = mysqli_query($conn, $query);

        if ($data) {
            echo "<script>alert('Data updated successfully')</script>";
            echo "<meta http-equiv='refresh' content='1; url= http://localhost:8080/project/student-dashbord.php'>";
        } else {
            echo "<script>alert('Failed to update data')</script>";
            echo "<meta http-equiv='refresh' content='1; url= http://localhost:8080/project/student-dashbord.php'>";
        }
    } else {
        echo "All fields are required";
    }
}
?>
