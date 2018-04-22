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

    session_start();
    $con_id=$_POST["con_id"];
    $_SESSION["con_id"]=$con_id;
    $query = "select v_id 
              from nominee where con_id = '$con_id' ";
    $qr = mysqli_query($connection,$query);
    // while($row = mysqli_fetch_assoc($qr))
    // {
    //     echo $row['v_id'];echo "</br>";
    // }
    ?>
    <form action="contestor.php" method="POST">
    <?php
    
    while($row = mysqli_fetch_array($qr))
    {?>
            <input type="checkbox" name="vid[]" id="color" value="<?php echo $row['v_id'] ?>"> <?php echo $row['v_id'] ?> <br/>
    
    <?php
    }?>
    <input type="submit">
    </form>
    <?php
}
?>