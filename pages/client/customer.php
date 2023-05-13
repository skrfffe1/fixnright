<?php
  include 'process/session.php';
?>
<!doctype html>
<html lang="en-US">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="robots" content="index,follow">
  </head>

<body>

       <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Customer</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form role="form" method="post" action="process/process.php">
            <div class="form-group input-group">
            <div class="input-group-prepend">
            <span class="input-group-text"> <i class="fa fa-user"></i> </span>
            </div>
                <input class="form-control" placeholder="Username" name="username"required>
                 <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                 <input type ="password" class="form-control" placeholder="Password" name="password"required>
            </div>     
             <div class="form-group input-group">
              <div class="input-group-prepend">
                  <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
              </div>
                <input class="form-control" type="Email" placeholder="Email" name="email"required>
                
              </div> 
               <div class="form-group input-group">
                <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
                 <select class="custom-select" style="max-width: 73px;">
                <option selected="">+63</option>
      
                 </select>
                 <input type="number" class="form-control" placeholder="Phone Number" name="phone" required>
              </div>      
             <div class="form-group input-group">
            <div class="input-group-prepend">
            <span class="input-group-text"> <i class="fa fa-user"></i> </span>
            </div>
                <input class="form-control" placeholder="First Name" name="firstname" required>
                <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                 <input class="form-control" placeholder="Last Name" name="lastname" required>
            </div>
             

            
              
              <hr>
            <button type="submit" name="newaccount" value="submit"  class="btn btn-success"><i class="fa fa-check fa-fw"></i>Save</button>
            <button type="reset" class="btn btn-danger"><i class="fa fa-times fa-fw"></i>Reset</button>
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>      
          </form>  
        </div>
      </div>
    </div>
</div>
            <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Customer&nbsp;<a  href="employee_register.php" data-toggle="modal" data-target="#myModal" type="button" class="btn btn-primary bg-gradient-primary" style="border-radius: 0px;"><i class="fas fa-fw fa-plus"></i></a></h4>
            </div>
            
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> 
                  <thead>
                        <tr>
                          <th>First Name</th>
                          <th>Last Name</th>
                          
                          <th>Email</th>
                          <th>Action</th>
                        </tr>
                     </thead>
                    <tbody>
                <?php                  
                        $query = 'SELECT * FROM users';
                        $result = mysqli_query($con, $query) or die (mysqli_error($db));
                        while ($row = mysqli_fetch_assoc($result)) {
                        echo '<tr>';
                        echo '<td>'. $row['firstname'].'</td>';
                        echo '<td>'. $row['lastname'].'</td>';
                      
                        echo '<td>'. $row['email'].'</td>';


                      echo '<td align="right"> <div class="btn-group">
                      <a type="button" class="btn btn-success bg-gradient-success" href="vehicle-user.php?editId='.$row['id'] . '"><i class="fas fa-fw fa-car"></i> </a>
                              <a type="button" class="btn btn-primary bg-gradient-primary" href="view/customer_details.php?editId='.$row['id'] . '"><i class="fas fa-fw fa-list-alt"></i> Details</a>
                            <div class="btn-group">
                              <a type="button" class="btn btn-primary bg-gradient-primary dropdown no-arrow" data-toggle="dropdown" style="color:white;">
                              ... <span class="caret"></span></a>
                            <ul class="dropdown-menu text-center" role="menu">
                                <li>
                                 </a>
                                   <a type="button" class="btn btn-success bg-gradient-btn-success btn-block" style="border-radius: 0px;" href="../user-delete/user-delete.php?delId='.$row['id']. '">
                                    <i class="fas fa-fw fa-cog"></i> Transaction
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