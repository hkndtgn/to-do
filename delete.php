<?php
	include_once('connection/init.php');
 
	if( isset($_GET['done']) )
	{
		$id = $_GET['done'];
		$sql= "DELETE FROM apple WHERE id='$id'";
		$res= mysql_query($sql) or die("Failed".mysql_error());
		echo "<meta http-equiv='refresh' content='0;url=index.php'>";
	}
?>