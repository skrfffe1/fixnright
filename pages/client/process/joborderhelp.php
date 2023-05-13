<?php
$con=mysqli_connect('localhost','root','','test');

if(mysqli_connect_errno())
{
    echo 'Failed to connect '.mysqli_connect_error();
}

$val = $_GET["value"];
$val_M = mysqli_escape_string($con,$val);
$sql = "SELECT * FROM services WHERE service_category = '$val_M'";
$result = mysqli_query($con,$sql);
if(mysqli_num_rows($result)>0){
    echo "<label style='font-weight: bold;'>Labor</label>";
    echo "<select class='form-control' id='product_name[]' name='product_name[]'>";
    while($rows = mysqli_fetch_assoc($result)){
        echo "<option>".$rows["service_name"]."</option>";
    }
    echo "</select>";
    



}

?>
