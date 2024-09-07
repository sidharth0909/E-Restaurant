<?php
session_start();
require ('../connection/connect.php');
if(isset($_SESSION['Admin']))
{
    $useremail = $_SESSION['Email'];
} else 
{
    echo "<script> location.href='index.php'; </script>";
}


if(isset($_POST['addcategory']))
{
    $name = $_POST['category'];
    $status = $_POST['status'];
    $sql = "INSERT INTO `category`(`c_name`, `isactive`) VALUES('".$name."','".$status."')";
    $res = mysqli_query($db,$sql) or die("Error <br> $sql <br>".mysqli_error($db));
    if($res)
    {
        echo "<script> alert('Category Added successfully'); </script>";
    }
    else{
       echo "<script> alert('Somthing went wrong'); </script>";
    }
    echo "<script> location.href='categoy.php'; </script>";
}
 
// edit
if(isset($_POST['editcategory']))
{
    $name = $_POST['category'];
    $status = $_POST['status'];
    $id=$_POST['catId'];

   $sql="UPDATE `category` SET `c_name`='$name',`isactive`='$status' WHERE `c_id`='$id'";
   $res = mysqli_query($db,$sql) or die("Error");
   if($res)
   {
    echo "<script> alert('Category Updated successfully'); </script>";
   }
   else{
    echo "<script> alert('Something went wrong'); </script>";
   }
   echo "<script> location.href='categoy.php'; </script>";

}

if(isset($_GET['del']))
{
    $id= $_GET['del'];
    $sql = "DELETE FROM category WHERE `c_id`='$id'";
    $res = mysqli_query($db,$sql) or die("Error");
   if($res)
   {
    echo "<script> alert('Category Deleted successfully'); </script>";
   }
   else{
    echo "<script> alert('Something went wrong'); </script>";
   }
   echo "<script> location.href='categoy.php'; </script>";
}


// add dish
if(isset($_POST['addDish']))
{
    $dishName = $_POST['dishName'];
    $price  = $_POST['price'];
    $description = $_POST['description'];
    $category = $_POST['categoy'];
    $target="../uploadimages/".basename($_FILES['imageup']['name']);
	$image=$_FILES['imageup']['name'];
    $image_tmp=$_FILES['imageup']['tmp_name'];		
    move_uploaded_file($image_tmp, $target);

    $sql = "INSERT INTO `dishes`(`c_id`, `title`, `slogan`, `price`, `img`) VALUES ('".$category."','".$dishName."','".$description."','".$price."','".$image."')";
    $res = mysqli_query($db,$sql) or die("Error <br> $sql <br> ".mysqli_error($db));
    if($res)
   {
    echo "<script> alert('Dish Added successfully'); </script>";
   }
   else{
    echo "<script> alert('Something went wrong'); </script>";
   }
   echo "<script> location.href='dish.php'; </script>";
}


// delete dish 

if(isset($_GET['dishdel']))
{
    $id = $_GET['dishdel'];
    $sql = "DELETE FROM dishes WHERE `id`='$id'";
    $res = mysqli_query($db,$sql) or die("Error");
   if($res)
   {
    echo "<script> alert('Dish Deleted successfully'); </script>";
   }
   else{
    echo "<script> alert('Something went wrong'); </script>";
   }
   echo "<script> location.href='dish.php'; </script>";
}

// update dish
if(isset($_POST['editDish']))
{
    $id = $_POST['editDishId'];
    $dishName = $_POST['dishName'];
    $price  = $_POST['price'];
    $description = $_POST['description'];
    $category = $_POST['categoy'];
    $sql="";
    if(isset($_FILES['imageup']))
    {
        $target="../uploadimages/".basename($_FILES['imageup']['name']);
        $image=$_FILES['imageup']['name'];
        $image_tmp=$_FILES['imageup']['tmp_name'];		
        move_uploaded_file($image_tmp, $target);
        $sql = "UPDATE `dishes` set `c_id`='$category', `title`='$dishName', `slogan`='$description', `price`='$price', `img`='$image' where id='$id'";
  
    }else{
        $sql = "INSERT INTO `dishes`(`c_id`, `title`, `slogan`, `price`, `img`) VALUES ('".$category."','".$dishName."','".$description."','".$price."','".$image."')";
  
    }
   
      $res = mysqli_query($db,$sql) or die("Error <br> $sql <br> ".mysqli_error($db));
    if($res)
   {
    echo "<script> alert('Dish Added successfully'); </script>";
   }
   else{
    echo "<script> alert('Something went wrong'); </script>";
   }
   echo "<script> location.href='dish.php'; </script>";
}


// delete user
if(isset($_GET['userdel']))
{
    $id = $_GET['userdel'];
    $sql = "DELETE FROM users where u_id='$id'";
    $res = mysqli_query($db,$sql) or die("Error <br> $sql <br> ".mysqli_error($db));
    if($res)
   {
    echo "<script> alert('User Deleted Successfully'); </script>";
   }
   else{
    echo "<script> alert('Something went wrong'); </script>";
   }
   echo "<script> location.href='users.php'; </script>";

}

// order
if(isset($_GET['order']))
{
    $id = $_GET['order'];
    $status = "preparing";
    $sql = "UPDATE users_orders SET status='$status'  WHERE o_id =$id";
    $res = mysqli_query($db,$sql) or die("Error");
    if($res)
   {
    echo "<script> alert('Order is preparing'); </script>";
   }
   else{
    echo "<script> alert('Something went wrong'); </script>";
   }
   echo "<script> location.href='order.php'; </script>";
}

if(isset($_GET['cancelorder']))
{
    $id = $_GET['cancelorder'];
    $status = "Reject";
    $sql = "UPDATE users_orders SET status='$status'  WHERE o_id =$id";
    $res = mysqli_query($db,$sql) or die("Error");
    if($res)
   {
    echo "<script> alert('Order Is Reject'); </script>";
   }
   else{
    echo "<script> alert('Something went wrong'); </script>";
   }
   echo "<script> location.href='order.php'; </script>";
}

if(isset($_GET['predorder']))
{
    $id = $_GET['predorder'];
    $status = "Delivered";
    $sql = "UPDATE users_orders SET status='$status'  WHERE o_id =$id";
    $res = mysqli_query($db,$sql) or die("Error");
    if($res)
   {
    echo "<script> alert('Order Is Delivered'); </script>";
   }
   else{
    echo "<script> alert('Something went wrong'); </script>";
   }
   echo "<script> location.href='order.php'; </script>";
}
?>