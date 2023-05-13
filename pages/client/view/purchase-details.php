
<?php
  include '../process/sessions_view.php';
$tempid = $_GET['editId'];
$sql2 = "SELECT * FROM product_inventory ORDER by p_id ASC";
$result2 = mysqli_query($con, $sql2) or die ("Bad SQL: $sql2");




    $query = "SELECT * FROM parts_table WHERE item_id = '$tempid'";
                        $result = mysqli_query($con, $query) or die (mysqli_error($db));
                        while ($row = mysqli_fetch_assoc($result)) {
                     
                          $tempname = $row['item_buyer'];
                          $tempproductname = $row['item_name'];
                           $tempamount = $row['item_amount'];
                          
                        
                          $tempprice = $row['item_price'];
                          $temptotal = $row['item_total'];
                          $tempidsa = $row['item_id'];
                          $tempstatus = $row['item_status'];

                       
                        }
  
?>


   



<!doctype html>

<html lang="en-US">

<head>

  <meta charset="UTF-8">

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  



    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">



</head>



<body>  <center><div class="card shadow mb-4 col-xs-12 col-md-8 border-bottom-primary">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Purchase Order Details</h4>
            </div>
            <a href="../purchase-request.php" type="button" class="btn btn-primary bg-gradient-primary btn-block"> <i class="fas fa-flip-horizontal fa-fw fa-share"></i> Back </a>
            <div class="card-body">
          

                
                    <div class="form-group row text-left">
                      <div class="col-sm-3 text-primary">
                        <h5>
                          Buyer<br>
                        </h5>
                      </div>
                      <div class="col-sm-9">
                        <h5>
                          : <?php echo $tempname  ?> <br>
                        </h5>
                      </div>
                     
                    </div>
                    <div class="form-group row text-left">
                      <div class="col-sm-3 text-primary">
                        <h5>
                          Product Name<br>
                        </h5>
                      </div>
                      <div class="col-sm-9">
                        <h5>
                          : <?php echo $tempproductname?><br>
                        </h5>
                      </div>
                     
                    </div>
                     <div class="form-group row text-left">
                      <div class="col-sm-3 text-primary">
                        <h5>
                          Product Price<br>
                        </h5>
                      </div>
                      <div class="col-sm-9">
                        <h5>
                           : ₱ <?php echo number_format($tempprice, 2); ?>
                        </h5>
                      </div>
                    </div>
                     <div class="form-group row text-left">
                      <div class="col-sm-3 text-primary">
                        <h5>
                          Amount<br>
                        </h5>
                      </div>
                      <div class="col-sm-9">
                        <h5>
                           : <?php echo $tempamount; ?> <br>
                        </h5>
                      </div>
                    </div>
                     <div class="form-group row text-left">
                      <div class="col-sm-3 text-primary">
                        <h5>
                          Total Cost<br>
                        </h5>
                      </div>
                      <div class="col-sm-9">
                        <h5>
                          : ₱ <?php echo number_format($temptotal, 2); ?>
                        </h5>
                      </div>
                    </div>
                    <div class="form-group row text-left">
                      <div class="col-sm-3 text-primary">
                        <h5>
                          Status<br>
                        </h5>
                      </div>
                      <div class="col-sm-9">
                        <h5>
                          : <?php echo $tempstatus; ?> <br>
                        </h5>
                      </div>
                    </div>
                   
                      <form role="form" method="post" action="../process/process.php">
            <div hidden class="form-group">
              <input  type="text"class="form-control" name="purchaseid" placeholder="item id" value=<?php echo $tempidsa; ?>>
              </div>  
           
              <div  hidden class="form-group">
            <input  type="text" name="purchaseamount" value="<?php echo $tempamount?>" placeholder="Item Name" class="form-control">
              </div>
               <input hidden type="text" name="purchaseitem" value="<?php echo $tempproductname?>" placeholder="Item Name" class="form-control">
              </div>
               <div hidden class="form-group">
            <input  type="text" name="purchasestatus" value="Approved" placeholder="Item Name" class="form-control">
              </div>        
              
              
              
              
            <button type="submit" name="purchaseupdate" value="submit"  class="btn btn-primary btn-lg btn-block mb-3"><i class="fa fa-check fa-fw"></i>Approved</button>
                 
          </form>  
                       <center>
                      
                     
                 
                  
                  
                  
                   
                  

                      </div>
                    </div>

          </div>
          </div>
  
</html>