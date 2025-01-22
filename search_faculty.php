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

            $query = "SELECT * FROM faculty WHERE 
                      Faculty_ID like '%$search%' 
                      OR First_Name like '%$search%'
                      OR Last_Name like '%$search%'
                      OR Gmail like '%$search%'
                      OR Department like '%$search%'
                      OR Faculty_type like '%$search%'
                      OR Contact like '%$search%' ";

            $data = mysqli_query($conn, $query);

            if ($data && mysqli_num_rows($data) > 0) {
                echo "
                <table border='2' cellspacing='10'>
                    <thead>
                        <thead>
                            <th>Faculty ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Gmail</th>
                            <th>Contact</th>
                            <th>Department</th>
                            <th>Faculty Type</th>
                            <th>Joining Year</th>
                            <th>Salary</th>
                            <th>Highest Qualification</th>
                            <th>Teaching Experience</th>
                        </thead>
                    </thead>
                    <tbody>";
                
                // Loop through each result row
                while ($result = mysqli_fetch_assoc($data)) {
                    echo "
                        <tr>
                            <td>".$result['Faculty_ID']."</td>
                            <td>".$result['First_Name']."</td>
                            <td>".$result['Last_Name']."</td>
                            <td>".$result['Gmail']."</td>
                            <td>".$result['Contact']."</td>
                            <td>".$result['Department']."</td>
                            <td>".$result['Faculty_type']."</td>
                            <td>".$result['Joining_year']."</td>
                            <td>".$result['Salary']."</td>
                            <td>".$result['Highest_Qualification']."</td>
                            <td>".$result['Teaching_experience']."</td>
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
