<?php
if(isset($_GET['user_id'])){
    $id=$_GET['user_id'];
    $severname = "localhost";
    $username = "root";
    $password = "";
    $database = "cart_s";

    $connection= new mysqli($severname,$username,$password,$database);
 
    $sql="DELETE  FROM users WHERE user_id=$id";
    $connection->query($sql);

}
header("location:index1.php");
exit;

?>
