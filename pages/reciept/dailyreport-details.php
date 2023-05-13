<?php
include_once('../../include/config.php');
  include_once('../../include/config2.php');


$cur = date("Y-m-d");
 $mycur = strtotime($cur);
 
 ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/dist/output.css" rel="stylesheet">
    <title>Daily Reports PDF</title>

    <center><header style="font-size:25px;background-color: greenyellow;padding: 20px;margin-bottom: 5px;">Daily Reports<br>Today is  <?php echo date('F, jS, Y', $mycur); ?></header></center>
 
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
                     <th>Booked for Today</th>
                     <th width="25%"></th>
                     </tr>
               </thead>
             
                </table>
    <table border="1" width="100%" > 
               <thead>
                   <tr >
                     <th>Full Name</th>
                     <th width="25%">Vehicle</th>
                     <th width="12%">Status</th>
                     <th width="25%">Cost</th>
                     
                     </tr>
               </thead>
             <tbody>

                <?php 
                    $currentdate = date("Y-m-d");
                     
                     $sqlinventory = "SELECT * FROM transacttable JOIN users on custid = users.id JOIN cardata on carid = cardata.id WHERE transact_sched = '$currentdate';";
                     $resultinventory = mysqli_query($con, $sqlinventory) or die(mysqli_error($db));
                     while ($row = mysqli_fetch_array($resultinventory)) {
                      $prodname = $row['status'];
                      $fn = $row['firstname'];
                      $ln = $row['lastname'];
                        $full = $fn . ' ' . $ln; 
                        $fn1 = $row['carbrand'];
                      $ln1 = $row['carmodel'];
                        $full1 = $fn1 . ' - ' . $ln1; 
                        $temps = $row['transact1'];
                   
                      echo '<tr>';
                      echo "<td>".$full."</td>";
                       echo "<td>".$full1."</td>";
                      echo "<td>".$prodname."</td>";
                       echo '<td>';
                       echo number_format($temps,'2');
                       echo'</td>';
                      echo '</tr>';
                      }
                      ?>

                      
                     </tbody>
                </table>

           <table border="1" width="100%" > 
               <thead>
                   <tr >
                     <th>Labor & Services</th>
                     <th width="25%">Mechanic</th>
                     <th width="25%">Cost</th>
                     
                     
                     </tr>
               </thead>
             <tbody>
                <?php 
                    $currentdate = date("Y-m-d");
                     
                     $sqlinventory = "SELECT * FROM transaction_table JOIN employee on encoder = employee.employee_fname WHERE transaction_sched = '$currentdate;'";
                     $resultinventory = mysqli_query($con, $sqlinventory) or die(mysqli_error($db));
                     while ($row = mysqli_fetch_array($resultinventory)) {
                      $prodname = $row['name'];
                       $prodprice = $row['price'];
                        $fn = $row['employee_fname'];
                        $ln = $row['employee_lname'];
                        $full = $fn . ' ' . $ln;
                      echo '<tr>';
                      echo '<td>'.$prodname.'</td>';
                      echo "<td>".$full."</td>";
                      echo '<td>';echo number_format($prodprice,'2');echo'</td>';
                      echo '</tr>';
                      }
                      ?>

                      
                     </tbody>
                </table>
                <table border="1" width="100%" > 
               <thead>
                   <tr >
                     <th>Parts & Materials</th>
                     <th width="10%">Amount</th>
                     <th width="25%">Price</th>

                     <th width="25%">Cost</th>
                     
                     
                     </tr>
               </thead>
             <tbody>
                <?php 
                    $currentdate = date("Y-m-d");
                     
                     $sqlinventory = "SELECT * FROM parts_table WHERE item_transaction_sched = '$currentdate;'";
                     $resultinventory = mysqli_query($con, $sqlinventory) or die(mysqli_error($db));
                     while ($row = mysqli_fetch_array($resultinventory)) {
                      $itemname = $row['item_name'];
                       $itemprice = $row['item_price'];
                       $itemamount = $row['item_amount'];
                        $itemtotal = $row['item_total'];
                      echo '<tr>';
                      echo '<td>'.$itemname.'</td>';
                      echo '<td>'.$itemamount.'</td>';
                      echo '<td>';echo number_format($itemprice,'2');echo'</td>';
                      echo '<td>';echo number_format($itemtotal,'2');echo'</td>';


                      echo '</tr>';
                      }
                      ?>

                      
                     </tbody>
                </table>
                <table border="1" width="100%" > 
               <thead>
                   <tr >
                     <th>Expenses</th>
                     <th width="25%">Cost</th>
                     
                     
                     </tr>
               </thead>
             <tbody>
                <?php 
                    $currentdate = date("Y-m-d");
                     
                     $sqlinventory = "SELECT * FROM expense_table WHERE expense_date = '$currentdate;'";
                     $resultinventory = mysqli_query($con, $sqlinventory) or die(mysqli_error($db));
                     while ($row = mysqli_fetch_array($resultinventory)) {
                      $prodname = $row['expense_name'];
                       $prodprice = $row['expense_price'];
                    
                      echo '<tr>';
                      echo '<td>'.$prodname.'</td>';
                      echo '<td>';echo number_format($prodprice,'2');echo'</td>';
                      echo '</tr>';
                      }
                      ?>

                      
                     </tbody>
                </table>
                
               
                        <footer><?php
                         $currentdate = date("Y-m-d");
                            $totalsql = "SELECT SUM(price) as totals FROM transaction_table WHERE transaction_sched = '$currentdate;'";
                            $totalresult= mysqli_query($con,$totalsql);
                            $totaldata = mysqli_fetch_assoc($totalresult);
                            //echo $data['total'];
                            $totalsum = $totaldata['totals'];

                            $totalpartssql = "SELECT SUM(item_total) as totalsparts FROM parts_table WHERE item_transaction_sched = '$currentdate;'";
                            $totalpartsresult= mysqli_query($con,$totalpartssql);
                            $totalpartsdata = mysqli_fetch_assoc($totalpartsresult);
                            //echo $data['total'];
                            $totalpartsum = $totalpartsdata['totalsparts'];

                            //haha

                             $totalexpensesql = "SELECT SUM(expense_price) as totalexpense FROM expense_table WHERE expense_date = '$currentdate;'";
                            $totalexpenseresult= mysqli_query($con,$totalexpensesql);
                            $totalexpensedata = mysqli_fetch_assoc($totalexpenseresult);
                            //echo $data['total'];
                            $totalexpensesum = $totalexpensedata['totalexpense'];


                            $countsql = "SELECT count(*) as total FROM transaction_table WHERE transaction_sched = '$currentdate;'";
                            $countresult= mysqli_query($con,$countsql);
                            $data = mysqli_fetch_assoc($countresult);
                            //echo $data['total'];
                            $numofitems = $data['total'];
                         
                         $managetotal = $totalsum + $totalpartsum;
                         $managetotal2 = $managetotal - $totalexpensesum;

                    //       echo "<h4 style='font-size:25px;background-color: greenyellow;'>Total Cost: ",number_format($totalsum,'2'),"</h4>";
                    //      echo "<h4 style='font-size:25px;background-color: greenyellow;'> Total Items: ", $numofitems,"</h4>";
                         



                         
                     
                        
                         ?><br>
                            
                         </footer>

    
  
  
  

</body>
</html>