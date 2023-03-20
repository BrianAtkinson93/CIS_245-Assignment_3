<?php
session_start();
if (isset($_SESSION['user_id'])) {
    // Unset all session variables
    $_SESSION = array();

    // Destroy the session
    session_destroy();
}

// Redirect to the index.php page
header('Location: index.php');
exit;
?>
