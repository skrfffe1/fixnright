   
 <?php  if (isset($_SESSION['username'])) : ?>
       


    <?php endif ?>
<?php
include_once('../../include/config.php');
  include_once('../../include/config2.php');
$tempcode = $_SESSION['id'];

 $sqlorder = "SELECT * FROM product_inventory ORDER by p_id ASC";
$resultorder = mysqli_query($con, $sqlorder) or die ("Bad SQL: $sqlorder");

$suporder = "<select class='form-control'  name='purchaseitem' onchange='my_fun(this.value);'>
        <option disabled selected>Select Item</option>";
  while ($row = mysqli_fetch_assoc($resultorder)) {
    $suporder .= "<option value='".$row['p_name']."'>".$row['p_name']."</option>";
  }

$suporder .= "</select>";
 $sqlquickie = "SELECT * FROM product_inventory ORDER by p_id ASC";
$resultquickie = mysqli_query($con, $sqlquickie) or die ("Bad SQL: $sqlquickie");

$supquickie = "<select class='form-control'  name='purchaseitem' onchange='my_fun2(this.value);'>
        <option disabled selected>Select Item</option>";
  while ($row = mysqli_fetch_assoc($resultquickie)) {
    $supquickie .= "<option value='".$row['p_name']."'>".$row['p_name']."</option>";
  }

$supquickie .= "</select>";

  $completed = "Approved";
  $rejected = "Rejected";
$sql2 = "SELECT * from transacttable WHERE custid = $tempcode;" ;


$result = $con->query($sql2);
   $rowcount = mysqli_num_rows( $result );
  

while($row = $result->fetch_assoc()) {
                                   
                                     }

 ?>
 <?php 
