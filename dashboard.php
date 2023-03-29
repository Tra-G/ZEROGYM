<?php

require_once("includes/functions.php");

// Show dashboard if user is logged in
if (session_check()) {

    echo "Welcome to your dashboard, ".$_SESSION['user_id']."!";

    echo "<br><a href='logout'>Logout</a>";
}
else {
    redirect("login");
}

?>