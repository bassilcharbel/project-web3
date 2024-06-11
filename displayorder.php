<?php
  $severname = "localhost";
  $username = "root";
  $password = "";
  $database = "cart_s";

  $connection= new mysqli($severname,$username,$password,$database);

$id="";
$name="";
$email="";
$phone="";
$amout_paid="";
$product="";
$pmode="";
$addres="";


$errorMessage="";
$successMessage="";

if(($_SERVER['REQUEST_METHOD']) == 'GET'){

    if(!isset($_GET['id'])){
        header("location:/Adminpage.php/index1.php");
        exit;
    }
    $id=$_GET["id"];
    $sql="SELECT * FROM orders WHERE id=$id";
    $result=$connection -> query($sql);
    $row = $result-> fetch_assoc();

    if (!$row){
        header("location :/Adminpage.php/index1.php");
        exit;
    }
}
?>
