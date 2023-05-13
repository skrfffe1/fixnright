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
  $.showProvinces("#userprovince");
  $.showCities("#usercity");

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
          <h5 class="modal-title" id="exampleModalLabel">Add Employee</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form role="form" method="post" action="process/process.php">          
              <div class="form-group">
                <input class="form-control" placeholder="First Name" name="fname"required>
              </div>
              <div class="form-group">
                <input class="form-control" placeholder="Last Name" name="lname" required>
              </div>
              <div class="form-group">
                  <select class='form-control' name='gender'  required>
                    <option value="" disabled selected hidden>Select Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                  </select>
              </div>
              <div class="form-group">
                <input class="form-control" placeholder="Email" name="email" required>
              </div>
              <div class="form-group">
                <input class="form-control" placeholder="Phone Number" name="contact"required>
              </div>
              <div class="form-group">
                 <input class="form-control" placeholder="Job" name="userjob"  required>
              </div>
              <div class="form-group">
                <input placeholder="Hired Date" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="FromDate" name="hired"  class="form-control" />
              </div>
              <div class="form-group">
                <select class="form-control" id="userprovince" placeholder="Province" name="userprovince" required></select>
              </div>
              <div class="form-group">
                <select class="form-control"  placeholder="City" name="usercity" id="usercity" required></select>
              </div>
              <hr>
            <button type="submit" name="insertemployee" value="submit" id="submit" class="btn btn-success"><i class="fa fa-check fa-fw"></i>Save</button>
            <button type="reset" class="btn btn-danger"><i class="fa fa-times fa-fw"></i>Reset</button>
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>      
          </form>  
        </div>
      </div>
    </div>
</div>
            <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Employee&nbsp;<a  href="employee_register.php" data-toggle="modal" data-target="#myModal" type="button" class="btn btn-primary bg-gradient-primary" style="border-radius: 0px;"><i class="fas fa-fw fa-plus"></i></a></h4>
            </div>
            
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> 
                  <thead>
                        <tr>
                            <th hidden> Employee ID</th>
                          <th>First Name</th>
                          <th>Last Name</th>
                          <th>Role</th>
                          <th>Action</th>
                        </tr>
                     </thead>
                    <tbody>
                <?php                  
                        $query = 'SELECT * FROM employee';
                        $result = mysqli_query($con, $query) or die (mysqli_error($db));
                        while ($row = mysqli_fetch_assoc($result)) {
                        echo '<tr>';
                        echo '<td hidden>'. $row['employee_id'].'</td>';
                        echo '<td>'. $row['employee_fname'].'</td>';
                        echo '<td>'. $row['employee_lname'].'</td>';
                        echo '<td>'. $row['employee_job'].'</td>';

                      echo '<td align="right"> <div class="btn-group">
                              <a type="button" class="btn btn-primary bg-gradient-primary" href="view/employee_details.php?action=edit & id='.$row['employee_id'] . '"><i class="fas fa-fw fa-list-alt"></i> Details</a>
                            <div class="btn-group">
                              <a type="button" class="btn btn-primary bg-gradient-primary dropdown no-arrow" data-toggle="dropdown" style="color:white;">
                              ... <span class="caret"></span></a>
                            <ul class="dropdown-menu text-center" role="menu">
                                <li>
                                  <a type="button" class="btn btn-warning bg-gradient-warning btn-block" style="border-radius: 0px;" href="update/employee_edit.php?editId='.$row['employee_id']. '">
                                    <i class="fas fa-fw fa-edit"></i> Edit
                                  </a>
                                  <button href="process/process.php?deleteemployee='.$row['employee_id']. '" type="button"  class="btndel btn btn-danger bg-gradient-btn-danger btn-block" style="border-radius: 0px;" >
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