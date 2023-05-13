
<?php
 include 'process/session.php';
  
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
        document.getElementById('poll3').innerHTML = this.responseText;

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

  $sqltemp = "SELECT * FROM transacttable WHERE transid ='$temporaryid'";
  $resulttemp = $con->query($sqltemp);
             while($row = $resulttemp->fetch_assoc()) {
            $temporayssched = $row['transact_sched'];
          
               
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



<body onload="multiply();">

            
            
            
            <div class="card-header py-3">
            <h4>JOB ORDER</h4>
         
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
            <h4>Requested Services</h4>
          
         
          </div>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> 
                  <thead>
                        <tr>
                          <th>Category</th>
                          <th>Services</th>
                         
                       
                        </tr>
                     </thead>
                    <tbody>
                    
                            <?php                  
                        $query = "SELECT * FROM booking_table WHERE transaction_id = $tempids;";
                        $result = mysqli_query($con, $query) or die (mysqli_error($db));
                        while ($row = mysqli_fetch_assoc($result)) {
                        echo '<tr>';
                        echo '<td>'. $row['transact_category'].'</td>';
                        echo '<td>'. $row['name'].'</td>';
                      
                      


                   
                        echo '</tr> ';
                        }
                    ?> 
                               
                    </tbody>
                </table>
              </div>
            
              
            </div>
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

                  <div  class="col-md-3 mb-3">
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
                   <div class="col-md-1 mb-3">
                   <label style="font-weight: bold;">Action</label>
                       <a type="button" class="btn btn-danger bg-gradient-btn-danger " style="border-radius: 0px;" href="deleteservice.php?delId='.$row['id']. '">
                                    <i class="fas fa-fw fa-trash"></i> 
                                  </a>
                  </div> 
                 
                </div>
                ';
                   }

                   ?>

               <div id ="show_alert"></div>
            <form action ="#" method="POST" id ="add_form">
              <div id="show_item">
                 <hr >
                 
                <div class="row">

                  <div class="col-md-4 mb-3">
                  <label style="font-weight: bold;">Labor Type</label>
                   <?php echo $sup; ?>

                  </div>

                  <div id="poll3" class="col-md-4 mb-3">
                     <label style="font-weight: bold;">Labor</label>
                    <select class='form-control'>
                 <option>Services</option>
                  </select>
                  </div>
                  <div class="col-md-3 mb-3">
                  <label style="font-weight: bold;">Mechanic</label>
                   <select name='product_encoder[]' class='form-control'>
                       <option>Select Employee</option>
                          <?php foreach ($options as $options){ ?> 
                       <option><?php echo $options['employee_fname']; ?></option>
                        <?php }?>
                      </select>

                  </div>
                 
                     <div class="col-md-2 mb-3">
                      <label style="font-weight: bold;">Rate</label>
                    <input type = "number" name="product_rate[]" class="form-control"  required>
                  </div>
                  
                   <div class="col-md-2 mb-3">
                    <label style="font-weight: bold;">Hour</label>
                    <input type = "number" name="product_hour[]" class="form-control"  required>
                  </div>                 
                  <div hidden class="col-md-1 mb-3">
                    <label style="font-weight: bold;">ID NUMBER</label>
                    <input type = "number" name="producttemp[]" value = "<?php echo $temponumber;?>"class="form-control" placeholder="TEMP" required>
                  </div> 
                  <div class="col-md-2 mb-3">
                    <label style="font-weight: bold;">Price</label>
                    <input type = "number" name="product_price[]" class="form-control"  required>
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
                  <div  hidden class="col-md-3 mb-3">
                    <input type = "date" name="product_date[]" value = "<?php echo $temporayssched ?>"class="form-control" placeholder=" User ID" required>
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


            <br>
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

                  <div class="col-md-3 mb-3">
                  <label style="font-weight: bold;">Item Type</label>
                   <select class="form-control" >
                  <option disabled selected>'.$row['item_category'].'</option>
                 

                  </select>

                  </div>

                  <div  class="col-md-3 mb-3">
                     <label style="font-weight: bold;">Parts & Materials</label>
                    <select class="form-control">
                 <option disabled selected>'.$row['item_name'].'</option>
                  </select>
         
                
                  </div>
                  
                 
                     <div class="col-md-2 mb-3">
                     <label style="font-weight: bold;">Price</label>
                    <input type = "number" readonly value = '.$row['item_price'].' class="form-control" placeholder="Rate" required>
                  </div>
                  
                   <div class="col-md-1 mb-3">
                   <label style="font-weight: bold;">Amount</label>
                    <input type = "number" readonly value = '.$row['item_amount'].' class="form-control" placeholder="Hour" required>
                  </div>                  
                  <div class="col-md-2 mb-3">
                   <label style="font-weight: bold;">Total</label>
                    <input type = "number" readonly value = '.$row['item_total'].' class="form-control" placeholder="Hour" required>
                  </div>  


                  
                  <div class="col-md-1 mb-3">
                   <label style="font-weight: bold;">Action</label>
                       <a type="button" class="btn btn-danger bg-gradient-btn-danger " style="border-radius: 0px;" href="deleteparts.php?deleteId='.$row['item_id']. '">
                                    <i class="fas fa-fw fa-trash"></i> 
                                  </a>
                  </div>
                 
                </div>';

  
                   }

                   ?>

               <div id ="show_alert1"></div>
            <form action ="#" method="POST" id ="add_form1">
              <div id="show_item1">
                 <hr >
                 
                <div class="row">

                  <div class="col-md-3 mb-3">
                  <label style="font-weight: bold;">Item Type</label>
                   <?php echo $sup3; ?>

                  </div>

                  <div id="poll2" class="col-md-3 mb-3">
                     <label style="font-weight: bold;">Materials</label>
                    <select class='form-control'>
                 <option>Materials</option>
                  </select>
         
                
                  </div>
                                    
                   <div class="col-md-2 mb-3">
                    <label style="font-weight: bold;">Price</label>
                    <input type = "number" name="itemprice[]" id="one" value="0" class="form-control"  required onclick="multiply();">
                  </div>                 
                  
                  <div class="col-md-2 mb-3">
                    <label style="font-weight: bold;">Amount</label>
                    <input type = "number" name="itemamount[]" value="0" id="two" class="form-control"  required onclick="multiply();">
                  </div>
                  <div class="col-md-2 mb-3">
                    <label style="font-weight: bold;">Total</label>
                    <input type = "number" name="itemtotal[]" id="total" value="0" class="form-control"  required>
                  </div>
                


                  <div hidden class="col-md-3 mb-3">
                    <input type = "number"  name="itemtransactionid[]" value = "<?php echo $temporaryid ?>"class="form-control" placeholder=" Transaction Number" required>
                  </div>
                  <div  hidden class="col-md-3 mb-3">
                    <input type = "number" name="itemcarid[]" value = "<?php echo $tempid ?>"class="form-control" placeholder=" Item Quantity" required>
                  </div>
                  <div  hidden class="col-md-3 mb-3">
                    <input type = "number" name="itemuserid[]" value = "<?php echo $tempcarid ?>"class="form-control" placeholder=" User ID" required>
                  </div>
                  <div hidden class="col-md-3 mb-3">
                    <input type = "date" name="items[]" value = "<?php echo $temporayssched ?>"class="form-control" placeholder=" User ID" required>
                  </div>
                 
                </div>
              </div>
              <hr >
              <div>
                 <div class="float-right">
                   
                  </div>
                <input type="submit" name="" value="Add" class="btn btn-primary w-25 float-right" id="add_btn1">
              </div>
              <div>
                
               
              </div>
            </form>
              
            </div>
            <!--<form method="post" action="action.php">
                <button type="finalsubmit" name="finalsubmit" value="finalsubmit" id="finalsubmit" class="btn btn-warning"><i class="fa fa-fw fa-plus-circle"></i> Add Transaction</button>
            </form> -->



<br><br>
 <td class="font-weight-bold">   <a type="button"   class="btn btn-primary bg-gradient-primary btn-block" href="joborder3.php?editId=<?php echo $tempids;?>"><i class="fas fa-bell  "></i> Proceed</a> </td>
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
          url: 'process/action3.php',
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
    
    $(document).ready(function(){
    
     
     
      $("#add_form1").submit(function(e){
        e.preventDefault();
        $("#add_btn1").val('Adding...');
        $.ajax({
          url: 'process/action4.php',
          method: 'post',
          data: $(this).serialize(),
          success: function(response){
            $("#add_btn1").val('Add1');
            $("#add_form1")[0].reset();
            $(".append.item1").remove();
            $("#show_alert1").html(`<div class="alert alert-success" role="alert">${response} </div>`);

          }
        });
      });
    });
  </script>
<script >
  function multiply() {
   var one = document.getElementById("one").value;
   var two = document.getElementById("two").value;
   var total = parseFloat(one)*parseFloat(two);
   document.getElementById("total").value = total;


  }
</script>


</html>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
</head>


</body>
</html>
<?php
include 'footer.php'; ?>