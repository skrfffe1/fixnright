
<?php
 include '../process/sessions_view.php';

?>

 <script>  
window.onload = function() {  

  // ---------------
  // basic usage
  // ---------------
  var $ = new City();
  $.showProvinces("#s_province");
  $.showCities("#s_city");

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

  $temps = $_GET['editId'];
 
   
  $result = mysqli_query($con,"SELECT * from service_category WHERE service_id = $temps;");
  $row = mysqli_fetch_array($result);

?>

<!doctype html>

<html lang="en-US">

<head>

  <meta charset="UTF-8">

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
  <meta name="description" content="PHP CRUD with search and pagination in bootstrap 4">
  <meta name="keywords" content="PHP CRUD, CRUD with search and pagination, bootstrap 4, PHP">
  <meta name="robots" content="index,follow">
  <title>PHP CRUD with search and pagination in bootstrap 4</title>


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">



</head>



<body>

  <div class="container">
  

   <center><div class="card shadow mb-4 col-xs-12 col-md-8 border-bottom-primary">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Edit Service</h4>
            </div><a  type="button" class="btn btn-primary bg-gradient-primary btn-block" href="../service.php "> <i class="fas fa-flip-horizontal fa-fw fa-share"></i> Back </a>
            <div class="card-body">
         
            <form name="frmUser" method="post" action="../process/process.php">
               <div> 
        
    </div>
              <input type="hidden" name="service_id" value="<?php echo $temps; ?>" />
              <div class="form-group row text-left  font-weight-bold">
                <div class="col-sm-3" style="padding-top: 5px;">
                Service Category
                </div>
                <div class="col-sm-9">
                  <input type="text" name="service_name"  class="form-control" value="<?php echo $row['service_name']?>" required>
                   <input hidden type="text" name="service_name1"  class="form-control" value="<?php echo $row['service_name']?>" required>
                </div>
              </div>
              
               
              
             
              <hr>
                <button type="submit" name="updateservicecategory" value="submit"  class="btn btn-warning btn-block"><i class="fa fa-edit fa-fw"></i>Update</button> 
              </form>  
          </div>
  </div>
  </div>

    

  

</body>
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