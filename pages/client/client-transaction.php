<?php
  include 'process/session.php';
 if(isset($_REQUEST['editId']) and $_REQUEST['editId']!=""){
  $row  = $db->getAllRecords('users','*',' AND id="'.$_REQUEST['editId'].'"');
  $productrow = $db->getAllRecords('product1','*',' AND product_quantity="'.$_REQUEST['editId'].'"');
$userCount  = $db->getQueryCount('cardata',$temp);
}



 $pendingc= "Pending";
  $rejectc = "Rejected";
  $approvedc = "Approved";
  $completedc = "Completed";
?>
 <?php
        $pages->default_ipp =   15;
        $sql    = $db->getRecFrmQry("SELECT * FROM cardata WHERE cardata.plateid = $tempcode");
        $pages->items_total =   count($sql);
        $pages->mid_range   =   9;
        $pages->paginate(); 
        $userData   =   $db->getRecFrmQry("SELECT * FROM cardata WHERE cardata.plateid = $tempcode; ORDER BY id DESC ".$pages->limit."");
    ?>
    
  
<!doctype html>
<html lang="en-US">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>

       
            
 





<!-- Approved-->
<div class="card shadow mb-4">
            <div class="card-header py-3">
            <h4 class="m-2 font-weight-bold text-success">Completed Transaction&nbsp;<a  href=""   type="button"  ;  class="btn btn-primary bg-gradient-success" style="border-radius: 0px;"><i class="fas fa-clipboard-list"></i></a></h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> 
               <thead>
                   <tr>
                    <th width="12%">Schedule</th>
                     <th width="15%">Note</th>
                     <th width="10%">Payment Type</th>

                     <th width="8%">Status</th>
                 <th width="8%">Action</th> 

                   
                   </tr>
               </thead>
          <tbody>
  <?php 
  $sqlpending = " SELECT  * FROM transacttable WHERE custid = '$tempcode' AND status = 'Completed'; ";
$resultpending = $con->query($sqlpending);
             while($row = $resultpending->fetch_assoc()) {
                $tempd = $row['transact_sched'];
                 $mydate = strtotime($tempd);
               
               
            
               if ($row['status'] === $completedc){
                    echo "<tr>";
                 echo "<td>";
                 echo date('F, jS, Y', $mydate);
                 echo "</td>";
                echo "<td>".$row['transact_schedinfo']."</td>";
                echo "<td>".$row['payment_type']."</td>";
                  

              echo "<td bgcolor='orange' class='font-weight-bold'>".$row['status']."</td>";
                 echo '<td align="right">
              <a type="button" class="btn btn-primary bg-gradient-primary" href="../reciept/print-download.php?id='.$row['transid'] . '"><i class="fas fa-download fa-sm text-white-50"></i></a>
            
            <a type="button" class="btn btn-primary bg-gradient-primary" href="joborder4.php?editId='.$row['transid'] . '"><i class="fas fa-fw fa-th-list"></i> View</a>
           
            </div> </td>';
             }elseif($row['status'] === $approvedc){
                    echo "<tr>";
                 echo "<td>";
                 echo date('F, jS, Y', $mydate);
                 echo "</td>";
                echo "<td>".$row['transact_schedinfo']."</td>";
                echo "<td>".$row['payment_type']."</td>";
                
              echo "<td bgcolor='green' class='font-weight-bold'>".$row['status']."</td>";
             }else{
                  echo "<tr>";
                 echo "<td>";
                 echo date('F, jS, Y', $mydate);
                 echo "</td>";
                echo "<td>".$row['transact_schedinfo']."</td>";
                echo "<td>".$row['payment_type']."</td>";
            
              echo "<td bgcolor='red'  class='text-center font-weight-bold'>".$row['status']."</td>";
             
             }
            
             
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