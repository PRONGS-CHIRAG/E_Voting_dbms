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

echo ("you are in timeline.php");
echo "</br>";
$v_name = $_POST["v_name"];
$v_id = $_POST["v_id"];
// echo $v_name,$v_id;
$query = "select v_name,v_id from voter_info";
$qr = mysqli_query($connection,$query);
while($row = mysqli_fetch_array($qr))
{
        if($row[0]==$v_name && $row[1]==$v_id)
        {
                session_start();
                $_SESSION["v_name"]=$v_name;
                $_SESSION["v_id"]=$v_id;
                echo "validated";
                include "voting.php";
                
        }
}

}

?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>

        <button onclick="document.getElementById('id01').style.display='block'" style="float:right;width:auto;">Admin Login</button>


</body>

</html>