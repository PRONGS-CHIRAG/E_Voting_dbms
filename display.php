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

    $v_id = $_SESSION["v_id"];
    $query = "select con_id from voter_info where v_id = '$v_id'";
    $qr = mysqli_query($connection,$query);
    $row = mysqli_fetch_array($qr);
    $con_id=$row[0];

    $query1 = "select p_id,v_id from nominee where con_id = '$con_id' and eligible = 1;";
    $qr1 = mysqli_query($connection,$query1);
    // $row2 = mysqli_fetch_array($qr1);

    $query2 = "select con_name from constituency where con_id = '$con_id'";
    $qr2 = mysqli_query($connection,$query2);
    $con_name = mysqli_fetch_array($qr2);

    $row = mysqli_fetch_assoc($qr);
    $sn = 1;
    echo "<h1>Welcome for Voting in ".$con_name[0]."</h1>";
    echo "Serial No"."&nbsp&nbsp&nbsp"."Contestor Name &nbsp&nbsp&nbsp </br>"."Party Name";
    while($row1 = mysqli_fetch_array($qr1))
    {
        // echo $row[0];
        $query2 = "select v_name from voter_info where v_id = '$row1[1]'";
        $qr2 = mysqli_query($connection,$query2);
        $v_name = mysqli_fetch_array($qr2);
        $query3 = "select p_name from party where p_id = '$row1[0]'";
        $qr3 = mysqli_query($connection,$query2);
        $p_name = mysqli_fetch_array($qr2);
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
