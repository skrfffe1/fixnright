<?php
  include 'process/session.php';
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
          <h5 class="modal-title" id="exampleModalLabel">Add Expense</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
             <form role="form" method="post" action="process/process.php">          
               <div class="form-group">
             <input class="form-control" placeholder="Item Spend" name="expensename"  required>
           </div>
          
            <div class="form-group">
                <input type="number" class="form-control" placeholder="Price" name="expenseprice" required>
              </div>
            <div class="form-group">
              <input type="date" class="form-control" placeholder="The day u spend money" name="expensedate" required>
            </div>
        
              <hr>
            <button type="submit" name="insertexpenses" value="submit" id="submit" class="btn btn-success"><i class="fa fa-check fa-fw"></i>Save</button>
            <button type="reset" class="btn btn-danger"><i class="fa fa-times fa-fw"></i>Reset</button>
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>      
          </form>  
        </div>
      </div>
    </div>
</div>
            <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Expenses&nbsp;<a  href="employee_register.php" data-toggle="modal" data-target="#myModal" type="button" class="btn btn-primary bg-gradient-primary" style="border-radius: 0px;"><i class="fas fa-fw fa-plus "></i></a></h4>
            </div>
            
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> 
                  <thead>
                        <tr>
                      
                         <th>Expense Name</th>
                         <th>Cost</th>
                         <th>Date Spend</th>
                         <th>Option</th>
                         </tr>
                     </thead>
                    <tbody>
                  <?php                  
                        $query = 'SELECT * FROM expense_table';
                        $result = mysqli_query($con, $query) or die (mysqli_error($db));
                        while ($row = mysqli_fetch_assoc($result)) {
                          $prodprice = $row['expense_price'];
                          $proddatespend = $row['expense_date'];
                          $mydate = strtotime($proddatespend);
                        echo '<tr>';
                        
                        echo '<td>'. $row['expense_name'].'</td>';
                        echo '<td>';echo number_format($prodprice,'2');echo'</td>';
                        echo "<td>";echo date('F, jS, Y', $mydate);echo"</td>";
                        echo '<td align="right"> <div class="btn-group">
                             
                            <div class="btn-group">
                              <a type="button" class="btn btn-primary bg-gradient-primary dropdown no-arrow" data-toggle="dropdown" style="color:white;">
                              ... <span class="caret"></span></a>
                            <ul class="dropdown-menu text-center" role="menu">
                                <li>
                                  <a type="button" class="btn btn-warning bg-gradient-warning btn-block" style="border-radius: 0px;" href="update/expense_edit.php?editId='.$row['expense_id']. '">
                                    <i class="fas fa-fw fa-edit"></i> Edit
                                  </a>
                                   <button href="process/process.php?deleteexpenses='.$row['expense_id']. '" type="button"  class="btndel btn btn-danger bg-gradient-btn-danger btn-block" style="border-radius: 0px;" >
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