<?php
session_start();

$_SESSION['username'] = 'Zalán';
$_SESSION['role'] = 'admin';

echo 'Session is set!<br>';
echo 'Username: ' . $_SESSION['username'] . '<br>';
echo 'Role: ' . $_SESSION['role'] . '<br>';
echo 'Session ID: ' . session_id();
?>

