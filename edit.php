<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "cart_s";

$connection = new mysqli($servername, $username, $password, $database);

$id = "";
$name = "";
$email = "";
$password = "";

$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (!isset($_GET['user_id'])) {
        header("Location: /Adminpage.php/index.php");
        exit;
    }
    $id = $_GET["user_id"];
    $sql = "SELECT * FROM user WHERE id=$id";
    
    $result = $connection->query($sql);
    $row = $result->fetch_assoc();
    if (!$row) {
        header("Location: ad-min.php");
        exit;
    }
    $name = $row["name"];
    $email = $row["email"];
    $password = $row["password"];
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST["id"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    do {
        if (empty($id) || empty($name) || empty($email) || empty($password)) {
            $errorMessage = "All fields are required";
            break;
        }
        
        $sql = "UPDATE user SET name='$name', email='$email', password='$password' WHERE id=$id";

        if ($connection->query($sql) === TRUE) {
            $successMessage = "User updated successfully";
            header("ad-min.php");
            exit;
        } else {
            $errorMessage = "Error updating record: " . $connection->error;
            break;
        }
    } while (false);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
</head>
<body>
    <?php
    if (!empty($errorMessage)) {
        echo "<div style='color: red;'>$errorMessage</div>";
    }

    if (!empty($successMessage)) {
        echo "<div style='color: green;'>$successMessage</div>";
    }
    ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body>
    <div class="container my-5">
        <h2>New User</h2>
        <?php
        if(!empty($errorMessage)){
            echo"
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
            <strong>$errorMessage</strong>
            <button type='button' class='btn-close' data-bs-dimiss='alert' aria-label='close'></button>
            </div> 
            ";
        };
        
        ?>
        <form method="post">
            <input type="hidden" name="id"value="<?php echo $id ?>">
            <div class="row mb-3">
                <label for="" class="col-sm-3 col-form-label">Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="name" value="<?php echo $name ?>">

                </div>
            </div>
            <div class="row mb-3">
                <label for="" class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="email" value="<?php echo $email ?>">

                </div>
            </div>
            <div class="row mb-3">
                <label for="" class="col-sm-3 col-form-label">Password</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="password" value="<?php echo $password ?>">

                </div>
            </div>

            <?php
            if(!empty($successMessage))
               echo" <div class='row mb-5' >
                  <div class='offest-sm-3 col-sm-6'>
                      <div class='alert alert-success alert-dimissible fade show' role='alert'>
                        <strong>$successMessage</strong>
                        <button type='button' class='btn-close' data-bs-dimiss='alert' aria-label='close'></button>
                      
                      </div>
                  
                  </div>
               </div>"

            
            ?>
            <div class="row mb-3">
                <div class="offest-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="ad-min.php" role="button">Cancel</a>
                </div>
            </div>
            

        </form>
    </div>
    
</body>
</html>