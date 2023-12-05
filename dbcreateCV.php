<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection
    $mysqli = new mysqli("localhost", "root", "", "WebAss");

    // Check if the connection was successful
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    // Collect data from the form
    $userId = 1; // Change this to the desired user ID
    $name = $_POST["name"];
    $fullName = $_POST["full_name"];
    $dateOfBirth = $_POST["date_of_birth"];
    $address = $_POST["address"];
    $phoneNumber = $_POST["phone_number"];
    $certificate = $_POST["certificate"];
    $mail = $_POST["mail"];
    $experience = $_POST["experience"];
    $education = $_POST["education"];
    $skill = $_POST["skill"];

    // Prepare the SQL statement
    $sql = "INSERT INTO resumes (userId, name, full_name, date_of_birth, address, phone_number, certificate, mail, experience, education, skill)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    // Prepare and bind the SQL statement
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("issssssssss", $userId, $name, $fullName, $dateOfBirth, $address, $phoneNumber, $certificate, $mail, $experience, $education, $skill);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Resume added successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and database connection
    $stmt->close();
    $mysqli->close();
}
