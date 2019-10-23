<?php
	session_start();

	// variable declaration
	$username = "";
	$email    = "";
	$errors = array();
	$_SESSION['success'] = "";

	//database credentials
	define('DB_HOST', 'localhost');
	define('DB_NAME', 'miniblog');
	define('DB_USER', 'root');
	define('DB_PASS', '');

	$db = new PDO('mysql:dbname='.DB_NAME.';host='.DB_HOST, DB_USER, DB_PASS);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	// REGISTER USER
	if (isset($_POST['reg_user'])) {
		// receive all input values from the form
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
		$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

		// form validation: ensure that the form is correctly filled
		if (empty($username)) { array_push($errors, "Prénom manquant"); }
		if (empty($email)) { array_push($errors, "Email manquant"); }
		if (empty($password_1)) { array_push($errors, "Mot de passe manquant"); }

		if ($password_1 != $password_2) {
			array_push($errors, "Les deux mots de passe ne correspondent pas entre eux");
		}



		// register user if there are no errors in the form
		if (count($errors) == 0) {
			$password = md5($password_1);//encrypt the password before saving in the database
			$query = "INSERT INTO users (username, email, password)
					  VALUES('$username', '$email', '$password')";
			mysqli_query($db, $query);

			$_SESSION['username'] = $username;
			$_SESSION['success'] = "connexion OK";
			header('location: index.php');
		}

	}

	// ...

	// LOGIN USER
	if (isset($_POST['login_user'])) {
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$password = mysqli_real_escape_string($db, $_POST['password']);

		if (empty($username)) {
			array_push($errors, "Prénom requis");
		}
		if (empty($password)) {
			array_push($errors, "Mot de passe Requis");
		}

		if (count($errors) == 0) {
			$password = md5($password);
			$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
			$results = mysqli_query($db, $query);

			if (mysqli_num_rows($results) == 1) {
				$_SESSION['username'] = $username;
				header('location: index.php');
			}else {
				array_push($errors, "La combinaison Prénom/Mot de passe Incorrect !");
			}
		}
	}

?>
