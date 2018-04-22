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

    $v_id = $_POST["v_id"];
    $query = "select v_id,v_name,aadhar,dob,gender,address  from voter_info where v_id = '$v_id'";
    $qr = mysqli_query($connection,$query);

    while($row = mysqli_fetch_array($qr))
    {
        echo "ID&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:&nbsp".$row[0]."</br>";
        echo "Name&nbsp&nbsp&nbsp&nbsp&nbsp:&nbsp".$row[1]."</br>";
        echo "Aadhar&nbsp&nbsp&nbsp:&nbsp".$row[2]."</br>";
        echo "DOB&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:&nbsp".$row[3]."</br>";
        echo "Gender&nbsp&nbsp&nbsp&nbsp:&nbsp".$row[4]."</br>";
        echo "Address&nbsp&nbsp:&nbsp".$row[5]."</br>";

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
