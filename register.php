<?php
require_once 'connection.php';
if(isset($_POST['user']) && $_POST['user']!=""
        && isset($_POST['pass']) && $_POST['pass']!=""
         && isset($_POST['Lname']) && $_POST['Lname']!=""
         && isset($_POST['email']) && $_POST['email']!="")   
{
    $user=$_POST['user'];
    $pass=$_POST['pass'];
    $Lname=$_POST['Lname'];
     $email=$_POST['email'];
    $query="Select email From user where email='$email'";
    
    $res= mysqli_query($con, $query);
    
    $nbrows= mysqli_num_rows($res);
    if($nbrows== 1)
    {
       echo"error : user already exists, try another email "; 
       header("refresh:5;url=register.html");
    }
 else {
    $query2="INSERT INTO `user` (`user`, `password`, `email`, `Lname`) VALUES ('$user', '$pass', '$email',  '$Lname')";   
    $result2= mysqli_query($con,$query2);
    if(!$result2)
    {
       echo"error registration";
       header("refresh:5;url=register.html");
    }
    else
    {
    header("location:index.html");    
    }
    
}
}
?>
