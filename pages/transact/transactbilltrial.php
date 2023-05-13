
<!doctype html>
<html lang="en-US">

<head>

  <meta charset="UTF-8">

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
  <meta name="description" content="Address Book">
  <meta name="keywords" content="PHP CRUD, CRUD with search and pagination, bootstrap 4, PHP">
  <meta name="robots" content="index,follow">
  <title>Address Book</title>
    <link rel="shortcut icon" href="https://demo.learncodeweb.com/favicon.ico">
    <link rel="stylesheet" href="../../hehe/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="../../https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../../hehe/all.css">
  <link rel="stylesheet" type="text/css" href="../../hehe/bootstrap.min.css">
  <script src="../../hehe/jquery.min.js"></script>
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
    xmlhttp.open("GET","helper.php?value="+str, true);
    xmlhttp.send();
  }
</script>
</head>

<body class="bg-dark">
  <?php 
  include_once('../../include/config.php');
  include_once('../../include/config2.php');
  $tempid = $_GET['editId'];
$sqlerr = "SELECT * FROM employee ";
$resulterr = mysqli_query($con, $sqlerr) or die ("Bad SQL: $sql2");
if($resulterr->num_rows>0){
  $options = mysqli_fetch_all($resulterr,MYSQLI_ASSOC);
}
$sqltransid  = "SELECT transid FROM transacttable ORDER BY transid DESC LIMIT 1";

$resulttransid = $con->query($sqltransid);
             while($row = $resulttransid->fetch_assoc()) {
                echo "<tr>";
            
        
            $tempo = $row['transid'];
            $temporaryid = $tempo +1;
               
  }


$sql2 = "SELECT * FROM employee ORDER by employee_fname ASC";
$result2 = mysqli_query($con, $sql2) or die ("Bad SQL: $sql2");
$sqltransaction= "SELECT * FROM transaction_table WHERE car_id_labor ='$tempid'";
$sup = "<select class='form-control' id='product_encoder[]' name='product_encoder[]'>
        <option disabled selected>Select Mechanic</option>";
  while ($row = mysqli_fetch_assoc($result2)) {
    $sup .= "<option value='".$row['employee_fname']."'>".$row['employee_fname']."</option>";
  }

$sup .= "</select>";
  ?>

<div class="container">
    <div class="row my-3">
      <div class="col-lg-13 ">
        <div class="card shadow">
          <div class="card-header">
            <h4>JOB ORDER</h4>
          </div>
          <div class="card-body p-4">]
           <div class="row">
            <div class="col-md-4 mb-3">
                      <label style="font-weight: bold;">Customer</label>
                    <input type = "number" name="product_rate[]" class="form-control" placeholder="Customer" required>
                  </div>
                  
                   <div class="col-md-5 mb-3">
                    <label style="font-weight: bold;">Vehicle</label>
                    <input type = "number" name="product_hour[]" class="form-control" placeholder="Hour" required>
                  </div>                  
                  <div class="col-md-2 mb-3">
                    <label style="font-weight: bold;">Number</label>
                    <input type = "text" name="product_price[]" class="form-control" placeholder="Trans Num" required>
                  </div>
           </div>
           
           
           
          </div>
        </div>
    </div>


    
  </div>
</div>

  <div class="container">
    <div class="row my-4">
      <div class="col-lg-13 mx-auto">
        <div class="card shadow">
          <div class="card-header">
            <h4>Labor</h4>
          </div>
          <div class="card-body p-4">
           
           
            <div id ="show_alert"></div>
            <form action ="#" method="POST" id ="add_form">
              <div id="show_item">
                 <hr >
                <div class="row">

                  <div class="col-md-4 mb-3">
                  <label style="font-weight: bold;">Labor Type</label>
                   <select class='form-control' id="SelectA"  name='product_category[]' onchange="my_fun(this.value);">
                  <option disabled selected>Select Type of Service</option>
                  <option value ="PREVENTIVE MAINTENANCE SERVICE">PREVENTIVE MAINTENANCE SERVICE</option>
                  <option value ="AIRCON SERVICES">AIRCON SERVICES</option>
                  <option value ="ELECTRICAL SERVICES">ELECTRICAL SERVICES</option>
                  <option value ="MAJOR WORK">MAJOR WORK</option>
                  <option value ="UNDERCHASSIS WORK">UNDERCHASSIS WORK</option>
                  <option value ="COOLING SYSTEM RESTORATION">COOLING SYSTEM RESTORATION</option>
                  <option value ="OTHERS">OTHERS</option>

                  </select>

                  </div>

                  <div id="poll" class="col-md-5 mb-3">
                     <label style="font-weight: bold;">Labor</label>
                    <select class='form-control'>
                 <option>Services</option>
                  </select>
         
                
                  </div>
                  <div class="col-md-3 mb-3">
                    <label style="font-weight: bold;">Mechanic</label>
                       <select name='product_encoder[]' class='form-control'>
                         <option>Select Employee</option>
                         <?php foreach ($options as $options){ ?> 
                          <option><?php echo $options['employee_fname']; ?></option>
                          <?php }?>
                       </select>
                  </div>
                 
                     <div class="col-md-2 mb-3">
                      <label style="font-weight: bold;">Rate</label>
                    <input type = "number" name="product_rate[]" class="form-control" placeholder="Rate" required>
                  </div>
                  
                   <div class="col-md-2 mb-3">
                    <label style="font-weight: bold;">Hour</label>
                    <input type = "number" name="product_hour[]" class="form-control" placeholder="Hour" required>
                  </div>                  
                  <div class="col-md-2 mb-3">
                    <label style="font-weight: bold;">Price</label>
                    <input type = "number" name="product_price[]" class="form-control" placeholder="Price" required>
                  </div>


                  <div  class="col-md-3 mb-3">
                    <input type = "number" hidden name="product_transact[]" value = "<?php echo $temporaryid ?>"class="form-control" placeholder=" Transaction Number" required>
                  </div>
                  <div hidden class="col-md-3 mb-3">
                    <input type = "number" name="product_qty[]" value = "<?php echo $tempid ?>"class="form-control" placeholder=" Item Quantity" required>
                  </div>
                 
                </div>
              </div>
              <hr >
              <div>
                 <div class="float-right">
                   
                  </div>
                <input type="submit" name="" value="Add" class="btn btn-primary w-25 float-right" id="add_btn">
              </div>
            </form>
          </div>
        </div>
    </div>



  </div>
