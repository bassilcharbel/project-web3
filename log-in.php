<?php
require_once 'config.php';

if (isset($_POST['email'], $_POST['pass'])) {
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    // Use prepared statements to avoid SQL injection
    $query = "SELECT email, password, role FROM users WHERE email=? AND password=?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "ss", $email, $pass);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);

    // Check number of rows returned
    $nbrows = mysqli_num_rows($res);

    if ($nbrows == 1) {
        // Fetch user details
        $row = mysqli_fetch_assoc($res);
        
        // Start session
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['email'] = $row['email'];
        $_SESSION['role'] = $row['role'];

        // Redirect based on role
        if ($_SESSION['role'] == 1) {
            // Admin user, redirect to admin page
            header("Location: index1.php");
        } else {
            // Regular user, redirect to index.php or any other page
            header("Location: index.php");
        }
        exit;
    } else {
        // Login failed, redirect back to login page
        header("Location: login.html");
        exit;
    }
} else {
    // Handle case where email or password is not set
    header("Location: login.html");
    exit;
}
?>
