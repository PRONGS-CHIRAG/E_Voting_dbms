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
    $con_id="$_POST["con_id"];
    $query = "select v_id 
              from nominee where con__id = '$con_id' ";
    $qr = mysqli_query($connection,$query);

    ?>

    <h3>Nominees List</h3><br/>


    <form action="contestor.php" method="POST">
    <?php
    while($row = mysqli_fetch_array($qr))
    {?>
            <input type="checkbox" name="vid[]" id="color" value="<?php row[0] ?>"> 1 <br/>
    
    <?php
    }
    ?>
    
    // <input type="checkbox" name="vid[]" id="color" value="red"> 2 <br/>
            // <input type="checkbox" name="vid[]" id="color" value="red"> 3 <br/>
            // <input type="checkbox" name="vid[]" id="color" value="red"> 4 <br/>
            // <input type="checkbox" name="vid[]" id="color" value="red"> 5 <br/>
            <button type="button" onclick="document.getElementById('id01').style.display='none'">Approve</button>
    </form> 