<?php
  include 'process/session.php';
    $pendingc= "Pending";
  $rejectc = "Rejected";
  $approvedc = "Approved";
  $sql2 = " SELECT  * FROM   cardata  JOIN users ON cardata.plateid = users.id JOIN transacttable ON cardata.plateid = transacttable.custid  WHERE transacttable.status = 'Approved'    ORDER BY cardata.id ASC" ;

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
              <h4 class="m-2 font-weight-bold text-primary">Pending Request&nbsp;  <i class="fas fa-fw fa-list"></i></h4>
            </div>
            
            <div class="card-body">
              <div class="table-responsive">
               <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> 
               <thead>
                   <tr>
                      <th width="10%">Name</th>
                     <th width="12%">Schedule</th>
                     <th width="15%">Note</th>
                     <th width="10%">Payment Type</th>
              
                     <th width="8%">Status</th>
                    

                     <th width="11%">Action</th>
                   </tr>
               </thead>
          <tbody>
  <?php 
   $sqlpending = " SELECT  * FROM transacttable JOIN users ON transacttable.custid = users.id WHERE status = 'Pending' ";
$resultpending = $con->query($sqlpending);
             while($row = $resultpending->fetch_assoc()) {
              $hello = $row['transact_sched'];
               $mydate = strtotime($hello);
               $fn = $row['firstname'];
               $ln = $row['lastname'];
               $full = $fn . ' ' . $ln; 
               echo "<tr>";
                  echo "<td>".$full."</td>";
             echo "<td>";
            echo date('F, jS, Y', $mydate);
             echo"</td>";
              echo "<td>".$row['transact_schedinfo']."</td>";
              echo "<td>".$row['payment_type']."</td>";
      
              if ($row['status'] === $pendingc){


              echo "<td bgcolor='yellow' class='font-weight-bold'>".$row['status']."</td>";
             }elseif($row['status'] === $approvedc){
              echo "<td bgcolor='green' class='font-weight-bold'>".$row['status']."</td>";
             }else{
              echo "<td bgcolor='red' class='text-center font-weight-bold'>".$row['status']."</td>";
             }
            echo '<td align="right">
            <a type="button" class="btn btn-primary bg-gradient-primary" href="pendingjoborder.php?editId='.$row['transid'] . '"><i class="fas fa-fw fa-th-list"></i> View</a>
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