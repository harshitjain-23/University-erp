<?php

include("connection.php");
error_reporting(0);

$gmail = $_GET['mail'];
$query = "DELETE FROM faculty WHERE Gmail = '$gmail'";
$data = mysqli_query($conn, $query);


$sql = "DELETE FROM fac_login WHERE Gmail = '$gmail'";
$result = mysqli_query($conn, $sql);


if($data){
    echo "<script>alert('Record Deleted from Database')</script>";
    echo "<meta http-equiv='refresh' content='0; url= http://localhost:8080/project/display_faculty.php'>";
} else{
    echo"<script>alert('Record can't be deleted.')</script>";
    echo "<meta http-equiv='refresh' content='0; url= http://localhost:8080/project/display_faculty.php'>";

}

?>