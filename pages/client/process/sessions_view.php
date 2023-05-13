
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
include_once'../../../include/config.php';
include_once'../../../include/config2.php';
include'../../../include/client/sidebar-alternative.php';

?>

  <script src="../css/city.js"></script> 
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

