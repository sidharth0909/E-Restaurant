<?php
session_start();
if(isset($_SESSION["user_id"]))
{

}else{
    echo "<script> location.href='login.php'; </script>";
}


if(isset($_GET['table']))
{
    $_SESSION['tableNo'] = $_GET['table'];
    echo "<script> location.href='menu.php'; </script>";
}

?>