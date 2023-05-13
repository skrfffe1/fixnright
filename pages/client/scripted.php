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