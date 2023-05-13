<?php
  session_start();

  if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: ../../login/login.php');
  }
  if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: ../../login/login.php");
  }
?>


<?php include_once('../../include/config.php');
  include_once('../../include/config2.php');
  include '../../include/client/sidebar.php';
if(isset($_REQUEST['editId']) and $_REQUEST['editId']!=""){

  $row  = $db->getAllRecords('users','*',' AND id="'.$_REQUEST['editId'].'"');
  $productrow = $db->getAllRecords('product1','*',' AND product_quantity="'.$_REQUEST['editId'].'"');
$userCount  = $db->getQueryCount('cardata',$temp);

}



$sql10 = "SELECT * from cardata WHERE cardata.plateid = $tempcode;";
$sql11 = "SELECT * from users WHERE users.id = $tempcode;";
      
        $pages->default_ipp =   15;
        $sql    = $db->getRecFrmQry("SELECT * FROM cardata WHERE cardata.plateid = $tempcode");
        $pages->items_total =   count($sql);
        $pages->mid_range   =   9;
        $pages->paginate(); 
  $userData   =   $db->getRecFrmQry("SELECT * FROM cardata WHERE cardata.plateid = $tempcode; ORDER BY id DESC ".$pages->limit."");

?>

<!doctype html>

<html lang="en-US">

<head>

  <meta charset="UTF-8">

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
  <meta name="description" content="PHP CRUD with search and pagination in bootstrap 4">
  <meta name="keywords" content="PHP CRUD, CRUD with search and pagination, bootstrap 4, PHP">
  <meta name="robots" content="index,follow">
  <title>Services</title>
  <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
  <link href="vendor/css/bootstrap.min.css" rel="stylesheet" media="all">
  <link href="../../assets/theme.css" rel="stylesheet" media="all">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
   </head>
  <body class="animsition">
    
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1"> </h2>
                                    <button class="au-btn au-btn-icon au-btn--green">
                                   <a href="customer_car.php?editId=<?php echo $tempcode;?>">     <i class="zmdi zmdi-car"></i>Add Car</button></a>
                                </div></div>
                        </div>
                       
                        
                        <div class="row">
                            <div class="col-lg-12">
                                <h2 class="title-1 m-b-25">My Information</h2>
                                <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Email</th>
                                                <th class="text-right">Phone Number</th>
                                                <th class="text-right">Options</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                        $result11 = $con->query($sql11);
                                                     while($row = $result11->fetch_assoc()) {
                                                        echo "<tr>";
                                                      echo "<td>".$row['firstname']."</td>";
                                                      echo "<td>".$row['lastname']."</td>";
                                                      echo "<td>".$row['useremail']."</td>";
                                                      echo "<td>".$row['userphone']."</td>";
                                                      echo "<td><i class='fas fa-fw fa-user'></i><a href='client-account.php'<button>Settings</button></a></td>";
                                                    
                                            }?>
                                           </tbody>
                                    </table>
                                <h2 class="title-1 m-b-25">Car's List</h2>
                                <div class="table-responsive table--no-card m-b-40">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>Plate Number</th>
                                                <th>Car Brand</th>
                                                <th>Car Model</th>
                                                <th class="text-right">Car Producer</th>
                                                <th class="text-right">Date</th>
                                                <th class="text-right">Options</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                          <?php 
                    if(count($userData)>0){
                        $s  =   '';
                        foreach($userData as $val){
                            $s++;
                    ?>
                    <tr>
                        
                        <td><?php echo $val['userphone'];?></td>
                        <td><?php echo $val['carbrand'];?></td>
                        <td><?php echo $val['carmodel'];?></td>
                        <td><?php echo $val['carmanufacturer'];?></td>
                        <td><?php echo $val['dt'];?></td>

                        <td>


                            <div class="btn-group">
                              <a type="button" class="btn btn-primary bg-gradient-primary dropdown no-arrow" data-toggle="dropdown" style="color:white;">
                              ... <span class="caret"></span></a>
                            <ul class="dropdown-menu text-center" role="menu">
                                 <!-- <li>
                                  <a type="button" class="btn btn-warning bg-gradient-success btn-block" style="border-radius: 0px;" href="pages/services/services.php?editId=<?php echo $val['id'];?>">
                                    <i class="fas fa-fw fa-edit"></i> Services
                                  </a>
                                </li> -->
                                <li>
                                  <a type="button" class="btn btn-warning bg-gradient-warning btn-block" style="border-radius: 0px;" href="pages/user-delete/user-edit.php?editId=<?php echo $val['id'];?>">
                                    <i class="fas fa-fw fa-edit"></i> Edit
                                  </a>
                                </li>
                                <li>
                                  <a type="button" class="btn btn-warning bg-gradient-danger btn-block" style="border-radius: 0px;" href="pages/user-delete/delete.php?delId=<?php echo $val['id'];?>">
                                    <i class="fas fa-fw fa-edit"></i> Delete
                                  </a>
                                </li>
                            </ul>

                            </div></td>
                        

                    </tr>
                    <?php 
                        }
                    }else{
                    ?>
                    <tr><td colspan="5" align="center">No Record(s) Found!   <a href="customer_car.php?editId=<?php echo $tempcode;?>">Click Here</a></td></tr>

                    <?php } ?> 
                                           </tbody>
                                    </table></div></div></div></div></div></div>  
















  


    <script src="vendor/jquery-3.2.1.min.js"></script>
     <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
     </script>
    <script src="vendor/css/main.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/jquery.caret/0.1/jquery.caret.js"></script>
  <script src="https://www.solodev.com/_/assets/phone/jquery.mobilePhoneNumber.js"></script>
  <script>
    $(document).ready(function() {
    jQuery(function($){
        var input = $('[type=tel]')
        input.mobilePhoneNumber({allowPhoneWithoutPrefix: '+1'});
        input.bind('country.mobilePhoneNumber', function(e, country) {
        $('.country').text(country || '')
        })
       });
    });
  </script>
    

</body>

</html>