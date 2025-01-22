<?php
include("connection.php");
error_reporting(0);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
    <link rel="stylesheet" href="style_sheet.css">    
</head>
<body>

    <form method="POST">
        <input type="text" placeholder="SEARCH" name="search">
        <button name="submit">Submit</button>
    </form>

    <?php
        if (isset($_POST['submit'])) {
            $search = $_POST['search'];

            $query = "SELECT * FROM student WHERE 
                      Roll_No like '%$search%' 
                      OR First_Name like '%$search%'
                      OR Last_Name like '%$search%' ";

            $data = mysqli_query($conn, $query);

            if ($data && mysqli_num_rows($data) > 0) {
                echo "
                <table border='2' cellspacing='10'>
                    <thead>
                        <tr>
                            <th>Roll No</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Age</th>
                            <th>DOB</th>
                            <th>Contact</th>
                            <th>Gmail</th>
                            <th>Admission Year</th>
                            <th>Course</th>
                            <th>Semester</th>
                            <th>Current Year</th>
                        </tr>
                    </thead>
                    <tbody>";
                
                // Loop through each result row
                while ($result = mysqli_fetch_assoc($data)) {
                    echo "
                        <tr>
                            <td>{$result['Roll_No']}</td>
                            <td>{$result['First_Name']}</td>
                            <td>{$result['Last_Name']}</td>
                            <td>{$result['Age']}</td>
                            <td>{$result['DOB']}</td>
                            <td>{$result['Contact']}</td>
                            <td>{$result['Gmail']}</td>
                            <td>{$result['Admission_year']}</td>
                            <td>{$result['Course']}</td>
                            <td>{$result['Semester']}</td>
                            <td>{$result['Current_year']}</td>
                        </tr>";
                }

                echo "
                    </tbody>
                </table>";
            } else {
                echo "<h2>No data found</h2>";
            }
        }
    ?>

</body>
</html>
