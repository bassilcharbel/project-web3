<?php
  $severname = "localhost";
  $username = "root";
  $password = "";
  $database = "cart_s";

  $connection= new mysqli($severname,$username,$password,$database);

$id="";
$name="";
$price="";
$quantity="";
$code="";
$product_image="";

$errorMessage="";
$successMessage="";

if(($_SERVER['REQUEST_METHOD']) == 'GET'){

    if(!isset($_GET['id'])){
        header("location:/Adminpage.php/index.php");
        exit;
    }
    $id=$_GET["id"];
    $sql="SELECT * FROM product WHERE id=$id";
    $result=$connection -> query($sql);
    $row = $result-> fetch_assoc();

    if (!$row){
        header("location:/Adminpage.php/index.php");
        exit;
      
    }
    $id=$row["id"];
    $name=$row["product_name"];
    $price=$row["product_price"];
    $quantity=$row["product_qty"];
    $code=$row["product_code"];
    $product_image=$row["product_image"];

} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = $_POST["id"];
        $name = $_POST["product_name"];
        $price = $_POST["product_price"];
        $quantity = $_POST["product_qty"];
        $code = $_POST["product_code"];
        $product_image = $_POST["product_image"];
    

    do{
        if( empty($id)||empty($name)||empty($price)||empty($quantity)||empty($code)||empty($product_image)){
            $errorMessage="All field are required";
            break;

    }
    $sql = "UPDATE product SET product_name='$name',product_price='$price',product_qty='$quantity',product_code='$code',product_image='$product_image' WHERE id= $id";

    if ($connection->query($sql) === TRUE) {
        $successMessage = "User updated successfully";
        header("Location: /Adminpage.php/index.php");
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
    <title>Admin Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body>
    <div class="container my-5">
        <h2>New Product</h2>
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
            <div class="row mb-1">
                <label for="" class="col-sm-3 col-form-label">Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="product_name" value="<?php echo $name ?>">

                </div>
            </div>
            <div class="row mb-1">
                <label for="" class="col-sm-3 col-form-label">Price</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="product_price" value="<?php echo $price ?>">

                </div>
            </div>
            <div class="row mb-1">
                <label for="" class="col-sm-3 col-form-label">Quantity</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="product_qty" value="<?php echo $quantity ?>">

                </div>
                <div class="row mb-1">
                <label for="" class="col-sm-3 col-form-label">Code</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="product_code" value="<?php echo $code ?>">

                </div>
                <div class="row mb-1">
                <label for="" class="col-sm-3 col-form-label">Product image</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="product_image" value="<?php echo $product_image ?>">

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
                    <a class="btn btn-outline-primary" href="/Adminpage.php/index.php" role="button">Cancel</a>
                </div>
            </div>
            

        </form>
    </div>
    
</body>
</html>