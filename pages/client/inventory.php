<?php
  include 'process/session.php';
  $sql = "SELECT * FROM category ORDER by c_name ASC";
$result = mysqli_query($con, $sql) or die ("Bad SQL: $sql");



$opt = "<select class='form-control' id ='p_category' name='pcategory'>
        <option disabled selected>Select Category</option>";
  while ($row = mysqli_fetch_assoc($result)) {
    $opt .= "<option value='".$row['c_name']."'>".$row['c_name']."</option>";
  }

$opt .= "</select>";

$sql2 = "SELECT * FROM supplier ORDER by s_company_name ASC";
$result2 = mysqli_query($con, $sql2) or die ("Bad SQL: $sql2");

$sup = "<select class='form-control' id='p_supplier' name='psupplier'>
        <option disabled selected>Select Supplier</option>";
  while ($row = mysqli_fetch_assoc($result2)) {
    $sup .= "<option value='".$row['s_company_name']."'>".$row['s_company_name']."</option>";
  }

$sup .= "</select>";
?>

<!doctype html>
<html lang="en-US">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>

       <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
             <form role="form" method="post" action = "process/process.php">          
               <div class="form-group">
             <input class="form-control" placeholder="Product Code" name="pcode" required>
           </div>
           <div class="form-group">
             <input class="form-control" placeholder="Name" name="pname" required>
           </div>
           <div class="form-group">
             <textarea rows="5" cols="50" textarea class="form-control" placeholder="Description" name="pdescribe" required></textarea>
           </div>
           <div class="form-group">
             <input type="number"  min="1" max="999999999" class="form-control" placeholder="Quantity" name="pqtystock"  required>
           </div>
           
           <div class="form-group">
             <input type="number"  min="1" max="999999999" class="form-control" placeholder="On Hand" name="ponhand"  required>
           </div>
           <div class="form-group">
             <input type="number"  min="1" max="9999999999" class="form-control" placeholder="Price" name="pprice" required>
           </div>
            <div class="form-group"> 
                              <?php
                                echo $opt;
                              ?>
                            </div>
           <div class="form-group">
             
                              <?php
                                echo $sup;
                              ?>
             
           </div>
           <div class="form-group">
             <input type="text" onfocus="(this.type='date')" onblur="(this.type='text')" class="form-control" placeholder="Date Stock In" name="pdatestock" id="p_date_stock" required>
           </div>

         
              <hr>
            <button type="submit" name="insertinventory" value="submit" id="submit" class="btn btn-success"><i class="fa fa-check fa-fw"></i>Save</button>
            <button type="reset" class="btn btn-danger"><i class="fa fa-times fa-fw"></i>Reset</button>
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>      
          </form>  
        </div>
      </div>
    </div>
</div>
            <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Product&nbsp;<a  href="employee_register.php" data-toggle="modal" data-target="#myModal" type="button" class="btn btn-primary bg-gradient-primary" style="border-radius: 0px;"><i class="fas fa-fw fa-plus"></i></a></h4>
            </div>
            
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> 
                  <thead>
                        <tr>
                          <th hidden>PRODUCT ID</th>
                           
                     <th>Name</th>
                     <th width="10%">Price</th>
                     <th width="5%">Category</th>
                     <th width="12%">Stocks</th>
                     <th width="20%">Date Stock in</th>
                     <th width="15%">Supplier</th>
                     <th width="15%">Action</th>

                        </tr>
                     </thead>
                    <tbody>
                <?php                  
                        $query = 'SELECT * FROM product_inventory ';
                        $result = mysqli_query($con, $query) or die (mysqli_error($db));
                        while ($row = mysqli_fetch_assoc($result)) {
                          $tempprice = $row['p_price'];
                          $tempdates = $row['p_date_stock'];
                          $mycur = strtotime($tempdates);
                          $p = $row['p_on_hand'];
                        echo '<tr>';
                        echo '<td hidden>'. $row['p_id'].'</td>';
                       
                        echo '<td>'. $row['p_name'].'</td>';
                        echo '<td>';echo number_format($tempprice,'2');echo'</td>';
                        echo '<td>'. $row['p_category'].'</td>';
                        if($p == 0){
                          echo '<td class="text-danger font-weight-bold">Out of Stocks</td>';
                        }elseif($p <=10){
                           echo '<td class="text-warning font-weight-bold">'. $row['p_on_hand'].'</td>';
                        }else{
                          echo '<td class="text-success font-weight-bold">'. $row['p_on_hand'].'</td>';
                        }
                        echo '<td>';
                        echo date('F, jS, Y', $mycur);
                        echo '</td>';

                        echo '<td>'. $row['p_supplier'].'</td>';
                        echo '<td align="right"> <div class="btn-group">
                              <a type="button" class="btn btn-primary bg-gradient-primary" href="view/inventory_details.php?action=edit & id='.$row['p_id'] . '"><i class="fas fa-fw fa-list-alt"></i> Details</a>
                            <div class="btn-group">
                              <a type="button" class="btn btn-primary bg-gradient-primary dropdown no-arrow" data-toggle="dropdown" style="color:white;">
                              ... <span class="caret"></span></a>
                            <ul class="dropdown-menu text-center" role="menu">
                                <li>
                                  <a type="button" class="btn btn-warning bg-gradient-warning btn-block" style="border-radius: 0px;" href="update/inventory_edit.php?editId='.$row['p_id']. '">
                                    <i class="fas fa-fw fa-edit"></i> Edit
                                  </a>
                                   <button href="process/process.php?deleteinventory='.$row['p_id']. '" type="button"  class="btndel btn btn-danger bg-gradient-btn-danger btn-block" style="border-radius: 0px;" >
                                    <i class="fas fa-fw fa-trash"></i> Delete
                                  </button>
                                </li>
                            </ul>
                            </div>
                          </div> </td>';
                        echo '</tr> ';
                        }
                    ?> 
                    
                                    
                    </tbody>
                </table>
              </div>
            </div>
          </div>
  </body>
  </html>


<?php
include ('footer.php');
 ?>