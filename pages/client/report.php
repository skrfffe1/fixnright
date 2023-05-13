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

            <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Reports&nbsp;</h4>
              
            </div>
            
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> 
                  <thead>
                        <tr>
                         
                         <th>Reports Name</th>
                         
                         <th>Option</th>
                         </tr>
                     </thead>
                    <tbody>
                    
                     
                   
                   <tr>
                      <td>Expense Reports</td>
                      <td align="right">
              <a type="button" class="btn btn-primary bg-gradient-primary" href="../reciept/expense-print-download.php"><i class="fas fa-download fa-sm text-white-50"></i></a> <a type="button" class="btn btn-primary bg-gradient-primary" href="../reciept/expense-print-details.php"><i class="fas fa-fw fa-th-list"></i> View</a></td>
                    </tr>


                     <tr>
                      <td>Low Stocks Reports</td>
                      <td align="right">
              <a type="button" class="btn btn-primary bg-gradient-primary" href="../reciept/lowstocks-print-download.php"><i class="fas fa-download fa-sm text-white-50"></i></a> <a type="button" class="btn btn-primary bg-gradient-primary" href="../reciept/lowstocks-print-details.php"><i class="fas fa-fw fa-th-list"></i> View</a></td>
                    </tr>
                     <tr>
                      <td>Product Item Reports</td>
                      <td align="right">
              <a type="button" class="btn btn-primary bg-gradient-primary" href="../reciept/product-print-download.php"><i class="fas fa-download fa-sm text-white-50"></i></a>
              <a type="button" class="btn btn-primary bg-gradient-primary" href="../reciept/product-print-details.php"><i class="fas fa-fw fa-th-list"></i> View</a></td>
                    </tr>
                    
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