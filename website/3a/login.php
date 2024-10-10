<?php
$host = 'localhost'; 
$dbname = 'dba';    
$user = 'creative';      
$pass = 'creative';    
$pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = $pdo->query($sql);

    if ($result->rowCount() > 0) {
        echo "Login success, " . htmlspecialchars($username) . "!";
    } else {
        echo "Invalid";
    }
}
?>

