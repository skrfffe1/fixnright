<?php
include_once('../../include/config.php');
  include_once('../../include/config2.php');

$cur1 = date("Y-m-d");
 $mycur1 = strtotime($cur1);
  
  if(isset($_POST['specificdailyexpense']))
{   
    
    $chosendate = $_POST['expense_date'];
    $mycur2 = strtotime($chosendate);
     $test =date('m', $mycur2);
     $test2 =date('Y', $mycur2);
           
}  
 ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/dist/output.css" rel="stylesheet">
    <title>Yearly Expense Report PDF</title>
    
    <center><header style="font-size:25px;background-color: greenyellow;padding: 20px;margin-bottom: 5px;">Year Expenses Report<br>Year <?php echo date('Y', $mycur2); ?></header></center>
 
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
                     <th>Expense Name</th>
                     <th>Expense Cost</th>
                     
                     <th>Date Spend</th>
                     </tr>
               </thead>
             <tbody>
                <?php 
                    $cur = date("Y-m-d");
                      $sqlinventory = "SELECT * FROM expense_table  WHERE YEAR(`expense_date`)='$test2';";
                     $resultinventory = mysqli_query($con, $sqlinventory) or die(mysqli_error($db));
                     if(mysqli_num_rows($resultinventory)>0){
                        while ($row = mysqli_fetch_array($resultinventory)) {
                      $prodname = $row['expense_name'];
                      $prodprice = $row['expense_price'];
                     
                      $proddatestock = $row['expense_date'];
                      $mydate = strtotime($proddatestock);
                      echo '<tr>';
                      echo '<td>'.$prodname.'</td>';
                      echo '<td>';echo number_format($prodprice,'2');echo'</td>';
                     
                      echo "<td>";
                      echo date('F, jS, Y', $mydate);
                      echo"</td>";
                      echo '</tr>';
                      }
                     }else{
                         echo '<tr>';
                         echo '<td>No Expense Found this year</td>';
                         echo '<td>No Records Found</td>';
                         echo '<td>No Records Found</td>';
                         echo '</tr>';
                     }
                     
                      ?>

                      
                     </tbody>
                </table>
                
               
                        <footer><?php
                            $totalsql = "SELECT SUM(expense_price) as totals FROM expense_table WHERE YEAR(`expense_date`)='$test2'";
                            $totalresult= mysqli_query($con,$totalsql);
                            $totaldata = mysqli_fetch_assoc($totalresult);
                            //echo $data['total'];
                            $totalsum = $totaldata['totals'];
                            $countsql = "SELECT count(*) as total FROM expense_table";
                            $countresult= mysqli_query($con,$countsql);
                            $data = mysqli_fetch_assoc($countresult);
                            //echo $data['total'];
                            $numofitems = $data['total'];
                         ?>
                         <br>
                            <?php
                            if($totalsum == 0){

                            }else{
                                ?>
                                 <header style="font-size:25px;background-color: greenyellow;padding: 25px;margin-bottom: 10px;">
                                Expense Total = <?php echo number_format($totalsum,'2') ?><br>
                                </header>
                                <?php     
                            }
                             ?>
                            
                         </footer>

    
  
  
  

</body>
</html>