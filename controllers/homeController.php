<?php
class homeController extends controller{

	private $info;

	public function __construct(){
		parent::__construct();

		$this->info = array(
			'title' => 'Home'
		);
	}

	public function index(){

		$texto = $_GET['texto'] ?? null;

		$produtos = new Produtos();


		if(!is_null($texto)){
			$this->info['list'] = $produtos->getSearch($texto);
		}else{
			$this->info['list'] = $produtos->getLimit(15);
		}
		

		$this->loadTemplate('home', $this->info);
	}

}