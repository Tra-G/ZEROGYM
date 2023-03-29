<?php

// Restrict direct access
if (basename(__FILE__) === basename($_SERVER['PHP_SELF'])) {
    die("Error: Access Denied");
}

// Start Session
session_start();

// Include the db.php file
require_once('db.php');

// Set the timezone
date_default_timezone_set("Africa/Lagos");

// Dynamic page title
function pageTitle($site_name){
	echo "ZeroGym | ".$site_name;
}

// Redirection function
function redirect($url) {
    echo "<script>window.location.href = '$url';</script>";
}

// Session check
function session_check() {
    // return true if user is logged in
    return (isset($_SESSION['logged']) && isset($_SESSION['user_id']));
}


/**
 * Implementing CRUD Operations
 * insertRow: Insert data into table
 * getRowBySelector: Get rows with a selector
 * updateRowBySelector: Update rows with a selector
 * deleteRowBySelector: Delete rows based on selector
 */

// Create new rows
function insertRow($conn, $table, $data) {
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
        return $stmt->insert_id;
    } else {
        // If the query failed, return an error message
        return null;
    }

    /* Usage:
    $data = array(
        'name' => 'John Doe',
        'email' => 'johndoe@example.com',
        'phone' => '555-555-5555'
    );

    $id = insertRow($conn, 'users', $data);

    if (is_numeric($id)) {
        echo "New row created with ID " . $id;
    } else {
        echo $id;
    }
    */
}

// Read from database with selector
function getRowBySelector($conn, $table, $selectorColumn, $selectorValue) {
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
        return $result->fetch_assoc();
    } else {
        // If there are no rows, return null
        return null;
    }

    /* Usage:
    $table = 'users'; // Change this to the name of the table you want to select from
    $selectorColumn = 'id'; // Change this to the name of the selector column
    $selectorValue = 1; // Change this to the selector value you want to use

    $row = getRowBySelector($conn, $table, $selectorColumn, $selectorValue);

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

// Update rows by selector
function updateRowBySelector($conn, $table, $data, $selectorColumn, $selectorValue) {
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
        return $stmt->affected_rows;
    } else {
        // If the query failed, return an error message
        return "Error: " . $sql . "<br>" . $conn->error;
    }

    /* Usage:
    $table = 'users'; // Change this to the name of the table you want to update
    $data = array(
        'name' => 'John Doe',
        'email' => 'johndoe@example.com',
        'phone' => '555-555-5555'
    ); // Change this to the data you want to update
    $selectorColumn = 'id'; // Change this to the name of the selector column
    $selectorValue = 1; // Change this to the selector value you want to use

    $rowsAffected = updateRowBySelector($conn, $table, $data, $selectorColumn, $selectorValue);

    if (is_numeric($rowsAffected)) {
        echo "Rows affected: " . $rowsAffected;
    } else {
        echo $rowsAffected;
    }
    */
}

// Delete rows from database
function deleteRowBySelector($conn, $table, $selectorColumn, $selectorValue) {
    // Construct the SQL query
    $sql = "DELETE FROM $table WHERE $selectorColumn = " . $conn->real_escape_string($selectorValue);

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        // If the query was successful, return the number of rows affected
        return $conn->affected_rows;
    } else {
        // If the query failed, return an error message
        return "Error: " . $sql . "<br>" . $conn->error;
    }

    /* Usage:
    $table = 'users'; // Change this to the name of the table you want to delete from
    $selectorColumn = 'id'; // Change this to the name of the selector column
    $selectorValue = 1; // Change this to the selector value you want to use

    $rowsAffected = deleteRowBySelector($conn, $table, $selectorColumn, $selectorValue);

    if (is_numeric($rowsAffected)) {
        echo "Rows affected: " . $rowsAffected;
    } else {
        echo $rowsAffected;
    }
    */
}

?>