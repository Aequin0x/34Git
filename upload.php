<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Upload de fichier</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<form enctype="multipart/form-data" method="POST">
		<fieldset>
			<label>Fichier : </label>
			<br>
			<br>
			<input type="file" name="files">
			<br>
			<br>
			<button>Envoie du fichier</button>
		</fieldset>
	</form>
</body>
</html>
<?php 
if(isset($_FILES['files'])){
	$limit = 512;
	// Un tableau avec les extensions valides
	$checkExts = array("jpg", "jpeg", "gif", "png");

	$name = uniqid().$_FILES['files']['name'];
	$extension = pathinfo($_FILES['files']['name'])['extension'];
	// Je converto la taille du fichier en Ko
	$size = $_FILES['files']['size'] / 1024;
	if($size < $limit && in_array($extension, $checkExts)){
		if(!is_dir('upload')){
			mkdir('upload');
		}
		move_uploaded_file($_FILES['files']['tmp_name'], __DIR__."/upload/".$name);
	}else{
		echo "<h1 style='color:red'>Votre fichier est trop volumineux ou le format n'est pas pris en charge</h1>";
	}
}
?>