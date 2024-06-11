<?php
if(isset($_GET['id'])){
    $id=$_GET['id'];
    $severname = "localhost";
    $username = "root";
    $password = "";
    $database = "cart_s";

    $connection= new mysqli($severname,$username,$password,$database);
 
    $sql="DELETE  FROM user WHERE user_id=$id";
    $connection->query($sql);

}
header("location:ad-min.php");
exit;

?>