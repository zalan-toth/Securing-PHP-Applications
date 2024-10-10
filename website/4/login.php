<?php
$host = 'localhost'; 
$dbname = 'dba';    
$user = 'creative';      
$pass = 'creative';    
$pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);

function validateStudentId($id) {
    return preg_match("/^\d{8}$/", $id);
}

function validateFilename($filename) {
    return preg_match("/^[a-zA-Z0-9_\-]+\.[a-zA-Z0-9]{1,5}$/", $filename);
}

function validateDateOfBirth($dob) {
    return preg_match("/^\d{4}-\d{2}-\d{2}$/", $dob) && strtotime($dob);
}

function validateEmail($email) {
    return filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = [];
    $studentId = $_POST['student_id'] ?? '';
    $filename = $_POST['filename'] ?? '';
    $dob = $_POST['dob'] ?? '';
    $email = $_POST['email'] ?? '';

    if (empty($studentId) || !validateStudentId($studentId)) {
        $errors[] = "Student ID must be 8 digits.";
    }

    if (empty($filename) || !validateFilename($filename)) {
        $errors[] = "Invalid filename.";
    }

    if (empty($dob) || !validateDateOfBirth($dob)) {
        $errors[] = "Date of birth format should be YYYY-MM-DD.";
    }

    if (empty($email) || !validateEmail($email)) {
        $errors[] = "Invalid email";
    }

    if (count($errors) == 0) {
        $username = htmlspecialchars($_POST['username']);
        $password = $_POST['password'];

        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username AND password = :password");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            echo "Login success, " . htmlspecialchars($username) . "!";
        } else {
            echo "Invalid.";
        }
    } else {  //Listing the errors (server sided) from validation
        foreach ($errors as $error) {
            echo htmlspecialchars($error) . "<br/>";
        }
    }
}
?>