</div>

<br>


  <script>
    <?php 
    $sqlerr = "SELECT * FROM employee ";
$resulterr = mysqli_query($con, $sqlerr) or die ("Bad SQL: $sql2");
if($resulterr->num_rows>0){
  $options = mysqli_fetch_all($resulterr,MYSQLI_ASSOC);
}
    ?>
    $(document).ready(function(){
    
      $(".add_item_btn").click(function(e){
        e.preventDefault();
        $("#show_item").prepend(' <div class="row append_item"><div class="col-md-4 mb-3"><select class="form-control" id="SelectA"  name="product_category[]" onchange="my_fun(this.value);"><option disabled selected>Select Type of Service</option><option value ="PREVENTIVE MAINTENANCE SERVICE">PREVENTIVE MAINTENANCE SERVICE</option><option value ="AIRCON SERVICES">AIRCON SERVICES</option><option value ="ELECTRICAL SERVICES">ELECTRICAL SERVICES</option><option value ="MAJOR WORK">MAJOR WORK</option><option value ="UNDERCHASSIS WORK">UNDERCHASSIS WORK</option><option value ="COOLING SYSTEM RESTORATION">COOLING SYSTEM RESTORATION</option><option value ="OTHERS">OTHERS</option></select></div><div id="poll" class="col-md-5 mb-3"><select class="form-control"><option>Services</option></select></div><div class="col-md-3 mb-3"><select name = "product_encoder" class="form-control"><option>Select Mechanic</option> <?php foreach ($options as $options){ ?><option><?php echo $options['employee_fname']; ?></option><?php }?> </select> </div><div class="col-md-2 mb-3"><input type = "number" name="product_rate[]" class="form-control" placeholder="Rate" required></div><div class="col-md-2 mb-3"><input type = "number" name="product_hour[]" class="form-control" placeholder="Hour" required></div><div class="col-md-2 mb-3"><input type = "number" name="product_price[]" class="form-control" placeholder="Price" required></div><div hidden class="col-md-3 mb-3"><input type = "number" name="product_qty[]" value = "<?php echo $tempid ?>"class="form-control" placeholder=" Item Quantity" required></div><div class="col-md-2 mb-3 d-grid"><button class="btn btn-danger remove_item_btn">Remove</button></div></div>');
      });
      $(document).on('click','.remove_item_btn', function(e){
        e.preventDefault();
        let row_item = $(this).parent().parent();
        $(row_item).remove();
      });
      $("#add_form").submit(function(e){
        e.preventDefault();
        $("#add_btn").val('Adding...');
        $.ajax({
          url: 'action.php?editId=<?php echo $tempid ?>',
          method: 'post',
          data: $(this).serialize(),
          success: function(response){
            $("#add_btn").val('Add');
            $("#add_form")[0].reset();
            $(".append.item").remove();
            $("#show_alert").html(`<div class="alert alert-success" role="alert">${response} </div>`);

          }
        });
      });
    });
  </script>































 <style>
.footer {
  position: fixed;
  left: 0;
  bottom: 0;
  width: 100%;
  background-color: Black;
  color: white;
  text-align: center;
}
</style>

<style>
  .header {
    position: relative;
    left: 0;
    Top: 0;
    width: 100%;
    background-color: Black;
    color: white;
    text-align: center;
  }
  </style>

     
    
 

    

  
    
     <script src="../../hehe/jquery.min.js"></script>
    


    
    
</body>

</html>