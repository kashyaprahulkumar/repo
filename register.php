<?php
// Database connection
$servername = "localhost";
$username = "root"; // your MySQL username
$password = "rajree"; // your MySQL password
$dbname = "project";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);

    $sql = "INSERT INTO users (first_name, last_name, gender, email, password, phone)
            VALUES ('$first_name', '$last_name', '$gender', '$email', '$password', '$phone')";

    if ($conn->query($sql) === TRUE) {
        echo "<p style='color: green;'>Registration successful!</p>";
    } else {
        echo "<p style='color: red;'>Error: " . $conn->error . "</p>";
    }
}

$conn->close();
?>

