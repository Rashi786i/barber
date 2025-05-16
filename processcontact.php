<?php

// Replace DB_HOST, DB_USER, DB_PASSWORD, and DB_NAME with your database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "appointment";
$table = "contact";

// Create a new MySQLi object to establish a connection
$conn = new mysqli($servername, $username, $password, $dbname);


$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$phone = $_POST['phone'];

$comments = $_POST['comments'];

if(trim($first_name) == '') {
	echo '<div class="error_message">Attention! You must enter your name.</div>';
	exit();
}  else if(trim($email) == '') {
	echo '<div class="error_message">Attention! Please enter a valid email address.</div>';
	exit();
}

if(trim($comments) == '') {
	echo '<div class="error_message">Attention! Please enter your message.</div>';
	exit();
}

	$stmt = $conn->prepare("INSERT INTO contact (first_name, last_name, email, phone, comments) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param('sssss',$first_name, $last_name, $email, $phone, $comments);

	if ($stmt->execute()) {
        // Form data saved successfully
        echo "Form data saved successfully.";
    } else {
        // Error in saving form data
        echo "Error: " . $stmt->error;
    }

    // Close the statement and database connection
    $stmt->close();
    $conn->close();
?>
