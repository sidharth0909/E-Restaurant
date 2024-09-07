<?php
session_start();
require 'connection/connect.php';

// login 
if(isset($_POST['login']))
{
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $sql ="SELECT * FROM `users` where email='$email' and password='$password'";
    $res = mysqli_query($db,$sql) or die("Error");
    if(1==mysqli_affected_rows($db))
    {
        $row=mysqli_fetch_row($res);
        $_SESSION['userId']=$row['0'];
        $_SESSION['user'] = true;
        $_SESSION['Email'] = $row[4];
        echo "<script> location.href='index.php'; </script>";
    }else{
     echo "<script> alert('username or password invalid'); </script>";
     echo "<script> location.href='login.php'; </script>";
    }
    echo "<script> location.href='login.php'; </script>";
}
echo "<script> location.href='login.php'; </script>";


?>