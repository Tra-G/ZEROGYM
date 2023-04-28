<?php

/**
 * REQUIRED VARIABLES
 *
 * environment variables unpacking
 * error reporting
 * app root
 * start session
 * timezone
*/

// environment variables unpacking
$env_file = __DIR__ . '/../.env';
if (file_exists($env_file)) {
    $lines = file($env_file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        // Skip comment lines
        if (strpos(trim($line), '#') === 0) {
            continue;
        }
        list($key, $value) = explode('=', $line, 2);
        putenv("$key=$value");
        $_ENV[$key] = $value;
        $_SERVER[$key] = $value;
    }
}


// error reporting
if (getenv('APP_ENV') === 'development') {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
}
else {
    error_reporting(0);
}


// app root
define('APP_ROOT', $_ENV['APP_ROOT']);


// start Session
session_start();


// timezone
date_default_timezone_set($_ENV['TIME_ZONE']);


/**
 * REUSEABLE FUNCTIONS
 *
 * pageTitle: Outputs the universal page title and current page title
 * route: To set page header after an action has been completed
 * redirect: Outputs the correct url to use with href tag
 * assets: Outputs the url to the correct assets folder
 * session_check: Checks if a user is logged in
*/


// dynamic page title
function pageTitle($site_name){
	return  $_ENV['SITE_NAME'] . " | ".$site_name;
}


// Routing function
function route($url) {
    header('Location: ' . APP_ROOT . '/'.$url);
}


// Redirection function
function redirect($url) {
    return APP_ROOT . '/'.$url;
}


// Assets folder
function assets($file) {
    return APP_ROOT . '/assets/'.$file;
}


// Session check
function session_check() {
    // return true if user is logged in
    return (isset($_SESSION['logged']) && isset($_SESSION['user_id']));
}


/**
 * CRUD OPERATIONS
 *
 * insertRow: Insert data into table
 * getRowBySelector: Get rows with a selector
 * updateRowBySelector: Update rows with a selector
 * deleteRowBySelector: Delete rows based on selector
 * getRows: Gets rows and total rows based on optional selector
 * sumAmounts: Get total sum of a column
*/


// Database connection
function db_connect() {
    try {
        $conn = mysqli_connect($_ENV['DB_HOST'], $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD'], $_ENV['DB_NAME']);
    }
    catch (Exception $e) {
        die("Connection failed: " . mysqli_connect_error());
    }
    return $conn;
}

function insertRow($table, $data) {
    $conn = db_connect();
    // Construct the SQL query
    $keys = array_keys($data);
    $values = array_values($data);
    $placeholders = array_fill(0, count($values), '?');

    $sql = "INSERT INTO $table (" . implode(',', $keys) . ") VALUES(" . implode(',', $placeholders) . ")";

    // Prepare the statement
    $stmt = $conn->prepare($sql);

    // Bind the parameters
    $types = str_repeat('s', count($values));
    $stmt->bind_param($types, ...$values);

    // Execute the statement
    if ($stmt->execute()) {
        // If the query was successful, return the ID of the newly created row
        $new_id = $stmt->insert_id;
    } else {
        // If the query failed, return null
        $new_id = null;
    }

    // Close the database connection
    mysqli_close($conn);

    return $new_id;

    /* Usage:
    $data = array(
        'name' => 'John Doe',
        'email' => 'johndoe@example.com',
        'phone' => '555-555-5555'
    );

    $id = insertRow('users', $data);

    if (is_numeric($id)) {
        echo "New row created with ID " . $id;
    } else {
        echo $id;
    }
    */
}


function getRowBySelector($table, $selectorColumn, $selectorValue) {
    $conn = db_connect();
    // Prepare the SQL query
    $stmt = $conn->prepare("SELECT * FROM $table WHERE $selectorColumn = ?");

    // Bind the selector value to the query
    $stmt->bind_param("s", $selectorValue);

    // Execute the query
    $stmt->execute();

    // Get the result set
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // If there is at least one row, return the data as an associative array
        $data = $result->fetch_assoc();
    } else {
        // If there are no rows, return null
        $data = null;
    }

    // Close the database connection
    mysqli_close($conn);

    return $data;

    /* Usage:
    $table = 'users'; // Change this to the name of the table you want to select from
    $selectorColumn = 'id'; // Change this to the name of the selector column
    $selectorValue = 1; // Change this to the selector value you want to use

    $row = getRowBySelector($table, $selectorColumn, $selectorValue);

    if ($row) {
        // Display the data from the selected row
        foreach ($row as $key => $value) {
            echo $key . ": " . $value . "<br>";
        }
    } else {
        echo "Row not found.";
    }
     */
}


