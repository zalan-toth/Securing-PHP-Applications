<?php
session_start();  //continue

// unset
session_unset();

// destroy
session_destroy();

echo 'Session destroyed.';
?>

