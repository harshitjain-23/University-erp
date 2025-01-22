<?php

session_start();
session_destroy();
header('location:university-admin.php');

?>