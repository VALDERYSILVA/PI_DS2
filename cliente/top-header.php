<?php


$usuario = $_SESSION['nome'];

$cliente = substr($usuario, 0, strpos($usuario, ' '));

?>

<div id="content">

	<!--top--navbar----design--------->

	<div class="top-navbar">
		<nav class="navbar  navbar-expand-lg">
			<button type="button" id="sidebar-collapse" class="d-xl-block d-lg-block d-md-none d-none">
				<span class="material-icons">&#xe9bd;</span>
			</button>

			<a class="navbar-brand" href="#">Home</a>
			<button class="d-inline-block d-lg-none ml-auto more-button" type="button" data-toggle="collapse" data-target="#navbarcollapse" aria-controls="navbarcollapse" aria-expanded="false" aria-label="Toggle">
				<span class="material-icons">&#xe5d2;</span>
			</button>
			<div class="collapse navbar-collapse d-lg-block d-xl-block d-sm-none d-md-none d-none" id="navbarcollapse">

				<?php
				echo "<ul class='nav navbar-nav ml-auto'>

					<li class='nav-item'>
						<a class='navbar-brand' href='#' data-toggle='dropdown'>
							<h5>Olá, $cliente</h5>
						</a>
						<ul class='dropdown-menu'>
							<li>
								<a href='#' onclick='editarSenha($cod)'>
								<i class='material-icons mr-2'>&#xeade;</i>
								<span>Alterar Senha</span>
								</a>
							</li>
							<li>
								<a href='sair.php'>
									<i class='material-icons mr-2'>&#xe9ba;</i>
									<span>Sair</span>
								</a>
							</li>
						</ul>
					</li>

				</ul>"

				?>

			</div>

		</nav>
	</div>