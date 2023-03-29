<?php

require_once ("../functions.php");

// If user is not logged, return to login
if (!session_check()){
    redirect("../../login");
    exit();
}

// Unset all of the session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect to the login page
redirect("../../login");
exit();
?>