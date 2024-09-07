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
                        <h1 class="mt-4">Order</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Orders</li>
                        </ol>
                     
                        <div class="card mb-4">
                            <div class="card-header">
                               <i class="fas fa-table me-1"></i>
                                Order Details
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                       
                                        <th>Order Id</th>
                                             <th>User</th>
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
                                             <th>User </th>
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
$sql = "SELECT * FROM `users_orders` o INNER JOIN users u on u.u_id = o.u_id ORDER BY o.o_id  desc";
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
    $i = $i + 1;
}

?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>

<?php

include('include/footer.php');
?>