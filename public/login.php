<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Connexion</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>

	<div class="header">
		Connectez - Vous
	</div>

	<form method="post" action="login.php">

		<?php include('errors.php'); ?>

		<div class="input-group">
			<label>Prénom</label>
			<input type="text" placeholder="Entrer votre prénom" name="username" >
		</div>
		<div class="input-group">
			<label>Mot de Passe</label>
			<input type="password" placeholder="Entrer votre Mot de passe" name="password">
		</div>
		<br>
		<div class="input-group">
			<button type="submit" class="login100-form-btn" name="login_user">Connexion</button>
		</div>
		<br>
		<p>
			Vous êtes pas encore membre ? <a href="register.php">S'enregistrer</a>
		</p>
	</form>


</body>
</html>
