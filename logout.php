<?php   //logout.php

error_reporting(0);

function logout()
{
    session_start();
    $_SESSION = array();
    if (ini_get("session.use_cookies"))
    {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );

    }
    session_destroy();
    header('HTTP/1.0 401 Unauthorized');
}
?>
