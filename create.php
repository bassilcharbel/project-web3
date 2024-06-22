<?php
     $severname = "localhost";
     $username = "root";
     $password = "";
     $database = "cart_s";
 
     $connection= new mysqli($severname,$username,$password,$database);


$name="";
$Lname="";
$email="";
$password="";

$errorMessage="";
$successMessage="";

if( $_SERVER['REQUEST_METHOD']=='POST'){
   if ( isset($name) ||isset($Lname) ||isset($email) ||isset($password)){
    $name=$_POST["user"];
    $Lname=$_POST["Lname"];
    $email=$_POST["email"];
    $password=$_POST["password"];
   
    do{
        if(empty($name) ||empty($Lname)||empty($email)||empty($password)){
            $errorMessage="All field are required";
            break;
        }
        $sql="INSERT INTO users (user,Lname,email,password) VALUES ('$name','$Lname','$email','$password')" ;
        $result = $connection->query($sql);
        if( !($result)){
            $errorMessage = "Invalid query :". $connection->error ;
            break;
        }



        $name="";
        $Lname="";
        $email="";
        $password="";

        $successMessage="user added successefly";
        header( "location:index1.php");
        exit;


    }while(false);
}
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
            <div class="row mb-3">
                <label for="" class="col-sm-3 col-form-label">Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="user" value="<?php echo $name ?>">

                </div>
            </div>

            <div class="row mb-3">
                <label for="" class="col-sm-3 col-form-label">Last name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="Lname" value="<?php echo $Lname ?>">

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
                    <a class="btn btn-outline-primary" href="/Adminpage.php/index1.php" role="button">Cancel</a>
                </div>
            </div>
            

        </form>
    </div>
    
</body>
</html>
