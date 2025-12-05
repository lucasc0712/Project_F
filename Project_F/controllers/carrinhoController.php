<?php

class carrinhoController extends controller{

    private $info;

    public function __construct(){
        parent::__construct();

        $this->info = array(
            'title' => 'Carrinho'
        );
    }


    public function index(){
        if(!isset($_SESSION['id_usuario'])){
            header("Location: ".BASE_APP."login");
            exit;
        }


        // checar se é nulo dependendo da origem 
        $produto_id = $_POST['produto'] ?? null;
        $produto_id_menos = $_POST['produto_menos'] ?? null;
        $produto_remover = $_POST['produto_remover'] ?? null;

        $carrinho = new Carrinho();

        if($produto_id){
            $carrinho->adicionar($_SESSION['id_usuario'], $produto_id);
        } 
        else if($produto_id_menos){
            $carrinho->subtrair($_SESSION['id_usuario'], $produto_id_menos);
        } 
        else if($produto_remover){
            $carrinho->remover($_SESSION['id_usuario'], $produto_remover);
        }

        $list_carrinho = $carrinho->getCarrinho($_SESSION['id_usuario']);

        $this->info['list'] = $list_carrinho;

        $this->loadTemplate('carrinho', $this->info);
    }
}


