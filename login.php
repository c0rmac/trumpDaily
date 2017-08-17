<?php
// Setup parameters
$username = $_POST["username"];
$password = $_POST["password"];

// IMPORTANT: include the a config file regarding the mysql connection.
// Please look at the mysql_config.php file
include 'mysql_config.php';

// Prepare an SQL query
// REMEMBER The variable $conn is being brought in from the mysql_config.php file
$stmt = $conn->prepare("SELECT * FROM user WHERE username = :username AND password = :password");
$stmt->bindParam(":username", $username);
$stmt->bindParam(":password", $password);

// Now lets make the query happen!
$stmt->execute();
// Fetch array of rows from database
$dbResults = $stmt->fetch(PDO::FETCH_ASSOC);

// If no results are found, variable $dbResults will become a boolean variable
if ($dbResults == false) {
    // If $dbResults is equal to false, then no results were found
    // We will make our response now
    $response = array();
    $response["success"] = false;
    $response["reason"] = "Username or password was incorrect";

    echo json_encode($response);
} else {
    // If $dbResults doesnt equal a boolean, then it must equal a row
    // Now lets make our response
    $response = array();
    $response["success"] = true;
    $response["name"] = $dbResults["name"];
    $response["age"] = $dbResults["age"];
    $response["username"] = $dbResults["username"];
    $response["password"] = $dbResults["password"];

    echo json_encode($response);
}