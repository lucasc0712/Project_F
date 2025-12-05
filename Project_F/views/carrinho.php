<div class="container mt-4">
    <h3>Carrinho de Compras</h3>
    <table class="table table-bordered">
	    <thead class="table-dark">
	        <tr>
	            <th>Produto</th>
	            <th style="width:150px;">Quantidade</th>
	            <th style="width:80px;">Remover</th>
	        </tr>
	    </thead>

	    <tbody>
	    	<?php foreach($list as $produto): ?>
		        <tr>
		            <td>
		                <div class="d-flex align-items-center">
		                    <img src="<?php echo BASE_APP.'media/produtos/'.$produto['url_foto']?>" class="rounded me-3 img-fluid" 
		                    style="max-width: 10vh; max-height: 10vh;">
		                    <div>
		                        <strong><?php echo $produto['descricao']?></strong>
		                    </div>
		                </div>
		            </td>

		            <td>
		            	<div class="d-flex align-items-center">
		            		<form action="<?php echo BASE_APP?>carrinho" method="POST">
								<input type="hidden" name="produto_menos" value=<?php echo $produto['id_produto']?> >

			                	<button class="btn" href="<?php echo BASE_APP;?>carrinho" type="submit">
			                		<img src="<?php echo BASE_APP;?>media/icon/dash-square.svg">
			                	</button>
			                </form>

		                	<input type="number" class="" value="<?php echo $produto['quantidade']?>" min="1" style="width: 10vh;">

		                	<form action="<?php echo BASE_APP?>carrinho" method="POST">
							    <input type="hidden" name="produto" value=<?php echo $produto['id_produto']?> >

			                	<button class="btn" href="<?php echo BASE_APP;?>carrinho" type="submit">
			                		<img src="<?php echo BASE_APP;?>media/icon/plus-square-fill.svg" >
			                	</button>
			                </form>
		                </div>

		            </td>

		            <td>

		            	<div class="d-flex align-items-center justify-content-center">
		            		<form action="<?php echo BASE_APP?>carrinho" method="POST">
								<input type="hidden" name="produto_remover" value=<?php echo $produto['id_produto']?> >

		                		<button class="btn btn-danger btn-sm" href="<?php echo BASE_APP;?>carrinho" type="submit">X</button>
		                	</form>
		                </div>
		            </td>
		        </tr>
		    <?php endforeach;?>
	    </tbody>
	</table>

	<?php if(count($list) > 0): ?>
		<div class="container d-flex justify-content-between mt-5">
			<form action="<?php echo BASE_APP?>home">
				<button class="btn corazul1 rounded-4 align-self-center" style="height:10vh;" type="submit"><strong>Continuar Comprando</strong></button>
			</form>

			<form action="<?php echo BASE_APP?>pagamento">
				<button class="btn corazul1 rounded-4" style="height:10vh;" type="submit"><strong>Ir Para Pagamento</strong></button>
			</form>
		</div>

	<?php else: ?>
		<div class="container d-flex justify-content-center mt-5">
			<form action="<?php echo BASE_APP?>home">
				<button class="btn corazul1 rounded-4" style="height:10vh;" type="submit"><strong>Ver Produtos</strong></button>
			</form>
		</div>

	<?php endif; ?>


</div>
