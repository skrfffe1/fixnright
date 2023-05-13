<?php 

include_once('../../../include/config.php');
include_once('../../../include/config2.php');
if(isset($_REQUEST['delId']) and $_REQUEST['delId']!=""){
$temp = $_REQUEST['delId'];
$sql = "SELECT * FROM services WHERE   services.service_jd = '$temp'";
$result = $con->query($sql);
             while($row = $result->fetch_assoc()) {
            }
   
	$db->delete('services',array('service_jd'=>$_REQUEST['delId']));
	 header('Location: ../service.php'); 
	
}

?>
