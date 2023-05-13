
<footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
              <span>Copyright © TAO YUN </span>
          </div>
        </div>
  </footer>

   <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css">
   <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
   <link rel="stylesheet" type="text/css" href="css/all.css">
   <link href="css/jquery-ui.css" rel="stylesheet" />
   <script src="css/jquery-3.6.4.min.js"></script>
    <script src="css/popper.min.js"></script>
    <script src="css/bootstrap.min.js"></script>
    <script src="css/jquery-ui.min.js"></script>
    <!-- Bootstrap core JavaScript-->
      <script src="css/sweetalert.min.js"></script>
  
<?php

   if(isset($_SESSION['stats']) && $_SESSION['stats'] !='')
      {
        ?>
        <script>
          swal({
            title: "<?php echo $_SESSION['stats']; ?>",
            
            icon: "<?php echo $_SESSION['stats_code'];?>",

            button: "Close!",
          });
        </script>
        <?php
        unset($_SESSION['stats']);

      }

   if(isset($_SESSION['stats1']) && $_SESSION['stats1'] !='')
      {
        ?>
        <script>
          swal({
            title: "<?php echo $_SESSION['stats1']; ?>",
            text: "<?php echo $_SESSION['stats1_text']; ?>",
            icon: "<?php echo $_SESSION['stats1_code'];?>",
            button: "Close!",
          });
        </script>
        <?php
        unset($_SESSION['stats1']);

      }
    ?>
    <script>
$('.btndel').on('click',function(e){
   e.preventDefault();
        const href = $(this).attr('href')
  swal({
  title: 'Are you sure?',
  text: 'Record will be deleted',
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
    document.location.href = href;
  } else {
     swal({
  
  text: 'Operations has been cancelled',
  icon: "warning",
 
})
  }
});
})
 </script>
    <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../../vendor/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="css/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="css/chart-area-demo.js"></script>
    <script src="css/chart-pie-demo.js"></script>


<script src="css/jquery.dataTables.js"></script>

<script>
  $(document).ready( function () {
    $('.table').DataTable();
   });
</script>
<script>
  $(document).ready( function () {
    $('.table1').DataTable();
   });
</script>

<script>
    var array = <?php echo json_encode($dates_ar)?>;


    $('#magic').datepicker({
        beforeShowDay: function(date){
          
            var string = jQuery.datepicker.formatDate('yy-mm-dd', date);
            return [ array.indexOf(string) == -1 ]
        }
    });
</script>




