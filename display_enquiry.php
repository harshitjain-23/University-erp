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
            <th>Name</th>
            <th>Email</th>
            <th>Highest Qualification</th>
            <th>Interested Course</th>
            <th>State</th>
            <th>Number</th>
        </thead>
        <tbody>
            <?php
                include("connection.php");
                // error_reporting(0);

                $query = "SELECT * FROM contact_us";
                $data = mysqli_query($conn, $query);
                $total = mysqli_num_rows($data);

                if($total != 0){
                    while($result = mysqli_fetch_assoc($data))
                    {
                        echo "
                        <tr>
                        <td>".$result['Name']."</td>
                        <td>".$result['Email']."</td>
                        <td>".$result['Qualification']."</td>
                        <td>".$result['Course']."</td>
                        <td>".$result['State']."</td>
                        <td>".$result['Number']."</td>
                        </tr>";
                    }
                } else{
                    echo "no records found";
                }
            ?>
        </tbody>



    </table>

</body>
</html>



