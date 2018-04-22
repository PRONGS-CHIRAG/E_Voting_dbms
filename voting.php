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
        $query = "select * from voter_INFO where v_id='$v_id'";
        $qr = mysqli_query($connection,$query);
        $row = mysqli_fetch_assoc($qr);
        ?>
        <html>
        <body>
       
        <ul>
                <li><?php echo $row['V_ID']; ?></li>
                <li><?php echo $row['V_NAME']; ?></li>
                <li><?php echo $row['ADDRESS']; ?></li>
                <li><?php echo $row['GENDER']; ?></li>
                <li><?php echo $row['CON_ID']; ?></li>
        </ul>
        
        
        <form action="display.php">
        <button type="submit">Proceed Next</button>
        
        </form>
        </body>
        </html>
        <?php
}
?>