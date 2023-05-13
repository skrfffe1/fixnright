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


<?php
include_once'../../include/config.php';
include_once'../../include/config2.php';
$x=0;
$y=0;
$yy=0;
$sum=0;
$table="test";
$ii=1;
$z =0;
$sub_total_price = 0;
$pn = "";
$sum2=0;
$csid1 = 0;
  $tempo = "";
$tempo = $_GET['editId'];
$tempmake ="";
$tempmodel ="";
$sql3 = "SELECT * FROM item WHERE quantity ='$tempo'";


$sql2 = " SELECT  * FROM   product1  JOIN transacttable ON product1.product_id = transacttable.transid JOIN users on users.id = transacttable.transid
      WHERE   product1.product_id = '$tempo'";
      $sql3 = " SELECT  * FROM   product1  JOIN transacttable ON product1.product_id = transacttable.transid JOIN users on users.id = transacttable.carid JOIN cardata ON cardata.plateid = transacttable.carid
      WHERE   product1.product_id = '$tempo'";

?>
  

            <!DOCTYPE html>
<html>
<head>
	<style>
    body {
        height: 842px;
        width: 595px;
        /* to centre page on screen*/
        margin-left: auto;
        margin-right: auto;
    }
    </style>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

/* Create three unequal columns that floats next to each other */
.column {
  float: left;
  

}

.left, .right {
  width: 2-0%;
}

.middle {
  width: 50%;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}
</style>
</head>
<body>

<h2><center>JOB ORDER</center></h2>



</body>
</html>

          <div class="card shadow mb-4">
            <div class="card-body">
              <div class="form-group row text-left mb-0">
                <div class="col-sm-9">
                	<div class="row">
                		
  					<div class="column left">
 						<h5 class="font-weight-bold">
                      <?php  
           $result2 = $con->query($sql3);
              while($row = $result2->fetch_assoc()) {

                 $fn = $row['firstname'];
                 $ln = $row['lastname'];
                 $full = $fn . ' ' . $ln; 
                 
                   }?>
                    CUSTOMER NAME: <?php echo $full ?>
                
                     </h5>
	                   <h5 class="font-weight-bold"><?php  
           $result2 = $con->query($sql3);
              while($row = $result2->fetch_assoc()) {
                   $tempdate = $row['userphone'];
                   }?>
                    	CONTACT: <?php echo  $tempdate ?>
	                   </h5>
                    
                    <h5 class="font-weight-bold"> <?php  
           $result3 = $con->query($sql3);
              while($row = $result3->fetch_assoc()) {
                   $tempmodel = $row['carmodel'];
                   }?>
                      MODEL: <?php echo $tempmodel; ?>
                    </h5>
                    <h5 class="font-weight-bold">
              <?php  
           $result3 = $con->query($sql3);
              while($row = $result3->fetch_assoc()) {
                 $tempmake = $row['carbrand'];
                   $tempman = $row['carmanufacturer'];
                   }?>
                      BRAND: <?php echo $tempmake; ?>
                      <br><br>
                       MANUFACTURER: <?php echo $tempman; ?>
                     </h5>
	                   
 					 </div>
  					<div class="column middle">
   					 <h5 class="font-weight-bold">
	                  
  					</div>
  					<div class="column right" >
  					
	                  <h5 class="font-weight-bold">
                    DATE: 

	                  </h5>
	                   <h5 class="font-weight-bold">
                    KM READING:
	                  </h5>
  					</div>
</div>
                  
                 

                </div>
                <div class="col-sm-3 py-1">
            <!--       <h6>
                    <?php  
           $result2 = $con->query($sql2);
              while($row = $result2->fetch_assoc()) {
                   $tempdate = $row['transdate'];
                   }?>
                    Date: <?php	echo $tempdate; ?>
                  </h6>
                </div>
              </div> -->
