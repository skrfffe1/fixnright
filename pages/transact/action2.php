<?php
  include_once('../../include/config.php');
  include_once('../../include/config2.php');

if(isset($_REQUEST['submit']) and $_REQUEST['submit']!=""){
  extract($_REQUEST);
    $userCount  = $db->getQueryCount('transacttable','transid');

    if($userCount[0]['total']<100){

      $data = array(
              'custid'=>$custid,
              'carid'=>$carid,
               'status'=>$status,
              'transact_sched'=>$transact_sched,
              'payment_type'=>$payment_type,
              'transact_schedinfo'=>$transact_schedinfo,
                 );

      $insert = $db->insert('transacttable',$data);
      header('location:../client/booking.php');
    

    }else{

    
      exit;

    }

  }

if(isset($_POST['submitfinal']))
{
$ids = $_POST['transids'];
    mysqli_query($con, "UPDATE transacttable set cashtotal='"
      .$_POST['cashtotal'] . "', payment = '" 
      .$_POST['payment'] . "', status = '" 
      .$_POST['status'] . "', numofitem = '" 
      .$_POST['numofitem'] . "', numofmaterials = '" 
      .$_POST['numofmaterials'] . "'

      WHERE transids = '".$ids."'"  );
     header('location:transact.php');
}

?>