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
        <a class = "btn btn-primary" href="/Adminpage.php/create.php" role="button" >New User</a>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>email</th>
                    <th>password</th>
                    <th>operations</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $severname = "localhost";
            $username = "root";
            $password = "";
            $database = "cart_s";
        
            $connection= new mysqli($severname,$username,$password,$database);

            if($connection->connect_error){
                die("connection failed:" . $connection->connect_error);
            }
            
             $sql="SELECT * FROM user";
             $result=$connection->query($sql);

             if(!$result){
                die("envalid query: " . $connection->error);
             }
             while($row = $result-> fetch_assoc()){
                echo "<tr>
                <td>$row[id]</td>
                <td>$row[name]</td>
                <td>$row[email]</td>
                <td>$row[password]</td>
                <td>
                    <a class='btn btn-primary btn-sm' href='/Adminpage.php/edit.php?id=$row[id]' >Edit</a>
                    <a class='btn btn-danger btn-sm' href='/Adminpage.php/delete.php?id=$row[id]' >Delet</a>
                   
                </td>
            </tr>
                ";
             }
             $connection->close();
            
            ?>
         
            </tbody>
        </table>
    </div>
    <br>
    <br>
    <div class="container my-5">
        <h2> List of products</h2>
        <a class = "btn btn-primary" href="/Adminpage.php/createproduct.php" role="button" >New product</a>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Price $</th>
                    <th>Quantity</th>
                    <th>Code</th>
                    <th>Product_image</th>
                    <th>operations</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $severname = "localhost";
            $username = "root";
            $password = "";
            $database = "cart_s";
        
            $connection= new mysqli($severname,$username,$password,$database);

            if($connection->connect_error){
                die("connection failed:" . $connection->connect_error);
            }
            
             $sql="SELECT * FROM product";
             $result=$connection->query($sql);

             if(!$result){
                die("envalid query: " . $connection->error);
             }
             while($row = $result-> fetch_assoc()){
                echo "<tr>
                <td>$row[id]</td>
                <td>$row[product_name]</td>   
                <td>$row[product_price]</td>
                <td>$row[product_qty]</td>
                <td>$row[product_code]</td>
                <td>$row[product_image]</td>
                <td>
                    <a class='btn btn-primary btn-sm' href='/Adminpage.php/editproduct.php?id=$row[id]' >Edit</a>
                    <a class='btn btn-danger btn-sm' href='/Adminpage.php/dealeteproduct.php?id=$row[id]' >Delet</a>
                   
                </td>
            </tr>
                ";
             }
             $connection->close();
            ?>
         
            </tbody>
        </table>
    </div>
    </table>
    </div>
    <br>
    <br>
    <div class="container my-5">
        <h2> List of Orders</h2>
       
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>email</th>
                    <th>Phone</th>
                    <th>Amout paid</th>
                    <th>Product</th>
                    <th>Pmode</th>
                    <th>Addres</th>
                    <th>operations</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $severname = "localhost";
            $username = "root";
            $password = "";
            $database = "cart_s";
        
            $connection= new mysqli($severname,$username,$password,$database);

            if($connection->connect_error){
                die("connection failed:" . $connection->connect_error);
            }
            
             $sql="SELECT * FROM orders";
             $result=$connection->query($sql);

             if(!$result){
                die("envalid query: " . $connection->error);
             }
             while($row = $result-> fetch_assoc()){
                echo "<tr>
                <td>$row[id]</td>
                <td>$row[name]</td>
                <td>$row[email]</td>
                <td>$row[phone]</td>
                <td>$row[amout_paid]</td>
                <td>$row[products]</td>
                <td>$row[pmode]</td>
                <td>$row[addres]</td>
                <td>
                    
                    <a class='btn btn-danger btn-sm' href='/Adminpage.php/deleteorder.php?id=$row[id]' >Delet</a>
                   
                </td>
            </tr>
                ";
             }
             $connection->close();
            ?>
         
            </tbody>
        </table>
    </div>

</body>
</html>