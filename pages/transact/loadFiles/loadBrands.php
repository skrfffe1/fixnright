<?php
  include_once('../../../include/config.php');
  include_once('../../../include/config2.php');
  $companyId = $_GET['id'];
  $qry = mysqli_query($con , "SELECT * FROM category WHERE c_id ='$companyId'");
  while ($row=mysqli_fetch_array($qry)) {
   $temporaryname = $row['c_name']; 
  }
  $qry1 = mysqli_query($con , "SELECT * FROM parts_table WHERE item_category ='$temporaryname'");
  while ($row=mysqli_fetch_array($qry)) {
   $temporaryname = $row['c_name']; 
  }
?>