function updateRowBySelector($table, $data, $selectorColumn, $selectorValue) {
    $conn = db_connect();
    // Construct the SQL query
    $set = array();
    foreach ($data as $key => $value) {
        $set[] = "$key = ?";
    }
    $sql = "UPDATE $table SET " . implode(',', $set) . " WHERE $selectorColumn = ?";

    // Prepare the statement
    $stmt = $conn->prepare($sql);

    // Bind the parameters
    $types = str_repeat('s', count($data) + 1);
    $values = array_values($data);
    $values[] = $selectorValue;
    $stmt->bind_param($types, ...$values);

    // Execute the statement
    if ($stmt->execute()) {
        // If the query was successful, return the number of rows affected
        $affected_rows = $stmt->affected_rows;
    } else {
        $affected_rows = null;
    }

    // Close the database connection
    mysqli_close($conn);

    return $affected_rows;

    /* Usage:
    $table = 'users'; // Change this to the name of the table you want to update
    $data = array(
        'name' => 'John Doe',
        'email' => 'johndoe@example.com',
        'phone' => '555-555-5555'
    ); // Change this to the data you want to update
    $selectorColumn = 'id'; // Change this to the name of the selector column
    $selectorValue = 1; // Change this to the selector value you want to use

    $rowsAffected = updateRowBySelector($table, $data, $selectorColumn, $selectorValue);

    if (is_numeric($rowsAffected)) {
        echo "Rows affected: " . $rowsAffected;
    } else {
        echo $rowsAffected;
    }
    */
}


function deleteRowBySelector($table, $selectorColumn, $selectorValue) {
    $conn = db_connect();
    // Construct the SQL query
    $sql = "DELETE FROM $table WHERE $selectorColumn = " . $conn->real_escape_string($selectorValue);

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        // If the query was successful, return the number of rows affected
        $affected_rows = $conn->affected_rows;
    } else {
        // If the query failed, return null
        $affected_rows = null;
    }

    // Close the database connection
    mysqli_close($conn);

    return $affected_rows;

    /* Usage:
    $table = 'users'; // Change this to the name of the table you want to delete from
    $selectorColumn = 'id'; // Change this to the name of the selector column
    $selectorValue = 1; // Change this to the selector value you want to use

    $rowsAffected = deleteRowBySelector($table, $selectorColumn, $selectorValue);

    if (is_numeric($rowsAffected)) {
        echo "Rows affected: " . $rowsAffected;
    } else {
        echo $rowsAffected;
    }
    */
}


function getRows($table, $selectorColumn = null, $selectorValue = null, $orderByColumn = null, $orderByDirection = 'ASC', $limit = null) {
    $conn = db_connect();
    $sql = "SELECT * FROM $table";

    if ($selectorColumn && $selectorValue) {
        // If a selector is provided, append the WHERE clause to the SQL query
        $sql .= " WHERE $selectorColumn = ?";
    }

    if ($orderByColumn) {
        // If an order by column is provided, append the ORDER BY clause to the SQL query
        $sql .= " ORDER BY $orderByColumn $orderByDirection";
    }

    if ($limit) {
        // If a limit is provided, append the LIMIT clause to the SQL query
        $sql .= " LIMIT $limit";
    }

    // Prepare the SQL query
    $stmt = $conn->prepare($sql);

    if ($selectorColumn && $selectorValue) {
        // If a selector is provided, bind the selector value to the prepared statement
        $stmt->bind_param("s", $selectorValue);
    }

    // Execute the query
    $stmt->execute();

    // Get the result set
    $result = $stmt->get_result();

    // Get the total number of matched rows
    $count = $result->num_rows;

    // Get all the matched rows
    $rows = $result->fetch_all(MYSQLI_ASSOC);

    // Close the database connection
    mysqli_close($conn);

    return array('count' => $count, 'rows' => $rows);

    /* Usage:
    $table = 'users'; // Change this to the name of the table you want to select from

    // With selector, order by and limit
    $selectorColumn = 'id'; // Change this to the name of the selector column
    $selectorValue = 1; // Change this to the selector value you want to use
    $orderByColumn = 'name'; // Change this to the name of the column you want to order by
    $orderByDirection = 'DESC'; // Change this to the order direction you want to use
    $limit = 10; // Change this to the number of rows you want to limit to
    $result = getRows($table, $selectorColumn, $selectorValue, $orderByColumn, $orderByDirection, $limit);

    // Without selector, order by or limit
    $result = getRows($table);

    $count = $result['count'];
    $rows = $result['rows'];

    echo "Total rows: " . $count . "<br>";
    echo "Matched rows: " . json_encode($rows);
    */
}

// Get total of a column in a table
function sumAmounts($table, $amountColumn) {
    $conn = db_connect();
    // Prepare the SQL query
    $stmt = $conn->prepare("SELECT COALESCE(SUM(`$amountColumn`), 0) FROM `$table`");

    // Execute the query
    $stmt->execute();

    // Get the result set
    $result = $stmt->get_result();

    // Get the total amount
    $total = $result->fetch_row()[0];

    // Close the database connection
    mysqli_close($conn);

    return $total;
}

?>