$sqlquery = "SELECT * FROM users WHERE id = $tempcode;";
     $result= $con->query($sqlquery);
     while($row = $result->fetch_assoc()) {
        $temp_type = $row['user_type'];
    }

     ?>
                
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="/dist/output.css" rel="stylesheet">
  <title></title>
   <style>
      marquee{
      font-size: 30px;
      font-weight: 800;
      color: #8ebf42;
      font-family: sans-serif;
      }
    </style>
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
  <script>
  
  function my_fun2(str){
    if(window.XMLHttpRequest){
      xmlhttp = new XMLHttpRequest();
    }else{
      xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange= function(){
      if(this.readyState ==4 && this.status ==200){
        document.getElementById('poll1').innerHTML = this.responseText;

      }
    }
    xmlhttp.open("GET","process/help2.php?value="+str, true);
    xmlhttp.send();
  }
</script>
</head>
<body>

<div id="content-wrapper" class="d-flex flex-column">  
  <div id="content">
   <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                     <?php

                     if ($temp_type == "admin") { ?>

                        <!-- QUICK SALE -->
                        <div id="myModal1" class="modal fade" role="dialog">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Quick Sale</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
             <form role="form" method="post" action="process/process.php">
                <div  class="form-group">
              <input  type="text" name="purchasebuyer" placeholder="Buyer" class="form-control">
              </div>
            <div hidden class="form-group">
              <input  type="text" name="purchaseid" value=<?php echo $tempcode; ?>>
              </div>  
            <div class="form-group">
              <?php echo $supquickie; ?>
              </div>        
              
               <div id="poll1" class="form-group">
             <select class='form-control'>
                 <option>Prices</option>
                  </select>
              </div> 
               <div  class="form-group">
              <input  type="number" name="purchaseamount" placeholder="Amount" class="form-control">
              </div> 
            <div hidden class="form-group">
              <input  type="text" name="purchasestatus" value="Approved">
              </div> 
              
              <hr>
            <button type="submit" name="purchaseonthespot" value="submit"  class="btn btn-success"><i class="fa fa-check fa-fw"></i>Save</button>
            <button type="reset" class="btn btn-danger"><i class="fa fa-times fa-fw"></i>Reset</button>
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>      
          </form>   
        </div>
      </div>
    </div>
</div>

<!-- END OF QUICK SALE -->

<!-- START OF JOB ORDER -->

   <div id="jobordermodal" class="modal fade" role="dialog">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">JOB ORDER</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
             <form role="form" method="post" action="process/process.php">          
               <div class="form-group">
             <input class="form-control" placeholder="Company Name" name="cname" id="s_company_name" required>
           </div>
          
            <div class="form-group">
            </div>
        
              <hr>
            <button type="submit" name="insertsupplier" value="submit" id="submit" class="btn btn-success"><i class="fa fa-check fa-fw"></i>Save</button>
            <button type="reset" class="btn btn-danger"><i class="fa fa-times fa-fw"></i>Reset</button>
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>      
          </form>  
        </div>
      </div>
    </div>
</div>

<!--END OF JOB ORDER -->

<!-- START OF JOB ORDER -->

   <div id="jobordermodal" class="modal fade" role="dialog">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">JOB ORDER</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
             <form role="form" method="post" action="process/process.php">          
               <div class="form-group">
             <input class="form-control" placeholder="Company Name" name="cname" id="s_company_name" required>
           </div>
          
            <div class="form-group">
            </div>
        
              <hr>
            <button type="submit" name="insertsupplier" value="submit" id="submit" class="btn btn-success"><i class="fa fa-check fa-fw"></i>Save</button>
            <button type="reset" class="btn btn-danger"><i class="fa fa-times fa-fw"></i>Reset</button>
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>      
          </form>  
        </div>
      </div>
    </div>
</div>

<!--END OF JOB ORDER -->


<!-- START OF JOB ORDER -->

   <div id="jobordermodal1" class="modal fade" role="dialog">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">PURCHASE ORDER</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
             <form role="form" method="post" action="process/process.php">
                <div  class="form-group">
              <input  type="text" name="purchasebuyer" placeholder="Buyer" class="form-control">
              </div>
            <div hidden class="form-group">
              <input  type="text" name="purchaseid" value=<?php echo $tempcode; ?>>
              </div>  
            <div class="form-group">
              <?php echo $suporder; ?>
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
            <button type="submit" name="purchaseonthespot" value="submit"  class="btn btn-success"><i class="fa fa-check fa-fw"></i>Save</button>
            <button type="reset" class="btn btn-danger"><i class="fa fa-times fa-fw"></i>Reset</button>
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>      
          </form>  
        </div>
      </div>
    </div>
</div>

<!--END OF JOB ORDER -->


<!-- START OF JOB ORDER -->

   <div id="jobordermodal2" class="modal fade" role="dialog">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Expense</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
              <form role="form" method="post" action="process/process.php">          
               <div class="form-group">
             <input class="form-control" placeholder="Item Spend" name="expensename"  required>
           </div>
          
            <div class="form-group">
                <input type="number" class="form-control" placeholder="Price" name="expenseprice" required>
              </div>
            <div class="form-group">
              <input type="date" class="form-control" placeholder="The day u spend money" name="expensedate" required>
            </div>
        
              <hr>
            <button type="submit" name="insertexpenses" value="submit" id="submit" class="btn btn-success"><i class="fa fa-check fa-fw"></i>Save</button>
            <button type="reset" class="btn btn-danger"><i class="fa fa-times fa-fw"></i>Reset</button>
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>      
          </form>  
        </div>
      </div>
    </div>
</div>

<!--END OF JOB ORDER -->



                          <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                           
                             <ul class="navbar-nav ">
                                            <li class="nav-item dropdown" >
                                                <a class="navbar-brand" href="#">Fix n Right Garage</a>
                                                <a class=" dropdown-toggle btn btn-primary" href="#" id="navbarDropdown"
                                                    role="button" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                     
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-left animated--fade-in"
                                                    aria-labelledby="navbarDropdown">
                                                    
                                                    <a class="btn btn-primary bg-light py-3 dropdown-item " data-toggle="modal" data-target="#jobordermodal">JOB ORDER</a>
                                                    <a class="btn btn-primary bg-light py-3 dropdown-item " data-toggle="modal" data-target="#myModal1">QUICK SALE</a>
                                                  <a class="btn btn-primary bg-light py-3 dropdown-item " data-toggle="modal" data-target="#jobordermodal1">PURCHASE ORDER</a>
                                                  <a class="btn btn-primary bg-light py-3 dropdown-item " data-toggle="modal" data-target="#jobordermodal2">EXPENSE</a>
                                                  <a class="btn btn-primary bg-light py-3 dropdown-item " data-toggle="modal" data-target="jobordermodal3">APPOINTMENT</a>
                                                   
                                                </div>
                                            </li>
                                        </ul>
                        </div>
                    </form>
                         <?php } else { ?>
                              <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                           
                            <ul class="navbar-nav ">
                                            <li class="nav-item dropdown" >
                                                <a class="navbar-brand" href="#">Fix n Right Garage</a>
                                                <a class=" dropdown-toggle btn btn-primary" href="#" id="navbarDropdown"
                                                    role="button" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                     
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-left animated--fade-in"
                                                    aria-labelledby="navbarDropdown">
                                                    <a class="btn btn-primary bg-light py-3 dropdown-item " data-toggle="modal" data-target="#jobordermodal">JOB ORDER</a>
                                                    <a class="btn btn-primary bg-light py-3 dropdown-item " data-toggle="modal" data-target="#myModal1">QUICK SALE</a>
                                                  <a class="btn btn-primary bg-light py-3 dropdown-item " data-toggle="modal" data-target="#jobordermodal1">PURCHASE ORDER</a>
                                                  <a class="btn btn-primary bg-light py-3 dropdown-item " data-toggle="modal" data-target="#jobordermodal2">APPOINTMENT</a>
                                                  <a class="btn btn-primary bg-light py-3 dropdown-item " data-toggle="modal" data-target="#">MONTHLY SALES</a>
                                                   
                                                </div>
                                            </li>
                                        </ul>
                        </div>
                    </form>
                             <?php } ?>
                  

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>
                             <?php

                     if ($temp_type == "admin") { ?>
                            <li class="nav-item dropdown no-arrow mx-1">
                             <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">3+</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Admin Alerts Center
                                </h6>

 <?php 
                                     $sql2 = "SELECT * from transacttable" ;
                                $result2 = $con->query($sql2);
                                while($row = $result2->fetch_assoc()) {
                                    $hello = $row['transact_sched'];
                                    $mydate = strtotime($hello);
                                    $transidtemp = $row['transid'];
                                     if ($row['status'] === "Pending"){
                                        echo '<a class="dropdown-item d-flex align-items-center" href="pendingjoborder.php?editId='.$transidtemp.'">';
                                        echo '<div class="mr-3">';
                                        echo '<div class="icon-circle bg-warning">';
                                        echo '<i class="fas fa-car text-white"></i>';
                                        echo '</div>';
                                        echo '</div>';
                                         echo '<div>';
                                         echo '<h6 class="font-weight-bold"></h6>';
                                         echo '<div class="small text-gray-500">';
                                         echo date('F, jS, Y', $mydate);
                                         echo '</div>';
                                         echo '<span class="font-weight-bold">Pending Request</span>';
                                         echo'</div>';

                                  
                                      
                                    }else{
                                      
                                    }
                                   
                                      }
                                    ?>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            </div>
                        </li>
                        <?php } else { ?>
                                <li class="nav-item dropdown no-arrow mx-1">
                             <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">3+</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    User Alerts Center
                                </h6>


                               
                                    <?php 
                                     $sql2 = "SELECT * from transacttable  WHERE carid = $tempcode;" ;
                                $result2 = $con->query($sql2);
                                while($row = $result2->fetch_assoc()) {
                                    $hello = $row['transact_sched'];
                                    $mydate = strtotime($hello);
                                        
                                     if ($row['status'] === "Approved"){
                                        echo '<a class="dropdown-item d-flex align-items-center" href="#">';
                                        echo '<div class="mr-3">';
                                        echo '<div class="icon-circle bg-success">';
                                        echo '<i class="fas fa-file-alt text-white"></i>';
                                        echo '</div>';
                                        echo '</div>';
                                         echo '<div>';
                                         echo '<h6 class="font-weight-bold"></h6>';
                                         echo '<div class="small text-gray-500">';
                                         echo date('F, jS, Y', $mydate);
                                         echo '</div>';
                                         echo '<span class="font-weight-bold">Request approved</span>';
                                         echo'</div>';

                                    }elseif ($row['status'] === "Rejected"){
                                         echo '<a class="dropdown-item d-flex align-items-center" href="#">';
                                        echo '<div class="mr-3">';
                                        echo '<div class="icon-circle bg-danger">';
                                        echo '<i class="fas fa-exclamation-triangle text-white"></i>';
                                        echo '</div>';
                                        echo '</div>';
                                         echo '<div>';
                                         echo '<h6 class="font-weight-bold"></h6>';
                                         echo '<div class="small text-gray-500">';
                                         echo date('F, jS, Y', $mydate);
                                         echo '</div>';
                                         echo '<span class="font-weight-bold">Request Rejected</span>';
                                         echo'</div>';

                                    }else{
                                      
                                    }
                                   
                                      }
                                    ?>
                                
                               
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            </div>
                        </li>
                               <?php } ?>
                        <!-- Nav Item - Alerts -->
                        

                        <!-- Nav Item - Messages -->
                        

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">...</span>
                                <img class="img-profile rounded-circle"
                                    src="../../assets/img/undraw_profile.svg">
                            </a>

                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="../../login/logout.php">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                                <div class="dropdown-divider"></div>
                              
                            </div>
                        </li>

                    </ul>

                </nav>
      
        <div class="container-fluid">
</body>
</html>
