<?php
session_start();

// Check if barber is logged in
if(!isset($_SESSION['barber'])) {
    die("Access denied");
}

$barberId = $_SESSION['barber']['id'];

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "barbershoptest";
$conn = new mysqli($servername, $username, $password, $dbname);

// Handling form data
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["profileImage"])) {
    
    $target_dir = "uploads/";
    $fileName = basename($_FILES["profileImage"]["name"]);
    $target_file = $target_dir . basename($_FILES["profileImage"]["name"]);
    
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["profileImage"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        return false; exit();
        $uploadOk = 0;
    }

    // Check file size (for example: limit to 5MB)
    if ($_FILES["profileImage"]["size"] > 5000000) {
        echo "Sorry, your file is too large.";
        return false; exit();
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        return false; exit();
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        return false; exit();
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["profileImage"]["tmp_name"], $target_file)) {
            // Update the image name in the database
            $stmt = $conn->prepare("UPDATE barber SET image = ? WHERE id = ?");
            $stmt->bind_param("si", $fileName, $barberId);
            $stmt->execute();

            echo "The file ". htmlspecialchars( basename( $_FILES["profileImage"]["name"])). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
           return false; exit();
        }
    }
}else if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Clear existing services for this barber
    $clearQuery = "DELETE FROM barber_services WHERE barber_id = ?";
    $clearStmt = $conn->prepare($clearQuery);
    $clearStmt->bind_param("i", $barberId);
    $clearStmt->execute();

    // Add the selected services
    foreach($_POST as $key => $value) {
        if(strpos($key, 'service_') === 0 && !empty($value)) {
            $serviceId = str_replace('service_', '', $key);
            $price = $_POST['price_' . $serviceId] ?? 0;

            $insertQuery = "INSERT INTO barber_services (barber_id, service_id, charges) VALUES (?, ?, ?)";
            $insertStmt = $conn->prepare($insertQuery);
            $insertStmt->bind_param("iid", $barberId, $serviceId, $price);
            $insertStmt->execute();
        }
    }
}

$conn->close();
header("Location: profile.php"); // Redirect back to the profile page
$_SESSION['message'] = "Profile Updated";
$_SESSION['alert'] = "alert-success";
?>
