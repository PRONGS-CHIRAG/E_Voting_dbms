<?php 
$s_name = "localhost";
$username = "root";
$password = "";
$connection = mysqli_connect($s_name,$username,$password,"e_voting");
if(!$connection)
{
        echo "not connected";
}
else{

echo ("you are in nomination.php");
echo "</br>";
$v_id = $_POST["v_id"];
$p_id = $_POST["p_id"];
$con_id = $_POST["con_id"];
$query = "select AD_ID from constituency where con_id = '$con_id';";
$qr = mysqli_query($connection,$query);
$row = mysqli_fetch_assoc($qr);
$ad_id=$row["AD_ID"];

$date = date("Y-m-d");
// echo $v_name,$v_id;
$query = "insert into nominee values ('$ad_id','$p_id','$v_id','$con_id',50000,'$date',0);" ;

$qr = mysqli_query($connection,$query);

if($qr)
{
    echo "inserted";
}
}
?>
<html>
<body>
    <button><a href="index.html">Home</a></button>
<?php
?>