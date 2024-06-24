<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "cart_s";

$connection = new mysqli($servername, $username, $password, $database);

$id = "";
$name = "";
$Lname = "";
$email = "";
$password = "";

$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (!isset($_GET['user_id'])) {
        header("Location: index1.php");
        exit;
    }
    $id = $_GET["user_id"];
    $sql = "SELECT * FROM users WHERE user_id = $id";
    
    $result = $connection->query($sql);
    $row = $result->fetch_assoc();
    if (!$row) {
        header("Location: index1.php");
        exit;
    }
    $name = $row["user"];
    $Lname = $row["Lname"];
    $email = $row["email"];
    $password = $row["password"];
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST["user_id"];
    $name = $_POST["user"];
    $Lname = $_POST["Lname"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    do {
        if (empty($id) || empty($name) || empty($Lname) || empty($email) || empty($password)) {
            $errorMessage = "All fields are required";
            break;
        }
        
        $sql = "UPDATE users SET user='$name', Lname='$Lname', email='$email', password='$password' WHERE user_id=$id";

        if ($connection->query($sql) === TRUE) {
            $successMessage = "User updated successfully";
            header("Location: index1.php");
            exit;
        } else {
            $errorMessage = "Error updating record: " . $connection->error;
            break;
        }
    } while (false);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container my-5">
        <h2>Edit User</h2>
        <?php
        if (!empty($errorMessage)) {
            echo "
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                <strong>$errorMessage</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            ";
        }
        ?>
        <form method="post">
            <input type="hidden" name="user_id" value="<?php echo htmlspecialchars($id); ?>">
            <div class="row mb-3">
                <label for="user" class="col-sm-3 col-form-label">Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="user" value="<?php echo htmlspecialchars($name); ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label for="Lname" class="col-sm-3 col-form-label">Last Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="Lname" value="<?php echo htmlspecialchars($Lname); ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label for="email" class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-6">
                    <input type="email" class="form-control" name="email" value="<?php echo htmlspecialchars($email); ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label for="password" class="col-sm-3 col-form-label">Password</label>
                <div class="col-sm-6">
                    <input type="password" class="form-control" name="password" value="<?php echo htmlspecialchars($password); ?>">
                </div>
            </div>

            <?php
            if (!empty($successMessage)) {
                echo "
                <div class='row mb-5'>
                    <div class='offset-sm-3 col-sm-6'>
                        <div class='alert alert-success alert-dismissible fade show' role='alert'>
                            <strong>$successMessage</strong>
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>
                    </div>
                </div>
                ";
            }
            ?>
            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="index1.php" role="button">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
