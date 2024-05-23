<?php
require_once 'connection.php';
if(isset($_POST['pass']) && $_POST['pass']!=""
         && isset($_POST['email']) && $_POST['email']!="")   
{
    $pass=$_POST['pass'];
    $email=$_POST['email'];
    
      $query="Select * From user where password='$pass' and email='$email'";
    $res= mysqli_query($con, $query);
    
    $nbrows= mysqli_num_rows($res);
    if($nbrows== 0)
    {
        header("Location:login.html");
    }
    else if($nbrows==1) {
        session_start();
        $_SESSION['loggedin']=1;
        $_SESSION['user']=$user;
        header("Location:index.html");
   }
}
?>