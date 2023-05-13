
<?php
  include '../process/sessions_view.php';
$tempid = $_GET['editId'];
    $query = "SELECT * FROM cardata JOIN users on cardata.plateid = users.id WHERE cardata.plateid = '$tempid'";
                        $result = mysqli_query($con, $query) or die (mysqli_error($db));
                        while ($row = mysqli_fetch_assoc($result)) {
                          $tempcarbrand = $row['carbrand'];
                          $tempname = $row['firstname'];
                          $templname = $row['lastname'];
                          $tempcarmodel = $row['carmodel'];
                          $tempcartype = $row['cartype'];
                          $tempplate = $row['userphone'];
                          $tempmanufacture = $row['carmanufacturer'];
                          $dateregistered = $row['dt'];
                          $tempserial = $row['carserialnumber'];
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
              <h4 class="m-2 font-weight-bold text-primary">Vehicle's Detail</h4>
            </div>
            <a href="../vehicle-user.php?editId=<?php echo $tempid; ?>" type="button" class="btn btn-primary bg-gradient-primary btn-block"> <i class="fas fa-flip-horizontal fa-fw fa-share"></i> Back </a>
            <div class="card-body">
          

                
                    <div class="form-group row text-left">
                      <div class="col-sm-3 text-primary">
                        <h5>
                          Owner<br>
                        </h5>
                      </div>
                      <div class="col-sm-9">
                        <h5>
                          : <?php echo $tempname  ?><?php echo " ",$templname  ?> <br>
                        </h5>
                      </div>
                     
                    </div>
                    <div class="form-group row text-left">
                      <div class="col-sm-3 text-primary">
                        <h5>
                          Plate Number<br>
                        </h5>
                      </div>
                      <div class="col-sm-9">
                        <h5>
                          : <?php echo $tempplate?><br>
                        </h5>
                      </div>
                     
                    </div>
                     <div class="form-group row text-left">
                      <div class="col-sm-3 text-primary">
                        <h5>
                          Serial Number<br>
                        </h5>
                      </div>
                      <div class="col-sm-9">
                        <h5>
                          : <?php echo $tempserial; ?> <br>
                        </h5>
                      </div>
                    </div>
                    <div class="form-group row text-left">
                      <div class="col-sm-3 text-primary">
                        <h5>
                          Brand<br>
                        </h5>
                      </div>
                      <div class="col-sm-9">
                        <h5>
                          : <?php echo $tempcarbrand; ?> <br>
                        </h5>
                      </div>
                    </div>
                    <div class="form-group row text-left">
                      <div class="col-sm-3 text-primary">
                        <h5>
                          Model<br>
                        </h5>
                      </div>
                      <div class="col-sm-9">
                        <h5>
                          : <?php echo $tempcarmodel; ?> <br>
                        </h5>
                      </div>
                    </div>
                    <div class="form-group row text-left">
                      <div class="col-sm-3 text-primary">
                        <h5>
                          Type<br>
                        </h5>
                      </div>
                      <div class="col-sm-9">
                        <h5>
                          : <?php echo $tempcarmodel; ?> <br>
                        </h5>
                      </div>
                    </div>
                      <div class="form-group row text-left">
                      <div class="col-sm-3 text-primary">
                        <h5>
                          Manufacturer<br>
                        </h5>
                      </div>
                      <div class="col-sm-9">
                        <h5>
                          : <?php echo $tempmanufacture; ?> <br>
                        </h5>
                      </div>
                    </div>
                  
                    <div class="form-group row text-left">
                      <div class="col-sm-3 text-primary">
                        <h5>
                          Date Registered<br>
                        </h5>
                      </div>
                      <div class="col-sm-9">
                        <h5>
                          : <?php echo $dateregistered; ?> <br>
                        </h5>
                      </div>
                    </div>
                  
                   
                     <div class="table-responsive">
                 <table class="table table-borderless" id="dataTable" width="100%" cellspacing="0"> 
                  <thead>
                        <tr>
                          <th width="100%" class="text-center col-sm-3 text-primary"> <h5>
                          Services<br>
                        </h5></th>
                         
                         
                        </tr>
                     </thead>
                    <tbody>
                <?php                  
                 $sql21 = "SELECT SUM(transact1) FROM transacttable WHERE custid = $tempid";
                    $result21 = mysqli_query($con, $sql21) or die(mysqli_error($db));

                  while ($row = mysqli_fetch_array($result21)) {


                    $sumlabor = $row['SUM(transact1)'];
                      }
                        $query = "SELECT * FROM transaction_table JOIN transacttable on transaction_table.transaction_id = transacttable.transid WHERE transaction_user_id = '$tempid';";
                        $result = mysqli_query($con, $query) or die (mysqli_error($db));
                        while ($row = mysqli_fetch_assoc($result)) {
                           $tempname = $row['name'];
                           $tempcoder = $row['encoder'];
                           $total = $row['transact1'];
                           $date = $row['transact_sched'];
                           $stats = $row['status'];
                        echo '<tr>';

                        echo "<td>";
                        echo '<div class="col-sm-9"><h5>';
                        echo ''.$tempname.'';
                       
                        echo '<br></h5></div>';
                         echo '<div class="col-sm-9 col-sm-3 text-secondary"><h5>';
                        echo ''.$tempcoder.'';
                       
                        echo '<br></h5></div>';
                        echo "</td>";
                        echo '</tr> ';
                        }
                    ?> 
                    
                                    
                    </tbody>
                </table>
                            </div>
                            <div class="form-group row text-left">
                      <div class="col-sm-3 text-primary">
                        <h5>
                          Total<br>
                        </h5>
                      </div>
                      <div class="col-sm-9">
                        <h5>
                          : ₱ <?php echo number_format($sumlabor, 2); ?>
 <br>
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
                          : <?php echo $stats; ?> <br>
                        </h5>
                      </div>
                    </div>

                      </div>
                    </div>

          </div>
          </div>
  
</html>