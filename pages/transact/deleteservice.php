<?php 

include_once('../../include/config.php');
include_once('../../include/config2.php');
if(isset($_REQUEST['delId']) and $_REQUEST['delId']!=""){
$temp = $_REQUEST['delId'];
$sql = "SELECT * FROM transaction_table WHERE   transaction_table.id = '$temp'";
$result = $con->query($sql);
             while($row = $result->fetch_assoc()) {
              $formerid = $row['transaction_id'];
 
           
  }
   
	$db->delete('transaction_table',array('id'=>$_REQUEST['delId']));
	 header('Location: joborder2.php?editId=' . $formerid); 
	
}

?>
