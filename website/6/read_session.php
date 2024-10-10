<?php
session_start();   //continue

if (isset($_SESSION['username']) && isset($_SESSION['role'])) {
    echo 'Username: ' . $_SESSION['username'] . '<br>';
    echo 'Role: ' . $_SESSION['role'] . '<br>';
} else {
    echo 'Session variables not set.';
}
?>

