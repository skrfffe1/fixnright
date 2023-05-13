<?php
  include 'process/session.php';
?>

<!doctype html>
<html lang="en-US">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<script>  
window.onload = function() {  

  // ---------------
  // basic usage
  // ---------------
  var $ = new City();
  $.showProvinces("#s_province");
  $.showCities("#s_city");

  // ------------------
  // additional methods 
  // -------------------

  // will return all provinces 
  console.log($.getProvinces());
  
  // will return all cities 
  console.log($.getAllCities());
  
  // will return all cities under specific province (e.g Batangas)
  console.log($.getCities("Batangas")); 
  
}
</script>

<body>
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Supplier</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
             <form role="form" method="post" action="process/process.php">          
               <div class="form-group">
             <input class="form-control" placeholder="Company Name" name="cname" id="s_company_name" required>
           </div>
            <div class="form-group">
                <select class="form-control" id="s_province" placeholder="Province" name="s_province" required></select>
              </div>
            <div class="form-group">
                <select class="form-control" id="s_city" placeholder="City" name="s_city" required></select>
              </div>
            <div class="form-group">
                <input class="form-control" placeholder="Phone Number" name="contact" required>
              </div>
            <div class="form-group">
            </div>
        
              <hr>
            <button type="submit" name="insertsupplier" value="submit" id="submit" class="btn btn-success"><i class="fa fa-check fa-fw"></i>Save</button>
            <button type="reset" class="btn btn-danger"><i class="fa fa-times fa-fw"></i>Reset</button>
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>      
          </form>  
        </div>
      </div>
    </div>
</div>
            <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Supplier&nbsp;<a  href="employee_register.php" data-toggle="modal" data-target="#myModal" type="button" class="btn btn-primary bg-gradient-primary" style="border-radius: 0px;"><i class="fas fa-fw fa-plus"></i></a></h4>
            </div>
            
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> 
                  <thead>
                        <tr>
                          <th hidden >SUPPLIER ID</th>
                         <th>Company Name</th>
                         <th>Phone Number</th>
                         <th>Option</th>
                         </tr>
                     </thead>
                    <tbody>
                <?php                  
                        $query = 'SELECT * FROM supplier';
                        $result = mysqli_query($con, $query) or die (mysqli_error($db));
                        while ($row = mysqli_fetch_assoc($result)) {
                        echo '<tr>';
                        echo '<td hidden >'. $row['s_id'].'</td>';
                        echo '<td>'. $row['s_company_name'].'</td>';
                      
                        echo '<td>'. $row['s_phone'].'</td>';
                        echo '<td align="right"> <div class="btn-group">
                              <a type="button" class="btn btn-primary bg-gradient-primary" href="view/supplier_details.php?action=edit & id='.$row['s_id'] . '"><i class="fas fa-fw fa-list-alt"></i> Details</a>
                            <div class="btn-group">
                              <a type="button" class="btn btn-primary bg-gradient-primary dropdown no-arrow" data-toggle="dropdown" style="color:white;">
                              ... <span class="caret"></span></a>
                            <ul class="dropdown-menu text-center" role="menu">
                                <li>
                                  <a type="button" class="btn btn-warning bg-gradient-warning btn-block" style="border-radius: 0px;" href="update/supplier_edit.php?editId='.$row['s_id']. '">
                                    <i class="fas fa-fw fa-edit"></i> Edit
                                  </a>
                                   <button href="process/process.php?deletesupplier='.$row['s_id']. '" type="button"  class="btndel btn btn-danger bg-gradient-btn-danger btn-block" style="border-radius: 0px;" >
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
<script src="css/city.js"></script>

<?php
include ('footer.php');
 ?>