<hr>
              <div class="form-group row text-left mb-0 py-2">
                <div class="col-sm-4 py-1">
                  <h6 class="font-weight-bold">
                  
                  </h6>
              <!--    <h6>   <?php  
           $result2 = $con->query($sql2);
              while($row = $result2->fetch_assoc()) {
                   $tempdate = $row['userphone'];
                   }?>
                  
                    Phone: <?php echo  $tempdate ?> -->
                  </h6>
                </div>
                <div class="col-sm-4 py-1"></div>
                <div class="col-sm-4 py-1">
              <!--    <h6>
                    Transaction # 
                  </h6>
                  <h6 class="font-weight-bold">
                    Encoder: 
                  </h6>
                  <h6>
                   
                  </h6> -->
                </div>
              </div> 
              
          <table class="table table-bordered" cellspacing="0">
            <thead>
              <tr>
                <th>Services</th>
             
                <th width="10%">Price</th>
               
              </tr>
            </thead>
            <tbody>
<?php  
           $result2 = $con->query($sql2);
              while($row = $result2->fetch_assoc()) {
                $prodname = $row['product_name'];
              echo "<tr>";
              echo "<td>".$row['product_name']."</td>";
             
              echo "<td>".$row['product_price']."</td>";
              $temptotal = $row['cashtotal'];
            
              $tempdate = $row['transdate'];
              $tempmoney = $row['moneytotal'];
              $changes = $tempmoney - $temptotal;
              echo "</tr>";
                        }

?>
            </tbody>
          </table>

            
 <table class="table table-bordered" cellspacing="0">
            <thead>
              <tr>
                <th>Materials</th>
             
                <th width="10%">Price</th>
               
              </tr>
            </thead>
            <tbody>
<?php  
$sql30= "SELECT * FROM item2 WHERE item_transanct_id ='$tempo'";
           $result30 = $con->query($sql30);
              while($row = $result30->fetch_assoc()) {
             
              echo "<tr>";
              echo "<td>".$row['name']."</td>";
             
              echo "<td>".$row['price']."</td>";
           
              echo "</tr>";
                        }

?>
            </tbody>
          </table>
          <div class="form-group row text-left mb-0 py-2">
                <div class="col-sm-4 py-1"></div>
                <div class="col-sm-3 py-1"></div>
                <div class="col-sm-4 py-1">
                  <h4>
                    Total Amount: ₱ <?php echo "$temptotal"; ?>
                    <br>
                    Total Cash : ₱  <?php echo "$tempmoney"; ?>
                    <br>
                    Change : ₱ <?php echo "$changes"; ?>
                  </h4>
                  
   <table class="table table-bordered" cellspacing="0">
            <thead>
              <tr>
                <th>Recommendations</th>
             
               
               
              </tr>
            </thead>
            <tbody>
<?php  
$sql21 = " SELECT  * FROM   product2 WHERE   product2.product_id = '$tempo'";
           $result21 = $con->query($sql21);
              while($row = $result21->fetch_assoc()) {
                $prodname = $row['product_name'];
              echo "<tr>";
              echo "<td>* ".$row['product_name']."</td>";
             
              
            
           
              echo "</tr>";
                        }

?>
            </tbody>
          </table>
                  <table width="100%">
             <!--       <tr>
                      <td class="font-weight-bold">Subtotal</td>
                      <td class="text-right">₱ </td>
                    </tr>
                    <tr>
                      <td class="font-weight-bold">Less VAT</td>
                      <td class="text-right">₱ </td>
                    </tr>
                    <tr>
                      <td class="font-weight-bold">Net of VAT</td>
                      <td class="text-right">₱ </td>
                    </tr>
                    <tr>
                      <td class="font-weight-bold">Add VAT</td>
                      <td class="text-right">₱ </td>
                    </tr>
                    <tr>
                    -->
                      <td class="font-weight-bold"><a type="button" class="btn btn-primary bg-gradient-primary" href="transact-bill.php?editId="><i class="fas fa-fw fa-list-alt"></i> Details</a> </td>

                      <td class="font-weight-bold text-right text-primary"></td>
                      
                    </tr>

                  </table>
                </div>
                <div class="col-sm-1 py-1"></div>
              </div>
            </div>
          </div>


<?php

?>
