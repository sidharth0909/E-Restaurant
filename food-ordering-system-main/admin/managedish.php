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

if(isset($_GET['edit']))
{
    $id = $_GET['edit'];
    $sql = "SELECT * FROM  `dishes` where id='$id'";
    $res = mysqli_query($db,$sql) or die("Error");
    $row = mysqli_fetch_row($res);
    $name = $row[2];
    $cid=$row[1];
    $price= $row[4];
    $img = $row[5];
    $desc = $row[3];
}
include('include/head.php');
include('include/sidebar.php');
?>
<main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Food Dish</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Food Dish</li>
                        </ol>
                     
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                              <?php echo isset($id) ? 'Edit' : 'Add'; ?> Food Dish
                            </div>
                            <div class="card-body">
                                <form class="row g-3" method="post" action="functions.php" enctype="multipart/form-data">
                              
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">dish Name</label>
    <input type="text" name="dishName" required class="form-control" id="inputEmail4"  value="<?php echo isset($name)? $name : '';?>">
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Category</label>
    <select id="inputState" class="form-select" required name="categoy">
    
     <?php
$sql = "SELECT * FROM category";
$res = mysqli_query($db,$sql) or die("Error");
while($row= mysqli_fetch_row($res))
{
  if($cid==$row[0])
  {
    echo "<option value='$row[0]' selected>".$row[1]."</option>";
  }else{
    echo "<option value='$row[0]'>".$row[1]."</option>";
  }
 
}
     ?>
    </select>
  </div>
  <div class="col-12">
    <label for="inputAddress" class="form-label">Description</label>
    <textarea class="form-control" id="inputAddress"  name="description" rows="3" required><?php echo isset($desc) ? $desc : '';?></textarea>
  </div>
 <input type="hidden" name="editDishId" value="<?php echo isset($id) ? $id :'';?>">
  <div class="col-md-6">
    <label for="inputCity" class="form-label">price</label>
    <input type="number" class="form-control" id="inputCity" name="price" required value="<?php echo isset($price)? $price : '';?>">
  </div>
  <div class="col-md-6">
  <label for="formFile" class="form-label">Dish Image</label>
  <input class="form-control" type="file" name="imageup" id="imageup" accept="image/png, image/gif, image/jpeg, image/jpg" <?php echo isset($id) ? '' : 'required'; ?>>
  </div>
  <div class="col-12">
    <button type="submit" name="<?php echo isset($id)? 'editDish' : 'addDish';?>" class="btn btn-primary">Save</button>
  </div>
</form>
                            </div>
                        </div>
                    </div>
                </main>


<?php

include('include/footer.php');
?> 