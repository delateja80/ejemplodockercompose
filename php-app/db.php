<?php

$host = 'db'; // Docker Compose service name for MariaDB
$username = 'myuser';
$password = 'mypassword';
$database = 'mydatabase';

// Create connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function createTable()
{
    global $conn;
    $sql = "CREATE TABLE IF NOT EXISTS users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(50) NOT NULL
    )";

    if ($conn->query($sql) === TRUE) {
        echo "Table created successfully";
    } else {
        echo "Error creating table: " . $conn->error;
    }
}

function insertData($name)
{
    global $conn;
    $sql = "INSERT INTO users (name) VALUES ('$name')";

    if ($conn->query($sql) === TRUE) {
        echo "Data inserted successfully";
    } else {
        echo "Error inserting data: " . $conn->error;
    }
}

function getAllData()
{
    global $conn;
    $sql = "SELECT * FROM users";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<h2>User Data:</h2><ul>";
        while ($row = $result->fetch_assoc()) {
            echo "<li>ID: " . $row["id"] . " - Name: " . $row["name"] . "</li>";
        }
        echo "</ul>";
    } else {
        echo "No data found";
    }
}

createTable(); // Ensure table exists

?>
