<?php defined("_EXEC")or die("Restricted Access!");

// Inicia uma sessao
App::session();?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> <?= $view_usuario;?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?=BASE_SITE?>/assets/css/bootstrap.css">
    <link rel="stylesheet" href="<?=BASE_SITE?>/assets/css/google-font.css">
    <script src="main.js"></script>
</head>
<body>
   
   <p><a href="?module=Users&option=Login&view=logout&id_user=<?=base64_encode(session_id());?>">Sair</a></p>

   <table class="table table-striped">
        <thead>
            <th>Titulo</th>
            <th>status</th>
            <th>Autor</th>
            <th>Criado em</th>
            <th>Id</th>
        </thead>
   </table>
</body>
</html>