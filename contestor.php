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

    $v_ids = $_POST['vid'];
    // foreach($v_ids as $v_id)
    // { echo $v_id;}
    session_start();
    $ad_id = $_SESSION["ad_id"];
    $con_id = $_SESSION["con_id"];
    foreach($v_ids as $v_id)
    {
        //alter table to change eligible status

        $query = "insert into contestor values ('$v_id','$ad_id','$con_id') ;";
        $qr = mysqli_query($connection,$query);
        if($qr)
            echo $v_id."</br>";
    }
    echo "THank You";
    session_destroy();
    ?>

    <form action=admin.php method = "POST">
    <input type="submit" name="ad_id" value="<?php echo $ad_id; ?>"/>
    </form>
    <button><a href="index.html">Home</a></button>
    <?php

}
?>