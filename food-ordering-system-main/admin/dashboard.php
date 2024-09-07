<?php
session_start();
if(isset($_SESSION['Admin']))
{
    $useremail = $_SESSION['Email'];
} else 
{
    echo "<script> location.href='index.php'; </script>";
}
require ('../connection/connect.php');
include('include/head.php');
include('include/sidebar.php');

?>

<main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Users</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="users.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Category</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="categoy.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">dishes</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="dish.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Orders</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="order.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                order Details
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                <thead>
                                        <tr>
                                       
                                        <th>Order Id</th>
                                             <th>User Id</th>
                                             <th>Dish</th>
                                             <th>Quantity</th>
                                             <th>Price</th>
                                             <th>Status</th>
                                             <th>Date</th>
                                             <th>Action</th>
                                             
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                       
                                            <th>Order Id</th>
                                             <th>User Id</th>
                                             <th>Dish</th>
                                             <th>Quantity</th>
                                             <th>Price</th>
                                             <th>Status</th>
                                             <th>Date</th>
                                             <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
$sql = "SELECT * FROM `users_orders` o INNER JOIN users u on u.u_id = o.u_id ORDER BY o.o_id  desc limit 4";
$res = mysqli_query($db,$sql) or die("Error");
$i = 1;
while($row = mysqli_fetch_row($res))
{
    echo "<tr>";
    echo "<td>".$row[0]."</td>";
    echo "<td>".$row[9]."</td>";
    echo "<td>".$row[2]."</td>";
    echo "<td>".$row[3]."</td>";
    echo "<td>".$row[4]."</td>";
    echo "<td>".$row[5]."</td>";
    echo "<td>".$row[6]."</td>";
    if($row[5]=="pending")
    {
        echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to Confirm Order ');\" href='functions.php?order=".$row[0]."' data-bs-toggle='tooltip' data-bs-placement='left' title='preparing order'><i class='fas fa-check text-primary h4'></i></a> 
        &nbsp;&nbsp;<a onClick=\"javascript: return confirm('Are you sure you want to Cancel Order ');\" href='functions.php?cancelorder=".$row[0]."' data-bs-toggle='tooltip' data-bs-placement='left' title='cancel order' ><i class='fas fa-trash text-danger h4'></i></a>
        </td>";
    }
    else if($row[5]=="preparing")
    {
        echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to Deliver Order ');\" href='functions.php?predorder=".$row[0]."'  data-bs-toggle='tooltip' data-bs-placement='left' title='Delivered order'><i class='fas  fa-check-double text-success h4'></i></a>
        &nbsp;&nbsp;<a onClick=\"javascript: return confirm('Are you sure you want to Cancel Order ');\" href='functions.php?cancelorder=".$row[0]."' data-bs-toggle='tooltip' data-bs-placement='left' title='cancel order' ><i class='fas fa-trash text-danger h4'></i></a>
        </td>";  
    }else if($row[5]=="Delivered")
    {
        echo "<td></td>";
    }
    echo '</tr>';
    
}

?>                               </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
<?php

include('include/footer.php');
?>