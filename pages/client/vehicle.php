<?php
  include 'process/session.php';
  $sql = "SELECT * FROM category ORDER by c_name ASC";
$result = mysqli_query($con, $sql) or die ("Bad SQL: $sql");



$opt = "<select class='form-control' id ='p_category' name='pcategory'>
        <option disabled selected>Select Category</option>";
  while ($row = mysqli_fetch_assoc($result)) {
    $opt .= "<option value='".$row['c_name']."'>".$row['c_name']."</option>";
  }

$opt .= "</select>";

$sql2 = "SELECT * FROM supplier ORDER by s_company_name ASC";
$result2 = mysqli_query($con, $sql2) or die ("Bad SQL: $sql2");

$sup = "<select class='form-control' id='p_supplier' name='psupplier'>
        <option disabled selected>Select Supplier</option>";
  while ($row = mysqli_fetch_assoc($result2)) {
    $sup .= "<option value='".$row['s_company_name']."'>".$row['s_company_name']."</option>";
  }

$sup .= "</select>";
?>

<!doctype html>
<html lang="en-US">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>

     
       
            <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Vehicles&nbsp;</h4>
            </div>
            
            <div class="card-body">
              <div class="table-responsive">
                 <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> 
                  <thead>
                        <tr>
                          <th>Owner</th>
                          <th>Plate</th>
                          <th>Brand</th>
                          <th>Model</th>
                          <th>Type</th>
                          <th width="20%">Action</th>
                        </tr>
                     </thead>
                    <tbody>
                <?php                  
                        $query = 'SELECT * FROM cardata JOIN users on cardata.plateid = users.id';
                        $result = mysqli_query($con, $query) or die (mysqli_error($db));
                        while ($row = mysqli_fetch_assoc($result)) {
                            $fn = $row['firstname'];
                            $ln = $row['lastname'];
                            $full = $fn . ' ' . $ln; 
                        echo '<tr>';
                        echo "<td>".$full."</td>";
                        echo '<td>'. $row['userphone'].'</td>';
                        echo '<td>'. $row['carbrand'].'</td>';
                        echo '<td>'. $row['carmodel'].'</td>';
                        echo '<td>'. $row['cartype'].'</td>';


                      echo '<td align="right"> <div class="btn-group">
                      
                              <a type="button" class="btn btn-primary bg-gradient-primary" href="view/vehicle_details.php?editId='.$row['plateid'] . '"><i class="fas fa-fw fa-list-alt"></i> Details</a>
                            <div class="btn-group">
                              <a type="button" class="btn btn-primary bg-gradient-primary dropdown no-arrow" data-toggle="dropdown" style="color:white;">
                              ... <span class="caret"></span></a>
                            <ul class="dropdown-menu text-center" role="menu">
                                <li>
                                 </a>
                                   
                                    <a type="button" class="btn btn-warning bg-gradient-success btn-block" style="border-radius: 0px;" href="view/vehicle_transaction_details.php?editId='.$row['id']. '">
                                    <i class="fas fa-fw fa-car"></i> Transactions
                                  </a>
                                  <a type="button" class="btn btn-warning bg-gradient-warning btn-block" style="border-radius: 0px;" href="customer_edit.php?editId='.$row['id']. '">
                                    <i class="fas fa-fw fa-edit"></i> Edit
                                  </a>
                                   <a type="button" class="btn btn-danger bg-gradient-btn-danger btn-block" style="border-radius: 0px;" href="process/process.php?deletecustomer='.$row['id']. '">
                                    <i class="fas fa-fw fa-trash"></i> Delete
                                  </a>
                                </li>
                            </ul>
                            </div>
                          </div> </td>';
                        echo '</tr> ';
                        }
                    ?> 
                    
                                    
                    </tbody>
                </table>
                            </div>
            </div>
          </div>
     
  </body>
  </html>


<?php
include ('footer.php');
 ?>