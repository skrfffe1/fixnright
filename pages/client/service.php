<?php
  include_once('process/session.php');
    
          $sqlcateg = "SELECT * FROM service_category ORDER by service_id ASC";
          $resultcateg = mysqli_query($con, $sqlcateg) or die ("Bad SQL: $sqlcateg");
          $sup = "<select class='form-control'  id='SelectA'  name='servicecategory' onchange='my_fun(this.value);'>
        <option disabled selected>Select Services</option>";
          while ($row = mysqli_fetch_assoc($resultcateg)) {
          $sup .= "<option value='".$row['service_name']."'>".$row['service_name']."</option>";
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

  <!--  MODAL FOR SERVICES-->

       <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Service</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
             <form role="form" method="post" action="process/process.php">          
               <div class="form-group">
               <?php echo $sup; ?>
           </div>
            <div  class="form-group">
                <input class="form-control" placeholder="Service Name" name="service_name"  required>
              </div>
            <div class="form-group">
                <input class="form-control" placeholder="Service Price" name="serviceprice"  required>
              </div>
            
          
           
          
         
        
           <div class="form-group">
            
           </div>
        
              <hr>
            <button type="submit" name="insertservices" value="submit" id="submit" class="btn btn-success"><i class="fa fa-check fa-fw"></i>Save</button>
            <button type="reset" class="btn btn-danger"><i class="fa fa-times fa-fw"></i>Reset</button>
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>      
          </form>  
        </div>
      </div>
    </div>
</div>      

<!-- END OF MODAL SERVICES-->

 <div id="mycategory" class="modal fade" role="dialog">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Service Category</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
             <form role="form" method="post" action="process/process.php">          
               <div class="form-group">
                <input type="text" class="form-control" name="servicecategory" placeholder="Service Category">
           </div>
           <div class="form-group">
            
           </div>
        
              <hr>
            <button type="submit" name="insertcategoryservices" value="submit" id="submit" class="btn btn-success"><i class="fa fa-check fa-fw"></i>Save</button>
            <button type="reset" class="btn btn-danger"><i class="fa fa-times fa-fw"></i>Reset</button>
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>      
          </form>  
        </div>
      </div>
    </div>
</div>      
            <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Services Category&nbsp;<a  href="" data-toggle="modal" data-target="#mycategory" type="button" class="btn btn-primary bg-gradient-primary" style="border-radius: 0px;"><i class="fas fa-fw fa-plus"></i></a></h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                 <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> 
                  <thead>
                        <tr>
                          <th hidden >SUPPLIER ID</th>
                         <th>Service Category</th>
                         <th width="5%">Option</th>
                         </tr>
                     </thead>
                    <tbody>
                <?php                  
                        $query = 'SELECT * FROM service_category';
                        $result = mysqli_query($con, $query) or die (mysqli_error($db));
                        while ($row = mysqli_fetch_assoc($result)) {
                        echo '<tr>';
                        echo '<td hidden >'. $row['service_id'].'</td>';
                        echo '<td>'. $row['service_name'].'</td>';
                        echo '<td align="right"> <div class="btn-group">
                              <div class="btn-group">
                              <a type="button" class="btn btn-primary bg-gradient-primary dropdown no-arrow" data-toggle="dropdown" style="color:white;">
                              ... <span class="caret"></span></a>
                            <ul class="dropdown-menu text-center" role="menu">
                                <li>
                                  <a type="button" class="btn btn-warning bg-gradient-warning btn-block" style="border-radius: 0px;" href="update/service_edit_category.php?editId='.$row['service_id']. '">
                                    <i class="fas fa-fw fa-edit"></i> Edit
                                  </a>
                                  <button href="process/process.php?deletecat='.$row['service_id']. '" type="button"  class="btndel btn btn-danger bg-gradient-btn-danger btn-block" style="border-radius: 0px;" >
                                    <i class="fas fa-fw fa-trash"></i> Delete
                                  </button>
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
            <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Services Offered&nbsp;<a  href="employee_register.php" data-toggle="modal" data-target="#myModal" type="button" class="btn btn-primary bg-gradient-primary" style="border-radius: 0px;"><i class="fas fa-fw fa-plus"></i></a></h4>
            </div>
            
            <div class="card-body">
              <div class="table-responsive">
                <table class="table1 table-bordered" id="dataTable" width="100%" cellspacing="0"> 
                  <thead>
                        <tr>
                          <th hidden >SUPPLIER ID</th>
                         <th>Service Type</th>
                         <th>Service Name</th>
                         <th>Service Price</th>
                         <th>Option</th>
                         </tr>
                     </thead>
                    <tbody>
                <?php                  
                        $query = 'SELECT * FROM services';
                        $result = mysqli_query($con, $query) or die (mysqli_error($db));
                        while ($row = mysqli_fetch_assoc($result)) {
                        echo '<tr>';
                        
                        echo '<td hidden >'. $row['service_jd'].'</td>';
                        echo '<td>'. $row['service_category'].'</td>';
                        echo '<td>'. $row['service_name'].'</td>';
                        echo '<td>'. $row['service_price'].'</td>';
                        echo '<td align="right"> <div class="btn-group">
                              
                            <div class="btn-group">
                              <a type="button" class="btn btn-primary bg-gradient-primary dropdown no-arrow" data-toggle="dropdown" style="color:white;">
                              ... <span class="caret"></span></a>
                            <ul class="dropdown-menu text-center" role="menu">
                                <li>
                                  <a type="button" class="btn btn-warning bg-gradient-warning btn-block" style="border-radius: 0px;" href="update/service_edit.php?editId='.$row['service_jd']. '">
                                    <i class="fas fa-fw fa-edit"></i> Edit
                                  </a>
                                  <button href="process/process.php?deleteservices='.$row['service_jd']. '" type="button"  class="btndel btn btn-danger bg-gradient-btn-danger btn-block" style="border-radius: 0px;" >
                                    <i class="fas fa-fw fa-trash"></i> Delete
                                  </button>
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
 