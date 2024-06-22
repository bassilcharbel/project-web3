<?php
if(isset($_GET["id"])){
    $id=$_GET["id"];
    $severname = "localhost";
    $username = "root";
    $password = "";
    $database = "cart_s";

    $connection= new mysqli($severname,$username,$password,$database);
 
    $sql="DELETE  FROM product WHERE id=$id";
    $connection->query($sql);

}
header("location:index1.php");
exit;

?>
