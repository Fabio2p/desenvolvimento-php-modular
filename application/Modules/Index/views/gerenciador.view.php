<!DOCTYPE html>
<html>
<head>
	<title><?php echo $view_title;?></title>
</head>
<body>

<header class="cabecalho">
	<nav class="menus">
		<ul class="container-menus">
			<li><a href="#">testes</a></li>
			<li><a href="#">testes 02</a></li>
			<li><a href="#">testes 03</a></li>
		</ul>
	</nav>

	<form action="" method="post" name="form-pesquisar">
		<input type="search" name="buscar_por_nome" placeholder="Pesquisar por nome" />
		<input type="search" name="buscar_por_codigo" placeholder="Pesquisar por código" />
		<input type="submit" name="buscar" value="Pesquisar" />
	</form>
</header>

<article class="container-wrap">
	<h1>teste</h1>

	<section id="result">
		<figure>
			<img src="" />	
		</figure>

		<p>
			entendendo os elementos do html5
		</p>
	</section>
</article>	

</body>
</html>