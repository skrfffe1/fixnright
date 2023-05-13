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

    
            <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Accounts&nbsp;<a  href="../../login/registeradmin.php"  type="button" class="btn btn-primary bg-gradient-primary" style="border-radius: 0px;"><i class="fas fa-fw fa-plus"></i></a></h4>
            </div>
            
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> 
                  <thead>
                        <tr>
                          <th>User Name</th>
                          <th>Password</th>
                          
                          <th>Email</th>
                          <th>Action</th>
                        </tr>
                     </thead>
                    <tbody>
                <?php                  
                        $query = 'SELECT * FROM users WHERE user_type != "Admin"';
                        $result = mysqli_query($con, $query) or die (mysqli_error($db));
                        while ($row = mysqli_fetch_assoc($result)) {
                        echo '<tr>';
                        echo '<td>'. $row['username'].'</td>';
                        echo '<td>******</td>';
                      
                        echo '<td>'. $row['email'].'</td>';


                      echo '<td align="right"> <div class="btn-group">
                      <a type="button" class="btn btn-success bg-gradient-success" href="customer_car.php?editId='.$row['id'] . '"><i class="fas fa-fw fa-car"></i> </a>
                              <a type="button" class="btn btn-primary bg-gradient-primary" href="customer1.php?editId='.$row['id'] . '"><i class="fas fa-fw fa-list-alt"></i> Details</a>
                            <div class="btn-group">
                              <a type="button" class="btn btn-primary bg-gradient-primary dropdown no-arrow" data-toggle="dropdown" style="color:white;">
                              ... <span class="caret"></span></a>
                            <ul class="dropdown-menu text-center" role="menu">
                                <li>
                                 </a>
                                   <a type="button" class="btn btn-success bg-gradient-btn-success btn-block" style="border-radius: 0px;" href="../user-delete/user-delete.php?delId='.$row['id']. '">
                                    <i class="fas fa-fw fa-cog"></i> Transaction
                                  </a>
                                  <a type="button" class="btn btn-warning bg-gradient-warning btn-block" style="border-radius: 0px;" href="update/reset-password.php?editId='.$row['id']. '">
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