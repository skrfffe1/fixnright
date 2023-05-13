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
  $complete = "Completed";
  $pendingc= "Pending";
  $rejectc = "Rejected";
  $approvedc = "Approved";
?>


<?php include_once('../../include/config.php');
  include_once('../../include/config2.php');
  include '../../include/client/sidebar.php';
if(isset($_REQUEST['editId']) and $_REQUEST['editId']!=""){

  $row  = $db->getAllRecords('users','*',' AND id="'.$_REQUEST['editId'].'"');
  $productrow = $db->getAllRecords('product1','*',' AND product_quantity="'.$_REQUEST['editId'].'"');
$userCount  = $db->getQueryCount('cardata',$temp);

}



$sql2 = " SELECT  * FROM   users  JOIN transacttable ON users.id = transacttable.custid WHERE transacttable.status ='Completed' ";
      



if(isset($_REQUEST['submit']) and $_REQUEST['submit']!=""){

  extract($_REQUEST);

  if($username==""){

    header('location:'.$_SERVER['PHP_SELF'].'?msg=un&editId='.$_REQUEST['editId']);

    exit;

  }elseif($useremail==""){

    header('location:'.$_SERVER['PHP_SELF'].'?msg=ue&editId='.$_REQUEST['editId']);

    exit;

  }elseif($userphone==""){

    header('location:'.$_SERVER['PHP_SELF'].'?msg=up&editId='.$_REQUEST['editId']);

    exit;

  }
  

  $data = array(

          'username'=>$username,

          'useremail'=>$useremail,

          'userphone'=>$userphone,


          );

  $update = $db->update('users',$data,array('id'=>$editId));

  if($update){

    header('location: index.php?msg=rus');

    exit;

  }else{

    header('location: index.php?msg=rnu');

    exit;

  }

}

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


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">


</head>



<body>

  

  

    <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Complete Transactions</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> 
               <thead>
                   <tr>
                     <th width="10%">Status</th>
                     <th width="15%">Customer's Name</th>
                    
                     <th width="13%">Total Price</th>
                     <th width="20%">Date</th>
                     <th width="11%">Action</th>
                   </tr>
               </thead>
          <tbody>
  <?php 
$result2 = $con->query($sql2);
             while($row = $result2->fetch_assoc()) {
                echo "<tr>";
                
           if ($row['status'] === $pendingc){


              echo "<td bgcolor='yellow' class='font-weight-bold'>".$row['status']."</td>";
             }elseif($row['status'] === $approvedc){
              echo "<td bgcolor='green' class='font-weight-bold'>".$row['status']."</td>";
             }elseif($row['status'] === $complete){
              echo "<td bgcolor='cyan' class='text-center font-weight-bold'>".$row['status']."</td>";
             }else{
                echo "<td bgcolor='red' class='text-center font-weight-bold'>".$row['status']."</td>";
             }
        
               $fn = $row['firstname'];
               $ln = $row['lastname'];
               $full = $fn . ' ' . $ln; 
               $hello = $row['transdate'];
               $mydate = strtotime($hello);
              echo "<td>".$full."</td>";
             
              echo "<td>".$row['cashtotal']."</td>";
              echo "<td>";
              echo date('F, jS, Y', $mydate);
              echo"</td>";
              
            echo '<td align="right">
            <a type="button" class="btn btn-primary bg-gradient-primary" href="joborder4.php?editId='.$row['transid'] . '"><i class="fas fa-fw fa-th-list"></i> View</a>
            </div> </td>';      
  }






  

     ?>

                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                  </div>



    

</body>

</html>