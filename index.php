<?php

header('Content-Type: text/html; charset=UTF-8');

require('app/config/config.php');
require('app/config/db.php');
require('app/functions/validate.function.php');
require('app/functions/helper.function.php');

if(!empty($_POST))
{
	fieldRequired('Imię', $_POST['name']);
	fieldRequired('Nazwisko', $_POST['surname']);
	fieldRequired('E-mail', $_POST['email']);
	if(!$isError)
	{
		isEmail('E-mail', $_POST['email']);
		compareFields($_POST['password'], $_POST['password2']);
	}
	
	if (!$isError)
	{
		$password = md5(PASS_SALT . $_POST['password']);
		$query = "INSERT INTO users SET user_name = '{$_POST['name']}', user_surname = '{$_POST['surname']}', user_email = '{$_POST['email']}', user_password = '$password'";
		if ($db->query($query))
		{
			echo 'Data was inserted Successfully';
		}
		else
		{
			echo 'Data has not been inserted!';
		}
	}
}

if (isset($_REQUEST['action']))
{
	$action = $_REQUEST['action'];

	switch ($action)
	{
		case 'delete':
			$sql = 'DELETE FROM users WHERE id = ' . (int) $_GET['id'];
			if ($db->query($sql))
			{
				echo 'Data was deleted';
			}
			break;
	}
}

?>

<!DOCTYPE html>
<html data-bs-theme="dark">
    <head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="assets/css/bootstrap/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/css/style.css" />
		<script type="text/javascript" src="assets/js/bootstrap/bootstrap.min.js"></script>
	</head>
	
	<body>
		<section class="content">
			<h1 class="align-center">Formularz rejestracji użytkownika</h1>
			<?php include ('templates/form.html.php'); ?>
		</section>
		<section class="content">
			<?php include ('templates/users.html.php'); ?>
		</section>
	</body>
</html>