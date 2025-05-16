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
    $username = $_POST["email"];
    $password = $_POST["password"];
    $role = $_POST["role"]; 
    // $idd=$_POST["id"] // Added role field for radio button selection

    // Validate user inputs
    if (empty($username) || empty($password) || empty($role)) {
        // Display an error message for empty fields
        echo "Please fill in all fields.";
    } else {
        // Sanitize user inputs to prevent SQL injection
        $username = $conn->real_escape_string($username);
        $password = $conn->real_escape_string($password);

        $stmt = $conn->prepare("SELECT 
        * from {$role} where email = ? AND password =?");
        
        // Bind the parameter to the statement
        $stmt->bind_param("ss", $username, $password); 

        // Execute the statement
        if ($stmt->execute()) {
            // Fetch the result
            $result = $stmt->get_result();
            if ($result->num_rows == 1) {
                $user = $result->fetch_assoc();
        
                if($role == 'customer'){
                    $_SESSION['customer'] = $user;
                    header("Location: dashboard.php");
                }elseif($role == 'barber'){
                    $_SESSION['barber'] = $user;
                    header("Location: barberdashboard.php");
                }
                
            }else{
                $_SESSION['message'] = "Invalid Username or Password";
                $_SESSION['alert'] = "alert-warning";
                header("Location: login.php");
            }
        }
    }
}

// Close the database connection
$conn->close();
?>
