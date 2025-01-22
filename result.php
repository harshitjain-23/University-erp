<?php

if (session_status() === PHP_SESSION_NONE) {
    session_name("student_session");
    session_start();
}

include 'connection.php';

if (!isset($_SESSION['Gmail'])) {
    header("Location: login.php");
    exit();
}

$gmail = $_SESSION['Gmail'];

// Query to fetch academic details from Table 3
$query = "SELECT * FROM result WHERE Gmail = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $gmail);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        label , placeholder{
            font-size: 1.25rem;
        }
        table {
            border-collapse: separate; /* Ensures border-spacing works */
            border-spacing: 15px; /* Adjusts space between columns and rows */
            width: 90%;
            text-align: center;
            font-size: 1.5rem;
        }

        .th, .td {
            /* border: 1px solid #ccc; Adds a border to table cells */
            padding: 10px;
        }
        
    </style>
</head>
<body>
    <h1>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<u>.  Academic Details  .</u></h1>
    <form action="">
        <br><br>
        &emsp;&emsp;&emsp;&emsp;
        <label for="roll"><strong>Roll Number :</strong></label>
        <input type="text" id="roll" placeholder="&emsp;&emsp;&emsp;&emsp;&emsp;<?php echo $_SESSION['Roll_No']; ?>" readonly>

        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
        <label for="roll"><strong>Name :</strong></label>
        <input type="text" id="roll" placeholder="&emsp;&emsp;&emsp;<?php echo $_SESSION['First_Name']." ".$_SESSION['Last_Name']; ?>" readonly>

        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
        <label for="roll"><strong>Gmail :</strong></label>
        <input type="text" id="roll" placeholder="&emsp;<?php echo $_SESSION['Gmail']; ?>" readonly>
    </form>

    <br><br><br><br>

    <table>
        <thead>
            <th>Semester 1</th>
            <th>Semester 2</th>
            <th>Semester 3</th>
        </thead>
        <tbody>
            <tr>
                <td><?php echo $data['Sem1']; ?></td>
                <td><?php echo $data['Sem2']; ?></td>
                <td><?php echo $data['Sem3']; ?></td>
            </tr>
        </tbody>
        <!-- <tfoot>
            <td colspan="5"> </td>
        </tfoot> -->
    </table>
    <p>        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
            *This all is the comulated CGPA for particular Semester.*</p>
</body>
</html>
