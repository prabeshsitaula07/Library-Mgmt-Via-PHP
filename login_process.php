<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate credentials
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Check if credentials are correct
    if ($email === "sabinraj@gmail.com" && $password === "sabin123") {
        // Redirect to index.php
        header("Location: index.php");
        exit;
    } else {
        // Invalid credentials, redirect back to login.php
        header("Location: login.php");
        exit;
    }
} else {
    // Redirect back to login.php if accessed directly
    header("Location: login.php");
    exit;
}
?>
