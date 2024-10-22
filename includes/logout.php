<?php
/**
 * Code from PHP Manual (php.net), 
 * Example #1 Destroying a session with $_SESSION, 
 * Used from https://www.php.net/manual/en/function.session-destroy.php
 * Date accessed: 10 Oct 2024
 */
session_start();

// Set a cookie for the last login attempt with current date and time
$logout_time = date('Y-m-d H:i:s');
setcookie('last_login_time', $logout_time, time() + (86400 * 30), "/"); // 86400 = 1 day

// Unset all session variables
$_SESSION = array();

// If it's desired to kill the session, also delete the session cookie
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}


session_destroy();
// 
// PHP Manual. (2023). header() - Manual. 
// Retrieved October 15, 2024, from https://www.php.net/manual/en/function.header.php.
// Used for redirecting users to the index page after logging out.
// 

// Redirect to the login page after logging out
header("Location: ../index.php");
exit();
?>