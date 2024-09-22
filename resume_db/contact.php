<?php

// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$database_name = "Contact_Db";

// Create connection
$conn = new mysqli($servername, $username, $password, $database_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$name = $_POST['name'];

// Display greeting
echo "<h3>Hello, $name!</h3>";
echo "<p>Thank you for reaching out. I will contact you soon.</p>";

// Prepare and bind
$insert_stmt = $conn->prepare("INSERT INTO contact_details (name, email, meet_date, preferred_time, message) VALUES (?, ?, ?, ?, ?)");
$insert_stmt->bind_param("sssds", $name, $_POST['email'], $_POST['meet_date'], $_POST['preferred_time'], $_POST['message']);

// Execute and check for success
if ($insert_stmt->execute()) {
    echo "<p>Message sent successfully.</p>";
} else {
    echo "<p>Error sending message: " . $insert_stmt->error . "</p>";
}

// Close connection
$insert_stmt->close();
$conn->close();
?><br><br>

<h2><a href="form_resume.html">Return to Resume page</a></h2>
