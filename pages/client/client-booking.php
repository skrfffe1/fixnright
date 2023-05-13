<?php
  session_start();
  if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: ../../login/login.php');
  }
  if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: ../../login/login.php");
  }
?>
<?php include_once('../../include/config.php');
  include_once('../../include/config2.php');
  include '../../include/client/sidebar.php';
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
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="PHP CRUD with search and pagination in bootstrap 4">
  <meta name="keywords" content="PHP CRUD, CRUD with search and pagination, bootstrap 4, PHP">
  <meta name="robots" content="index,follow">
  <title>Services</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
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
                    if(count($userData)>0){
                        $s  =   '';
                        foreach($userData as $val){
                            $s++;
                    ?>
                    <tr>
                        
                        <td><?php echo $val['userphone'];?></td>
                        <td><?php echo $val['carbrand'];?></td>
                        <td><?php echo $val['carmodel'];?></td>
                        <td><a type="button" class="btn btn-warning bg-gradient-success btn-block" style="border-radius: 0px;" href="../transact/joborder.php?editId=<?php echo $val['id'];?>">
                                    <i class="fas fa-fw fa-car"></i> Transact
                                  </a></td>
      
                    </tr>
                    <?php 
                        }
                    }else{
                    ?>
                    <tr><td colspan="5" align="center">No Record(s) Found!   <a href="customer_car.php?editId=<?php echo $tempcode?>">Click Here</a></td></tr>

                    <?php } ?> 
                                    </tbody>
</table>
          </div>
          <div class="modal-footer"></div>
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
            
              echo "<td bgcolor='red'  class='text-center font-weight-bold'>".$row['status']."</td>";
              echo '<td align="right">
            <a type="button" class="btn btn-primary bg-gradient-primary" href="rejectedview.php?editId='.$row['transid'] . '"><i class="fas fa-fw fa-th-list"></i> View</a>
            </div> </td>';
             }
            
             
  }
     ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                  </div>


<!-- Approved-->
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
              echo '<td align="right">
            <a type="button" class="btn btn-primary bg-gradient-primary" href="rejectedview.php?editId='.$row['transid'] . '"><i class="fas fa-fw fa-th-list"></i> View</a>
            </div> </td>';
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
                <!--  <th width="8%">Action</th> -->

                   
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
              echo '<td align="right">
            <a type="button" class="btn btn-primary bg-gradient-primary" href="rejectedview.php?editId='.$row['transid'] . '"><i class="fas fa-fw fa-th-list"></i> View</a>
            </div> </td>';
             }
            
             
  }
     ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                  </div>
  <!-- Rejected Request-->
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
            //  echo '<td align="right">
          //  <a type="button" class="btn btn-primary bg-gradient-primary" href="rejectedview.php?editId='.$row['transid'] . '"><i class="fas fa-fw fa-th-list"></i> View</a>
         //   </div> </td>';
             }
            
             
  }
     ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                  </div>
  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/jquery.caret/0.1/jquery.caret.js"></script>
  <script src="https://www.solodev.com/_/assets/phone/jquery.mobilePhoneNumber.js"></script>
  <script>
    $(document).ready(function() {
    jQuery(function($){
        var input = $('[type=tel]')
        input.mobilePhoneNumber({allowPhoneWithoutPrefix: '+1'});
        input.bind('country.mobilePhoneNumber', function(e, country) {
        $('.country').text(country || '')
        })
       });
    });
  </script>
    

</body>

</html>
<?php

include 'scripted.php';
 ?>