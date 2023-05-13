
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
<script>
  
  function my_fun(str){
    if(window.XMLHttpRequest){
      xmlhttp = new XMLHttpRequest();
    }else{
      xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange= function(){
      if(this.readyState ==4 && this.status ==200){
        document.getElementById('poll').innerHTML = this.responseText;

      }
    }
    xmlhttp.open("GET","helper.php?value="+str, true);
    xmlhttp.send();
  }
</script>
<script>
  
  function my_fun2(str){
    if(window.XMLHttpRequest){
      xmlhttp = new XMLHttpRequest();
    }else{
      xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange= function(){
      if(this.readyState ==4 && this.status ==200){
        document.getElementById('poll2').innerHTML = this.responseText;

      }
    }
    xmlhttp.open("GET","helper2.php?value="+str, true);
    xmlhttp.send();
  }
</script>



 
<?php
include_once('../../include/config.php');
  include_once('../../include/config2.php');
  include '../../include/client/sidebar.php';
   $tempids = $_GET['editId'];

  $sqlcurid = "SELECT * FROM transacttable WHERE transid = $tempids";
  $resultcurid = $con->query($sqlcurid);
     while($row = $resultcurid->fetch_assoc()) {
     
      $tempid = $row['carid'];
      
               
  }
   $pendingdata = "SELECT * FROM transacttable where transid=$tempids";
$resultpendingdata = $con->query($pendingdata);
 if ($resultpendingdata->num_rows > 0) {
 
             while($row = $resultpendingdata->fetch_assoc()) {
                echo "<tr>";
                 $pendingcarID = $row['carid'];   
                $pendinguserID = $row['custid'];
                $pendingtransactdate = $row['transact_sched'];
                $pendingpaymentype = $row['payment_type'];
                $pendingtransactschedinfo = $row['transact_schedinfo'];
                $pendingnumofitems = $row['numofitem'];
  }}

   $sqlcarinfos = "SELECT * FROM cardata WHERE id = $pendingcarID;";
            $resultcarinfos = $con->query($sqlcarinfos);
             while($row = $resultcarinfos->fetch_assoc()) {
               $tempcarname= $row['carbrand'];
               $tempcarmodel = $row['carmodel'];
               
  }
$sqlerr = "SELECT * FROM employee ";
$resulterr = mysqli_query($con, $sqlerr) or die ("Bad SQL: $sql2");
if($resulterr->num_rows>0){
  $options = mysqli_fetch_all($resulterr,MYSQLI_ASSOC);
}
$sqltransid  = "SELECT transid FROM transacttable ORDER BY transid DESC LIMIT 1";

$resulttransid = $con->query($sqltransid);
             while($row = $resulttransid->fetch_assoc()) {
                echo "<tr>";
            
        
            $tempo = $row['transid'];
            $temporaryid = $tempo ;
               
  }

$currentdate = date("Y-m-d");

$tommorowdate = new DateTime('tomorrow');
$sql2 = "SELECT * FROM service_category ORDER by service_id ASC";
$result2 = mysqli_query($con, $sql2) or die ("Bad SQL: $sql2");
$sqltransaction= "SELECT * FROM transaction_table WHERE car_id_labor ='$tempid'";
$sup = "<select class='form-control' id='product_encoder[]' id='SelectA'  name='product_category[]' onchange='my_fun(this.value);'>
        <option disabled selected>Select Services</option>";
  while ($row = mysqli_fetch_assoc($result2)) {
    $sup .= "<option value='".$row['service_name']."'>".$row['service_name']."</option>";
  }

$sup .= "</select>";
$sqlcardata = "SELECT * FROM cardata where id=$tempid";
$resultcardata = $con->query($sqlcardata);
 if ($resultcardata->num_rows > 0) {
 
             while($row = $resultcardata->fetch_assoc()) {
                echo "<tr>";
              
                $tempcarid = $row['plateid'];   

  }
//echo $tempcarid;


} else {
  echo "0 results";
}
$sqltransid  = "SELECT transid FROM transacttable ORDER BY transid DESC LIMIT 1";

$resulttransid = $con->query($sqltransid);
             while($row = $resulttransid->fetch_assoc()) {
                echo "<tr>";
            
        
            $tempo = $row['transid'];
            $temporaryid = $tempo ;
               
  }
  $temponumber = "2";
  $sqluserinfos  = "SELECT * FROM users WHERE id = '$pendinguserID';";
$sqlresultinfos = $con->query($sqluserinfos);
             while($row = $sqlresultinfos->fetch_assoc()) {
            $tempname = $row['firstname'];
            $templname = $row['lastname'];}



?>

<link rel="stylesheet" href="../../assets/toastr/toastr.min.css">
    <link rel="stylesheet" type="text/css" href="../../assets/datatables/datatables.min.css" />



    <script src="includes/assets/js/jquery.min.js"></script>
    <script src="includes/assets/js/chart.min.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-moment@^1"></script> -->
    <script src="includes/js/bootstrap.bundle.min.js"></script>
    <script src="includes/assets/js/moment.min.js"></script>
    <script src="includes/assets/toastr/toastr.min.js"></script>
    <script type="text/javascript" src="includes/assets/datatables/datatables.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/jquery.caret/0.1/jquery.caret.js"></script>
  <script src="https://www.solodev.com/_/assets/phone/jquery.mobilePhoneNumber.js"></script>




<!doctype html>

<html lang="en-US">

<head>

  <meta charset="UTF-8">

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
  <meta name="description" content="PHP CRUD with search and pagination in bootstrap 4">
  <meta name="keywords" content="PHP CRUD, CRUD with search and pagination, bootstrap 4, PHP">
  <meta name="robots" content="index,follow">



    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">



</head>



<body>

            
            
            
            <div class="card-header py-3">
            <h4>JOB ORDER</h4>
           <?php echo "Current Car ID : ", $tempid;?>
           <br>
           <?php echo "Current User ID : ", $tempcarid;?>
            <br>
           <?php echo "Current Transaction ID : ", $temporaryid;?>
          </div>
          <br>
          <div class="card-header py-3">
            <h4>Information</h4>
            <div class="row">
              <div class="col-md-2 mb-3">
            <label style="font-weight: bold;">Transaction ID</label>
            <select class="form-control" >
                  <option disabled selected><?php echo $tempids?></option>
                  </select>
              

          </div>
          <div class="col-md-4 mb-3">
            <label style="font-weight: bold;">Customer's Name</label>
            <select class="form-control" >
                  <option disabled selected><?php echo $tempname," ",$templname?></option>
                  </select>
              

          </div>
          <div class="col-md-4 mb-3">
            <label style="font-weight: bold;">Vehicle</label>
                   <select class="form-control" >
                  <option disabled selected><?php echo $tempcarname,"  - ",$tempcarmodel?></option>
                  </select>
                

          </div>
          <div class="col-md-2 mb-3">
                  <label style="font-weight: bold;">Status</label>
                   <select class="form-control" >
                  <option disabled selected>Approved</option>
                  </select>
                  </div>
        </div>
         
          </div>
          <hr>
          
            <div class="card-body">
              <div class="card-header py-3">
            <h4>Labors & Services</h4>
          
         
          </div>
          <br>
              <?php 
                 $sqltransaction1= "SELECT * FROM transaction_table WHERE transaction_id ='$temporaryid'";
           $result100 = $con->query($sqltransaction1);
              while($row = $result100->fetch_assoc()) {
                  

  

                   echo ' 
                <div class="row">

                  <div class="col-md-4 mb-3">
                  <label style="font-weight: bold;">Labor Type</label>
                   <select class="form-control" >
                  <option disabled selected>'.$row['transact_category'].'</option>
                 

                  </select>

                  </div>

                  <div  class="col-md-4 mb-3">
                     <label style="font-weight: bold;">Labor</label>
                    <select class="form-control">
                 <option disabled selected>'.$row['name'].'</option>
                  </select>
         
                
                  </div>
              
                 
                     <div class="col-md-1 mb-3">
                     <label style="font-weight: bold;">Rate</label>
                    <input type = "number" readonly value = '.$row['rate'].' class="form-control" placeholder="Rate" required>
                  </div>
                  
                   <div class="col-md-1 mb-3">
                   <label style="font-weight: bold;">Hour</label>
                    <input type = "number" readonly value = '.$row['hour'].' class="form-control" placeholder="Hour" required>
                  </div>                  
                  <div class="col-md-2 mb-3">
                  <label style="font-weight: bold;">Price</label>
                    <input type = "number" readonly value = '.$row['price'].'  class="form-control" placeholder="Price" required>
                  </div>


                  <div hidden class="col-md-3 mb-3">
                  
                    <input type = "number" name="product_qty[]" value = "<?php echo $tempid ?>"class="form-control" placeholder=" Item Quantity" required>
                  </div>
                   
                 
                </div>
                ';
                   }

                   ?>


              
            </div>


            
            <!-- PARTS AND MATERIALS -->
            <div class="card-body">
              <div class="card-header py-3">
            <h4>Parts & Materials</h4>
          
         
          </div>
          <br>
              <?php 
                 $sqltransaction1= "SELECT * FROM parts_table WHERE item_transaction_id ='$temporaryid'";
           $result100 = $con->query($sqltransaction1);
              while($row = $result100->fetch_assoc()) {
                   echo ' <hr >
                <div class="row">

                  <div class="col-md-5 mb-3">
                  <label style="font-weight: bold;">Item Type</label>
                   <select class="form-control" >
                  <option disabled selected>'.$row['item_category'].'</option>
                 

                  </select>

                  </div>

                  <div  class="col-md-3 mb-4">
                     <label style="font-weight: bold;">Parts & Materials</label>
                    <select class="form-control">
                 <option disabled selected>'.$row['item_name'].'</option>
                  </select>
         
                
                  </div>
                  
                 
                     <div class="col-md-2 mb-3">
                     <label style="font-weight: bold;">Price</label>
                    <input type = "number" readonly value = '.$row['item_price'].' class="form-control" placeholder="Rate" required>
                  </div>
                  
                   <div class="col-md-2 mb-3">
                   <label style="font-weight: bold;">Amount</label>
                    <input type = "number" readonly value = '.$row['item_amount'].' class="form-control" placeholder="Hour" required>
                  </div>                  
                  


              
                 
                </div>';

  
                   }

                   ?>

            
              
            </div>
            <form action ="#" method="POST" id ="add_form">
              <div id="show_item">
                 <hr >
                 
                <div class="row">

                  <div class="col-md-2 mb-3">
                  <label hidden style="font-weight: bold;">Labor Type</label>
                  </div>
                  <div class="col-md-4 mb-3">
                     <label hidden style="font-weight: bold;">Labor</label>
                  </div>
                  <div hidden class="col-md-1 mb-3">
                  </div>
                  <div class="col-md-1 mb-3">
                    <?php 
                     $sql21 = "SELECT SUM(price) FROM transaction_table WHERE transaction_id = $tempids";
                    $result21 = mysqli_query($con, $sql21) or die(mysqli_error($db));

                  while ($row = mysqli_fetch_array($result21)) {


                    $sumlabor = $row['SUM(price)'];
                      }
                    ?>
                      <?php 
                     $sqlparts = "SELECT SUM(item_price) FROM parts_table WHERE item_transaction_id = $tempids";
                    $resultparts = mysqli_query($con, $sqlparts) or die(mysqli_error($db));

                  while ($row = mysqli_fetch_array($resultparts)) {


                    $sumparts = $row['SUM(item_price)'];
                      }
                      $totalsum = $sumparts + $sumlabor;
                    ?>
                  </div>                 
                  
                  <div class="col-md-5 mb-3">
                    

                   <h3 class="font-weight-bold float-right ">

                       Labor  = ₱ <?php echo number_format($sumlabor, 2); ?>
                       
                      </h3>
                      <h3 class="font-weight-bold float-right ">

                       Parts  = ₱ <?php echo number_format($sumparts, 2); ?>
                       
                      </h3>
                         <h3 class="font-weight-bold float-right  ">

                       Total  = ₱ <?php echo number_format($totalsum, 2); ?>
                      
                      </h3>

                  </div>


              


                 
                 
                
                 
                </div>

              </div>
              <hr >
              
              <div>
                
               
              </div>
            </form>
            <!--<form method="post" action="action.php">
                <button type="finalsubmit" name="finalsubmit" value="finalsubmit" id="finalsubmit" class="btn btn-warning"><i class="fa fa-fw fa-plus-circle"></i> Add Transaction</button>
            </form> -->

           


 <td class="font-weight-bold">    <a type="button"  ; data-toggle="modal" data-target="#modal1" class="btn btn-primary bg-gradient-primary btn-block" href="transact-bill2.php"><i class="fas fa-fw fa-list-alt"></i> Details</a> </td>
<br>

    <div class="container">
  
            
              <div class="modal hide fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                
      <div class="modal-dialog">
        <div class="modal-content">
          

         

          
   <center><div class="card shadow mb-4 col-xs-12 col-md-12 border-bottom-primary">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Transaction Details</h4>
            </div>
            <div class="card-body">
           <?php
                  $resultcountsql = "SELECT count(*) as total FROM transaction_table WHERE transaction_id = '$temporaryid'";
                  $resultsq= mysqli_query($con,$resultcountsql);
                  $data = mysqli_fetch_assoc($resultsq);
                  //echo $data['total'];
                  $numofservice = $data['total'];
                  $resultcountsql1 = "SELECT count(*) as total1 FROM parts_table WHERE item_transaction_id = '$temporaryid'";
                  $resultsq1= mysqli_query($con,$resultcountsql1);
                  $data1 = mysqli_fetch_assoc($resultsq1);
                  //echo $data['total'];
                  $numofservice1 = $data1['total1'];
                   ?>
            <form  method="post" action="../client/process/process.php">
             <div class="form-group row text-left mb-2">

                    <div class="col-sm-12 text-center">
                      <h3 class="py-0">
                        GRAND TOTAL
                      </h3>
                      <h3 class="font-weight-bold py-3 bg-light">
                        ₱ <?php echo number_format($totalsum, 2); ?>
                      </h3>
                    </div>

                  </div> <input hidden type="text" name="transid" value="<?php echo $tempids; ?>" />

                    <input hidden type="text" class="form-control text-right" name="transact1" value="<?php echo $totalsum; ?>"   >
                    
                  <div class="col-sm-12 mb-2">
                      <div class="input-group mb-2">
                        <div class="input-group-prepend">
                          <span class="input-group-text">₱</span>
                        </div>
                          <input type="number" class="form-control text-right" name="cashtotal" min="<?php echo $totalsum;?>"  placeholder="ENTER CASH"  >
                    </div>
                  </div>
                 
                  <div class="col-sm-12 mb-2">
                      <div hidden class="input-group mb-2">
                        
                          <input type="text" class="form-control text-right" name="status" value="Completed"  placeholder="Status"  >
                    </div>
                  </div>

                   <div hidden class="col-sm-12 mb-2">
                      <div class="input-group mb-2">
                        
                          <input type="text" class="form-control text-right" name="numofitem" value="<?php echo $numofservice;?>"  >
                    </div>
                  </div>
                    <!-- 
                  <div   class="col-sm-12 mb-2">
                      <div class="input-group mb-2">
                        
                          <input type="text" class="form-control text-right" name="numofmaterials" value="<?php echo $numofservice1;?>"   >
                    </div>
                  </div>
                 
              -->
              
             
              

                <button type="submit" name="submitfinal" value="submit" id="submitfinal" class="btn btn-warning btn-block"><i class="fa fa-edit fa-fw"></i>Confirm</button> 
              </form>  
          </div>
  </div>


          </div>
        
        
      </div>
    </div>
 


    
    

  
  </div>
       
          
       
         
            
          


        
              


         

  


</body>

  



</html>