<?php
require_once 'connection.php';
if(isset($_POST['user']) && $_POST['user']!=""
        && isset($_POST['pass']) && $_POST['pass']!=""
        && isset($_POST['confirm_pass']) && $_POST['confirm_pass']!=""
         && isset($_POST['Lname']) && $_POST['Lname']!=""
         && isset($_POST['email']) && $_POST['email']!="")   
{
   function cleanInput($input){
      $input=trim($input);
      $input=stripslashes($input);
      $input=htmlspecialchars($input);
      return $input;
   }
    $user=cleanInput($_POST['user']);
    $pass=cleanInput($_POST['pass']);
    $Lname=cleanInput($_POST['Lname']);
     $email=cleanInput($_POST['email']);
     $confirm_pass=cleanInput($_POST['confirm_pass']);
      if ($pass !== $confirm_pass) {
         echo "Error: Passwords do not match.";
         header("refresh:5;url=register.html");
         exit();
      
    //$query="Select email From user where email='$email'";

     }

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
