<?php

// Get the Database URL from Render's environment variable
$dbUrl = getenv('DATABASE_URL');

if ($dbUrl) {
    // This code runs ON RENDER (connected to your live database)
    $dbConfig = parse_url($dbUrl);
    
    // The URL format is: mysql://user:password@host:port/database
    $hostname = $dbConfig['host'];
    $port     = $dbConfig['port']; // Railway uses a specific port
    $username = $dbConfig['user'];
    $password = $dbConfig['pass'];
    $database = ltrim($dbConfig['path'], '/');

    // Connect using all parts, including the specific port
    $conn = mysqli_connect($hostname, $username, $password, $database, $port);

} else {
    // This code runs ON YOUR LOCAL XAMPP
    $hostname = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'university'; // Your local database name
    
    $conn = mysqli_connect($hostname, $username, $password,  $database);
}

// Check connection
if (mysqli_connect_errno()) {
    die("Connection failed: " . mysqli_connect_error());
}

?>
