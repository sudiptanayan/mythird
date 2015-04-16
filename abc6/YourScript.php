<?php
session_start();



 $user_name = "root";
$password = "";
$database = "new";
$server = "localhost";

$db_found = mysqli_connect($server, $user_name, $password,$database);

//$db_found = mysqli_select_db($database, $db_handle);

if (!$db_found) {

print "Database NOT Found " . $db_handle;
//exit();
}

if(!isset($_SESSION["count"]))
{
$SQL = "SELECT count(username) as count  FROM login";
$result = mysqli_query($db_found,$SQL);
$db_field = mysqli_fetch_assoc($result);
$_SESSION["count"]=$db_field["count"];
$_SESSION["pcount"]=$db_field["count"];
}

$SQL = "SELECT count(username) as count  FROM login";
$result = mysqli_query($db_found,$SQL);
$db_field = mysqli_fetch_assoc($result);
$count=$db_field["count"];

$message="";
$username="";


if($count>$_SESSION["count"])
{
	$i=1;
	$SQL = "SELECT username,message  FROM login";
$result = mysqli_query($db_found,$SQL);

 while(($db_field = mysqli_fetch_assoc($result))&&$i<=$count)
 {

   if($i==$count){
   $username=$db_field["username"];
   $message=$db_field["message"];

}
   $i++;
}
$_SESSION["pcount"]=$_SESSION["count"];
$_SESSION["count"]=$count;
echo "<div class='bubble'>"."<i>".$username."</i><br><br>"."Message: <br><br>".$message."</div>";
}



mysqli_close($db_found);

?>