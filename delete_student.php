<?php

include("connection.php");
error_reporting(0);

$mail = $_GET['mail'];

$query = "DELETE FROM student WHERE Gmail = '$mail'";
$data = mysqli_query($conn, $query);

$sql = "DELETE FROM stu_login WHERE Gmail = '$mail'";
$result = mysqli_query($conn, $sql);


if($data){
    echo "<font color='red'>Record Deleted from Database";
    echo "<meta http-equiv='refresh' content='0; url= http://localhost:8080/project/display_student.php'>";

} else{
    echo"<font color='red'>Record can't be deleted.";
    echo "<meta http-equiv='refresh' content='0; url= http://localhost:8080/project/display_student.php'>";

}

?>