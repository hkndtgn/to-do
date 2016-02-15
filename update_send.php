<?php

require_once 'connection/init.php';

if(isset($_POST['as'], $_POST['item'])) {
	$as = $_POST['as'];
	$item = $_POST['item'];
	$name = $_POST['name'];
	
	switch($as) {
		case 'update':
			$updateQuery = $db->prepare("
			UPDATE items
			SET name = '$name'
			WHERE id = '$item'
			AND user = :user
			");
			
			$updateQuery->execute([
				'item' => $item,
				'user' => $_SESSION['user_id']
			]);
		break;
		}
}
var_dump($_POST['name']);
header('Location: index.php');
?>