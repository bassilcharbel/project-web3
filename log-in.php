<?php
require_once 'connection.php';
if(isset($_POST['email']) && $_POST['email']!=""
        && isset($_POST['pass']) && $_POST['pass']!="")   
{
    function cleanInput($input){
        $input=trim($input);
        $input=stripslashes($input);
        $input=htmlspecialchars($input);
        return $input;

    }
    $email=cleanInput($_POST['email']);
    $pass=cleanInput($_POST['pass']);

    
    $query="Select email, password From user where email='$email' and password='$pass'";
    
    $res= mysqli_query($con, $query);
    
    $nbrows= mysqli_num_rows($res);
    if($nbrows== 0)
    {
        header("Location:login.html");
    }
    else if($nbrows==1) {
        session_start();
        $_SESSION['loggedin']=1;
        $_SESSION['email']=$email;
        header("Location:index.html");
   }
}
?>