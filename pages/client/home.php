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
              <h4 class="m-2 font-weight-bold text-primary">Approved Request&nbsp;  <i class="fas fa-fw fa-list"></i></h4>
            </div>
            
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> 
               <thead>
                   <tr>
                    <th width="20%">Name</th>
                     <th width="20%">Schedule</th>
                     <th width="20">Note</th>
                     
                     
                     <th width="8%">Status</th>
                    

                     <th width="11%">Action</th>
                   </tr>
               </thead>
          <tbody>
  <?php 

                       $query = 'SELECT * FROM transacttable JOIN users on transacttable.custid = users.id WHERE status = "Approved" ';
                        $result = mysqli_query($con, $query) or die (mysqli_error($db));
                        while ($row = mysqli_fetch_assoc($result)) {
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
           
              
              
              if ($row['status'] === $pendingc){


              echo "<td bgcolor='yellow' class='font-weight-bold'>".$row['status']."</td>";
             }elseif($row['status'] === $approvedc){
              echo "<td bgcolor='green' class='font-weight-bold'>".$row['status']."</td>";
             }else{
              echo "<td bgcolor='red' class='text-center font-weight-bold'>".$row['status']."</td>";
             }
            echo '<td align="right">
            <a type="button" class="btn btn-primary bg-gradient-primary" href="joborder2.php?editId='.$row['transid'] . '"><i class="fas fa-fw fa-th-list"></i> View</a>
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