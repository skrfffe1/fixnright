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
<div id="dailymodal" class="modal fade" role="dialog">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Specific Year of Expense Reports</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
             <form role="form" method="post" action="../reciept/yearlyexpense1-print-details.php">          
               <div class="form-group">
             <input type="date" class="form-control" placeholder="Date" name="expense_date"  required>
           </div>
           
          
            <div class="form-group">
            </div>
        
              <hr>
            <button type="submit" name="specificdailyexpense" value="submit" id="submit" class="btn btn-success"><i class="fa fa-check fa-fw"></i>Save</button>
            <button type="reset" class="btn btn-danger"><i class="fa fa-times fa-fw"></i>Reset</button>
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>      
          </form>  
        </div>
      </div>
    </div>
</div>
<div id="dailymodal1" class="modal fade" role="dialog">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Specific Yearl of  Income Reports w/ Expenses</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
             <form role="form" method="post" action="../reciept/yearlywithexpense1-print-details.php">   

                    
               <div class="form-group">
             <input type="date" class="form-control" placeholder="Date" name="expense_date"  required>
           </div>
           
          
            <div class="form-group">
            </div>
        
              <hr>
            <button type="submit" name="specificdailyexpense" value="submit" id="submit" class="btn btn-success"><i class="fa fa-check fa-fw"></i>Save</button>
            <button type="reset" class="btn btn-danger"><i class="fa fa-times fa-fw"></i>Reset</button>
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>      
          </form>  
        </div>
      </div>
    </div>
</div>
<div id="dailymodal2" class="modal fade" role="dialog">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Specific Year of Income Reports w/o Expenses</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
             <form role="form" method="post" action="../reciept/yearlywithoutexpense1-print-details.php">  
               <div class="form-group">
             <input type="date" class="form-control" placeholder="Date" name="expense_date"  required>
           </div>
           
          
            <div class="form-group">
            </div>
        
              <hr>
            <button type="submit" name="specificdailyexpense" value="submit" id="submit" class="btn btn-success"><i class="fa fa-check fa-fw"></i>Save</button>
            <button type="reset" class="btn btn-danger"><i class="fa fa-times fa-fw"></i>Reset</button>
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>      
          </form>  
        </div>
      </div>
    </div>
</div>

<div id="dailymodal3" class="modal fade" role="dialog">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Specific Yearly Reports</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
             <form role="form" method="post" action="../reciept/yearlyreport1-print-details.php">          
               <div class="form-group">
             <input type="date" class="form-control" placeholder="Date" name="expense_date"  required>
           </div>
           
          
            <div class="form-group">
            </div>
        
              <hr>
            <button type="submit" name="specificdailyexpense" value="submit" id="submit" class="btn btn-success"><i class="fa fa-check fa-fw"></i>Save</button>
            <button type="reset" class="btn btn-danger"><i class="fa fa-times fa-fw"></i>Reset</button>
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>      
          </form>  
        </div>
      </div>
    </div>
</div>
            <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Yearly Reports&nbsp;</h4>
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
                      <td>Yearly Income Reports w/o Expenses</td>
                      <td align="right">
               <a type="button" class="btn btn-primary bg-gradient-primary" data-toggle="modal" data-target="#dailymodal2" href="#"><i class="fas fa-plus fa-sm text-white-50"></i></a>
               <a type="button" class="btn btn-primary bg-gradient-primary" href="../reciept/yearlywithoutexpense-print-download.php"><i class="fas fa-download fa-sm text-white-50"></i></a> <a type="button" class="btn btn-primary bg-gradient-primary" href="../reciept/yearlywithoutexpense-print-details.php"><i class="fas fa-fw fa-th-list"></i> View</a></td>
                    </tr>
                    
                  
                  
                   <tr>
                      <td>Yearly Income Reports w/ Expenses</td>
                      <td align="right">
               <a type="button" class="btn btn-primary bg-gradient-primary" data-toggle="modal" data-target="#dailymodal1" href="#"><i class="fas fa-plus fa-sm text-white-50"></i></a>
               <a type="button" class="btn btn-primary bg-gradient-primary" href="../reciept/yearlywithexpense-print-download.php"><i class="fas fa-download fa-sm text-white-50"></i></a> <a type="button" class="btn btn-primary bg-gradient-primary" href="../reciept/yearlywithexpense-print-details.php"><i class="fas fa-fw fa-th-list"></i> View</a></td>
                    </tr>
                     <tr>
                      <td>Yearly Reports</td>
                       <td align="right">
               <a type="button" class="btn btn-primary bg-gradient-primary" data-toggle="modal" data-target="#dailymodal3" href="#"><i class="fas fa-plus fa-sm text-white-50"></i></a>
              <a type="button" class="btn btn-primary bg-gradient-primary" href="../reciept/yearlyreport-print-download.php"><i class="fas fa-download fa-sm text-white-50"></i></a> <a type="button" class="btn btn-primary bg-gradient-primary" href="../reciept/yearlyreport-print-details.php"><i class="fas fa-fw fa-th-list"></i> View</a></td>
                    </tr>
                       <tr>
                      <td>Yearly Expenses Reports</td>
                      <td align="right">
              <a type="button" class="btn btn-primary bg-gradient-primary" data-toggle="modal" data-target="#dailymodal" href="#"><i class="fas fa-plus fa-sm text-white-50"></i></a>
              <a type="button" class="btn btn-primary bg-gradient-primary" href="../reciept/yearlyexpense-print-download.php"><i class="fas fa-download fa-sm text-white-50"></i></a> <a type="button" class="btn btn-primary bg-gradient-primary" href="../reciept/yearlyexpense-print-details.php"><i class="fas fa-fw fa-th-list"></i> View</a></td>
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