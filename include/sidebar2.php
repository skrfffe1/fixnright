
<!DOCTYPE html>
<html lang="en">

<head>
  <style type="text/css">
#overlay {
  position: fixed;
  display: none;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: rgba(0,0,0,0.5);
  z-index: 2;
  cursor: pointer;
}
#text{
  position: absolute;
  top: 50%;
  left: 50%;
  font-size: 50px;
  color: white;
  transform: translate(-50%,-50%);
  -ms-transform: translate(-50%,-50%);
}
</style>
<?php
$tempcode = $_SESSION['id'];


$sqlquery = "SELECT * FROM users WHERE id = $tempcode;";
     $result= $con->query($sqlquery);
     while($row = $result->fetch_assoc()) {
        $temp_type = $row['user_type'];
    }
  
 ?>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="/dist/output.css" rel="stylesheet">

  <title>Fix n Right System</title>
 

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
 

  <!-- Custom styles for this template-->
  <link href="assets/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<body id="page-top">
          
  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <!-- Sidebar -->
      <?php

    if ($temp_type == "admin") { ?>
<ul class="navbar-nav bg-dark sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-cogs"></i>
                </div>
                <div class="sidebar-brand-text mx-3">FixnRight <sup></sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="client-home.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Components</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Components:</h6>
                        <a class="collapse-item" href="../../pages/client/home.php">Booking</a>
                         <a class="collapse-item" href="../../pages/client/client-bookingrequest.php">Booking Request</a>
                        <a class="collapse-item" href="../../pages/client/transact-user.php">Transactions</a>
                    </div>
                </div>
            </li>

           

            <!-- Divider -->
            <hr class="sidebar-divider">
          
            

           
            <div class="sidebar-heading">
                Addons
            </div>

                </li>
                <li class="nav-item">
                <a class="nav-link" href="../client/customer.php">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Customer</span></a>
            </li>
       

           
            
                <li class="nav-item">
                <a class="nav-link" href="../client/employee.php">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Employee</span></a>
            </li>
              <li class="nav-item">
                <a class="nav-link" href="../client/inventory.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Inventory</span></a>
            </li>
            </li>
                <li class="nav-item">
                <a class="nav-link" href="../client/supplier.php">
                    <i class="fas fa-fw fa-cogs"></i>
                    <span>Supplier</span></a>
            </li>
                <!-- Nav Item - Utilities Collapse Menu -->
                 <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsethree"
                    aria-expanded="true" aria-controls="collapsethree">
                    <i class="fas fa-fw fa-car"></i>
                    <span>Vehicles</span>
                </a>
                <div id="collapsethree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Components:</h6>
                        <a class="collapse-item" href="vehicle.php">Vehicles</a>
                        <a class="collapse-item" href="vehicle-brand.php">Vehicles Brands</a>
                        <a class="collapse-item" href="vehicle-model.php">Vehicles Model</a>
                        <a class="collapse-item" href="vehicle-type.php">Vehicles Type</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Utilities</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Utilities:</h6>
                       
                        <a class="collapse-item" href="service.php">Services</a>
                        <a class="collapse-item" href="jobs.php">Jobs</a>
                       
                        
                        <a class="collapse-item" href="account.php">Accounts</a>
                    </div>
                </div>
            </li>
           

            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
         

        </ul>


         <?php } else { ?>
 <ul class="navbar-nav bg-dark sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index2.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Fix n Right</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="../../pages/client/client-home.php">
          <i class="fas fa-fw fa-home"></i>
          <span>Home</span></a>
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Tables
      </div>
      <!-- Tables Buttons -->
      <li class="nav-item">
        <a class="nav-link" href="../../pages/client/client-profile.php">
          <i class="fas fa-fw fa-user"></i>
          <span>My Profile</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../../pages/client/booking.php">
          <i class="fas fa-fw fa-retweet"></i>
          <span>My Bookings</span></a>
      </li>
     
       <li class="nav-item">
        <a class="nav-link" href="../../pages/client/client-transaction.php">
          <i class="fas fa-fw fa-retweet"></i>
          <span>Transaction</span></a>
      </li>
     
      
     
      
      
      
     
      
    
      
      <li class="nav-item">
        <a class="nav-link" href="../../pages/client/client-account.php">
          <i class="fas fa-fw fa-users"></i>
          <span>Accounts</span></a>
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">
 <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>
      
      

    </ul>
  
       <?php } ?>
 
  

      <?php include_once 'indextopbar.php'; ?>
