<link rel="stylesheet" type="text/css" href="<?php echo BASE_APP; ?>assets/css/home.css">


<section>

	<div class="container-fluid mt-4">
	    <div class="row">
	        <div class="col-12 col-md-3 mb-4">

	            <h5 class="mb-3">Filtrar</h5>

	            <div class="dropdown mb-3">
	                <button class="btn btn-outline-secondary w-100 d-flex justify-content-between align-items-center"
	                        data-bs-toggle="dropdown">
	                    Categorias
	                    <i class="bi bi-chevron-down"></i>
	                </button>

	                <ul class="dropdown-menu p-3 w-100">

	                    <div class="form-check">
	                        <input class="form-check-input" type="checkbox" id="cat1">
	                        <label class="form-check-label" for="cat1">Suplemento</label>
	                    </div>

	                    <div class="form-check">
	                        <input class="form-check-input" type="checkbox" id="cat2">
	                        <label class="form-check-label" for="cat2">Vitamina</label>
	                    </div>

	                    <div class="form-check">
	                        <input class="form-check-input" type="checkbox" id="cat3">
	                        <label class="form-check-label" for="cat3">Acessorios e Shakeiras</label>
	                    </div>

	                </ul>
	            </div>
	            
	            <div class="dropdown mb-3">
	                <button class="btn btn-outline-secondary w-100 d-flex justify-content-between align-items-center"
	                        data-bs-toggle="dropdown">
	                    Faixa de Preço
	                    <i class="bi bi-chevron-down"></i>
	                </button>

	                <ul class="dropdown-menu p-3 w-100">

	                    <div class="form-check">
	                        <input class="form-check-input" type="checkbox" id="preco1">
	                        <label class="form-check-label" for="preco1">Até R$ 50</label>
	                    </div>

	                    <div class="form-check">
	                        <input class="form-check-input" type="checkbox" id="preco2">
	                        <label class="form-check-label" for="preco2">R$ 50 a R$ 150</label>
	                    </div>

	                    <div class="form-check">
	                        <input class="form-check-input" type="checkbox" id="preco3">
	                        <label class="form-check-label" for="preco3">Acima de R$ 150</label>
	                    </div>

	                </ul>
	            </div>

	        </div>

	        <div class="col-md-9">
            <div class="row g-4">

                <?php foreach($list as $produto): ?>
                    <div class="col-12 col-sm-6 col-md-4">
                        <div class="card h-100 shadow-sm">
                            <img src="<?php echo BASE_APP.'media/produtos/'.$produto['url_foto']; ?>" 
                                 class="card-img-top img-fluid" 
                                 style="max-height: 200px; object-fit: contain;">

                            <div class="card-body d-flex flex-column">
                                <h6 class="card-title"><?php echo $produto['descricao']; ?></h6>

                                <p class="text-muted mb-1"><?php echo $produto['marca']; ?></p>

                                <strong class="text-success mb-3">
                                    R$ <?php echo number_format($produto['valor'],2,',','.'); ?>
                                </strong>

                                <!--

                                <a href="" class="btn btn-success mt-auto w-100">
                                    Comprar Agora
                                </a>

                                -->
                                <?php if($produto['estoque'] > 0): ?>
	                                <form action="<?php echo BASE_APP?>carrinho" method="POST">
									    <input type="hidden" name="produto" value=<?php echo $produto['id']?> >
		                                <button href="<?php echo BASE_APP?>carrinho" 
										   class="btn btn-success mt-2 w-100" type="submit"> 
										    Adicionar ao Carrinho
										</button>
									</form>
								<?php else: ?>
		                                <button href="#" 
										   class="btn corvermelho1 mt-2 w-100"> 
										    Sem Estoque
										</button>
								<?php endif; ?>


                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

	        </div>

	    </div>
	</div>

	
</section>