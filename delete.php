<?php
if(isset($_GET['id'])){
    $id=$_GET['id'];
    $severname = "localhost";
    $username = "root";
    $password = "";
    $database = "cart_s";

    $connection= new mysqli($severname,$username,$password,$database);
 
    $sql="DELETE  FROM user WHERE id=$id";
    $connection->query($sql);

}
header("location:/Adminpage.php/index.php");
exit;

?>