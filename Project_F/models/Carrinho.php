<?php
class Carrinho extends model {

    public function getCarrinho($id_usuario){
        $retorno;

        $sql = "SELECT 
                    c.id AS id_carrinho,
                    c.id_usuario,
                    c.id_produto,
                    c.quantidade,
                    p.descricao,
                    p.url_foto
                FROM carrinho c
                INNER JOIN produto p 
                ON p.id = c.id_produto
                WHERE c.id_usuario = :id_usuario
                AND p.inativo <> 1";

        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id_usuario', $id_usuario);
        $sql->execute();

        if($sql->rowCount() > 0){
            $retorno = $sql->fetchAll(\PDO::FETCH_ASSOC);
        }

        return $retorno ?? array();
    }

    public function adicionar($id_usuario, $id_produto){
        $sql = "SELECT estoque 
                FROM produto
                WHERE id = :id 
                AND inativo <> 1";

        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id', $id_produto);
        $sql->execute();

        if($sql->rowCount() > 0){
            $produto = $sql->fetch(\PDO::FETCH_ASSOC);
        }


        if(!$produto || $produto['estoque'] <= 0){
            return null;
        }

        $sql = "UPDATE produto 
                SET estoque = estoque - 1 
                WHERE id = :id";

        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id', $id_produto);
        $sql->execute();

        $sql = "SELECT quantidade 
                FROM carrinho 
                WHERE id_usuario = :u 
                AND id_produto = :p";

        $sql = $this->db->prepare($sql);
        $sql->bindValue(':u', $id_usuario);
        $sql->bindValue(':p', $id_produto);
        $sql->execute();

        if($sql->rowCount() > 0){
            $update = "UPDATE carrinho 
                        SET quantidade = quantidade + 1
                        WHERE id_usuario = :u 
                        AND id_produto = :p";

            $update = $this->db->prepare($update);
            $update->bindValue(':u', $id_usuario);
            $update->bindValue(':p', $id_produto);
            $update->execute();
        } else {
            $insert = "INSERT INTO carrinho (id_usuario, id_produto, quantidade)
                        VALUES (:u, :p, 1)";

            $insert = $this->db->prepare($insert);
            $insert->bindValue(':u', $id_usuario);
            $insert->bindValue(':p', $id_produto);
            $insert->execute();
        }
    }

    public function subtrair($id_usuario, $id_produto){
        $sql = "UPDATE produto 
                SET estoque = estoque + 1 
                WHERE id = :id";

        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id', $id_produto);
        $sql->execute();

        $sql = "UPDATE carrinho 
                SET quantidade = quantidade - 1
                WHERE id_usuario = :u 
                AND id_produto = :p";

        $sql = $this->db->prepare($sql);

        $sql->bindValue(':u', $id_usuario);
        $sql->bindValue(':p', $id_produto);
        $sql->execute();

        $sql ="DELETE FROM carrinho
                WHERE quantidade <= 0
                AND id_usuario = :u 
                AND id_produto = :p";

        $sql = $this->db->prepare($sql);
        $sql->bindValue(':u', $id_usuario);
        $sql->bindValue(':p', $id_produto);
        $sql->execute();
    }

    public function remover($id_usuario, $id_produto){
        $sql = "SELECT quantidade 
                FROM carrinho
                WHERE id_usuario = :u 
                AND id_produto = :p";

        $sql = $this->db->prepare($sql);
        $sql->bindValue(':u', $id_usuario);
        $sql->bindValue(':p', $id_produto);
        $sql->execute();

        if($sql->rowCount() > 0){
            $item = $sql->fetch(\PDO::FETCH_ASSOC);

            if(!$item) return;
        }


        $sql = "UPDATE produto 
                SET estoque = estoque + :q 
                WHERE id = :id";

        $sql = $this->db->prepare($sql);
        $sql->bindValue(':q', $item['quantidade']);
        $sql->bindValue(':id', $id_produto);
        $sql->execute();

        $sql = "DELETE FROM carrinho 
                WHERE id_usuario = :u 
                AND id_produto = :p";

        $sql = $this->db->prepare($sql);
        $sql->bindValue(':u', $id_usuario);
        $sql->bindValue(':p', $id_produto);
        $sql->execute();
    }
}