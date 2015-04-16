<?php
 session_start();

 //$_SESSION['count']=0;
 //$_SESSION['pcount']=0;
 ?>
<html>
<head>
	<title>Hello</title>
<style type="text/css">
.bubble
{
background:#3498DB;
border:2px solid #ffff00;
font-size:35px;
line-height:1.3em;
margin:10px auto;
padding:10px;
position:relative;
text-align:center;
width:400px;
border-radius:10px;
-moz-border-radius:10px;
-webkit-border-radius:10px;
-moz-box-shadow:0 0 5px #888888;
-webkit-box-shadow:0 0 5px #888888;
box-shadow:0 0 35px #888888;
float:right;

}

.bubble_border
{
border-color:#666666 transparent transparent transparent;
border-style:solid;
border-width:15px;
width:0;
height:0;
position:absolute;
bottom:-32px;
left:30px;
}
/*.bubble_arrow
{
border-color: #cccccc transparent transparent transparent;
  border-style: solid;
  border-width: 15px;
  height:0;
  width:0;
  position:absolute;
  bottom:-29px;
  left:30px;
} */

#call{
	width: 18px;
	height: 13px;
}
table.hovertable {
	font-family: verdana,arial,sans-serif;
	font-size:11px;
	color:#333333;
	border-width: 1px;
	border-color: #999999;
	border-collapse: collapse;
}

table.hovertable th {
	background-color:#c3dde0;
	border-width: 1px;
	padding: 8px;
	border-style: solid;
	border-color: #a9c6c9;
}
table.hovertable tr {
	background-color:#ff0077;
}
table.hovertable td {
	border-width: 1px;
	padding: 8px;
	border-style: solid;
	border-color: #a9c6c9;
}
</style>
<script type="text/javascript">
function enable () {
	var v=document.getElementById('fg');
	v.innerHTML="hi";
}
</script>

</head>
<body>
<?php

/*
if(array_key_exists('count', $_SESSION))
{
if($_SESSION['count']>$_SESSION['pcount'])
{

	*/?>

<!--<div class="bubble">


<div id="responsecontainer"></div>

</div>-->

<?php/*
}

}
*/
?>
<!--<?php
 $i=0;
 if(array_key_exists('count',$_SESSION))
 {
 ?>
<div class="bubble">
<?php
print_r($_SESSION['count']);
print_r($_SESSION['pcount']);
?>

<div id="responsecontainer">Hello this is bubble! <?php echo $i; $i++; ?></div>

</div>
<?php
}
?>
-->

<!--<div class="bubble">-->


<!--<div id="responsecontainer"> </div>-->

<!--</div>-->
<div id="camera"></div>
<form action="upload.php" method="post" enctype="multipart/form-data">
  <input type="file" name="image" accept="image/*" capture>
  <input type="submit" value="Upload">
</form>
<div id="responsecontainer"> </div>

<?php

?>
<button id="call"></button>

<!--<div id="responsecontainer">
</div>-->
<table class="hovertable">
<tr><td>Login</td></tr>
<tr>
	<th>Info Header 1</th><th>Info Header 2</th><th>Info Header 3</th>
</tr>
<tr onmouseover="this.style.backgroundColor='#ffff66';" onmouseout="this.style.backgroundColor='#d4e3e5';">
	<td>Item 1A</td><td>Item 1B</td><td>Item 1C</td>
</tr>
<tr onmouseover="this.style.backgroundColor='#ffff66';" onmouseout="this.style.backgroundColor='#d4e3e5';">
	<td>Item 2A</td><td>Item 2B</td><td>Item 2C</td>
</tr>
<tr  onmouseover="this.style.backgroundColor='#ffff66';" onmouseout="this.style.backgroundColor='#d4e3e5';">
	<td>Item 3A</td><td>Item 3B</td><td>Item 3C</td>
</tr>
<tr onmouseover="this.style.backgroundColor='#ffff66';" onmouseout="this.style.backgroundColor='#d4e3e5';">
	<td>Item 4A</td><td>Item 4B</td><td>Item 4C</td>
</tr>
<tr onmouseover="this.style.backgroundColor='#ffff66';" onmouseout="this.style.backgroundColor='#d4e3e5';">
	<td>Item 5A</td><td>Item 5B</td><td>Item 5C</td>
</tr>
</table>
<script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
<!--<script src="js/bubble.js" type="text/javascript"></script>-->
<script type="text/javascript">

$(document).ready(function(){
   //$(".bubble").show(1000);

   /*$("#call").click(function()
   {
      $(".bubble").show(1000);
   });*/	
   $("#responsecontainer").mouseover(function(){
   	$(".bubble").hide(500);
   });






   /*$("tr").mouseover(function()
   {
   	$(".bubble").show(100);
   });*/
});
</script>
<!--reponsive container jQuery-->
<script>
 $(document).ready(function() {
      

 	 $("#responsecontainer").load('YourScript.php');
 	 //$(".bubble").hide();
   var refreshId = setInterval(function() {
      $("#responsecontainer").load('YourScript.php');

   }, 1000);
   $(".bubble").show(5000);
   $.ajaxSetup({ cache: false });
});
</script>
</body>
</html>