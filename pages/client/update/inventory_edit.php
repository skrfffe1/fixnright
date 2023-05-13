
<?php
  include '../process/sessions_view.php';

  $temps = $_GET['editId'];
 
   
  $result = mysqli_query($con,"SELECT * from product_inventory 
    
    WHERE p_id = $temps;");
  $row = mysqli_fetch_array($result);

?>

<!doctype html>

<html lang="en-US">

<head>

  <meta charset="UTF-8">

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">



</head>



<body>

  <div class="container">
  

   <center><div class="card shadow mb-4 col-xs-12 col-md-8 border-bottom-primary">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Edit Inventory</h4>
            </div><a  type="button" class="btn btn-primary bg-gradient-primary btn-block" href="../inventory.php "> <i class="fas fa-flip-horizontal fa-fw fa-share"></i> Back </a>
            <div class="card-body">
         
            <form name="frmUser" method="post" action="../process/process.php">
               <div> 
        
    </div>
              <input type="hidden" name="p_id" value="<?php echo $temps; ?>" />
              <div class="form-group row text-left  font-weight-bold">
                <div class="col-sm-3" style="padding-top: 5px;">
                Product Code:
                </div>
                <div class="col-sm-9">
                  <input type="text" name="p_product_code"  class="form-control" value="<?php echo $row['p_product_code']?>" required>
                </div>
              </div>
              
               <div class="form-group row text-left  font-weight-bold">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Product Name :
                </div>
                <div class="col-sm-9">
                   <input type="text" name="p_name"  class="form-control" value="<?php echo $row['p_name']?>" required>
                </div>
              </div>
              <div class="form-group row text-left  font-weight-bold">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Description :
                </div>
                <div class="col-sm-9">

                   <input type="text" name="p_description"  class="form-control" value="<?php echo $row['p_description']?>" required>
                </div>

              </div>
              <div class="form-group row text-left  font-weight-bold">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Quantity Stock 
                </div>
                <div class="col-sm-9">

                   <input type="text" name="p_qty_stock"  class="form-control" value="<?php echo $row['p_qty_stock']?>" required>
                </div>
                
              </div>
              <div class="form-group row text-left  font-weight-bold">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Product On Hand 
                </div>
                <div class="col-sm-9">

                   <input type="text" name="p_on_hand"  class="form-control" value="<?php echo $row['p_on_hand']?>" required>
                </div>
                
              </div>
              <div class="form-group row text-left  font-weight-bold">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Price
                </div>
                <div class="col-sm-9">

                   <input type="text" name="p_price"  class="form-control" value="<?php echo $row['p_price']?>" required>
                </div>
                
              </div>
              <div class="form-group row text-left  font-weight-bold">
                <div class="col-sm-3" style="padding-top: 5px;">
                Category
                </div>
                <div class="col-sm-9">
                    <input type="text" name="p_category"  class="form-control" value="<?php echo $row['p_category']?>" required>
                  
                </div>
                
              </div>
              <div class="form-group row text-left  font-weight-bold">
               
                <div class="col-sm-3" style="padding-top: 5px;">
                 Supplier
                </div>
                <div class="col-sm-9">
                      <input type="text" name="p_supplier"  class="form-control" value="<?php echo $row['p_supplier']?>" required>
                 
                </div>
                
              </div>
              <div class="form-group row text-left  font-weight-bold">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Date Stock
                </div>
                <div class="col-sm-9">

                   <input type="date" name="p_date_stock"  class="form-control" value="<?php echo $row['p_date_stock']?>" required>
                </div>
                
              </div>
              
               
              <hr>
                <button type="submit" name="updateinventory" value="submit"  class="btn btn-warning btn-block"><i class="fa fa-edit fa-fw"></i>Update</button> 
              </form>  
          </div>
  </div>
  </div>

    

  

</body>

</html>