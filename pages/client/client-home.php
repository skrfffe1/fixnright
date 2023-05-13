<?php
  include 'process/session.php';
  $tempcode = $_SESSION['id'];
// MONTHLY
$monthlyquery = "SELECT SUM(`item_total`) as monthtotal FROM parts_table WHERE MONTH(`dt`)=MONTH( CURRENT_DATE ) AND YEAR(`dt`)=YEAR( CURRENT_DATE )";
$monthlyresult= mysqli_query($con,$monthlyquery);
$monthlydata = mysqli_fetch_assoc($monthlyresult);
//echo $data['total'];
$totalmonthly = $monthlydata['monthtotal'];
$monthlyquerytable = "SELECT SUM(`price`) as monthlytable FROM transaction_table WHERE MONTH(`transact_dt`)=MONTH( CURRENT_DATE ) AND YEAR(`transact_dt`)=YEAR( CURRENT_DATE )";
$monthlytable= mysqli_query($con,$monthlyquerytable);
$monthlytabledata = mysqli_fetch_assoc($monthlytable);
//echo $data['total'];
$totaltablemonthly = $monthlytabledata['monthlytable'];
//echo "Total Sum for this Month is : ",$totalmonthly;
//MONTHLY -->

//YEARLY
$yearlyquery = "SELECT SUM(`item_total`) as yeartotal FROM parts_table WHERE YEAR(`dt`)=YEAR( CURRENT_DATE )";
$yearlyresult= mysqli_query($con,$yearlyquery);
$yearlydata = mysqli_fetch_assoc($yearlyresult);
$totalyearly = $yearlydata['yeartotal'];
$yearlyquery1 = "SELECT SUM(`price`) as yeartotal1 FROM transaction_table WHERE YEAR(`transact_dt`)=YEAR( CURRENT_DATE )";
$yearlyresult1= mysqli_query($con,$yearlyquery1);
$yearlydata1 = mysqli_fetch_assoc($yearlyresult1);
$totalyearly1 = $yearlydata1['yeartotal1'];
//echo "<br>Total Sum for this Month is : ",$totalyearly;
//YEARLY -->
$overalltotalyearly = $totalmonthly + $totaltablemonthly;
$overalltotal = $totalmonthly + $totaltablemonthly;
 
$sqlquery = "SELECT * FROM users WHERE id = $tempcode;";
     $result= $con->query($sqlquery);
     while($row = $result->fetch_assoc()) {
        $temp_type = $row['user_type'];
    }
  $dataPoints = array( 
  array("label"=>"Oxygen", "symbol" => "O","y"=>46.6),
  array("label"=>"Silicon", "symbol" => "Si","y"=>27.7),
  array("label"=>"Aluminium", "symbol" => "Al","y"=>13.9),

 
)
  ?>

