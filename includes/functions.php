<?php

// Restrict direct access
if (basename(__FILE__) === basename($_SERVER['PHP_SELF'])) {
    die("Error: Access Denied");
}

// Include the db.php file
require_once('db.php');

// Set the timezone
date_default_timezone_set("Africa/Lagos");

?>