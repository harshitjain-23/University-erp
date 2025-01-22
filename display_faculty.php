<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display form</title>
</head>
<body>

    <table border="2">
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
            <th colspan="2">Operations</th>
        </thead>
        <tbody>
            <?php
                include("connection.php");
                // error_reporting(0);

                $query = "SELECT * FROM faculty";
                $data = mysqli_query($conn, $query);
                $total = mysqli_num_rows($data);

                if($total != 0){
                    // $result = mysqli_fetch_assoc($data);
                    while($result = mysqli_fetch_assoc($data))
                    {
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
                        <td>
                                <a href='update_faculty.php?
                                    fID={$result['Faculty_ID']}&
                                    Fn={$result['First_Name']}&
                                    Ln={$result['Last_Name']}&
                                    gmail={$result['Gmail']}&
                                    cont={$result['Contact']}&
                                    depart={$result['Department']}&
                                    Ftype={$result['Faculty_type']}&
                                    Jyear={$result['Joining_year']}&
                                    sal={$result['Salary']}&
                                    Highquali={$result['Highest_Qualification']}&
                                    Texp={$result['Teaching_experience']}'>
                                    Edit / Update
                                </a>
                            </td>
                        <td><a href = 'delete_faculty.php?mail=$result[Gmail]' onclick='return checkdelete()'> Delete </td>
                        </tr>";
                    }
                } else{
                    echo "no records found";
                }
            ?>
        </tbody>



    </table>

<script>
    function checkdelete()
    {
        return confirm('Are you sure want to delete this record');
    }
</script>
</body>
</html>



