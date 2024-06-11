<?php
session_start();
require_once 'config.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && 
    isset($_POST['users']) && $_POST['users'] != "" &&
    isset($_POST['pass']) && $_POST['pass'] != "" &&
    isset($_POST['confirm_pass']) && $_POST['confirm_pass'] != "" &&
    isset($_POST['Lname']) && $_POST['Lname'] != "" &&
    isset($_POST['email']) && $_POST['email'] != "") {

    function cleanInput($input) {
        $input = trim($input);
        $input = stripslashes($input);
        $input = htmlspecialchars($input);
        return $input;
    }

    $users = cleanInput($_POST['users']);
    $pass = cleanInput($_POST['pass']);
    $Lname = cleanInput($_POST['Lname']);
    $email = cleanInput($_POST['email']);
    $confirm_pass = cleanInput($_POST['confirm_pass']);

    if ($pass !== $confirm_pass) {
        $_SESSION['error'] = "Error: Passwords do not match.";
        header("Location: reg-ster.php");
        exit();
    }

    $query = "SELECT email FROM user WHERE email='$email'";
    $res = mysqli_query($conn, $query);
    $nbrows = mysqli_num_rows($res);

    if ($nbrows == 1) {
        $_SESSION['error'] = "Error: User already exists, try another email.";
        header("Location: reg-ster.php");
        exit();
    } else {
        $query2 = "INSERT INTO user (users, password, email, Lname) VALUES ('$users', '$pass', '$email', '$Lname')";
        $result2 = mysqli_query($conn, $query2);

        if (!$result2) {
            $_SESSION['error'] = "Error: Registration failed.";
            header("Location: reg-ster.php");
            exit();
        } else {
            $_SESSION['success'] = "Registration successful! Please log in.";
            header("Location: reg-ster.php");
            exit();
        }
    }
} else {
    $_SESSION['error'] = "Error: Please fill in all required fields.";
    header("Location: reg-ster.php");
    exit();
}
?>
