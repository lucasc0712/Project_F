<link rel="stylesheet" type="text/css" href="<?php echo BASE_APP; ?>assets/css/login.css">
<section id="wrapper">
	<div class="box">
		<form method="POST" action="<?php echo BASE_APP; ?>login/login_action">
			<div class="row">
				<div class="col-lg-12 col-sm-12">
					<input type="text" name="usuario" id="usuario" placeholder="Usuário" required="" class="form-control">
				</div>
			</div>
			<div class="row mb-2">
				<div class="col-lg-12 col-sm-12 mt-2">
					<input type="password" name="senha" id="senha" placeholder="Senha" required="" class="form-control">
				</div>
			</div> 
			<div class="row">
				<div class="col-lg-12 col-sm-12">
					<button type="submit" class="btn corazul1 w-100">Logar</button>
				</div>
			</div>
		</form>
	</div>
</section>