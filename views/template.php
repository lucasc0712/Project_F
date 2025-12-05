<!DOCTYPE html>
<html>
<head>
	<title>Supra force</title>
	<link href="<?php echo BASE_APP; ?>assets/css/bootstrap.min.css" rel="stylesheet">
	<meta charset="utf-8">
	<meta name='viewport' content="width=devide-width, initial-scale=1.0,maximum-scale=1.0">
	<link href="<?php echo BASE_APP; ?>assets/css/template.css" rel="stylesheet">
</head>
<body>	

	<header>
		<nav class="navbar bg-body-tertiary">          
		  <div class="container-fluid w-100">
			<nav class="navbar navbar-expand-lg w-100" >
				<div class="d-flex container ">
					<a class="navbar-brand col-mb-1" href="<?php echo BASE_APP; ?>home">
					<img src="<?php echo BASE_APP; ?>media/empresa/logocircular.png" alt="Logo" style="height:15vh;width:15hv;">
					</a>

					<div class="collapse navbar-collapse col-mb-5" id="navbarNav">
						<ul class="navbar-nav">
							<li class="nav-item">
								<a class="nav-link active" aria-current="page" href="<?php echo BASE_APP; ?>home">Home</a>
							</li>
							<li class="nav-item">
							<a class="nav-link" href="<?php echo BASE_APP; ?>home">Promoções</a>
							</li>
							<li class="nav-item">
							<a class="nav-link" href="<?php echo BASE_APP; ?>home">Novidades</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="navbar-collapse">
					<div class="navbar-nav">
						<div class="nav-item">
							<form class="d-flex" role="search" method="GET" action="<?php echo BASE_APP; ?>home">
							<input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="texto" value="<?php echo (isset($_GET['texto']))?$_GET['texto']:null; ?>" />
							<button class="btn btn-outline-dark " type="submit">Pesquisar</button>
							</form>
						</div>
					</div>
				</div>
				<div class="navbar-collapse col-mb-5 justify-content-end">
					<ul class="navbar-nav">
						<li class="nav-item align-self-center">
							<a class="nav-link" type="button" data-bs-toggle="offcanvas" data-bs-target="#menuDireita" href="#" width="30vh" height="30vh">
								<img src="<?php echo BASE_APP;?>media/icon/list.svg"  width="30vh" height="30vh"> 
							</a>
						</li>
					</ul>
				</div>
			</nav>
		  </div>
		</nav>
	</header>

	<section id="offcanvas-login">
		<?php $u = new Usuarios();
			if($u->isLogged()): ?>
			<div class="offcanvas offcanvas-end" tabindex="-1" id="menuDireita">
				<div class="offcanvas-header">
				    <h5 class="offcanvas-title"></h5>
				    <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
				</div>

				<div class="offcanvas-body ">
					<div class="container">
				    	<p>Olá, <?php echo $_SESSION['usuario'] ?> </p>
				    </div>

				     <ul class="list-group list-group-flush">

			            <li class="list-group-item">
			                <a href="#" class="d-flex align-items-center text-decoration-none text-dark">
			                    <img src="<?php echo BASE_APP; ?>media/icon/person.svg"class="me-2 fs-5">
			                    Perfil
			                </a>
			            </li>

			            <li class="list-group-item">
			                <a href="<?php echo BASE_APP?>carrinho" class="d-flex align-items-center text-decoration-none text-dark">
			                    <img src="<?php echo BASE_APP; ?>media/icon/cart.svg"class="me-2 fs-5">
			                    Carrinho
			                </a>
			            </li>

			            <li class="list-group-item">
			                <a href="#" class="d-flex align-items-center text-decoration-none text-dark">
			                    <img src="<?php echo BASE_APP; ?>media/icon/bag-check.svg"class="me-2 fs-5">
			                    Meus Pedidos
			                </a>
			            </li>

			            <li class="list-group-item">
			            </li>
			        </ul>

				    <div class="container d-flex justify-content-center mt-3">
				    	<a href="<?php echo BASE_APP?>login/logout_action" class="btn btn-secondary corvermelho1">Desconectar</a>
				    </div>
				</div>
			</div>
		<?php else: ?>
			<div class="offcanvas offcanvas-end" tabindex="-1" id="menuDireita">
				<div class="offcanvas-header">
				    <h5 class="offcanvas-title"></h5>
				    <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
				</div>

				<div class="offcanvas-body ">
					<div class="container">
				    	<p>Conecte-se para visualizar as opções</p>
				    </div>
				    <div class="container d-flex justify-content-center">
				    	<a href="<?php echo BASE_APP?>login" class="btn btn-secondary corazul1">Login</a>
				    </div>
				</div>
			</div>
		<?php endif; ?>
	</section>

	<main>
		<?php $this->loadViewInTemplate($viewName, $viewData); ?>
	</main>

	<footer>
		<div class="container" style="height: 35vh;"></div>
		
		<div class="container corpreto1 rounded-4">
			<div class="corpreto1" style="height: 5vh;"></div>
			<div class="row align-items-start">

				<div class="col-md-4 mb-3 d-flex">
				<img src="<?php echo BASE_APP; ?>media/empresa/logoquadrada.png" alt="Logo" style="max-width:20vh;max-height:20vh;">
				</div>

				<div class="col-md-4 mb-3">
				<h5 class="font-weight-bold">Informações</h5>
				<ul class="list-unstyled">
					<li><a href="#" class="text-dark text-decoration-none">Sobre nós</a></li>
					<li><a href="#" class="text-dark text-decoration-none">Unidades</a></li>
					<li><a href="#" class="text-dark text-decoration-none">Institucional</a></li>
					<li><a href="#" class="text-dark text-decoration-none">Trabalhe Conosco</a></li>
					<li><a href="#" class="text-dark text-decoration-none">Privacidade</a></li>
				</ul>
				</div>

				<div class="col-md-4 mb-3">
				<h5 class="font-weight-bold">Contatos</h5>
				<ul class="list-unstyled">
					<li><strong>Email:</strong> contato@supraforce.com</li>
					<li><strong>Telefone:</strong> (17) 99999-9999</li>
				</ul>
				</div>

			</div>
		</div>
	</footer>

	<script src="<?php echo BASE_APP; ?>assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>