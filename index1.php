<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
   
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container my-5">
        <h2> List of Users</h2>
        <a class="btn btn-primary" href="create.php" role="button">New User</a>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Last name</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Operations</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "cart_s";
        
            $connection = new mysqli($servername, $username, $password, $database);

            if ($connection->connect_error) {
                die("Connection failed: " . $connection->connect_error);
            }
            
            $sql = "SELECT * FROM users";
            $result = $connection->query($sql);

            if (!$result) {
                die("Invalid query: " . $connection->error);
            }
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                <td>{$row['user_id']}</td>
                <td>{$row['user']}</td>
                <td>{$row['Lname']}</td>
                <td>{$row['email']}</td>
                <td>{$row['password']}</td>
                <td>
                    <a class='btn btn-primary btn-sm' href='edit.php?id={$row['user_id']}'>Edit</a>
                    <a class='btn btn-danger btn-sm' href='delete.php?user_id={$row['user_id']}'>Delete</a>
                </td>
            </tr>";
            }
            $connection->close();
            ?>
            </tbody>
        </table>
    </div>
    <br>
    <br>
    <div class="container my-5">
        <h2>List of Products</h2>
        <a class="btn btn-primary" href="createproduct.php" role="button">New Product</a>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Price $</th>
                    <th>Quantity</th>
                    <th>Code</th>
                    <th>Product Image</th>
                    <th>Operations</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $connection = new mysqli($servername, $username, $password, $database);

            if ($connection->connect_error) {
                die("Connection failed: " . $connection->connect_error);
            }
            
            $sql = "SELECT * FROM product";
            $result = $connection->query($sql);

            if (!$result) {
                die("Invalid query: " . $connection->error);
            }
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['product_name']}</td>   
                <td>{$row['product_price']}</td>
                <td>{$row['product_qty']}</td>
                <td>{$row['product_code']}</td>
                <td>{$row['product_image']}</td>
                <td>
                    <a class='btn btn-primary btn-sm' href='editproduct.php?id={$row['id']}'>Edit</a>
                    <a class='btn btn-danger btn-sm' href='deleteproduct.php?id={$row['id']}'>Delete</a>
                </td>
            </tr>";
            }
            $connection->close();
            ?>
            </tbody>
        </table>
    </div>
    <br>
    <br>
    <div class="container my-5">
        <h2>List of Orders</h2>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Amount Paid</th>
                    <th>Product</th>
                    <th>Pmode</th>
                    <th>Address</th>
                    <th>Operations</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $connection = new mysqli($servername, $username, $password, $database);

            if ($connection->connect_error) {
                die("Connection failed: " . $connection->connect_error);
            }
            
            $sql = "SELECT * FROM orders";
            $result = $connection->query($sql);

            if (!$result) {
                die("Invalid query: " . $connection->error);
            }
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['name']}</td>
                <td>{$row['email']}</td>
                <td>{$row['phone']}</td>
                <td>{$row['amount_paid']}</td>
                <td>{$row['products']}</td>
                <td>{$row['pmode']}</td>
                <td>{$row['address']}</td>
                <td>
                    <a class='btn btn-danger btn-sm' href='deleteorder.php?id={$row['id']}'>Delete</a>
                </td>
            </tr>";
            }
            $connection->close();
            ?>
            </tbody>
        </table>
    </div>
</body>
</html>
