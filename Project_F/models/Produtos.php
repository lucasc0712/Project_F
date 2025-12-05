<?php
class Produtos extends model{

	public $id_produto;
	public $nome;
	public $vlr_produto;
	public $url_foto;
	public $marca;

	public function getLimit($limit = 6){
		$retorno = array();

		$sql = "SELECT * 
				  FROM produto
				  WHERE inativo <> 1
				 ORDER BY descricao LIMIT ".$limit;

		$sql = $this->db->query($sql);
		if($sql->rowCount() > 0){
			$retorno = $sql->fetchAll(\PDO::FETCH_ASSOC);
		}

		return $retorno;
	}

	public function getSearch($texto){
		$retorno = array();

		$sql = "SELECT * 
				  FROM produto
				 WHERE descricao like :texto
				 AND inativo <> 1
				 ORDER BY descricao";

		$sql = $this->db->prepare($sql);
		$sql->bindValue(':texto', '%'.$texto.'%');
		$sql->execute();

		if($sql->rowCount() > 0){
			$retorno = $sql->fetchAll(\PDO::FETCH_ASSOC);
		}

		return $retorno;
	}

	public function getAll(){
		$retorno = array();

		$sql = "SELECT * FROM produto ORDER BY descricao";

		$sql = $this->db->query($sql);
		if($sql->rowCount() > 0){
			$retorno = $sql->fetchAll(\PDO::FETCH_ASSOC);
		}

		return $retorno;
	}

	public function adicionar($arquivo = array()){
		$sql = "INSERT INTO produtos(descricao, valor, marca)
		             VALUES (:nome, :vlr_produto, :marca)";

		$sql = $this->db->prepare($sql);
		$sql->bindValue(':nome'       , $this->nome);
		$sql->bindValue(':vlr_produto', $this->valor);
		$sql->bindValue(':marca'      , $this->marca);
		$sql->execute();

		$this->id_produto = $this->db->lastInsertId();

		if(isset($arquivo['tmp_name']) && !empty($arquivo['tmp_name'])){
			$allowed_images = array('image/jpeg','image/png', 'image/jpg');

			$tmp_name = $arquivo['tmp_name'];
			$type     = $arquivo['type'];

			if(in_array($type, $allowed_images)){
				$this->uploadImage($tmp_name, $type);
			}
		}
	}

	private function uploadImage($tmp_name, $type){
		if($type == 'image/jpg' || $type == 'image/jpeg'){
			$originalImg = imagecreatefromjpeg($tmp_name);
		}elseif($type == 'image/png'){
			$originalImg = imagecreatefrompng($tmp_name);
		}

		if(!empty($originalImg)){
			$width  = 600;
			$height = 600;

			$ratio = $width/$height;
			list($originalWidth, $originalHeight) = getimagesize($tmp_name);
			$originalRatio = $originalWidth/$originalHeight;

			if($ratio > $originalRatio){
				$img_w = $height * $originalRatio;
				$img_h = $height;
			}else{
				$img_w = $width * $originalRatio;
				$img_h = $width;
			}

			if($img_w < $width){
				$img_h = $width;
				$img_w = $img_w * $originalRatio;
			}
			if($img_h < $height){
				$img_h = $height;
				$img_w = $img_h * $originalRatio;
			}		

			$px = 0;
			$py = 0;

			if($img_w > $width){
				$px = ($img_w - $width)/2;
			}	
			if($img_h > $height){
				$py = ($img_h - $height)/2;
			}

			$img = imagecreatetruecolor($width, $height);

			imagecopyresampled($img, $originalImg, -$px, -$py, 0, 0, $img_w, $img_h, $originalWidth, $originalHeight);

			$filename = md5(time().rand(0,999)).'.jpg';

			imagejpeg($img, './media/produtos/'.$filename);

			$sql = "UPDATE produto
			           SET url_foto   = :filename
			         WHERE id = :id_produto";

			$sql = $this->db->prepare($sql);
			$sql->bindValue(':filename'  , $filename);
			$sql->bindValue(':id_produto', $this->id_produto);
			$sql->execute();
		}

	}

	public function getProduto($arquivo = array()){
		$retorno = array();

		$sql = "SELECT * FROM produto 
				WHERE id IN :arquivo
				ORDER BY descricao";


		$sql = $this->db->prepare($sql);
		$sql->bindValue(':arquivo'  , $arquivo);
		$sql->execute();

		if($sql->rowCount() > 0){
			$retorno = $sql->fetchAll(\PDO::FETCH_ASSOC);
		}

		return $retorno;
	}

}