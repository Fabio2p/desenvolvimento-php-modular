<!DOCTYPE html>
<html>
<head>
	<title>Efetuar Login</title>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<script src="<?=BASE_SITE?>/assets/js/form.action.js"></script>

	<link rel="stylesheet" href="<?=BASE_SITE?>/assets/css/bootstrap.css">

	<link rel="stylesheet" href="<?=BASE_SITE?>/assets/css/style.css">

	<link rel="stylesheet" href="<?=BASE_SITE?>/assets/css/google-font.css">

</head>
<body class="bg-body">
		<?php App::token();?>
		
		<form action="#" method="POST" name="login_submit" class="form-login">
			<div id="results"></div>
			<fieldset>

				<legend class="legend">Efetuar login</legend>

				<label  class="label" for="user">Uusário</label>
				
				<input  class="input-text" type="text" id="user" name="user" autocomplete="off" />
				
				<label  class="label" for="pass">Senha</label>
				
				<input  class="input-password" type="password" id="pass" name="pass" autocomplete="off" />
				<input  class="input-password verify" type="hidden" id="verify" name="verify" autocomplete="off" placeholder="Informe o Token" />
				<input type="hidden" name="token" value="<?= $_SESSION['token'];?>">
				<input  class="button-submit" type="submit" value="Acessar" />

			</fieldset>
		</form>
		
</body>
</html>