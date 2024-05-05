<?php 

/**
 * Categoria
 */
class Fabricante extends Conexao
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
    	$sql = $this->pdo->prepare('SELECT * FROM fabricante
        INNER JOIN garantia ON garantia.id_garantia = fabricante.id_garantia
        order by fabricante.nome, garantia.prazo asc');
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
        $sql = $this->pdo->prepare('INSERT INTO fabricante
                                    (nome, id_garantia)
                                    VALUES
                                    (:nome, :id_garantia)
                                    ');
        //mesclar os dados
        $sql->bindParam(':nome',$dados['nome']);
        $sql->bindParam(':id_garantia',$dados['id_garantia']);
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
    // public function excluir(int $id_fabricante)
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
     * @param integer $id_fabricante
     * @return object
     */
    public function mostrar(int $id_fabricante)
    {
        $sql = $this->pdo->prepare('SELECT * FROM fabricante WHERE id_fabricante = :id_fabricante');
        $sql->bindParam(':id_fabricante',$id_fabricante);
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
        if($dados['id_fabricante'] != '' && isset($dados['id_fabricante']) ){
           
            $sql = $this->pdo->prepare('UPDATE fabricante SET 
                                    nome = :nome,
                                    id_garantia = :id_garantia
                                    WHERE 
                                    id_fabricante = :id_fabricante
                                ');

            $sql->bindParam(':id_fabricante',$dados['id_fabricante']);
            $sql->bindParam(':nome',$dados['nome']);
            $sql->bindParam(':id_garantia',$dados['id_garantia']);
            $sql->execute();
            return $dados['id_fabricante'];
        }
        else
        {
            return false;
        }
    }


}

?>