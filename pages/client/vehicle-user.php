<?php
  include 'process/session.php';
 $tempids = $_GET['editId'];
?>

<!doctype html>
<html lang="en-US">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>

     
       <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Car</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form role="form" method="post" action="process/process.php">    
             <div class="form-group">

                <input type="hidden" class="form-control" placeholder="plateid" name="currentid" id="plateid" value="<?php echo $tempids?>"required>
              </div>      
             
                <div class="form-group">

                <input class="form-control" placeholder="Plate Number" name="userphone" id="userphone "required>
              </div>      
             
              <div class="form-group">
                <input class="form-control" placeholder="Brand" name="carbrand" id="carbrand" required>
              </div>

               <div class="form-group">
                <input class="form-control" placeholder="Model" name="carmodel" id="carmodel" required>
              </div>
              <div class="form-group">
                <input class="form-control" placeholder="Serial Number" name="carserialnumber" id="carserialnumber" required>
              </div>
                <div class="form-group">
                <input class="form-control" placeholder="Type" name="cartype" id="cartype" required>
              </div>
              <div class="form-group">
                <input class="form-control" placeholder="Car Manufacturer" name="carmanufacturer" id="carmanufacturer" required>
              </div>
            
             
           
         
              
              <hr>
            <button type="submit" name="vehicle-user" value="submit" id="submit" class="btn btn-success"><i class="fa fa-check fa-fw"></i>Save</button>
            <button type="reset" class="btn btn-danger"><i class="fa fa-times fa-fw"></i>Reset</button>
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>      
          </form>  
        </div>
      </div>
    </div>
</div>
            <div class="card shadow mb-4">
            <div class="card-header py-3">
               <h4 class="m-2 font-weight-bold text-primary">Vehicles&nbsp;<a  href="employee_register.php" data-toggle="modal" data-target="#myModal" type="button" class="btn btn-primary bg-gradient-primary" style="border-radius: 0px;"><i class="fas fa-fw fa-plus"></i></a></h4>
            </div>
            
            <div class="card-body">
              <div class="table-responsive">
                 <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> 
                  <thead>
                        <tr>
                            <th>Plate</th>
                          <th>Brand</th>
                          <th>Model</th>
                          <th>Type</th>
                          <th width="20%">Action</th>
                        </tr>
                     </thead>
                    <tbody>
                <?php                  
                        $query = "SELECT * FROM cardata WHERE plateid = '$tempids'";
                        $result = mysqli_query($con, $query) or die (mysqli_error($db));
                        while ($row = mysqli_fetch_assoc($result)) {
                        echo '<tr>';
                        echo '<td>'. $row['userphone'].'</td>';
                        echo '<td>'. $row['carbrand'].'</td>';
                        echo '<td>'. $row['carmodel'].'</td>';
                        echo '<td>'. $row['cartype'].'</td>';


                      echo '<td align="right"> <div class="btn-group">
                      
                             <a type="button" class="btn btn-primary bg-gradient-primary" href="view/vehicle_details.php?editId='.$row['plateid'] . '"><i class="fas fa-fw fa-list-alt"></i> Details</a>
                              <a type="button" class="btn btn-primary bg-gradient-primary dropdown no-arrow" data-toggle="dropdown" style="color:white;">
                              ... <span class="caret"></span></a>
                            <ul class="dropdown-menu text-center" role="menu">
                                <li>
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