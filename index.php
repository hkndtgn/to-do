<?php
error_reporting(-1);
ini_set('display_errors', 'On');
require_once 'connection/init.php';

$itemsQuery = $db->prepare("
	SELECT id, name, done
	FROM items
	WHERE user = :user
");

$itemsQuery->execute([
	'user' => $_SESSION['user_id']
]);

$items = $itemsQuery->rowCount() ? $itemsQuery : [];
?>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="./css/style.css" />
		<link href="http://fonts.googleapis.com/css?family=Shadows+Into+Light+Two" rel="stylesheet">
	</head>
	<body>
		<div class="container">
			<div class="list">
				<h1 class="header">To do.</h1>
				<?php if (!empty($items)): ?>
					<ul class="items">
						<?php foreach($items as $item): ?>
						<li>
							<span class="item<?php echo $item['done'] ? ' done' : '' ?>"><?php echo $item['name']; ?></span>
							<?php if(!$item['done']): ?>
								<a href="mark.php?as=done&item=<?php echo $item['id']; ?>" class="done-button">Mark as done</a>
							<?php endif; ?>
							<?php if($item['done']): ?>
								<a href="mark.php?as=undo&item=<?php echo $item['id']; ?>" class="undo-button">Ongedaan maken</a>
							<?php endif; ?>
							<?php if($item['done']): ?>
								<a href="mark.php?as=delete&item=<?php echo $item['id']; ?>" class="delete-button">Verwijderen</a>
							<?php endif; ?>
							<?php if($item['done']): ?>
								<a href="update3.php?as=update&item=<?php echo $item['id']; ?>" class="update-button">Update</a>
							<?php endif; ?>
						</li>
						<?php endforeach; ?>
					</ul>
					<?php else: ?>
						<p>Je hebt nog geen items gezet.</p>
				<?php endif; ?>
				
				<form class="item-add" action="add.php" method="post">
					<input type="text" name="name" placeholder="Voer een nieuwe item hier." class="input" autocomplete="off" required>
					<input type="submit" value="Toevoegen" class="submit">
				</form>
		</div>
	</body>
</html>