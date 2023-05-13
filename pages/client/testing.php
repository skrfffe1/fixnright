<?php
  include 'process/session.php';
?>
<?php

if(isset($_GET['book'])){
$book_id = $_GET['book'];
$sql1 = "select * from booking where equipment_id='$book_id'";
$query = $con->query($sql1);
$dates_ar = [];
}

if($query->num_rows>0) {
    while ($r=$query->fetch_array()) {
        $begin = new DateTime( $r["date"] );
        $end = new DateTime( $r["return_date"] );
        $end = $end->modify( '+1 day' ); 
        $interval = new DateInterval('P1D');
        $daterange = new DatePeriod($begin, $interval ,$end);
        foreach ($daterange as $date) {
        $dates_ar[] = $date->format("Y-m-d");
    }
}
}
?>

<script type="text/javascript"> 
$(function () {

    var disabledDate = <?php echo json_encode($dates_ar)?>;

    $('#date').datetimepicker({

    disabledDates: disabledDate,
    minDate:new Date()

    });

});

</script>

<?php
include ('footer.php');
 ?>