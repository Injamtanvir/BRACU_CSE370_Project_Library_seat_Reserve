<!-- db_connect.php -->

<?php
$host = "localhost";
$db_name = "library";
$username = "root";
$password = "Tanvir*1432#@++";

try {
    $conn = new PDO("mysql:host=$host;dbname=$db_name", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully";  
} catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
