<?php
$servername="localhost";
$user="root";
$pass="";
$db="university";
$conn = mysqli_connect($servername,$user,$pass,$db);
if($conn->connect_error){
    echo "Failed to connect db" .$conn->connect_error;
}
// else{
//     echo "Connected";
// }
?>