
<?php
 include 'process/session.php';
  
?>


 
<?php

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
$sql3 = "SELECT * FROM category ORDER by c_id ASC";
$result3 = mysqli_query($con, $sql3) or die ("Bad SQL: $sql3");

$sup3 = "<select class='form-control' id='itemcategory[]' id='SelectA'  name='itemcategory[]' onchange='my_fun2(this.value);'>
        <option disabled selected>Select Item Type</option>";
  while ($row = mysqli_fetch_assoc($result3)) {
    $sup3 .= "<option value='".$row['c_name']."'>".$row['c_name']."</option>";
  }

$sup3 .= "</select>";
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





    <script src="includes/assets/js/jquery.min.js"></script>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
 



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
            <h4>JOB ORDER<a href="joborder2.php?editId=<?php echo  $tempids;?>"><button class="float-right btn btn-primary">Update</button></a>
            </h4>
           
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
                  <option disabled selected>Completed</option>
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
                 $sqltransaction1= "SELECT * FROM transaction_table WHERE transaction_id ='$tempids'";
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
                 $sqltransaction1= "SELECT * FROM parts_table WHERE item_transaction_id ='$tempids'";
           $result100 = $con->query($sqltransaction1);
              while($row = $result100->fetch_assoc()) {
                   echo ' <hr >
                <div class="row">

                  <div class="col-md-3 mb-3">
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
                  <div class="col-md-2 mb-3">
                   <label style="font-weight: bold;">Total</label>
                    <select class="form-control">
                 <option disabled selected>'.$row['item_total'].'</option>
                  </select>
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
                     $sql21 = "SELECT SUM(price) FROM transaction_table WHERE transaction_id = '$tempids'";
                    $result21 = mysqli_query($con, $sql21) or die(mysqli_error($db));

                  while ($row = mysqli_fetch_array($result21)) {


                    $sumlabor = $row['SUM(price)'];
                      }
                    ?>
                      <?php 
                     $sqlparts = "SELECT SUM(item_total) FROM parts_table WHERE item_transaction_id = '$tempids'";
                    $resultparts = mysqli_query($con, $sqlparts) or die(mysqli_error($db));

                  while ($row = mysqli_fetch_array($resultparts)) {


                    $sumparts = $row['SUM(item_total)'];
                      }
                      $totalsum = $sumparts + $sumlabor;

                    ?>
                    <?php 
                     $sql211 = "SELECT * FROM transacttable WHERE transid = $tempids";
                    $result211 = mysqli_query($con, $sql211) or die(mysqli_error($db));

                  while ($row = mysqli_fetch_array($result211)) {


                    $payment = $row['cashtotal'];
                      }
                         $totalcharge = $payment - $totalsum;
                    ?>

                  </div>                 
                  
                  <div class="col-md-5 mb-3">
                    

                   <h3 class="font-weight-bold float-right ">

                       Labor  = ₱ <?php echo number_format($sumlabor, 2); ?> ==
                       
                      </h3>
                      <h3 class="font-weight-bold float-right ">

                       Parts  = ₱ <?php echo number_format($sumparts, 2);  ?>  ==
                       
                      </h3>

                         <h3 class="font-weight-bold float-right  ">

                       Total  = ₱ <?php echo number_format($totalsum, 2); ?> == 
                      
                      </h3>
                        <h3 class="font-weight-bold float-right  ">

                       Payment  = ₱ <?php echo number_format($payment, 2); ?> ==
                      
                      </h3>
                        <h3 class="font-weight-bold float-right  ">

                       Change  = ₱ <?php echo number_format($totalcharge, 2); ?> ==
                      
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

           


 <td class="font-weight-bold">    <a type="button"  href="../reciept/print-details.php?id=<?php echo $tempids;?>"  class="btn btn-primary bg-gradient-primary btn-block" href="#"><i class="fas fa-fw fa-list-alt"></i> Details</a> </td>
<br>

    
       
          
       
         
            
          


        
              


         

  

  
</body>
</html>
<?php
include 'footer.php'; ?>