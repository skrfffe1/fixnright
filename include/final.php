
<?php
 include 'process/session.php';
 ?>
<?php
$tempid = $_GET['editId'];
$sql1 = "SELECT * FROM bookingdates";
$result1 = mysqli_query($con,$sql1);
$dates_ar = [""];
if(mysqli_num_rows($result1)>0){
     while($rows = mysqli_fetch_array($result1)){
        $tempdate = $rows["book_dates"];
        $resultcountsql = "SELECT count(*) as total FROM bookingdates WHERE book_dates = '$tempdate'";
        $resultsq= mysqli_query($con,$resultcountsql);
        $data = mysqli_fetch_assoc($resultsq);
        
     
        $totalcount = $data['total'];
        if($totalcount >5){
          $dates_ar[] = $tempdate;
        }
      }


    }
    
echo $dates_ar[2];

$sqlerr = "SELECT * FROM employee ";
$resulterr = mysqli_query($con, $sqlerr) or die ("Bad SQL: $sql2");
if($resulterr->num_rows>0){
  $options = mysqli_fetch_all($resulterr,MYSQLI_ASSOC);
}
$sqltransid  = "SELECT transid FROM transacttable ORDER BY transid DESC LIMIT 1";
$resulttransid = $con->query($sqltransid);
             while($row = $resulttransid->fetch_assoc()) {
            $temponumber = "1";
            $tempo = $row['transid'];
            $temporaryid = $tempo +1;
               
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
            $temporaryid = $tempo +1;
               
  }

?>


<!doctype html>

<html lang="en-US">

<head>

  <meta charset="UTF-8">

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
  <meta name="description" content="PHP CRUD with search and pagination in bootstrap 4">
  <meta name="keywords" content="PHP CRUD, CRUD with search and pagination, bootstrap 4, PHP">
  <meta name="robots" content="index,follow">
  <link href="/dist/output.css" rel="stylesheet">
  </head>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>

<body>

            
            
            
          <?php
              // CURREN TRANSACTION ID
$sqltransid  = "SELECT transid FROM transacttable ORDER BY transid DESC LIMIT 1";

$resulttransid = $con->query($sqltransid);
             while($row = $resulttransid->fetch_assoc()) {
                echo "<tr>";
            
        
            $tempo = $row['transid'];
            $temporaryid = $tempo +1;
               
  }
  
             ?>
            
            <div class="card-header py-3">
            <h4>JOB ORDER</h4>
           <?php echo "Current Car ID : ", $tempid;?>
           <br>
           <?php echo "Current User ID : ", $tempcarid;?>
            <br>
           <?php echo "Current Transaction ID : ", $temporaryid;?>
          </div>
            <?php

             ?>
            <div class="card-body">
              <?php
              $sqltransaction= "SELECT * FROM booking_table WHERE transaction_id ='$temporaryid'";
           $result = $con->query($sqltransaction);
              while($row = $result->fetch_assoc()) {
                 



  

             //  echo '<div class="small text-gray-500">'.$row['transact_sched'].'</div>';
                   echo ' <hr >
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
                                  
                </div>';
                   }
               ?>
               <div id ="show_alert"></div>
            <form action ="#" method="POST" id ="add_form">
              <div id="show_item">
                 <hr >
                <div class="row">

                  <div class="col-md-4 mb-3 ">
                  <label style="font-weight: bold;">Labor Type</label>
                   <?php echo $sup; ?>

                  </div>

                  <div id="poll" class="col-md-4 mb-3">
                     <label style="font-weight: bold;">Labor</label>
                    <select class='form-control'>
                 <option>Services</option>
                  </select>
         
                
                  </div>
                  
                 
                     <div hidden class="col-md-1 mb-3">
                      <label style="font-weight: bold;">Rate</label>
                    <input type = "number" value="2" name="product_rate[]" class="form-control" placeholder="Rate" required>
                  </div>
                  <div hidden class="col-md-1 mb-3">
                    <label style="font-weight: bold;">Hour</label>
                    <input type = "number" value="2"  name="product_hour[]" class="form-control" placeholder="Hour" required>
                  </div>
                   <div hidden class="col-md-1 mb-3">
                    <label style="font-weight: bold;">ID NUMBER</label>
                    <input type = "number" name="producttemp[]" value = "<?php echo $temponumber;?>"class="form-control" placeholder="TEMP" required>
                  </div>                  
                  <div hidden class="col-md-2 mb-3">
                    <label style="font-weight: bold;">Price</label>
                    <input type = "number" value="2"  name="product_price[]" class="form-control" placeholder="Price" required>
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

            <!--<form method="post" action="action.php">
                <button type="finalsubmit" name="finalsubmit" value="finalsubmit" id="finalsubmit" class="btn btn-warning"><i class="fa fa-fw fa-plus-circle"></i> Add Transaction</button>
            </form> -->

            <div class="container">
  
            
              <div class="modal hide fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                
      <div class="modal-dialog">
        <div class="modal-content">
          

         

          
   <center><div class="card shadow mb-4 col-xs-12 col-md-12 border-bottom-primary">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Transaction Details</h4>
            </div>
            <div class="card-body">
         
            <form  method="post" action="process/process.php">
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
                    <input  type="input" id="magic" min="<?php echo $currentdate;?>" class="form-control" name="transact_sched" id="transact_sched" >
                   
                 <!-- <input type="date" min = "<?php echo $currentdate; ?>"class="form-control" name="transact_sched" id="transact_sched"   required> -->
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

                <button type="submit" name="bookingrequestinsert" value="submit" id="submit" class="btn btn-warning btn-block"><i class="fa fa-edit fa-fw"></i>Confirm</button> 
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
          url: 'process/action.php',
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
    xmlhttp.open("GET","process/helper.php?value="+str, true);
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
    xmlhttp.open("GET","process/helper2.php?value="+str, true);
    xmlhttp.send();
  }
</script>
</html>



<?php
include 'footer.php'; ?>