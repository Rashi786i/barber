<?php

session_start();
// Replace DB_HOST, DB_USER, DB_PASSWORD, and DB_NAME with your database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "barbershoptest";

// Create a new MySQLi object to establish a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];

    if (strlen($username) < 8 || strlen($username) > 16) {
        $_SESSION['message'] = "Username must be between 8 and 16 characters";
        $_SESSION['alert'] = "alert-warning";
        header("Location: registerUser.php");
        exit();
    }

    $email = $_POST["email"];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

        // Invalid email address, redirect to registerUser.php
        $_SESSION['message'] = "Please enter a valid email address";
        $_SESSION['alert'] = "alert-warning";
        header("Location: registerUser.php");
        exit(); 
    }

    // Additional check for specific domain requirements
    $emailParts = explode('@', $email);
    $domainParts = explode('.', end($emailParts));

    // Check if the domain part has the required structure (e.g., .com or .com.in)
    if (count($domainParts) > 2 || strlen(end($domainParts)) > 3) {
        $_SESSION['message'] = "Invalid domain in the email address";
        $_SESSION['alert'] = "alert-warning";
        header("Location: registerUser.php");
        exit();
    }
    
    $phone = $_POST["phone"];

    if (strlen($phone) !== 11) {
        $_SESSION['message'] = "Phone number must be 7 characters long";
        $_SESSION['alert'] = "alert-warning";
        header("Location: registerUser.php");
        exit();
    }

    $password = $_POST["password"];

    // Validate password
    if (strlen($password) < 7 || !ctype_alnum($password)) {
        $_SESSION['message'] = "Password must be at least 7 characters long and contain both alphabets and numbers";
        $_SESSION['alert'] = "alert-warning";
        header("Location: registerUser.php");
        exit();
    }

    $role = $_POST["role"];

    // Validate user inputs
    if (empty($email) || empty($password) || empty($role) || empty($username) || empty($phone)) {
        // Display an error message for empty fields
        echo "Please fill in all fields.";
    } else {
        // Sanitize user inputs to prevent SQL injection
        $username = $conn->real_escape_string($username);
        $email = $conn->real_escape_string($email);
        $phone = $conn->real_escape_string($phone);
        $password = $conn->real_escape_string($password);

        // Hash the password for security
        // $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Prepare a statement for inserting data into the database
        if ($role == 'stylist') {
            $stmt = $conn->prepare("INSERT INTO barber (bname, email, phone, password) VALUES (?, ?, ?, ?)");
            
            $stmt->bind_param("ssss", $username, $email, $phone, $password);

            if ($stmt->execute()) {
                // Create session data for the new barber
                $_SESSION['barber'] = array(
                    'id' => $conn->insert_id,
                    'bname' => $username,
                    'email' => $email,
                    'phone' => $phone
                );
                header("Location: barberdashboard.php");
            } else {
                $_SESSION['message'] = "Error: " . $stmt->error;
                $_SESSION['alert'] = "alert-danger";
                header("Location: register.php");
            }
        } elseif ($role == 'customer') {
            $stmt = $conn->prepare("INSERT INTO customer (cname, email, phone, password) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $username, $email, $phone, $password);

            if ($stmt->execute()) {
                // Create session data for the new user
                $_SESSION['customer'] = array(
                    'id' => $conn->insert_id,
                    'cname' => $username,
                    'email' => $email,
                    'phone' => $phone
                );
                header("Location: dashboard.php");
            } else {
                $_SESSION['message'] = "Error: " . $stmt->error;
                $_SESSION['alert'] = "alert-danger";
                header("Location: register.php");
            }
        } else {
            // Handle invalid role
            $_SESSION['message'] = "Invalid role selected";
            $_SESSION['alert'] = "alert-warning";
            header("Location: register.php");
        }
    }
}

// Close the database connection
$conn->close();
?>
