<?php 

/**
 * Categoria
 */
class Garantia extends Conexao
{
    
    # ATRIBUTOS	
	public $pdo;
    
    public function __construct()
    {
        $this->pdo = Conexao::conexao();               
    }

    /**
     * listar
     * @return array
     */
    public function listar(){
    	//montar o SELECT ou o SQL
    	$sql = $this->pdo->prepare('SELECT * FROM garantia ORDER BY prazo');
    	//executar a consulta
    	$sql->execute();
    	//pegar os dados retornados
    	$dados = $sql->fetchAll(PDO::FETCH_OBJ);
    	return $dados;
    }

    /**
     * cadastrar a categoria
     *
     * @param Array $dados
     * @return int 
     */
    public function cadastrar(Array $dados)
    {
        $sql = $this->pdo->prepare('INSERT INTO garantia
                                    (descricao, prazo)
                                    VALUES
                                    (:descricao, :prazo)
                                    ');

        // tratar os dados

        $descricao       = $dados['descricao'];
        $prazo           = $dados['prazo'];

        //mesclar os dados
        $sql->bindParam(':descricao',$descricao);
        $sql->bindParam(':prazo',$prazo);
        //executar
        $sql->execute();
        return $this->pdo->lastInsertId();
    }

    
    // /**
    //  * Excluir Categoria
    //  *
    //  * @param integer $id_categoria
    //  * @return void
    //  */
    // public function excluir(int $id_garantia)
    // {
    //     // atualizar todas as noticias dessa categoria
    //     // para a categoria padrão
    //     $pdo = $this->pdo->prepare('UPDATE noticias SET 
    //                                 id_categoria = 1
    //                                 WHERE
    //                                 id_categoria = :id_categoria
    //                                 AND
    //                                 id_noticia > 0
    //                             ');
    //     $pdo->bindParam(':id_categoria',$id_categoria);
    //     $pdo->execute();

    //     // excluir a categoria
    //     //$sql = $this->pdo->prepare('DELETE FROM categorias WHERE id_categoria = :id_categoria');
    //     $sql = $this->pdo->prepare('UPDATE categorias SET 
    //                                 excluido = 1
    //                                 WHERE 
    //                                 id_categoria = :id_categoria
    //                             ');
    //     $sql->bindParam(':id_categoria',$id_categoria);
    //     $sql->execute();
    // }

    /**
     * mostra a categoria
     *
     * @param integer $id_garantia
     * @return object
     */
    public function mostrar(int $id_garantia)
    {
        $sql = $this->pdo->prepare('SELECT * FROM garantia WHERE id_garantia = :id_garantia');
        $sql->bindParam(':id_garantia',$id_garantia);
        $sql->execute();
        return $sql->fetch(PDO::FETCH_OBJ);
    }

    /**
     * editar
     *
     * @param array $dados
     * @return int
     */
    public function editar(array $dados)
    {
        if($dados['id_garantia'] != '' && isset($dados['id_garantia']) ){
           
            $sql = $this->pdo->prepare('UPDATE garantia SET 
                                    prazo = :prazo,
                                    descricao = :descricao
                                    WHERE 
                                    id_garantia = :id_garantia
                                ');

            $sql->bindParam(':id_garantia',$dados['id_garantia']);
            $sql->bindParam(':prazo',$dados['prazo']);
            $sql->bindParam(':descricao',$dados['descricao']);
            $sql->execute();
            return $dados['id_garantia'];
        }
        else
        {
            return false;
        }
    }


}

?>