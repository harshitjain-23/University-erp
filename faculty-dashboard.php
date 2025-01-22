<?php

if (session_status() === PHP_SESSION_NONE) {
    session_name("faculty_session");
    session_start();
}
if(!isset($_SESSION['Gmail'])){
    header('location:login-faculty.php');
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
        <strong>Faculty ID :</strong>
        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; 
        <?php echo $_SESSION['Faculty_ID']; ?>

        <br><br><br><br>            
        
        &emsp;&emsp;&emsp;
        <strong>First Name :</strong>
        &emsp;&emsp;&emsp;&emsp;&emsp;&ensp;&emsp;&emsp;&emsp;&emsp;
        <?php echo $_SESSION['First_Name']; ?>
        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
        
        
        
        <strong>Last Name :</strong>
        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;           
        <?php echo $_SESSION['Last_Name']; ?>
        
        <br><br><br><br>
        
        &emsp;&emsp;&emsp;
        <strong>Gmail :</strong>
        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
        <?php echo $_SESSION['Gmail']; ?>
        &emsp;&ensp;&emsp;&emsp;&emsp;&emsp;&ensp;&ensp;&ensp;           
        
        
        <strong>Contact :</strong>
        &emsp;&emsp;&emsp;&emsp;&emsp;&ensp;&emsp;&emsp;&emsp;  
        <?php echo $_SESSION['Contact']; ?>         
        
        <br><br><br><br>
        
        &emsp;&emsp;&emsp;
        <strong>Department :</strong>
        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
        <?php echo $_SESSION['Department']; ?>
        
        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;         
        <strong>Faculty Type :</strong>
        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
        <?php echo $_SESSION['Faculty_type']; ?>
        
        <br><br><br><br>
        
        &emsp;&emsp;&emsp;
        <strong>Joining Year :</strong>
        &emsp;&emsp;&emsp;&nbsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
        <?php echo $_SESSION['Joining_year']; ?>

        
        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; &emsp;&emsp;&emsp;        
        <strong>Salary :</strong>
        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;&nbsp;&emsp;&ensp;&nbsp;&nbsp;
        <?php echo $_SESSION['Salary']; ?>

        <br><br><br><br>

        &emsp;&emsp;&emsp;
        <strong>Highest Qualification :</strong>
        &emsp;&emsp;&emsp;&emsp;&emsp;&ensp;
        <?php echo $_SESSION['Highest_Qualification']; ?>

        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;        
        <strong>Teaching Experience :</strong>
        &emsp;&emsp;&emsp;&emsp;
        <?php echo $_SESSION['Teaching_experience']; ?><br><br>

        <button name="submit">
            <?php echo "
            <a href='upd_fac.php?
                fID={$_SESSION['Faculty_ID']}&
                Fn={$_SESSION['First_Name']}&
                Ln={$_SESSION['Last_Name']}&
                gmail={$_SESSION['Gmail']}&
                cont={$_SESSION['Contact']}&
                depart={$_SESSION['Department']}&
                Ftype={$_SESSION['Faculty_type']}&
                Jyear={$_SESSION['Joining_year']}&
                sal={$_SESSION['Salary']}&
                Highquali={$_SESSION['Highest_Qualification']}&
                Texp={$_SESSION['Teaching_experience']}
                '>
                Edit / Update
            </a>
            " 
            ?>
        </button>


    </fieldset>


</body>
</html>