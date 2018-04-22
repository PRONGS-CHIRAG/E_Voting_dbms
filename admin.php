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
        ?>
<!DOCTYPE html>
<html>
<body>
        <script>
        alert("you are logged in successfully");
        </script>
</body>
</html>
<?php
}
?>

<html>
<head>
<style>
body {
    margin: 0;
}

ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    width: 25%;
    background-color: #f1f1f1;
    position: fixed;
    height: 50%;
    overflow: auto;
}

li a {
    display: block;
    color: #000;
    padding: 8px 0 8px 16px;
    text-decoration: none;
}

li a.active {
    background-color: #4CAF50;
    color: white;
}

li a:hover:not(.active) {
    background-color: #555;
    color: white;
}

#admin {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    height: 25px;
    background-color: black;
    color: white
}
#constituency,#approve,#contestor,#result,#id01,#id02,#id03{
    display: none;
}

.divs{
        margin-left:25%;
        padding:1px 16px;
        height:50%;
        background-color: #555;
}
#logout{
        position: right;

}

</style>
</head>
<body>

<div>
<?php
session_start();
$ad_id = $_POST["ad_id"];
$_SESSION["ad_id"]=$ad_id;
echo $ad_id;
?>
</div>

<ul>
  <li><a onclick="disp1()">Constituency</a></li>
  <li><a onclick="disp2()">Approve Nominations</a></li>
  <li><a onclick="disp3()">Contestors List</a></li>
  <li><a onclick="disp4()">Result</a></li>
  <li><a onclick="disp5()">Display Details</a></li>
  <li><a href="index.html">Logout</a></li>
</ul>

<div id="constituency" class="divs">
<h1>hELLO</hELLO>
<?php
echo "gaja";
$ad_id = $_POST["ad_id"];
$pwd = $_POST["pwd"];
$query = "select con_id,con_name
              from constituency where ad_id = '$ad_id' ";
    $qr = mysqli_query($connection,$query);
    ?>
    <html><body><table><tr>
        <th>Constituency ID</th>
        <th>Constituency Name</th>
    </tr>
    <?php
    while($row = mysqli_fetch_array($qr))
    {
        ?><tr>
            <td><?php echo $row[0]; ?></td>
            <td><?php echo $row[1];?></td>
        </tr>
        <?php
    }?>

    </table>
    </body>
    </html>
<?php

// $query = "select ad_id,ad_pwd from admn";
// $qr = mysqli_query($connection,$query);
// while($row = mysqli_fetch_array($qr))
// {
//         if($row[0]==$ad_id && $row[1]==$pwd)
//         {
//                 session_start();
//                 $_SESSION["ad_id"]=$ad_id;
//                 $_SESSION["pwd"]=$pwd;
//                 // include 'adminpage1.php';
//                 // header("location:./adminpage1");
//         }
// }


?>

</div>

<div id="approve" class="divs" > 
<label for="con_id"><b>Constituecny ID</b></label></br>
<form action="nominee.php" method="POST">
<input type="text" placeholder="Enter Constituency ID" name="con_id">
<input type="submit"  />
</form> 
<!-- <button type="button" onclick="document.getElementById('id01').style.display='block'" >Get Nominations</button> -->

<!-- <div id="id01">
        <h3>Nominees List</h3><br/>
        <form action="nominee.php" method="POST">
                <input type="checkbox" name="color[]" id="color" value="red"> 1 <br/>
                <input type="checkbox" name="color[]" id="color" value="red"> 2 <br/>
                <input type="checkbox" name="color[]" id="color" value="red"> 3 <br/>
                <input type="checkbox" name="color[]" id="color" value="red"> 4 <br/>
                <input type="checkbox" name="color[]" id="color" value="red"> 5 <br/>
                <button type="button" onclick="document.getElementById('id01').style.display='none'">Approve</button>
        </form>       
</div>
 -->

</div>

<div id="contestor" class="divs" > 
<label for="con_id"><b>Constituecny ID</b></label></br>
<?php
// session_start();
$_SESSION["ad_id"]=$ad_id;
?>
<form method="post" action="displaycontestor.php">
   <input type="text" placeholder="Enter Constituency ID" name="con_id"></br>
   <input type="submit" name="submit" value="Submit Form"><br>
</form>
</div>
<!-- <button type="button" onclick="document.getElementById('id02').style.display='block'" >Get Constestors List</button> -->

<div id="result" class="divs" > 
<label for="con_id"><b>Constituecny ID</b></label></br>
<input type="text" placeholder="Enter Constituency ID" name="con_id">
<button type="button" onclick="document.getElementById('id03').style.display='block'" >Get Results</button>
<div id="id03">
        <h3>Results</h3>
        <form action="" method="POST">
                <table>
                <tr><td>Contestor ID</td><td>Number of votes</td></tr>
                
                <tr><td><?php echo"coming soon"?></td><td><?php echo"coming soon"?></td></tr>
                <tr><td><?php echo"coming soon"?></td><td><?php echo"coming soon"?></td></tr>
                <tr><td><?php echo"coming soon"?></td><td><?php echo"coming soon"?></td></tr>                
                </table>
        <button type="button" onclick="document.getElementById('id03').style.display='none'">Update to website</button>
        </form>
</div>
</div>

<div id="display" class="divs" > 
$_SESSION["ad_id"]=$ad_id;
<label for="v_id"><b>Voter ID</b></label></br>
<form method="post" action="displayvoterinfo.php">
   <input type="text" placeholder="Enter Voter Id" name="v_id"></br>
   <input type="submit" name="submit" value="Submit Form"><br>
</form>

<script>

    var a=document.getElementById("constituency");
    var b=document.getElementById("approve");
    var c=document.getElementById("contestor");
    var d=document.getElementById("result");
    var e=document.getElementById("display");
    function disp1()
    {        
        // console.log("gaja");
        a.style.display="block";
        b.style.display="none";
        c.style.display="none";
        d.style.display="none";
        e.style.display="none";
    }

    function disp2()
    {
        a.style.display="none";
        b.style.display="block";
        c.style.display="none";
        d.style.display="none";
        e.style.display="none";

    }
    function disp3()
    {
        a.style.display="none";
        b.style.display="none";
        c.style.display="block";
        d.style.display="none";
        e.style.display="none";

    }

    function disp4()
    {
        a.style.display="none";
        b.style.display="none";
        c.style.display="none";
        d.style.display="block";
        e.style.display="none";
    }

    function disp5()
    {
        a.style.display="none";
        b.style.display="none";
        c.style.display="none";
        d.style.display="none";
        e.style.display="block";
    }


</script>
</body>
</html>
