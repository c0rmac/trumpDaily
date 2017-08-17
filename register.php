<?php

// Setup parameters
$name = $_POST["name"];
$age = $_POST["age"];
$username = $_POST["username"];
$password = $_POST["password"];

// IMPORTANT: include the a config file regarding the mysql connection.
// Please look at the mysql_config.php file
include 'mysql_config.php';

// Prepare an SQL transaction
// REMEMBER The variable $conn is being brought in from the mysql_config.php file
$stmt = $conn->prepare("INSERT INTO user (name, age, username, password) VALUES (:name, :age, :username, :password)");
$stmt->bindParam(':name', $name);
$stmt->bindParam(':age', $age);
$stmt->bindParam(':username', $username);
$stmt->bindParam(':password', $password);

// Now make the SQL transaction happen!
try {
    // Attempt to execute SQL code
    $stmt->execute();

    // At this point the transaction will have been successful
    // We can now output our JSON response

    $response = array();
    $response["success"] = true;
    echo json_encode($response);
} catch (PDOException $e) {
    // This block is called when an error occurs with out SQL transaction
    // We can output our JSON response as failure and the reason why it failed.

    $response = array();
    $response["success"] = false;
    $response["reason"] = $e->getMessage();
    echo json_encode($response);
}