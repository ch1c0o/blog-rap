<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Connexion2</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
	<div class="header">
		Enregistrez - vous 
	</div>

	<form method="post" action="register.php">

		<?php include('errors.php'); ?>

		<div class="form">
		<div class="input-group">
			<label>Prénom</label>
			<input type="text" placeholder="Entrer votre Prénom"name="username" value="<?php echo $username; ?>">
		</div>
		<div class="input-group">
			<label>Email</label>
			<input type="email" placeholder="Entrer votre Email"name="email" value="<?php echo $email; ?>">
		</div>
		<div class="input-group">
			<label>Mot de passe</label>
			<input type="password" placeholder="Entrer votre mot de passe"name="password_1">
		</div>
		<div class="input-group">
			<label>Confirmer Mot de passe</label>
			<input type="password" placeholder="Confirmer votre mot de passe"name="password_2">
		</div>
		<div class="input-group">
			<button type="submit" class="login100-form-btn" name="reg_user">s'enregistrer</button>
		</div>
		<br>
		<p>
			Déja membre ? <a href="login.php">Connexion</a>
		</p>
	</form>
</body>
</html>
