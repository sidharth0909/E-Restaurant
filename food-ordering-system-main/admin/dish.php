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
                            <a href="managedish.php" class="float-end btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Create New Dish"> <i class="fas fa-plus"></i></a>
                                <i class="fas fa-table me-1"></i>
                                Food Dish
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                        <th>#</th>
                                             <th>category Name</th>
                                             <th>Dish Name</th>
                                             <th>Description</th>
                                             <th>Price</th>
                                             <th>Image</th>
                                             <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th>#</th>
                                            <th>category Name</th>
                                             <th>Dish Name</th>
                                             <th>Description</th>
                                             <th>Price</th>
                                             <th>Image</th>
                                             <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
$sql = "SELECT * FROM dishes d INNER JOIN category c on d.c_id=c.c_id";
$res = mysqli_query($db,$sql) or die("Error");
$i = 1;
while($row = mysqli_fetch_row($res))
{
    echo "<tr>";
    echo "<td>".$i."</td>";
    echo "<td>".$row['7']."</td>";
    echo "<td>".$row['2']."</td>";
    echo "<td>".$row['3']."</td>";
    echo "<td>".$row['4']."</td>";
    echo "<td>".$row['5']."</td>";
    echo "<td><a href='managedish.php?edit=".$row[0]."'><i class='fa fa-pen text-dark h4'></i></a>&nbsp;&nbsp; &nbsp;<a onClick=\"javascript: return confirm('Are you sure you want to Delete Dish');\" href='functions.php?dishdel=".$row[0]."'><i class='fa fa-trash-alt text-danger h4'></i></a></td>";
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