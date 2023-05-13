<?php
  include_once('../../include/config.php');
  include_once('../../include/config2.php');

$conn = new PDO('mysql:host=localhost;dbname=test', 'root','');

foreach($_POST['itemname'] as $key => $value){
  
    $sql1 = 'INSERT INTO parts_table(item_category,item_name, item_price, item_amount, item_total, item_user_id, item_transaction_id,item_car_id) VALUES (:item_category, :item_name, :item_price, :item_amount, :item_total, :item_user_id, :item_transaction_id, :item_car_id)';
    $stmt = $conn->prepare($sql1);
    $stmt->execute([
    'item_category' => $_POST['itemcategory'][$key],
    'item_name' => $_POST['itemname'][$key],
    'item_price' => $_POST['itemprice'][$key],
    'item_amount' => $_POST['itemamount'][$key],
    'item_total' => $_POST['itemtotal'][$key],
    'item_user_id' => $_POST['itemuserid'][$key],
    'item_transaction_id' => $_POST['itemtransactionid'][$key],
    'item_car_id' => $_POST['itemcarid'][$key]
           
    ]);



}

 
    // CURREN TRANSACTION ID
$sqltransid  = "SELECT transid FROM transacttable ORDER BY transid DESC LIMIT 1";

$resulttransid = $con->query($sqltransid);
             while($row = $resulttransid->fetch_assoc()) {
                echo "<tr>";
            
        
            $tempo = $row['transid'];
            $temporaryid = $tempo;
               
  }
   
                        // SUM TOTAL

$sqlsum = "SELECT SUM(item_price) FROM parts_table WHERE item_transaction_id ='$temporaryid'";
      $resultsum = mysqli_query($con, $sqlsum) or die(mysqli_error($db));

 while ($row = mysqli_fetch_array($resultsum)) {


    $totalsum = $row['SUM(item_price)'];


}

    $sum = $_POST['itemcarid'][$key];
    $sqlcardata = "SELECT * FROM cardata where id=$sum";
    $resultcardata = $con->query($sqlcardata);
    if ($resultcardata->num_rows > 0) {
            while($row = $resultcardata->fetch_assoc()) {
            $tempcarid = $row['plateid'];   
    }

} else { echo "0 results"; }
$sqltransaction= "SELECT * FROM parts_table WHERE item_transaction_id ='$temporaryid'";
           $result = $con->query($sqltransaction);
              while($row = $result->fetch_assoc()) {
                  
                   // COUNT OF SERVICES
$resultcountsql = "SELECT count(*) as total FROM parts_table WHERE item_transaction_id = '$temporaryid'";
$resultsq= mysqli_query($con,$resultcountsql);
$data = mysqli_fetch_assoc($resultsq);
//echo $data['total'];
$numofmaterials = $data['total'];



  

             //  echo '<div class="small text-gray-500">'.$row['transact_sched'].'</div>';
                   echo ' <hr >
                <div class="row">

                  <div class="col-md-4 mb-3">
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
                  
                   <div class="col-md-2 mb-3">
                   <label style="font-weight: bold;">Amount</label>
                    <input type = "number" readonly value = '.$row['item_amount'].' class="form-control" placeholder="Hour" required>
                  </div>                  
                  


                  
                  <div class="col-md-1 mb-3">
                   <label style="font-weight: bold;">Action</label>
                       <a type="button" class="btn btn-danger bg-gradient-btn-danger " style="border-radius: 0px;" href="deleteparts.php?deleteId='.$row['item_id']. '">
                                    <i class="fas fa-fw fa-trash"></i> 
                                  </a>
                  </div>
                 
                </div>';
                   }
 
        

echo "<br>";


echo "Current Total Amount : ",$totalsum;
echo "<br>";
echo "Current Number of Materials : ",$numofmaterials;
echo "<br>";




?>