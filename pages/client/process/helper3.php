<?php
$con=mysqli_connect('localhost','root','','test');

if(mysqli_connect_errno())
{
    echo 'Failed to connect '.mysqli_connect_error();
}

$val = $_GET["value"];
$val_M = mysqli_escape_string($con,$val);
$sql = "SELECT * FROM product_inventory WHERE p_name = '$val_M'";
$result = mysqli_query($con,$sql);
if(mysqli_num_rows($result)>0){
    echo "<label style='font-weight: bold;'>Price</label>";
    echo "<select class='form-control'  name='itemname[]'>";
    while($rows = mysqli_fetch_assoc($result)){
        echo "<option>".$rows["p_price"]."</option>";
    }
    echo "</select>";



}

?>
