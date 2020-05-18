<?php
ob_start();
// Inialize session
session_start();
// Delete certain session
unset($_SESSION['admin_username']);
unset($_SESSION['admin_password']);
session_destroy();
// Delete all session variables
// session_destroy();
// Jump to login page
header('Location: login.php');
exit;
?>