<?php
class loginController extends controller{

	private $info;

	public function __construct(){
		parent::__construct();

		$this->info = array(
			'title' => 'Login'
		);
	}

	public function index(){

		$this->loadTemplate('login', $this->info);
	}

	public function login_action(){

		$usuario = $_POST['usuario'];
		$senha   = $_POST['senha'];

		if(!empty($usuario) && !empty($senha)){

			$u = new Usuarios();
			if($u->validateLogin($usuario, $senha)){
				header("Location: ".BASE_APP);
				exit;
			}
		}

		header("Location: ".BASE_APP."login");
		exit;
	}

	public function logout_action(){
		session_start();
		session_unset();
		session_destroy();

		header("Location: ".BASE_APP."home");
		exit;
	}
}