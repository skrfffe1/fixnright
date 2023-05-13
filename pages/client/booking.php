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

       
            
 <div class="modal hide fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <div class="modal-title  ">Cars Available</div>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel"></h4>
          </div>
          <div class="modal-body">
<table class="table table-striped table-bordered" id="data">
  <thead><th>Plate Number</th>
        <th> Car Brand</th>
        <th> Car Model</th>
        <th>Action</th>
  </thead>

  <tbody>
    <?php
     $sqlcars  = "SELECT * FROM cardata WHERE cardata.plateid = $tempcode";
$resultcars = $con->query($sqlcars);
             while($row = $resultcars->fetch_assoc()) {
            echo '<tr>';
             echo "<td>".$row['userphone']."</td>";
              echo "<td>".$row['carbrand']."</td>";
               echo "<td>".$row['carmodel']."</td>";
               echo "<td>";
               echo "<a type='button' class='btn btn-warning bg-gradient-success btn-block' style='border-radius: 0px;' href='joborder.php?editId=".$row['id']."'>
                                    <i class='fas fa-fw fa-car'></i> Transact
                                  </a>";
               echo "</td>";


            echo '</tr>';
                        
             }
     ?>
                                    </tbody>
</table>
          </div>
          <div class="modal-footer"><td colspan="5" align="center">  <a href="vehicle-user.php?editId=<?php echo $tempcode?>">=> Click Here</a></td></div>
        </div>
      </div>
    </div>



<div class="card shadow mb-4">
            <div class="card-header py-3">
            <h4 class="m-2 font-weight-bold text-primary">Scheduled Today&nbsp;<a  href=""   type="button"  ; data-toggle="modal" data-target="#modal1" class="btn btn-primary bg-gradient-primary" style="border-radius: 0px;"><i class="fas fa-fw fa-plus"></i></a></h4>
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
                  <!--  <th width="8%">Action</th> -->

                   
                   </tr>
               </thead>
          <tbody>
  <?php 
  $sql2 = " SELECT  * FROM transacttable WHERE custid = '$tempcode' AND transact_sched = DATE(NOW()) ";
$result2 = $con->query($sql2);
             while($row = $result2->fetch_assoc()) {
                $tempd = $row['transact_sched'];
                 $mydate = strtotime($tempd);
               
               
            
               if ($row['status'] === $pendingc){
                    echo "<tr>";
                 echo "<td>";
                 echo date('F, jS, Y', $mydate);
                 echo "</td>";
                echo "<td>".$row['transact_schedinfo']."</td>";
                echo "<td>".$row['payment_type']."</td>";
            

              echo "<td bgcolor='yellow' class='font-weight-bold'>".$row['status']."</td>";
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
            
              echo "<td bgcolor='blue'  class='text-center font-weight-bold'>".$row['status']."</td>";
             
             }
            
             
  }
     ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                  </div>



<div class="card shadow mb-4">
            <div class="card-header py-3">
            <h4 class="m-2 font-weight-bold text-success">Approved&nbsp;<a  href=""   type="button"  ;  class="btn btn-primary bg-gradient-success" style="border-radius: 0px;"><i class="fas fa-fw fa-check"></i></a></h4>
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
                 <!--  <th width="8%">Action</th> -->

                   
                   </tr>
               </thead>
          <tbody>
  <?php 
  $sqlpending = " SELECT  * FROM transacttable WHERE custid = '$tempcode' AND status = 'Approved'; ";
$resultpending = $con->query($sqlpending);
             while($row = $resultpending->fetch_assoc()) {
                $tempd = $row['transact_sched'];
                 $mydate = strtotime($tempd);
               
               
            
               if ($row['status'] === $pendingc){
                    echo "<tr>";
                 echo "<td>";
                 echo date('F, jS, Y', $mydate);
                 echo "</td>";
                echo "<td>".$row['transact_schedinfo']."</td>";
                echo "<td>".$row['payment_type']."</td>";
            

              echo "<td bgcolor='yellow' class='font-weight-bold'>".$row['status']."</td>";
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


          <!-- PENDING-->
<div class="card shadow mb-4">
            <div class="card-header py-3">
            <h4 class="m-2 font-weight-bold text-warning">Pending&nbsp;<a  href=""   type="button"  ;  class="btn btn-primary bg-gradient-warning" style="border-radius: 0px;"><i class="fas fa-fw fa-clock"></i></a></h4>
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
  $sqlpending = " SELECT  * FROM transacttable WHERE custid = '$tempcode' AND status = 'Pending'; ";
$resultpending = $con->query($sqlpending);
             while($row = $resultpending->fetch_assoc()) {
                $tempd = $row['transact_sched'];
                 $mydate = strtotime($tempd);
               
               
            
               if ($row['status'] === $pendingc){
                    echo "<tr>";
                 echo "<td>";
                 echo date('F, jS, Y', $mydate);
                 echo "</td>";
                echo "<td>".$row['transact_schedinfo']."</td>";
                echo "<td>".$row['payment_type']."</td>";
            

              echo "<td bgcolor='yellow' class='font-weight-bold'>".$row['status']."</td>";
                echo '<td align="right"> <div class="btn-group">
                      
                              <a type="button" class="btn btn-primary bg-gradient-primary" href="view/customer_details.php?editId='.$row['transid'] . '"><i class="fas fa-fw fa-list-alt"></i> Details</a>
                            <div class="btn-group">
                              <a type="button" class="btn btn-primary bg-gradient-primary dropdown no-arrow" data-toggle="dropdown" style="color:white;">
                              ... <span class="caret"></span></a>
                            <ul class="dropdown-menu text-center" role="menu">
                                <li>
                                 </a>
                            <a type="button" class="btn btn-danger bg-gradient-btn-danger btn-block" style="border-radius: 0px;" href="process/process.php?deletecustomer='.$row['transid']. '">
                                    <i class="fas fa-fw fa-trash"></i> Cancel
                                  </a>
                                </li>
                            </ul>
                            </div>
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
       

       <div class="card shadow mb-4">
            <div class="card-header py-3">
            <h4 class="m-2 font-weight-bold text-danger">Rejected&nbsp;<a  href=""   type="button"  ;  class="btn btn-primary bg-gradient-danger" style="border-radius: 0px;"><i class="fas fa-fw fa-trash"></i></a></h4>
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
                    <!--  <th width="8%">Action</th> -->

                   
                   </tr>
               </thead>
          <tbody>
  <?php 
  $sqlpending = " SELECT  * FROM transacttable WHERE custid = '$tempcode' AND status = 'Rejected'; ";
$resultpending = $con->query($sqlpending);
             while($row = $resultpending->fetch_assoc()) {
                $tempd = $row['transact_sched'];
                 $mydate = strtotime($tempd);
               
               
            
               if ($row['status'] === $pendingc){
                    echo "<tr>";
                 echo "<td>";
                 echo date('F, jS, Y', $mydate);
                 echo "</td>";
                echo "<td>".$row['transact_schedinfo']."</td>";
                echo "<td>".$row['payment_type']."</td>";
            

              echo "<td bgcolor='yellow' class='font-weight-bold'>".$row['status']."</td>";
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

  <?php

include 'scripted.php';
 ?>
</html>
<?php
include ('footer.php');
 ?>