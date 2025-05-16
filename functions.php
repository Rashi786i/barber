<?php
session_start();

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



if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action'])) {
	
    // Unset all sessions
    session_unset();

    // Destroy the session
    session_destroy();

    // Redirect to index.php
    header("Location: index.php");
    exit();
}

if(isset($_GET['appid']) && $_SERVER['REQUEST_METHOD'] === 'GET' && isset($_SESSION['customer'])) {
	$stmt = $conn->prepare("update appointment set status = 'Cancelled' where id = ?");
	$stmt->bind_param("i", $_GET['appid']);
	if ($stmt->execute()) {
		$_SESSION['message'] = "Your Appointment is cancelled";
		$_SESSION['alert'] = "alert-success";
        header("Location: dashboard.php");
	}else{
		echo "Error: " . $stmt->error;
	}
} 

if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['appid']) && isset($_GET['cancel']) && $_GET['cancel'] === '1' &&  isset($_SESSION['barber']) ) {
	$stmt = $conn->prepare("update appointment set status = 'Cancelled' where id = ?");
	$stmt->bind_param("i", $_GET['appid']);
	if ($stmt->execute()) {
		$_SESSION['message'] = "Your Appointment is cancelled";
		$_SESSION['alert'] = "alert-danger";
		header("Location: barberdashboard.php");
		exit();
	}else{
		echo "Error: " . $stmt->error;
	}
} 



if(isset($_GET['appid']) && $_SERVER['REQUEST_METHOD'] === 'GET' && isset($_SESSION['barber']) && !isset($_GET['cancel'])) {
	$stmt = $conn->prepare("update appointment set status = 'Attended' where id = ?");
	$stmt->bind_param("i", $_GET['appid']);
	if ($stmt->execute()) {
		$_SESSION['message'] = "Client Attended Successfully";
		$_SESSION['alert'] = "alert-success";
        header("Location: barberdashboard.php");
	}else{
		echo "Error: " . $stmt->error;
	}
} 

?>