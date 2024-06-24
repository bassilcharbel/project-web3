<?php
if (isset($_GET['user_id'])) {
    $id = $_GET['user_id'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "cart_s";

    // Create connection
    $connection = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    // Prepare and bind
    $stmt = $connection->prepare("DELETE FROM users WHERE user_id = ?");
    $stmt->bind_param("i", $id);

    // Execute the statement
    if ($stmt->execute()) {
        // Redirect after successful deletion
        header("Location: index1.php");
        exit;
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement and connection
    $stmt->close();
    $connection->close();
} else {
    echo "No user ID specified.";
}
?>

