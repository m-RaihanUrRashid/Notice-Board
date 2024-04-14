<?php 
session_start();
include('dbconn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userID = $_POST["userID"];
    $password = $_POST["password"];

    // Simulated authentication - Replace this with actual authentication logic
    // For example, querying a database to validate credentials
    if ($userID === "admin" && $password === "password") {
        // Authentication successful, redirect to dashboard or another page
        // header("Location: dashboard.php");
        echo("LESGOOO");
        exit;
    } else {
        // Authentication failed, display an error message
        echo "Error, Invalid user ID or password.";
    }
}
?>