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
                        <h1 class="mt-4">Users</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">User Details</li>
                        </ol>
                     
                        <div class="card mb-4">
                            <div class="card-header">
                               <i class="fas fa-table me-1"></i>
                                User Details
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                        <th>#</th>
                                             <th>Full Name</th>
                                             <th>Email</th>
                                             <th>Mobile</th>
                                          
                                             <th>Address</th>
                                             <th>Action</th>
                                             
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th>#</th>
                                        <th>Full Name</th>
                                             <th>Email</th>
                                             <th>Mobile</th>
                                            
                                             <th>Address</th>
                                             <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
$sql = "SELECT * FROM `users`;";
$res = mysqli_query($db,$sql) or die("Error");
$i = 1;
while($row = mysqli_fetch_row($res))
{
    echo "<tr>";
    echo "<td>".$i."</td>";
    echo "<td>".$row['2']."</td>";
    echo "<td>".$row['4']."</td>";
    echo "<td>".$row['5']."</td>";
    echo "<td>".$row['7']."</td>";
    echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to Delete User');\" href='functions.php?userdel=".$row[0]."'><i class='fa fa-trash-alt text-danger h4'></i></a></td>";
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