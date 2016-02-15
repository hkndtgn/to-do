<?php
	require_once 'connection/init.php';
 
	if( isset($_GET['update']) )
	{
		$id = $_GET['update'];
		$res= mysql_query("SELECT * FROM item WHERE id='$id'");
		$row= mysql_fetch_array($res);
	}
 
	if( isset($_POST['newname2']) )
	{
		$newName = $_POST['name'];
		$id  	 = $_POST['id'];
		$sql     = "UPDATE items SET name='$newName' WHERE id='$id'";
		$res 	 = mysql_query($sql) 
                                    or die("Could not update".mysql_error());
		echo "<meta http-equiv='refresh' content='0;url=index.php'>";
	}
 
?>
<form action="index.php" method="POST">
Name: <input type="text" name="newName" value="<?php echo $row[1]; ?>"><br />
<input type="submit" value=" Update "/>
</form>