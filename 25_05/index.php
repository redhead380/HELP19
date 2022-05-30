<!DOCTYPE HTML>
<!--
	Projection by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	<head>
		<title>HELP19 - Para seu antigo normal ser o novo normal</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body>
		<?php
			session_start();
			if (isset($_SESSION["usuario"]) == false) {
				header("Location: /25_05/login.html");
			}
		?>
		<!-- Header -->
			<header id="header">
				<div class="inner">
					<a href="index.php" class="logo"><strong>HELP19</strong></a>
					<nav id="nav">
						<a href="index.php">Home</a>
						<a href="agendamentos.html">Agendamentos</a>
						<a href="generic.html">Sobre nós</a>
						<a href="elements.html">Contato/serviços</a>
						<a href="sair.php">Sair</a>
					</nav>
					<a href="#navPanel" class="navPanelToggle"><span class="fa fa-bars"></span></a>
				</div>
			</header>

		<!-- Banner -->
			<section id="banner">
				<div class="inner">
					<header>
						<h1>HELP19</h1>
						<p>Para seu antigo normal ser o novo normal</p>
					</header>

					<div class="flex ">

						<div>
							<span class="icon fa-car"></span>
							<h3>Atendimento</h3>
							<p>presencial com especialistas</p>
						</div>

						<div>
							<span class="icon fa-camera"></span>
							<h3>Videochamada</h3>
							<p>Um medico pronto para atendelo <br> mesmo a distancia</p>
						</div>

						<div>
							<span class="icon fa-bug"></span>
							<h3>Cuidado</h3>
							<p>O mundo esta mudando <br> voce pode mudar tambem</p>
						</div>

					</div>

					<footer>
						<a href="escolha.html" class="button">Iniciar triagem</a>
					</footer>
				</div>
			</section>


		<!-- Three -->
			<section id="three" class="wrapper align-center">
				<div class="inner">
					<div class="flex flex-2">
						<article>
							<div class="image round">
								<img src="images/pic01.jpg" alt="Pic 01" />
							</div>
							<header>
								<h3>Já possui conta ?<br /> Acesse abaixo</h3>
							</header>
							<p>Acessando sua conta podera verificar<br /> suas triagens anteriores.<br /></p>
							<footer>
								<a href="login.html" class="button">Acessar</a>
							</footer>
						</article>
						<article>
							<div class="image round">
								<img src="images/pic02.jpg" alt="Pic 02" />
							</div>
							<header>
								<h3>Não possui conta?<br /> Crie agora mesmo!</h3>
							</header>
							<p>Criando sua conta voce podera<br />além de verificar suas triagens anteriores<br /> podera ser direcionado para o centro medico com convenio.</p>
							<footer>
								<a href="login.html" class="button">Criar conta</a>
							</footer>
						</article>
					</div>
				</div>
			</section>

		<!-- Footer -->
			<footer id="footer">
				<div class="inner">

					<h3>Duvidas e opinioes </h3>

					<form action="#" method="post">

						<div class="field half first">
							<label for="name">Name</label>
							<input name="name" id="name" type="text" placeholder="Name">
						</div>
						<div class="field half">
							<label for="email">Email</label>
							<input name="email" id="email" type="email" placeholder="Email">
						</div>
						<div class="field">
							<label for="message">Message</label>
							<textarea name="message" id="message" rows="6" placeholder="Message"></textarea>
						</div>
						<ul class="actions">
							<li><input value="Enviar" class="button alt" type="submit"></li>
						</ul>
					</form>

					<div class="copyright">
						&copy; Untitled. Design: <a href="https://portal.fmu.br/">FMU</a>. Images: <a href="https://unsplash.com">Unsplash</a>.
					</div>

				</div>
			</footer>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>