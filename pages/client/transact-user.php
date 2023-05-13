<?php
  include 'process/session.php';
 $complete = "Completed";
  $pendingc= "Pending";
  $rejectc = "Rejected";
  $approvedc = "Approved";
 $sql2 = " SELECT  * FROM   transacttable JOIN users ON transacttable.custid = users.id WHERE transacttable.status ='Completed' ";
      

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
              <h4 class="m-2 font-weight-bold text-primary">Complete Transactions&nbsp;  <i class="fas fa-fw fa-list"></i></h4>
            </div>
            
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> 
              <thead>
                   <tr>
                     
                     <th width="15%">Customer's Name</th>
                    
                    
                     <th width="20%">Date</th>
                     <th width="11%">Action</th>
                   </tr>
               </thead>
          <tbody>
  <?php 
  $magic ="SELECT * FROM transacttable JOIN users on custid = users.id WHERE status = 'Completed';";
$result = $con->query($magic);
             while($row = $result->fetch_assoc()) {
                echo "<tr>";
                
           
        
               $fn = $row['firstname'];
               $ln = $row['lastname'];
               $full = $fn . ' ' . $ln; 
               $hello = $row['transact_sched'];
               $mydate = strtotime($hello);
              echo "<td>".$full."</td>";
             
             
              echo "<td>";
              echo date('F, jS, Y', $mydate);
              echo"</td>";
              
            echo '<td align="right">
              <a type="button" class="btn btn-primary bg-gradient-primary" href="../reciept/print-download.php?id='.$row['transid'] . '"><i class="fas fa-download fa-sm text-white-50"></i></a>
            
            <a type="button" class="btn btn-primary bg-gradient-primary" href="../client/joborder4.php?editId='.$row['transid'] . '"><i class="fas fa-fw fa-th-list"></i> View</a>
           
            </div> </td>';      
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