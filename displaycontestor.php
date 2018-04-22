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

    $con_id = $_POST["con_id"];
    $query = "select c_id from contestor where con_id = '$con_id'";
    $qr = mysqli_query($connection,$query);

    $query1 = "select con_name from constituency where con_id = '$con_id'";
    $qr1 = mysqli_query($connection,$query1);
    $con_name = mysqli_fetch_array($qr1);

    // $row = mysqli_fetch_assoc($qr);

    echo "<h1>Contestors in ".$con_name[0]."</h1>";
    echo "Contestor's Voter Id"."   "."Contestor Name</br>";
    while($row = mysqli_fetch_array($qr))
    {
        // echo $row[0];
        $query2 = "select v_name from voter_info where v_id = '$row[0]'";
        $qr2 = mysqli_query($connection,$query2);
        $v_name = mysqli_fetch_array($qr2);
        echo $row[0]."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp ".$v_name[0];
    }
    session_start();
    $ad_id=$_SESSION["ad_id"];
    session_destroy();
    ?>
    <form action=admin.php method = "POST">
    <input type="submit" name="ad_id" value="<?php echo $ad_id; ?>"/>
    </form>
    <button><a href="index.html">Home</a></button>
    <?php
}
?>
