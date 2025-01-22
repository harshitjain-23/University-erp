<?php

if (session_status() === PHP_SESSION_NONE) {
    session_name("student_session");
    session_start();
}
if(!isset($_SESSION['Gmail'])){
    header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>student-dashbord</title>
</head>
<body>
     
    <fieldset> <!-- Feildset is like a container-->
        <legend>Your Details</legend>

        <br><br>
        &emsp;&emsp;&emsp;
        <strong>Roll Number :</strong>
        &emsp;&emsp;&emsp;&emsp;&emsp; 
        <?php echo $_SESSION['Roll_No']; ?>

        <br><br><br><br>            
        
        &emsp;&emsp;&emsp;
        <strong>First Name :</strong>
        &emsp;&emsp;&emsp;&emsp;&emsp;&ensp;
        <?php echo $_SESSION['First_Name']; ?>
        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
        
        
        
        <strong>Last Name :</strong>
        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;           
        <?php echo $_SESSION['Last_Name']; ?>
        
        <br><br><br><br>
        
        &emsp;&emsp;&emsp;
        <strong>Age :</strong>
        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
        <?php echo $_SESSION['Age']; ?>
        &emsp;&ensp;&emsp;&emsp;&emsp;&emsp;&ensp;&ensp;&ensp;&ensp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;            
        
        
        <strong>Date of Birth :</strong>
        &emsp;&emsp;&emsp;&emsp;&emsp;&ensp;    
        <?php echo $_SESSION['DOB']; ?>         
        
        <br><br><br><br>
        
        &emsp;&emsp;&emsp;
        <strong>Contact Number</strong>
        &emsp;&emsp;&emsp;&emsp;
        <?php echo $_SESSION['Contact']; ?>
        
        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;            
        <strong>Gmail :</strong>
        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;
        <?php echo $_SESSION['Gmail']; ?>
        
        <br><br><br><br>
        
        &emsp;&emsp;&emsp;
        <strong>Admission Year :</strong>
        &emsp;&emsp;&emsp;&nbsp;
        <?php echo $_SESSION['Admission_year']; ?>

        
        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;          
        <strong>Course :</strong>
        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;&nbsp;
        <?php echo $_SESSION['Course']; ?>

        <br><br><br><br>

        &emsp;&emsp;&emsp;
        <strong>Semester :</strong>
        &emsp;&emsp;&emsp;&emsp;&emsp;&ensp;&nbsp;
        <?php echo $_SESSION['Semester']; ?>

        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;          
        <strong>Current Year :</strong>
        &emsp;&emsp;&emsp;&emsp;&emsp;&ensp;
        <?php echo $_SESSION['Current_year']; ?><br><br>

        <button name="submit">
            <?php echo "
            <a href='upd_stu.php?
                roll={$_SESSION['Roll_No']}&
                Fn={$_SESSION['First_Name']}&
                Ln={$_SESSION['Last_Name']}&
                age={$_SESSION['Age']}&
                dob={$_SESSION['DOB']}&
                con={$_SESSION['Contact']}&
                gmail={$_SESSION['Gmail']}&
                adyear={$_SESSION['Admission_year']}&
                course={$_SESSION['Course']}&
                sem={$_SESSION['Semester']}&
                curyear={$_SESSION['Current_year']}
                '>
                Edit / Update
            </a>
            " 
            ?>
        </button>


    </fieldset>


</body>
</html>