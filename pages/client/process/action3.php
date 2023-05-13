<?php
  include_once('../../../include/config.php');
  include_once('../../../include/config2.php');

$conn = new PDO('mysql:host=localhost;dbname=test', 'root','');

foreach($_POST['product_name'] as $key => $value){
  
    $sql = 'INSERT INTO transaction_table(transact_category,name, rate, hour, chance, price, transaction_user_id, transaction_id,car_id_labor,encoder,transaction_sched) VALUES (:transact_category, :name, :rate, :hour, :chance, :price, :transaction_user_id, :transaction_id, :car_id_labor, :encoder, :transaction_sched)';
    $stmt = $conn->prepare($sql);
    $stmt->execute([
    'transact_category' => $_POST['product_category'][$key],
    'name' => $_POST['product_name'][$key],
    'rate' => $_POST['product_rate'][$key],
    'hour' => $_POST['product_hour'][$key],
    'chance' => $_POST['producttemp'][$key],
    'price' => $_POST['product_price'][$key],
    'transaction_user_id' => $_POST['product_user'][$key],
    'transaction_id' => $_POST['product_transact'][$key],
    'car_id_labor' => $_POST['product_qty'][$key],
    'encoder' => $_POST['product_encoder'][$key],
     'transaction_sched' => $_POST['product_date'][$key]
           
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

$sqlsum = "SELECT SUM(price) FROM transaction_table WHERE transaction_id ='$temporaryid'";
      $resultsum = mysqli_query($con, $sqlsum) or die(mysqli_error($db));

 while ($row = mysqli_fetch_array($resultsum)) {


    $totalsum = $row['SUM(price)'];


}

    $sum = $_POST['product_qty'][$key];
    $sqlcardata = "SELECT * FROM cardata where id=$sum";
    $resultcardata = $con->query($sqlcardata);
    if ($resultcardata->num_rows > 0) {
            while($row = $resultcardata->fetch_assoc()) {
            $tempcarid = $row['plateid'];   
    }

} else { echo "0 results"; }
$sqltransaction= "SELECT * FROM transaction_table WHERE transaction_id ='$temporaryid' AND chance = '2'";
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
                 
                </div>';
                   }
 
        

echo "<br>";
echo "Current Total: ",$totalsum;
echo "<br>";
echo "Current Num of Service : ",$numofservice;




?>