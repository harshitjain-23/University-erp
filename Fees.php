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
$query = "SELECT * FROM fees WHERE Gmail = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $gmail);
$stmt->execute();
$result = $stmt->get_result();

if ($data = $result->fetch_assoc()) {
    // Ensure the image path is correctly stored in $data['img']
    $imgPath = htmlspecialchars($data['img']); // Prevent XSS
    echo "<img src='" . $data['img'] . "' style='display: block; margin: auto;' alt='User Image'>";
} else {
    echo "No image found.";
}

?>