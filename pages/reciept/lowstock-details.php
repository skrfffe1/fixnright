<?php
include_once('../../include/config.php');
  include_once('../../include/config2.php');


			

 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="/dist/output.css" rel="stylesheet">
	<title>Details PDF</title>
	<center><header style="font-size:25px;background-color: greenyellow;padding: 25px;margin-bottom: 10px;">Low Stocks Reports</header></center>
 
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
.popcorn{
    background-color: indianred;
}
.popcorn1{
    background-color: yellowgreen;
}
.popcorn2{
    background-color: limegreen;
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
                     <th>Product Name</th>
                     <th>Prices</th>
                     <th>Stocks</th>
                      <th>Supplier</th>
                     <th>Date Stock</th>
                     </tr>
               </thead>
             <tbody>
                <?php 
                     $sqlinventory = "SELECT * FROM product_inventory ORDER BY p_on_hand ASC";
                     $resultinventory = mysqli_query($con, $sqlinventory) or die(mysqli_error($db));
                     while ($row = mysqli_fetch_array($resultinventory)) {
                      $prodname = $row['p_name'];
                      $prodprice = $row['p_price'];
                      $prodstock = $row['p_on_hand'];
                      $proddatestock = $row['p_date_stock'];
                      $prodsupplier = $row['p_supplier'];
                      $mydate = strtotime($proddatestock);
                      echo '<tr>';
                      echo '<td>'.$prodname.'</td>';
                      echo '<td>';echo number_format($prodprice,'2');echo'</td>';
                      if($prodstock == 0){
                        echo '<td class="popcorn">Out of Stocks</td>';
                      }elseif($prodstock <= 20){
                        echo '<td class="popcorn1">'.$prodstock.'</td>';
                      }elseif($prodstock>=20){
                         echo '<td class="popcorn2">'.$prodstock.'</td>';
                      } 
                      else{
                        echo '<td>'.$prodstock.'</td>';
                      }
                      echo '<td>'.$prodsupplier.'</td>';
                      echo "<td>";
                      echo date('F, jS, Y', $mydate);
                      echo"</td>";
                      echo '</tr>';
                      }
                      ?>

                      
 			    	 </tbody>
                </table>
                
               
                        <footer><?php
                            $countsql = "SELECT count(*) as total FROM product_inventory";
                            $countresult= mysqli_query($con,$countsql);
                            $data = mysqli_fetch_assoc($countresult);
                            //echo $data['total'];
                            $numofitems = $data['total'];
                         $currentdate = date("Y-m-d");
                         $curdate = $currentdate;
                         $mycurdate = strtotime($curdate);
                          echo "<br>";
                           echo "Total Items: ", $numofitems;
                           echo "<br>";
                          echo "<br>";
                         echo date('F, jS, Y', $mydate);
                         ?></footer>



</body>
</html>