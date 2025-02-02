<?php
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = "asd";
    $password = "123";

    // Check username and password
    if ($_POST["asd"] == $username && $_POST["123"] == $password) {
        $_SESSION["loggedin"] = true;
        header("Location: db.php");
        exit;
    } else {
        echo "Invalid username or password.";
    }
}

