<html>
  <head>
    <title>alphasupplements</title>
    <!--Bootstrap CSS-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!--Script-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--kevin-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!--css dashboard-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
    <!--CSS-->
    <link rel='stylesheet' href='adminstyle.css'>
    </head>
    <body>
        <!--admin dashboard-->
              <header class="header">
                <div class="logo">
                  <a href="#">alphasupplements</a>
                  <div class="search_box">
                    <input type="text" placeholder="Search">
                    <i class="fa-sharp fa-solid fa-magnifying-glass"></i>
                  </div>
                </div>
            
                <div class="header-icons">
                  <i class="fas fa-bell"></i>
                  <div class="account">
                    
                    <h4>Admin</h4>
                  </div>
                </div>
              </header>
              <div class="container">
                <nav>
                  <div class="side_navbar">
                    <span>Main Menu</span>
                    <a href="#" class="active">Dashboard</a>
                    <a href="#">Profile</a>
                    <a href="#">History</a>
                    <a href="#">Application</a>
                    <a href="#">My Account</a>
                    <a href="#">Documnets</a>
            
                    <div class="links">
                      <span>Quick Link</span>
                      <a href="#">Paypal</a>
                      <a href="#">Venmo</a>
                      <a href="#">SadaPay</a>
                    </div>
                  </div>
                </nav>
            
                <div class="main-body">
                  <h2>Dashboard</h2>
                  <div class="promo_card">
                    <h1>Welcome to Alfasupps</h1>
                    <button style="background-color: silver;">Learn More</button>
                  </div>
            
                  <div class="history_lists">
                    <div class="list1">
                      <div class="row">
                      </div>
        <br>
        <table>
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
            include"config.php";

            $sql = "SELECT * FROM orders";
            $result = $conn->query($sql);

            if (!$result) {
                die("Invalid query: " . $conn->error);
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
                <td>{$row['addres']}</td>
                <td>
                    <a class='btn btn-danger btn-sm' href='deleteorder.php?id={$row['id']}'>Delete</a>
                </td>
                </tr>";
            }
            ?>
            </tbody>
        </table>
                    </div>
                  </div>
                </div>
            
               <div class="sidebar">
                  <h4>Account Balance</h4>
                  
                  <div class="balance">
                    <i class="fas fa-dollar icon"></i>
                    <div class="info">
                      <h5>Dollar</h5>
                      <span><i class="fas fa-dollar"></i>25,000.00</span>
                    </div>
                  </div>
                  
                  <div class="balance">
                    <i class="fa-solid fa-rupee-sign icon"></i>
                    <div class="info">
                      <h5>PKR</h5>
                      <span><i class="fa-solid fa-rupee-sign"></i>300,000.00</span>
                    </div>
                  </div>
            
                  <div class="balance">
                    <i class="fas fa-euro icon"></i>
                    <div class="info">
                      <h5>Euro</h5>
                      <span><i class="fas fa-euro"></i>25,000.00</span>
                    </div>
                  </div>
            
                  <div class="balance">
                    <i class="fa-solid fa-indian-rupee-sign icon"></i>
                    <div class="info">
                      <h5>INR</h5>
                      <span><i class="fa-solid fa-indian-rupee-sign"></i>220,000.00</span>
                    </div>
                  </div>
            
                  <div class="balance">
                    <i class="fa-solid fa-sterling-sign icon"></i>
                    <div class="info">
                      <h5>Pound</h5>
                      <span><i class="fa-solid fa-sterling-sign"></i>30,000.00</span>
                    </div>
                  </div>
            
                </div>
              </div>

    </body>
    </html>