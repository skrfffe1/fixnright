<?php
include_once('../../include/config.php');
  include_once('../../include/config2.php');
 $tempid = $_GET['id'];
 $sqlabor = "SELECT * FROM transaction_table WHERE transaction_id = $tempid;";
 $resultlabor = $con->query($sqlabor);
             
$sqlmaterial = "SELECT * FROM parts_table WHERE item_transaction_id = $tempid;";
$resultmaterial = $con->query($sqlmaterial);
			while($row = $resultmaterial->fetch_assoc()) {

			}

$sqltransact = "SELECT * FROM transacttable WHERE transid = $tempid;";
$resulttransact = $con->query($sqltransact);
			while($row = $resulttransact->fetch_assoc()) {

			}

 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="/dist/output.css" rel="stylesheet">
	<title>Details PDF</title>
	
 
</head>

<body>
	<style type="text/css">
		table {
	width: 100%;
	border: none;
	border-collapse: collapse;
	border-spacing: 0;
	border-bottom: 2px solid #d2d6dd;
}

th {
	padding: 1rem 0.4rem;
	text-align: left;
}

td {
	padding: .8rem 0.4rem;
}

thead {
	border-top: 2px solid #d2d6dd;
	border-bottom: 2px solid #d2d6dd;
	background-color: #efefef;
}

tfoot {
	border-top: 2px solid #d2d6dd;
	border-bottom: 2px solid #d2d6dd;
}

table.striped tr:nth-of-type(2n) {
	background-color: #f3f3f6;
}
	</style>


  
           <table border="1" width="100%" > 
               <thead>
                   <tr >
                     <th width="35%">Labor & Service</th>
                     <th width="35%">Cost</th>
                     </tr>
               </thead>
             
          		<tbody>
 			    	   <?php
              
                while($row = $resultlabor->fetch_assoc()) {
                  $totals = $row['price'];
               echo '<tr>';
                 echo '<td>'. $row['name'].'</td>';
                 echo '<td>';echo number_format($totals,'2');echo'</td>';
               echo '</tr>';
              }
               
                 ?>
 			    </tbody>
                </table>
                <br>
                <table  border="1" width="100%" > 
               <thead>
                   <tr >
                    
                     <th width="35%">PARTS & MATERIALS</th>
                     <th width="35%">Cost</th>
                     </tr>
               </thead>
              	
          		<tbody>
 			    	 <?php
              	$sqlexist = "SELECT * FROM parts_table WHERE item_transaction_id = $tempid;";
              	$resultexist = $con->query($sqlexist);
                while($row = $resultexist->fetch_assoc()) {
            	  echo '<tr>';
                 echo '<td>'. $row['item_name'].'</td>';
                 echo '<td>'. $row['item_price'].'</td>';
            	 echo '</tr>';
            	}

               
              	 ?>
 			    </tbody>
                </table>
                <?php 
                     $sql21 = "SELECT SUM(price) FROM transaction_table WHERE transaction_id = $tempid";
                    $result21 = mysqli_query($con, $sql21) or die(mysqli_error($db));

                  while ($row = mysqli_fetch_array($result21)) {


                    $sumlabor = $row['SUM(price)'];
                      }
                    ?>
                     <?php 
                     $sqlparts = "SELECT SUM(item_price) FROM parts_table WHERE item_transaction_id = $tempid";
                    $resultparts = mysqli_query($con, $sqlparts) or die(mysqli_error($db));

                  while ($row = mysqli_fetch_array($resultparts)) {


                    $sumparts = $row['SUM(item_price)'];
                      }
                      $totalsum = $sumparts + $sumlabor;

                    ?>
                     <?php 
                     $sql211 = "SELECT * FROM transacttable WHERE transid = $tempid";
                    $result211 = mysqli_query($con, $sql211) or die(mysqli_error($db));

                  while ($row = mysqli_fetch_array($result211)) {


                    $payment = $row['cashtotal'];
                      }
                         $totalcharge = $payment - $totalsum;
                    ?>
                <div style="text-align: right;">
                <p>Labor   = <?php echo number_format($sumlabor, 2); ?></p>
                <p>Parts   = <?php echo number_format($sumparts, 2); ?></p>
                <p>Payment = <?php echo number_format($payment, 2); ?></p>
                <p>Change  =  <?php echo number_format($totalcharge, 2); ?></p>

            </div>

               
                        
</body>
</html>