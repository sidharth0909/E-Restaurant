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
    $sql = "SELECT * FROM  `category` where c_id='$id'";
    $res = mysqli_query($db,$sql) or die("Error");
    $row = mysqli_fetch_row($res);
    $name = $row[1];
    $status  = $row[2];


}
include('include/head.php');
include('include/sidebar.php');
?>
<main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Food category</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Food category</li>
                        </ol>
                     
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                              <?php echo isset($id) ? 'Edit' : 'Add'; ?> Food category
                            </div>
                            <div class="card-body">
                                <form method="post" action="functions.php">
                                <div class="mb-3">
  <label for="formGroupExampleInput" class="form-label">Category Name</label>
  <input type="hidden" name="catId" value="<?php echo isset($id) ? $id : '';?>" />
  <input type="text" class="form-control"  value="<?php echo isset($name) ? $name : ''; ?>" id="formGroupExampleInput" placeholder="Category Name" name="category">
</div>
<div class="mb-3">
  <label for="formGroupExampleInput2" class="form-label">Status</label>
  <select class="form-select" name="status" aria-label="Default select example">
  <option value="1" <?php echo isset($status) && $status==1 ? 'selected' : ''; ?>>Active</option>
  <option value="0" <?php echo isset($status) && $status==0 ? 'selected' : ''; ?>>Inactive</option>
  
</select>
</div>
<div class="mb-3">
    <input type="submit" value="Save" name="<?php echo isset($id)  ? 'editcategory' : 'addcategory'; ?>" />
</div>
</form>
                          
                            </div>
                        </div>
                    </div>
                </main>


<?php

include('include/footer.php');
?>