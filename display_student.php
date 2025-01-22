<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display form</title>
</head>
<body>

    <table border="2" cellspacing="10">
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
                <th colspan="2" align="center">Operations</th>
            </tr>
        </thead>
        <tbody>
            <?php
                include("connection.php");
                // error_reporting(0);

                $query = "SELECT * FROM student";
                $data = mysqli_query($conn, $query);
                $total = mysqli_num_rows($data);

                if ($total != 0) {
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
                            <td>
                                <a href='update_student.php?
                                    roll={$result['Roll_No']}&
                                    Fn={$result['First_Name']}&
                                    Ln={$result['Last_Name']}&
                                    age={$result['Age']}&
                                    dob={$result['DOB']}&
                                    con={$result['Contact']}&
                                    gmail={$result['Gmail']}&
                                    adyear={$result['Admission_year']}&
                                    course={$result['Course']}&
                                    sem={$result['Semester']}&
                                    curyear={$result['Current_year']}'>
                                    Edit / Update
                                </a>
                            </td>
                            <td>
                                <a href='delete_student.php?mail={$result['Gmail']}' onclick='return checkdelete()'>Delete</a>
                            </td>
                        </tr>";
                    }
                } else {
                    echo "<tr><td colspan='12'>No records found</td></tr>";
                }
            ?>
        </tbody>
    </table>

<script>
    function checkdelete() {
        return confirm('Are you sure you want to delete this record?');
    }
</script>
</body>
</html>