<!doctype html>
<html lang="en-US">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
 <div id="wrapper">

        <!-- Sidebar -->
        
        
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

     <?php

    if ($temp_type == "admin") { ?>

        <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                         <li class="nav-item dropdown " >
                                              
                                                <a class=" dropdown-toggle btn btn-primary" href="#" id="navbarDropdown"
                                                    role="button" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report
                                                     
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-left animated--fade-in"
                                                    aria-labelledby="navbarDropdown">
                                                    
                                                   
                                                    <a href="../reciept/expense-print-download.php" class="btn btn-primary bg-light  dropdown-item"><i class="fas fa-download fa-sm text-dark-50">&nbsp;&nbsp;&nbsp;&nbsp;</i>  Expense Reports</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a  href="../reciept/lowstocks-print-download.php" class="btn btn-primary bg-light  dropdown-item " ><i class="fas fa-download fa-sm text-dark-50">&nbsp;&nbsp;&nbsp;&nbsp;</i> Low Stocks Reports</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a href="../reciept/product-print-download.php" class="btn btn-primary bg-light  dropdown-item"><i class="fas fa-download fa-sm text-dark-50">&nbsp;&nbsp;&nbsp;&nbsp;</i>Product Item Reports</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a  href="../reciept/dailyreport-print-download.php" class="btn btn-primary bg-light  dropdown-item"><i class="fas fa-download fa-sm text-dark-50">&nbsp;&nbsp;&nbsp;&nbsp;</i>Daily Reports</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a href="../reciept/dailyexpense-print-download.php" class="btn btn-primary bg-light  dropdown-item "><i class="fas fa-download fa-sm text-dark-50">&nbsp;&nbsp;&nbsp;&nbsp;</i>Daily Expenses Reports</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a  href="../reciept/dailywithexpense-print-download.php" class="btn btn-primary bg-light  dropdown-item"><i class="fas fa-download fa-sm text-dark-50">&nbsp;&nbsp;&nbsp;&nbsp;</i>Daily Income w/ Expense Reports</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a href="../reciept/dailywithoutexpense-print-download.php" class="btn btn-primary bg-light  dropdown-item"><i class="fas fa-download fa-sm text-dark-50">&nbsp;&nbsp;&nbsp;&nbsp</i>Daily Income w/o Expense Reports</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a href="../reciept/monthlyreport-print-download.php"class="btn btn-primary bg-light  dropdown-item"><i class="fas fa-download fa-sm text-dark-50">&nbsp;&nbsp;&nbsp;&nbsp;</i>Monthly Reports</a>
                                                     <div class="dropdown-divider"></div>
                                                    <a  href="../reciept/monthlyexpense-print-download.php" class="btn btn-primary bg-light  dropdown-item "><i class="fas fa-download fa-sm text-dark-50">&nbsp;&nbsp;&nbsp;&nbsp</i>Monthly Expenses Reports</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a href="../reciept/monthlywithexpense-print-download.php" class="btn btn-primary bg-light  dropdown-item"><i class="fas fa-download fa-sm text-dark-50">&nbsp;&nbsp;&nbsp;&nbsp;</i>Monthly Income w/ Expense Reports</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a  href="../reciept/monthlywithoutexpense-print-download.php"class="btn btn-primary bg-light  dropdown-item"><i class="fas fa-download fa-sm text-dark-50">&nbsp;&nbsp;&nbsp;&nbsp;</i>Monthly Income w/o Expense Reports</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a href="../reciept/yearlyreport-print-download.php"class="btn btn-primary bg-light  dropdown-item"><i class="fas fa-download fa-sm text-dark-50">&nbsp;&nbsp;&nbsp;&nbsp;</i>Yearly Reports</a>
                                                     <div class="dropdown-divider"></div>
                                                    <a  href="../reciept/yearlyexpense-print-download.php" class="btn btn-primary bg-light  dropdown-item "><i class="fas fa-download fa-sm text-dark-50">&nbsp;&nbsp;&nbsp;&nbsp;</i>Yearly Expenses Reports</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a href="../reciept/yearlywithexpense-print-download.php" class="btn btn-primary bg-light  dropdown-item"><i class="fas fa-download fa-sm text-dark-50">&nbsp;&nbsp;&nbsp;&nbsp;</i>Yearly Income w/ Expense Reports</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a  href="../reciept/yearlywithoutexpense-print-download.php"class="btn btn-primary bg-light  dropdown-item"><i class="fas fa-download fa-sm text-dark-50">&nbsp;&nbsp;&nbsp;&nbsp;</i>Yearly Income w/o Expense Reports</a>
                                                  <div class="dropdown-divider"></div>
                                                  
                                                   
                                                </div>
                                            </li>
                        
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Earnings (Monthly)</div>

                                            <div class="h5 mb-0 font-weight-bold text-gray-800">₱<?php echo number_format($overalltotal, 2); ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Earnings (Annual)</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">₱<?php echo number_format($overalltotalyearly, 2); ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                          <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                                <?php
                                        // COUNT OF SERVICES
                                        $resultcountsql = "SELECT count(*) as total FROM transacttable WHERE  transacttable.status = 'Pending';";
                                        $resultsq= mysqli_query($con,$resultcountsql);
                                        $data = mysqli_fetch_assoc($resultsq);
                                        //echo $data['total'];
                                        $numofpending = $data['total'];
                                     ?>
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">PENDING REQUEST
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $numofpending;?></div>
                                                </div>
                                                <div class="col">
                                                    <div class="progress progress-sm mr-2">
                                                        <div class="progress-bar bg-info" role="progressbar"
                                                            style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                       <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                <?php
                                        // COUNT OF SERVICES
                            $resultcountsql = "SELECT count(*) as total FROM services";
                            $resultsq= mysqli_query($con,$resultcountsql);
                            $data = mysqli_fetch_assoc($resultsq);
                            //echo $data['total'];
                            $numofpending = $data['total'];
                                     ?>
                                                Services Offered</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $numofpending;?></div>
                                        </div>

                                         <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->

                    <div class="row">

                        

                      
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Content Column -->
                        <div class="col-lg-6 mb-4">

                            <!-- Project Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Booking For Today</h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> 
               <thead>
                   <tr>
                    <th >Schedule</th>
                     <th >Note</th>
                    

                     <th width="8%">Status</th>
                 <th width="8%">Action</th> 

                   
                   </tr>
               </thead>
          <tbody>
  <?php 
   $pendingc= "Pending";
  $rejectc = "Rejected";
  $approvedc = "Approved";
  $sqlpending = " SELECT  * FROM transacttable WHERE DAY(transact_sched) = DAY(CURRENT_DATE) AND status !='Completed'";
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
           
            

              echo "<td bgcolor='yellow' class='font-weight-bold'>".$row['status']."</td>";
              echo '<td align="right">
                    <a type="button" class="btn btn-primary bg-gradient-primary" href="joborder2.php?editId='.$row['transid'] . '"><i class="fas fa-fw fa-th-list"></i></a>
           
                    </div> </td>';
             }elseif($row['status'] === $approvedc){
                    echo "<tr>";
                 echo "<td>";
                 echo date('F, jS, Y', $mydate);
                 echo "</td>";
                echo "<td>".$row['transact_schedinfo']."</td>";
                
                
              echo "<td bgcolor='bg-green' class='font-weight-bold'>".$row['status']."</td>";
              echo '<td align="right">
                    <a type="button" class="btn btn-primary bg-gradient-primary" href="joborder4.php?editId='.$row['transid'] . '"><i class="fas fa-fw fa-th-list"></i> </a>
           
                    </div> </td>';

             }else{
                  echo "<tr>";
                 echo "<td>";
                 echo date('F, jS, Y', $mydate);
                 echo "</td>";
                echo "<td>".$row['transact_schedinfo']."</td>";
                
            
              echo "<td bgcolor='bg-blue'  class='text-center font-weight-bold'>".$row['status']."</td>";
                 echo '<td align="right">
                    <a type="button" class="btn btn-primary bg-gradient-primary" href="joborder4.php?editId='.$row['transid'] . '"><i class="fas fa-fw fa-th-list"></i></a>
           
                    </div> </td>';
              
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
                                    <h6 class="m-0 font-weight-bold text-primary">Booking Request</h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> 
               <thead>
                   <tr>
                    <th >Schedule</th>
                     <th >Note</th>
                    

                     <th width="8%">Status</th>
                 <th width="8%">Action</th> 

                   
                   </tr>
               </thead>
          <tbody>
  <?php 
   $pendingc= "Pending";
  $rejectc = "Rejected";
  $approvedc = "Approved";
  $sqlpending = " SELECT  * FROM transacttable WHERE status = '$pendingc'; ";
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
           
            

              echo "<td bgcolor='yellow' class='font-weight-bold'>".$row['status']."</td>";
              echo '<td align="right">
                    <a type="button" class="btn btn-primary bg-gradient-primary" href="joborder2.php?editId='.$row['transid'] . '"><i class="fas fa-fw fa-th-list"></i></a>
           
                    </div> </td>';
             }elseif($row['status'] === $approvedc){
                    echo "<tr>";
                 echo "<td>";
                 echo date('F, jS, Y', $mydate);
                 echo "</td>";
                echo "<td>".$row['transact_schedinfo']."</td>";
                
                
              echo "<td bgcolor='bg-green' class='font-weight-bold'>".$row['status']."</td>";
              echo '<td align="right">
                    <a type="button" class="btn btn-primary bg-gradient-primary" href="joborder4.php?editId='.$row['transid'] . '"><i class="fas fa-fw fa-th-list"></i> </a>
           
                    </div> </td>';

             }else{
                  echo "<tr>";
                 echo "<td>";
                 echo date('F, jS, Y', $mydate);
                 echo "</td>";
                echo "<td>".$row['transact_schedinfo']."</td>";
                
            
              echo "<td bgcolor='bg-blue'  class='text-center font-weight-bold'>".$row['status']."</td>";
                 echo '<td align="right">
                    <a type="button" class="btn btn-primary bg-gradient-primary" href="joborder4.php?editId='.$row['transid'] . '"><i class="fas fa-fw fa-th-list"></i></a>
           
                    </div> </td>';
              
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
                                    <h6 class="m-0 font-weight-bold text-primary">Booking Approved</h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> 
               <thead>
                   <tr>
                    <th >Schedule</th>
                     <th >Note</th>
                    

                     <th width="8%">Status</th>
                 <th width="8%">Action</th> 

                   
                   </tr>
               </thead>
          <tbody>
  <?php 
   $pendingc= "Pending";
  $rejectc = "Rejected";
  $approvedc = "Approved";
  $sqlpending = " SELECT  * FROM transacttable WHERE status = '$approvedc'; ";
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
           
            

              echo "<td bgcolor='yellow' class='font-weight-bold'>".$row['status']."</td>";
              echo '<td align="right">
                    <a type="button" class="btn btn-primary bg-gradient-primary" href="joborder4.php?editId='.$row['transid'] . '"><i class="fas fa-fw fa-th-list"></i></a>
           
                    </div> </td>';
             }elseif($row['status'] === $approvedc){
                    echo "<tr>";
                 echo "<td>";
                 echo date('F, jS, Y', $mydate);
                 echo "</td>";
                echo "<td>".$row['transact_schedinfo']."</td>";
                
                
              echo "<td bgcolor='bg-green' class='font-weight-bold'>".$row['status']."</td>";
              echo '<td align="right">
                    <a type="button" class="btn btn-primary bg-gradient-primary" href="joborder4.php?editId='.$row['transid'] . '"><i class="fas fa-fw fa-th-list"></i> </a>
           
                    </div> </td>';

             }else{
                  echo "<tr>";
                 echo "<td>";
                 echo date('F, jS, Y', $mydate);
                 echo "</td>";
                echo "<td>".$row['transact_schedinfo']."</td>";
                
            
              echo "<td bgcolor='bg-blue'  class='text-center font-weight-bold'>".$row['status']."</td>";
                 echo '<td align="right">
                    <a type="button" class="btn btn-primary bg-gradient-primary" href="joborder4.php?editId='.$row['transid'] . '"><i class="fas fa-fw fa-th-list"></i></a>
           
                    </div> </td>';
              
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
                                    <h6 class="m-0 font-weight-bold text-primary">Complete Transactions</h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> 
               <thead>
                   <tr>
                    <th >Schedule</th>
                     <th >Note</th>
                    

                   
                 <th width="8%">Action</th> 

                   
                   </tr>
               </thead>
          <tbody>
  <?php 
   $pendingc= "Pending";
  $rejectc = "Completed";
  $approvedc = "Approved";
  $sqlpending = " SELECT  * FROM transacttable WHERE status = '$rejectc'; ";
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
           
            

            
              echo '<td align="right">
                    <a type="button" class="btn btn-primary bg-gradient-primary" href="joborder4.php?editId='.$row['transid'] . '"><i class="fas fa-fw fa-th-list"></i></a>
           
                    </div> </td>';
             }elseif($row['status'] === $approvedc){
                    echo "<tr>";
                 echo "<td>";
                 echo date('F, jS, Y', $mydate);
                 echo "</td>";
                echo "<td>".$row['transact_schedinfo']."</td>";
                
                
              
              echo '<td align="right">
                    <a type="button" class="btn btn-primary bg-gradient-primary" href="joborder4.php?editId='.$row['transid'] . '"><i class="fas fa-fw fa-th-list"></i> </a>
           
                    </div> </td>';

             }else{
                  echo "<tr>";
                 echo "<td>";
                 echo date('F, jS, Y', $mydate);
                 echo "</td>";
                echo "<td>".$row['transact_schedinfo']."</td>";
                
            
              
                 echo '<td align="right">
                    <a type="button" class="btn btn-primary bg-gradient-primary" href="joborder4.php?editId='.$row['transid'] . '"><i class="fas fa-fw fa-th-list"></i></a>
           
                    </div> </td>';
              
             }
            
             
  }
     ?>
                                </tbody>
                            </table>
                        </div>
                                </div>
                            </div>
                            <!-- Color System -->
                            

                        </div>

                        <div class="col-lg-6 mb-4">

                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Purchase Order</h6>
                                </div>
                                <div class="card-body">
                                    <div class="text-center">
                                       
                                    </div>
                                 <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> 
                  <thead>
                        <tr>
                          <th>Buyer</th>
                          <th>Ordered Item</th>
                          
                          
                          <th>Action</th>
                        </tr>
                     </thead>
                    <tbody>
                <?php                  
                         $query = "SELECT * FROM parts_table  WHERE item_status = 'Approved';";
                        $result = mysqli_query($con, $query) or die (mysqli_error($db));
                        while ($row = mysqli_fetch_assoc($result)) {
                        echo '<tr>';
                        echo '<td>'. $row['item_buyer'].'</td>';
                        echo '<td>'. $row['item_name'].'</td>';
                       
                        
                       
                            echo '<td align="center"> <div class="btn-group">
                      
                              <a type="button" class="btn btn-primary bg-gradient-primary" href="view/purchase-details.php?editId='.$row['item_id'] . '"><i class="fas fa-fw fa-list-alt"></i> Details</a>
                           
                          </div> </td>';
                        echo '</tr> ';
                        }
                    ?> 
                    
                                    
                    </tbody>
                </table>
              </div>
                                </div>
                            </div>

                            <!-- Approach -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Purchase Request</h6>
                                </div>
                                <div class="card-body">
                                    <div class="text-center">
                                       
                                    </div>
                                 <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> 
                  <thead>
                        <tr>
                          <th>Buyer</th>
                          <th>Ordered Item</th>
                          
                          
                          <th>Action</th>
                        </tr>
                     </thead>
                    <tbody>
                <?php                  
                         $query = "SELECT * FROM parts_table  WHERE item_status = 'Pending';";
                        $result = mysqli_query($con, $query) or die (mysqli_error($db));
                        while ($row = mysqli_fetch_assoc($result)) {
                        echo '<tr>';
                        echo '<td>'. $row['item_buyer'].'</td>';
                        echo '<td>'. $row['item_name'].'</td>';
                       
                        
                       
                            echo '<td align="center"> <div class="btn-group">
                      
                              <a type="button" class="btn btn-primary bg-gradient-primary" href="view/purchase-details.php?editId='.$row['item_id'] . '"><i class="fas fa-fw fa-list-alt"></i> Details</a>
                           
                          </div> </td>';
                        echo '</tr> ';
                        }
                    ?> 
                    
                                    
                    </tbody>
                </table>
              </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
      <?php } else { ?>

          <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">My Dashboard</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Money Spent (Monthly)</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Vehicles Registered</div>
                                                <?php
                                        // COUNT OF SERVICES
                            $resultcountsql = "SELECT count(*) as total FROM cardata WHERE cardata.plateid = '$tempcode'";
                            $resultsq= mysqli_query($con,$resultcountsql);
                            $data = mysqli_fetch_assoc($resultsq);
                            //echo $data['total'];
                            $numofcars = $data['total'];
                                     ?>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $numofcars;?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-car fa-2x text-green-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Transactions
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                                                </div>
                                                <div class="col">
                                                    <div class="progress progress-sm mr-2">
                                                        <div class="progress-bar bg-info" role="progressbar"
                                                            style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">

                                                Pending Requests</div>
                                                  
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                        

                        <!-- Pie Chart -->
                        
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Content Column -->
                        <div class="col-lg-6 mb-4">

                            <!-- Project Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Transactions for Today</h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> 
               <thead>
                   <tr>
                    <th >Schedule</th>
                     <th >Note</th>
                    

                     <th width="8%">Status</th>
                 <th width="8%">Action</th> 

                   
                   </tr>
               </thead>
          <tbody>
  <?php 
   $pendingc= "Pending";
  $rejectc = "Rejected";
  $approvedc = "Approved";
  $sqlpending = " SELECT  * FROM transacttable WHERE custid = '$tempcode' AND DAY(transact_sched) = DAY(CURRENT_DATE);";
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
           
            

              echo "<td bgcolor='yellow' class='font-weight-bold'>".$row['status']."</td>";
              echo '<td align="right">
                    <a type="button" class="btn btn-primary bg-gradient-primary" href="joborder4.php?editId='.$row['transid'] . '"><i class="fas fa-fw fa-th-list"></i></a>
           
                    </div> </td>';
             }elseif($row['status'] === $approvedc){
                    echo "<tr>";
                 echo "<td>";
                 echo date('F, jS, Y', $mydate);
                 echo "</td>";
                echo "<td>".$row['transact_schedinfo']."</td>";
                
                
              echo "<td bgcolor='bg-green' class='font-weight-bold'>".$row['status']."</td>";
              echo '<td align="right">
                    <a type="button" class="btn btn-primary bg-gradient-primary" href="joborder4.php?editId='.$row['transid'] . '"><i class="fas fa-fw fa-th-list"></i> </a>
           
                    </div> </td>';

             }else{
                  echo "<tr>";
                 echo "<td>";
                 echo date('F, jS, Y', $mydate);
                 echo "</td>";
                echo "<td>".$row['transact_schedinfo']."</td>";
                
            
              echo "<td bgcolor='bg-blue'  class='text-center font-weight-bold'>".$row['status']."</td>";
                 echo '<td align="right">
                    <a type="button" class="btn btn-primary bg-gradient-primary" href="joborder4.php?editId='.$row['transid'] . '"><i class="fas fa-fw fa-th-list"></i></a>
           
                    </div> </td>';
              
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
                                    <h6 class="m-0 font-weight-bold text-primary">My Pending Transactions</h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> 
               <thead>
                   <tr>
                    <th >Schedule</th>
                     <th >Note</th>
                    

                     <th width="8%">Status</th>
                 <th width="8%">Action</th> 

                   
                   </tr>
               </thead>
          <tbody>
  <?php 
   $pendingc= "Pending";
  $rejectc = "Rejected";
  $approvedc = "Approved";
  $sqlpending = " SELECT  * FROM transacttable WHERE custid = '$tempcode' AND status ='Pending'; ";
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
           
            

              echo "<td bgcolor='yellow' class='font-weight-bold'>".$row['status']."</td>";
              echo '<td align="right">
                    <a type="button" class="btn btn-primary bg-gradient-primary" href="joborder4.php?editId='.$row['transid'] . '"><i class="fas fa-fw fa-th-list"></i></a>
           
                    </div> </td>';
             }elseif($row['status'] === $approvedc){
                    echo "<tr>";
                 echo "<td>";
                 echo date('F, jS, Y', $mydate);
                 echo "</td>";
                echo "<td>".$row['transact_schedinfo']."</td>";
                
                
              echo "<td bgcolor='bg-green' class='font-weight-bold'>".$row['status']."</td>";
              echo '<td align="right">
                    <a type="button" class="btn btn-primary bg-gradient-primary" href="joborder4.php?editId='.$row['transid'] . '"><i class="fas fa-fw fa-th-list"></i> </a>
           
                    </div> </td>';

             }else{
                  echo "<tr>";
                 echo "<td>";
                 echo date('F, jS, Y', $mydate);
                 echo "</td>";
                echo "<td>".$row['transact_schedinfo']."</td>";
                
            
              echo "<td bgcolor='bg-blue'  class='text-center font-weight-bold'>".$row['status']."</td>";
                 echo '<td align="right">
                    <a type="button" class="btn btn-primary bg-gradient-primary" href="joborder4.php?editId='.$row['transid'] . '"><i class="fas fa-fw fa-th-list"></i></a>
           
                    </div> </td>';
              
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
                                    <h6 class="m-0 font-weight-bold text-primary">Completed Transactions</h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> 
               <thead>
                   <tr>
                    <th >Schedule</th>
                     <th >Note</th>
                    

                     <th width="8%">Status</th>
                 <th width="8%">Action</th> 

                   
                   </tr>
               </thead>
          <tbody>
  <?php 
   $pendingc= "Pending";
  $rejectc = "Rejected";
  $approvedc = "Approved";
  $sqlpending = " SELECT  * FROM transacttable WHERE custid = '$tempcode' AND status ='Completed'; ";
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
           
            

              echo "<td bgcolor='yellow' class='font-weight-bold'>".$row['status']."</td>";
              echo '<td align="right">
                    <a type="button" class="btn btn-primary bg-gradient-primary" href="joborder4.php?editId='.$row['transid'] . '"><i class="fas fa-fw fa-th-list"></i></a>
           
                    </div> </td>';
             }elseif($row['status'] === $approvedc){
                    echo "<tr>";
                 echo "<td>";
                 echo date('F, jS, Y', $mydate);
                 echo "</td>";
                echo "<td>".$row['transact_schedinfo']."</td>";
                
                
              echo "<td bgcolor='bg-green' class='font-weight-bold'>".$row['status']."</td>";
              echo '<td align="right">
                    <a type="button" class="btn btn-primary bg-gradient-primary" href="joborder4.php?editId='.$row['transid'] . '"><i class="fas fa-fw fa-th-list"></i> </a>
           
                    </div> </td>';

             }else{
                  echo "<tr>";
                 echo "<td>";
                 echo date('F, jS, Y', $mydate);
                 echo "</td>";
                echo "<td>".$row['transact_schedinfo']."</td>";
                
            
              echo "<td bgcolor='bg-blue'  class='text-center font-weight-bold'>".$row['status']."</td>";
                 echo '<td align="right">
                    <a type="button" class="btn btn-primary bg-gradient-primary" href="joborder4.php?editId='.$row['transid'] . '"><i class="fas fa-fw fa-th-list"></i></a>
           
                    </div> </td>';
              
             }
            
             
  }
     ?>
                                </tbody>
                            </table>
                        </div>
                                </div>
                            </div>
                             
                            <!-- Color System -->
                            

                        </div>

                        <div class="col-lg-6 mb-4">

                            <!-- Illustrations -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Vehicles</h6>
                                </div>
                                <div class="card-body">
                                    <div class="text-center">
                                       
                                    </div>
                                 <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> 
                  <thead>
                        <tr>
                          <th>Plate</th>
                          <th>Brand</th>
                          <th>Model</th>
                          <th>Make</th>
                          <th>Action</th>
                        </tr>
                     </thead>
                    <tbody>
                <?php                  
                        $query = "SELECT * from cardata WHERE cardata.plateid = $tempcode;";
                        $result = mysqli_query($con, $query) or die (mysqli_error($db));
                        while ($row = mysqli_fetch_assoc($result)) {
                        echo '<tr>';
                        echo '<td>'. $row['userphone'].'</td>';
                        echo '<td>'. $row['carbrand'].'</td>';
                        echo '<td>'. $row['carmodel'].'</td>';
                        echo '<td>'. $row['cartype'].'</td>';


                      echo '<td align="right"> <div class="btn-group">
                      
                              <a type="button" class="btn btn-primary bg-gradient-primary" href="customer1.php?editId='.$row['id'] . '"><i class="fas fa-fw fa-list-alt"></i> View</a>
                        
                          </div> </td>';
                        echo '</tr> ';
                        }
                    ?> 
                    
                                    
                    </tbody>
                </table>
              </div>
                                </div>
                            </div>

                            <!-- Approach -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Services </h6>
                                </div>
                                <div class="card-body">
                                  <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> 
                  <thead>
                        <tr>
                          <th>Name</th>
                          <th>Price</th>
                          <th>Rate</th>
                          <th>Hour</th>
                        
                        </tr>
                     </thead>
                    <tbody>
                <?php                  
                        $query = "SELECT * from transaction_table  WHERE transaction_table.transaction_user_id = $tempcode;";
                        $result = mysqli_query($con, $query) or die (mysqli_error($db));
                        while ($row = mysqli_fetch_assoc($result)) {
                        echo '<tr>';
                        echo '<td>'. $row['name'].'</td>';
                        echo '<td>'. $row['price'].'</td>';
                        echo '<td>'. $row['rate'].'</td>';
                        echo '<td>'. $row['hour'].'</td>';


                      
                        echo '</tr> ';
                        }
                    ?> 
                    
                                    
                    </tbody>
                </table>
              </div>
                                </div>
                            </div>
                              <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Materials Boughts</h6>
                                </div>
                                <div class="card-body">
                                  <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> 
                  <thead>
                        <tr>
                          <th>Name</th>
                          <th>Price</th>
                          <th>Amount</th>
                          <th>Total</th>
                      
                        </tr>
                     </thead>
                    <tbody>
                <?php                  
                      $query = "SELECT * FROM parts_table WHERE item_user_id = '$tempcode' AND item_status != 'Pending';";
                        $result = mysqli_query($con, $query) or die (mysqli_error($db));
                        while ($row = mysqli_fetch_assoc($result)) {
                        echo '<tr>';
                        echo '<td>'. $row['item_name'].'</td>';
                        echo '<td>'. $row['item_price'].'</td>';
                        echo '<td>'. $row['item_amount'].'</td>';
                        echo '<td>'. $row['item_total'].'</td>';


                     
                        echo '</tr> ';
                        }
                    ?> 
                    
                                    
                    </tbody>
                </table>
              </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>

          <?php } ?>

               
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                
                

            </div>
       

        </div>
 

    </div>



    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

 
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>
     
  </body>
  </html>


<?php
include ('footer.php');
 ?>