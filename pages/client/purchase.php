<?php
  include 'process/session.php';
  $sql2 = "SELECT * FROM product_inventory ORDER by p_id ASC";
$result2 = mysqli_query($con, $sql2) or die ("Bad SQL: $sql2");

$sup = "<select class='form-control'  name='purchaseitem' onchange='my_fun(this.value);'>
        <option disabled selected>Select Item</option>";
  while ($row = mysqli_fetch_assoc($result2)) {
    $sup .= "<option value='".$row['p_name']."'>".$row['p_name']."</option>";
  }

$sup .= "</select>";

$sqlquery = "SELECT * FROM users WHERE id = $tempcode;";
     $result= $con->query($sqlquery);
     while($row = $result->fetch_assoc()) {
        $temp_type = $row['user_type'];

      }
?>
<!doctype html>
<html lang="en-US">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="robots" content="index,follow">
  </head>
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
    xmlhttp.open("GET","process/help.php?value="+str, true);
    xmlhttp.send();
  }
</script>

<body>

       <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Purchase Materials</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form role="form" method="post" action="process/process.php">
            <div hidden class="form-group">
              <input  type="text" name="purchaseid" value=<?php echo $tempcode; ?>>
              </div>  
            <div class="form-group">
              <?php echo $sup; ?>
              </div>        
              
               <div id="poll" class="form-group">
             <select class='form-control'>
                 <option>Prices</option>
                  </select>
              </div> 
               <div  class="form-group">
              <input  type="number" name="purchaseamount" placeholder="Amount" class="form-control">
              </div> 
            <div hidden class="form-group">
              <input  type="text" name="purchasestatus" value="Pending">
              </div> 
              
              <hr>
            <button type="submit" name="purchaseorder" value="submit"  class="btn btn-success"><i class="fa fa-check fa-fw"></i>Save</button>
            <button type="reset" class="btn btn-danger"><i class="fa fa-times fa-fw"></i>Reset</button>
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>      
          </form>  
        </div>
      </div>
    </div>
</div>
            <div class="card shadow mb-4">
           
               <?php

                     if ($temp_type == "admin") { ?>
                       <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Purchased Order&nbsp;</h4>
            </div>
            
            <div class="card-body">
                        <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> 
                  <thead>
                        <tr>
                          <th>Buyer</th>
                          <th>Purchase Item</th>
                          <th>Price</th> 
                          <th>Qty</th>
                          <th>Total</th>  
                          <th>Status</th>
                        </tr>
                     </thead>
                    <tbody>
                <?php                  
                        $query = "SELECT * FROM parts_table WHERE item_status = 'Approved';";
                        $result = mysqli_query($con, $query) or die (mysqli_error($db));
                        while ($row = mysqli_fetch_assoc($result)) {
                          $tempprice = $row['item_price'];
                          $temptotal = $row['item_total'];
                        echo '<tr>';
                        echo '<td>'. $row['item_buyer'].'</td>';
                        echo '<td>'. $row['item_name'].'</td>';
                        echo '<td>';echo number_format($tempprice,'2');echo'</td>';
                        echo '<td>'. $row['item_amount'].'</td>';
                       echo '<td>';echo number_format($temptotal,'2');echo'</td>';
                        echo '<td>'. $row['item_status'].'</td>';
                        echo '</tr> ';
                        }
                    ?> 
                    
                                    
                    </tbody>
                </table>
              </div>
                       <?php } else { ?>
                         <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Purchase Order&nbsp;<a  href="employee_register.php" data-toggle="modal" data-target="#myModal" type="button" class="btn btn-primary bg-gradient-primary" style="border-radius: 0px;"><i class="fas fa-fw fa-plus"></i></a></h4>
            </div>
            
            <div class="card-body">
          <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> 
                  <thead>
                        <tr>
                         <th>Buyer</th>
                          <th>Purchase Item</th>
                          <th>Price</th> 
                          <th width="8%">Qty</th>
                          <th>Total</th> 
                          <th>Status</th>
                        </tr>
                     </thead>
                    <tbody>
                <?php                  
                       $query = "SELECT * FROM parts_table WHERE item_user_id = '$tempcode' AND item_status = 'Approved';";
                        $result = mysqli_query($con, $query) or die (mysqli_error($db));
                        while ($row = mysqli_fetch_assoc($result)) {
                        echo '<tr>';
                        echo '<td>'. $row['item_buyer'].'</td>';
                        echo '<td>'. $row['item_name'].'</td>';
                        echo '<td>'. $row['item_price'].'</td>';
                        echo '<td>'. $row['item_amount'].'</td>';
                        echo '<td>'. $row['item_total'].'</td>';
                        echo '<td>'. $row['item_status'].'</td>';


                  
                        echo '</tr> ';
                        }
                    ?> 
                    
                                    
                    </tbody>
                </table>
              </div>

                        <?php } ?>
              
            </div>
          </div>
 </body>

</html>

<?php 
include ('footer.php');
?>