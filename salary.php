<?php

if (session_status() === PHP_SESSION_NONE) {
    session_name("faculty_session");
    session_start();
}

include 'connection.php';

if (!isset($_SESSION['Gmail'])) {
    header("Location: login-faculty.php");
    exit();
}

$gmail = $_SESSION['Gmail'];

// Query to fetch academic details from Table 3
$query = "SELECT * FROM salary WHERE Gmail = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $gmail);
$stmt->execute();
$salary = $stmt->get_result();
$data = $salary->fetch_assoc();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salary</title>
    <style>
        label , placeholder{
            font-size: 1.25rem;
        }
        table {
            border-collapse: separate; /* Ensures border-spacing works */
            border-spacing: 2px; /* Adjusts space between columns and rows */
            width: 90%;
            text-align: center;
            font-size: 1.5rem;
        }

        .th, .td {
            /* border: 1px solid #ccc; Adds a border to table cells */
            /* padding: 10px; */
        }
        
    </style>
</head>
<body>
    <h1>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<u>.  Salary Status  .</u></h1>
    <form action="">
        <br>
        &emsp;&emsp;&emsp;&emsp;
        <label for="faculty-id"><strong>Faculty ID :</strong></label>
        <input type="text" id="faculty-id" placeholder="&emsp;&emsp;&emsp;&emsp;<?php echo $_SESSION['Faculty_ID']; ?>" readonly>

        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
        <label for="roll"><strong>Name :</strong></label>
        <input type="text" id="roll" placeholder="&emsp;&emsp;&emsp;<?php echo $_SESSION['First_Name']." ".$_SESSION['Last_Name']; ?>" readonly>

        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
        <label for="roll"><strong>Gmail :</strong></label>
        <input type="text" id="roll" placeholder="<?php echo $_SESSION['Gmail']; ?>" readonly>
    </form>
    <br>
    <p>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<u> For Financial Year 2024 - 25 </u></p>
    


    <table border="2">
        <tr>
            <th> April </th>
            <td><?php echo $data['April']; ?></td>
        </tr>

        <tr>
            <th> May </th>
            <td><?php echo $data['May']; ?></td>
        </tr>
        <tr>
            <th> June </th>
            <td><?php echo $data['June']; ?></td>
        </tr>
        
        <tr>
            <th> July </th>
            <td><?php echo $data['July']; ?></td>
        </tr>
        
        <tr>
            <th> August </th>
            <td><?php echo $data['Aug']; ?></td>
        </tr>

        <tr>
            <th> September </th>
            <td><?php echo $data['Sep']; ?></td>
        </tr>

        <tr>
            <th> October </th>
            <td><?php echo $data['Oct']; ?></td>
        </tr>

        <tr>
            <th> November </th>
            <td><?php echo $data['Nov']; ?></td>
        </tr>

        <tr>
            <th> December </th>
            <td><?php echo $data['December']; ?></td>
        </tr>

        <tr>
            <th> January </th>
            <td><?php echo $data['Jan']; ?></td>
        </tr>

        <tr>
            <th> February </th>
            <td><?php echo $data['Feb']; ?></td>
        </tr>

        <tr>
            <th> March </th>
            <td><?php echo $data['Mar']; ?></td>
        </tr>

        
    </table>

</body>
</html>
