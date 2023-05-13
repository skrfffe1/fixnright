
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
    $temp = $_REQUEST['editId'];
?>

 <script>  
window.onload = function() {  

  // ---------------
  // basic usage
  // ---------------
  var $ = new City();
  $.showProvinces("#userprovince");
  $.showCities("#usercity");

  // ------------------
  // additional methods 
  // -------------------

  // will return all provinces 
  console.log($.getProvinces());
  
  // will return all cities 
  console.log($.getAllCities());
  
  // will return all cities under specific province (e.g Batangas)
  console.log($.getCities("Batangas")); 
  
}
</script>
<?php
include_once('../../include/config.php');
  include_once('../../include/config2.php');
  include '../../include/client/sidebar.php';
  
?>

<link rel="stylesheet" href="../../assets/toastr/toastr.min.css">
    <link rel="stylesheet" type="text/css" href="../../assets/datatables/datatables.min.css" />



    <script src="includes/assets/js/jquery.min.js"></script>
    <script src="includes/assets/js/chart.min.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-moment@^1"></script> -->
    <script src="includes/js/bootstrap.bundle.min.js"></script>
    <script src="includes/assets/js/moment.min.js"></script>
    <script src="includes/assets/toastr/toastr.min.js"></script>
    <script type="text/javascript" src="includes/assets/datatables/datatables.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/jquery.caret/0.1/jquery.caret.js"></script>
  <script src="https://www.solodev.com/_/assets/phone/jquery.mobilePhoneNumber.js"></script>




<!doctype html>

<html lang="en-US">

<head>

  <meta charset="UTF-8">

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
  
  <meta name="robots" content="index,follow">



    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">



</head>



<body>

      
            <div class="card shadow mb-4">
            <div class="card-header py-3">
               <ul class="nav nav-tabs">
                       
                             
                             



  <li class="nav-item">
                                <a class="nav-link m-2 font-weight-bold text-primary"  href="#collapseCardExample" data-toggle="collapse"
                                    role="button" aria-expanded="true" aria-controls="collapseCardExample" > <h4 class="m-2 font-weight-bold text-primary">Customer</h4></a>
                              </li>


                              <li class="nav-item">
                                <a class="nav-link m-2 font-weight-bold text-primary " href="customer-car.php?editId=<?php echo $temp;?>"><h4 class="m-2 font-weight-bold text-primary">Vehicle</h4></a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link m-2 font-weight-bold text-primary " href="customer-transact.php?editId=<?php echo $temp;?>"><h4 class="m-2 font-weight-bold text-primary">Transaction</h4></a>
                              </li>
                              
                            </ul>


                                <div class="collapse show" id="collapseCardExample">
                                    <div class="card-body">
                                       This Is CuStomer 
                                    </div>
                                </div>

            
            </div>
            
            
          </div>
       

              


        
              


         

  


</body>

<script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="jquery.dataTables.min.js"></script>
  <script src="dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="datatables-demo.js"></script>
  <script src="city.js"></script> 
  
</html>