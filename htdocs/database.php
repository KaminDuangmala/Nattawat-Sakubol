<?php
$servername = "localhost";
$username = "root"; // Default XAMPP/MAMP username
$password = "";     // Default XAMPP password is empty
$dbname = "user_db"; // The database name you created in Step 1

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>