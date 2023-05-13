
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
  include '../../include/client/homeside.php';
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

  $sqluserinfos  = "SELECT * FROM users WHERE id = '$pendinguserID';";
$sqlresultinfos = $con->query($sqluserinfos);
             while($row = $sqlresultinfos->fetch_assoc()) {
            $tempname = $row['firstname'];
            $templname = $row['lastname'];}

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
            $temporaryid = $tempo;
               
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
            $temporaryid = $tempo;
               
  }
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
                  <option disabled selected><?php echo $tempid?></option>
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
                  <option disabled selected >Approved</option>
                  </select>
                  </div>
        </div>
         
          </div>
            <div class="card-body">
               <div id ="show_alert"></div>
            <form action ="#" method="POST" id ="add_form">
              <div id="show_item">
                 <hr >
                 <?php 
                 $result = $con->query($sqltransaction);
              while($row = $result->fetch_assoc()) {
                   $servicename = $row['name'];
                   $serviceprice = $row['price'];
                   $servicehour = $row['hour'];
                   $servicerate = $row['rate'];
                   $serviceencoder = $row['encoder'];
                   $servicetransid = $row['transaction_id'];
                   // COUNT OF SERVICES
$resultcountsql = "SELECT count(*) as total FROM transaction_table WHERE transaction_id = '$temporaryid'";
$resultsq= mysqli_query($con,$resultcountsql);
$data = mysqli_fetch_assoc($resultsq);
//echo $data['total'];
$numofservice = $data['total'];



  

             //  echo '<div class="small text-gray-500">'.$row['transact_sched'].'</div>';
                   echo ' <hr >
                <div class="row">

                  <div class="col-md-4 mb-3">
                  <label style="font-weight: bold;">Labor Type</label>
                   <select class="form-control" >
                  <option disabled selected>'.$row['transact_category'].'</option>
                 

                  </select>

                  </div>

                  <div  class="col-md-5 mb-3">
                     <label style="font-weight: bold;">Labor</label>
                    <select class="form-control">
                 <option disabled selected>'.$row['name'].'</option>
                  </select>
         
                
                  </div>
                  <div class="col-md-3 mb-3">
                 <label style="font-weight: bold;">Mechanic</label>
                       <select name="product_encoder[]" class="form-control">
                         <option>Not Yet Set</option>
                         
                       </select> 
                 

                  </select>
                  </div>
                 
                     <div class="col-md-2 mb-3">
                     <label style="font-weight: bold;">Rate</label>
                    <input type = "number" readonly value = '.$row['rate'].' class="form-control" placeholder="Rate" required>
                  </div>
                  
                   <div class="col-md-2 mb-3">
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
                  <div  class="float-right">
                   
                  </div>
                 
                </div>';
                   }
 
                 ?>
                <div class="row">

                  <div class="col-md-4 mb-3">
                  <label style="font-weight: bold;">Labor Type</label>
                   <?php echo $sup; ?>

                  </div>

                  <div id="poll" class="col-md-5 mb-3">
                     <label style="font-weight: bold;">Labor</label>
                    <select class='form-control'>
                 <option>Services</option>
                  </select>
         
                
                  </div>
                  <div class="col-md-3 mb-3">
                    <!-- <label style="font-weight: bold;">Mechanic</label>
                       <select name='product_encoder[]' class='form-control'>
                         <option>Select Employee</option>
                         <?php foreach ($options as $options){ ?> 
                          <option><?php echo $options['employee_fname']; ?></option>
                          <?php }?>
                       </select> -->
                  </div>
                 
                     <div class="col-md-2 mb-3">
                      <label style="font-weight: bold;">Rate</label>
                    <input type = "number" name="product_rate[]" class="form-control" placeholder="Rate" required>
                  </div>
                  
                   <div class="col-md-2 mb-3">
                    <label style="font-weight: bold;">Hour</label>
                    <input type = "number" name="product_hour[]" class="form-control" placeholder="Hour" required>
                  </div>                  
                  <div class="col-md-2 mb-3">
                    <label style="font-weight: bold;">Price</label>
                    <input type = "number" name="product_price[]" class="form-control" placeholder="Price" required>
                  </div>


                  <div  class="col-md-3 mb-3">
                    <input type = "number" hidden name="product_transact[]" value = "<?php echo $temporaryid ?>"class="form-control" placeholder=" Transaction Number" required>
                  </div>
                  <div hidden class="col-md-3 mb-3">
                    <input type = "number" name="product_qty[]" value = "<?php echo $tempid ?>"class="form-control" placeholder=" Item Quantity" required>
                  </div>
                  <div  hidden class="col-md-3 mb-3">
                    <input type = "number" name="product_user[]" value = "<?php echo $tempcarid ?>"class="form-control" placeholder=" User ID" required>
                  </div>
                 
                </div>
              </div>
              <hr >
              <div>
                 <div class="float-right">
                   
                  </div>
                <input type="submit" name="" value="Add" class="btn btn-primary w-25 float-right" id="add_btn">
              </div>
              <div>
                
               
              </div>
            </form>
              
            </div>

            

            <div class="container">
  
            
              <div class="modal hide fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                
      <div class="modal-dialog">
        <div class="modal-content">
          

         

          
   <center><div class="card shadow mb-4 col-xs-12 col-md-12 border-bottom-primary">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Transaction Details</h4>
            </div>
            <div class="card-body">
         
            <form  method="post" action="action2.php">
              <div class="form-group row text-left font-weight-bold">
                <div hidden class="col-sm-3" style="padding-top: 5px;">
                Current User ID
                  <input type="text" class="form-control" name="custid" id="custid"  value="<?php echo $tempcarid;?>"    required>
                </div>
                
              </div>
              <div hidden class="form-group row text-left font-weight-bold">
                <div class="col-sm-3" style="padding-top: 5px;">
                Current Car ID
                </div>
                <div class="col-sm-9">
                  
                   
                  <input type="text" class="form-control" name="carid" id="carid"  value="<?php echo $tempid;?>"  required>
                </div>
              </div>
              <div hidden class="form-group row text-left font-weight-bold">
                <div class="col-sm-3" style="padding-top: 5px;">
                Current Status
                </div>
                <div class="col-sm-9">
                  <select class="form-control" name="status" id="status" value="" >
                  <option value="Pending">Pending</option>
                  </select>
                </div>
              </div>


              <div class="form-group row text-left font-weight-bold">
                <div class="col-sm-3" style="padding-top: 5px;">
                Scheduled Date
                </div>
                <div class="col-sm-9">
                  
                   
                  <input type="date" min = "<?php echo $currentdate; ?>"class="form-control" name="transact_sched" id="transact_sched"   required>
                </div>
              </div>
             <div class="form-group row text-left font-weight-bold">
                <div class="col-sm-3" style="padding-top: 5px;">
                Payment Type
                </div>
                <div class="col-sm-9">
                  
                   <select class="form-control" name="payment_type" id="payment_type" >
        <option value=""></option>
        <option value="Over the Counter">Over the Counter</option>
        <option value="Gcash">Gcash</option>
        <option value="Credit Card">Credit</option>
      </select>

                </div>
              </div>
              
              <div class="form-group row text-left font-weight-bold">
                <div class="col-sm-3" style="padding-top: 5px;">
                Schedule Details
                </div>
                <div class="col-sm-9">
                  
                   
                  <input type="text" class="form-control" name="transact_schedinfo" id="transact_schedinfo"  value=""  required>
                </div>
              </div>
              <hr>

                <button type="submit" name="submit" value="submit" id="submit" class="btn btn-warning btn-block"><i class="fa fa-edit fa-fw"></i>Confirm</button> 
              </form>  
          </div>
  </div>


          </div>
        
        
      </div>
    </div>
 


    
    

  
  </div>
       


 <td class="font-weight-bold">Proceed :   <a type="button"  ; data-toggle="modal" data-target="#modal1" class="btn btn-primary bg-gradient-primary" href="transact-bill2.php"><i class="fas fa-fw fa-list-alt"></i> Details</a> </td>
<br>

   
          
       
         
            
          

              


        
              


         

  


</body>
  <script>
    
    $(document).ready(function(){
    
     
      $(document).on('click','.remove_item_btn', function(e){
        e.preventDefault();
        let row_item = $(this).parent().parent();
        $(row_item).remove();
      });
      $("#add_form").submit(function(e){
        e.preventDefault();
        $("#add_btn").val('Adding...');
        $.ajax({
          url: 'action3.php',
          method: 'post',
          data: $(this).serialize(),
          success: function(response){
            $("#add_btn").val('Add');
            $("#add_form")[0].reset();
            $(".append.item").remove();
            $("#show_alert").html(`<div class="alert alert-success" role="alert">${response} </div>`);

          }
        });
      });
    });
  </script>



</html>