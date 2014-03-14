<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>EasyContactForm</title>
	<link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
</head>
<body>
	<div class="container">
		<h1>EasyContactForm</h1>
		<?php
		if (isset($_SESSION["alert"]))
		{
			?>
			<div class="alert alert-<?= $_SESSION["alert"]["type"]; ?>">
				<?= $_SESSION["alert"]["content"]; ?>
			</div>
			<?php
			unset($_SESSION["alert"]);
		}
		?>
		<p>Pour me contacter, veuillez utiliser le formulaire suivant.<br />Je vous répondrais dès que possible.</p>
		<form action="action.php" class="form-horizontal" method="post">
			<fieldset>
				<legend>Formulaire de contact</legend>
				<div class="control-group">
					<label for="name" class="control-label">Nom et Prénom</label>
					<div class="controls">
						<input type="text" name="name" id="name" class="span4" value="<?= isset($_SESSION["form"]["name"]) ? $_SESSION["form"]["name"] : ""; ?>" />
					</div>
				</div>
				<div class="control-group">
					<label for="email" class="control-label">Adresse e-mail</label>
					<div class="controls">
						<input type="email" name="email" id="email" class="span4" value="<?= isset($_SESSION["form"]["email"]) ? $_SESSION["form"]["email"] : ""; ?>" />
					</div>
				</div>
				<div class="control-group">
					<label for="subject" class="control-label">Sujet</label>
					<div class="controls">
						<input type="text" name="subject" id="subject" class="span4" value="<?= isset($_SESSION["form"]["subject"]) ? $_SESSION["form"]["subject"] : ""; ?>" />
					</div>
				</div>
				<div class="control-group">
					<label for="content" class="control-label">Message</label>
					<div class="controls">
						<textarea name="content" id="content" class="span7" rows="8"><?= isset($_SESSION["form"]["content"]) ? $_SESSION["form"]["content"] : ""; ?></textarea>
					</div>
				</div>
				<div class="control-group">
					<div class="controls">
						<input type="submit" name="sendMessage" class="btn btn-primary" value="Envoyer" />
					</div>
				</div>
				<p>Note : tous les champs sont obligatoires.</p>
			</fieldset>
			<?php if (isset($_SESSION["form"])){ unset($_SESSION["form"]); } ?>
		</form>
	</div>
</body>
</html>