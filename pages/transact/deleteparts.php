<?php 

include_once('../../include/config.php');
include_once('../../include/config2.php');
if(isset($_REQUEST['deleteId']) and $_REQUEST['deleteId']!=""){
$temp = $_REQUEST['deleteId'];
$sql = "SELECT * FROM parts_table WHERE   parts_table.item_id = '$temp'";
$result = $con->query($sql);
             while($row = $result->fetch_assoc()) {
              $formerid = $row['item_transaction_id'];
 
           
  }
   
	$db->delete('parts_table',array('item_id'=>$_REQUEST['deleteId']));
	 header('Location: joborder2.php?editId=' . $formerid); 
	
}

?>
