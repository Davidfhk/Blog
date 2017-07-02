<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Blog</title>
<!-- 	<link rel="stylesheet" type="text/css" href="../public/css/style.css"> -->
</head>
<body>

		<!-- recorremos el array de objetos -->
		
			<?php foreach($posts as $post): ?>
				<h3><?= $post->getTitle() ?></h3>
				<h4><?= $post->getDatePost() ?></h4>
				<div style='width:400px'>
					<?= $post->getComment() ?>
				</div>
				<img src="../public/image/<?= $post->getImage()?>" style='width:100px' />
				<hr>
			<?php endforeach ?>

		
	<table>
		<form action="<?='post/addPost/'?>" method="POST">
			<tr>
				<td></td>
			</tr>
			<tr>
				<td><input type="text" name="title"></td>
			</tr>
			<tr>
				<td><textarea name="comment"></textarea></td>
			</tr>
			<input type="hidden" name="MAX_TAM" value="2097152">
			<tr>
				<td><input type="submit" name="enviar" value="Insertar"></td>
			</tr>
		</form>
	</table>
</body>
</html>