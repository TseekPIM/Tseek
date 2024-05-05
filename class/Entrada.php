  <?php
       
    /**
    * Categoria
    */
    class Entrada extends Conexao
    {
    
    # ATRIBUTOS	
	public $pdo;
    
    public function __construct()
    {
        $this->pdo = Conexao::conexao();               
    
    }

    /**
     * Pesquisar produto
     * @return array
     */
    public function pesquisarEntrada($q){
    	//montar o SELECT ou o SQL
    	$sql = $this->pdo->prepare('SELECT *, fornecedor.razao_social,
        entrada.nota_fiscal, produtos_individuais.lote, entrada.data,usuarios.nome,produtos_individuais.n_serie,produtos.quantidade

         FROM produtos_individuais
        INNER JOIN produtos ON produtos.id_produto = produtos_individuais.id_produto
        INNER JOIN entrada ON entrada.id_entrada = produtos_individuais.id_entrada 
        INNER JOIN fornecedor ON fornecedor.id_fornecedor = entrada.id_fornecedor 
        INNER JOIN usuarios ON usuarios.id_usuario = entrada.id_usuario
        WHERE 
        produtos.nome like :nome_produto  
        or fornecedor.razao_social    like :razao_social
        or produtos_individuais.lote  like :lote
        or produtos.id_produto    like :id_produto
        or entrada.data               like :data
        or entrada.nota_fiscal        like :nota_fiscal
        or usuarios.nome              like :nome_usuario
        or produtos_individuais.n_serie              like :n_serie
        or quantidade                 like :quantidade
        order by produtos.quantidade, produtos.nome, produtos.id_produto asc');

        // mesclas
        $pesquisado = '%'.$q.'%';
        $sql->bindParam(':nome_produto',$pesquisado);
        $sql->bindParam(':id_produto',$pesquisado);
        $sql->bindParam(':razao_social',$pesquisado);
        $sql->bindParam(':lote',$pesquisado);
        $sql->bindParam(':data',$pesquisado);
        $sql->bindParam(':nota_fiscal',$pesquisado);
        $sql->bindParam(':nome_usuario',$pesquisado);
        $sql->bindParam(':n_serie',$pesquisado);
        $sql->bindParam(':quantidade',$pesquisado);
    	//executar a consulta
    	$sql->execute();
    	//pegar os dados retornados
    	$dados = $sql->fetchAll(PDO::FETCH_OBJ);
    	return $dados;
   	 }

     /**
     * listar
     * @return array
     */
    public function listarEntrada(){
    	//montar o SELECT ou o SQL
    	$sql = $this->pdo->prepare('SELECT * FROM produtos_individuais
        INNER JOIN produtos ON produtos.id_produto = produtos_individuais.id_produto
        INNER JOIN entrada ON entrada.id_entrada = produtos_individuais.id_entrada 
        INNER JOIN fornecedor ON fornecedor.id_fornecedor = entrada.id_fornecedor 
        INNER JOIN usuarios ON usuarios.id_usuario = entrada.id_usuario 
        ORDER BY data');
    	//executar a consulta
    	$sql->execute();
    	//pegar os dados retornados
    	$dados = $sql->fetchAll(PDO::FETCH_OBJ);
    	return $dados;
    }

       /**
     * listar
     * @return array
     */
    public function listar(){
    	//montar o SELECT ou o SQL
    	$sql = $this->pdo->prepare('SELECT * FROM entrada ORDER BY id_entrada');
    	//executar a consulta
    	$sql->execute();
    	//pegar os dados retornados
    	$dados = $sql->fetchAll(PDO::FETCH_OBJ);
    	return $dados;
    }

    public function CadastrarEntradaDoProduto(array $dados)
    {

            //Rotina de inserção na tabela de "entrada"
            //print_r($dados);die;
                $sql_entrada = $this->pdo->prepare('INSERT INTO entrada
                                        (id_usuario,id_fornecedor,nota_fiscal,data)
                                        VALUES 
                                        (:id_usuario,:id_fornecedor,:nota_fiscal,:data)
                                        ');
                                    
            
                
                // TRATAR OS DADOS
            
                $data                   = date('Y-m-d H:i:s');
                $id_usuario             = $dados['id_usuario'];
                $id_fornecedor          = $dados['id_fornecedor'];
                $nota_fiscal            = $dados['nota_fiscal'];
            
            
                $sql_entrada->bindParam(':id_usuario', $id_usuario);
                $sql_entrada->bindParam(':id_fornecedor', $id_fornecedor);
                $sql_entrada->bindParam(':nota_fiscal', $nota_fiscal);
                $sql_entrada->bindParam(':data', $data);
            
                $sql_entrada->execute();
                $id_entrada_inserida = $this->pdo->lastInsertId();
                
                $id_entrada = $id_entrada_inserida;
                //FIM - Rotina de inserção na tabela de "entrada"

            //Rotina de inserção na tabela de produtos individuais
            for($i = 1; $i <= $dados['quantidade']; $i++){    

                $sql_prod_individual = $this->pdo->prepare('INSERT INTO produtos_individuais
                                                        (id_entrada,id_produto, lote,n_serie,preco_compra)
                                                        VALUES 
                                                        (:id_entrada,:id_produto,:lote,:n_serie,:preco_compra)
                                                        ');

                $id_produto     = $dados['id_produto'];
                $lote           = $dados['lote'];
                
                //Esse numero deveria ser na verdade o numero real estampado no produto, mas para simulação utilizaremos um numero aleatorio.
                $n_serie        = rand(1111,9999);

                $preco_compra   = str_replace(",",".",$dados['preco_compra']);
                

                $sql_prod_individual->bindParam(':id_entrada', $id_entrada);
                $sql_prod_individual->bindParam(':id_produto', $id_produto);
                $sql_prod_individual->bindParam(':lote', $lote);
                $sql_prod_individual->bindParam(':n_serie', $n_serie);
                $sql_prod_individual->bindParam(':preco_compra', $preco_compra);
                
                $sql_prod_individual->execute();  
            }
            //FIM - Rotina de inserção na tabela de produtos individuais            


        //Rotina de atualização da quantidade na tabela produtos
        $sql_update = $this->pdo->prepare('UPDATE produtos SET quantidade = IFNULL(quantidade , 0) + :quantidade WHERE id_produto = :id_produto ');

        $sql_update->bindParam(':id_produto', $dados['id_produto']);
        $sql_update->bindParam(':quantidade',  $dados['quantidade']);

        $sql_update->execute();

        // FIM - Rotina de atualização da uantidade na tabela produtos
        // Comando para mostrar qual sintaxe SQL foi rodadda no Banco - colocar depois do Execute
    //    $sql_update->debugDumpParams();

    }

    
  
    // //Função excluir 
      
    //  /**
    //  * Excluir entrada
    //  *
    //  * @param integer $id_entrada
    //  * @return void (esse metodo não retorna nada)
    //  */
    // public function excluir(int $id_entrada)
    // {
    //     $sql = $this->pdo->prepare('DELETE FROM entrada WHERE id_entrada = :id_entrada');
    //     $sql->bindParam(':id_entrada',$id_entrada);
    //     $sql->execute();

    //     $sql_excluir = $this->pdo->prepare('DELETE FROM produtos_individuais 
    //                                         WHERE id_produto_individual = :id_produto_individual');
    //     $sql_excluir->bindParam(':id_produto_individual',$id_produto_individual);
    //     $sql_excluir->execute(); 
    // }
    
    // //FIM - Função excluir 



    /**
     * mostrar
     * @param int $id_produto
     * @return object
     */
    public function mostrar(int $id_usuario){
    	//montar o SELECT ou o SQL
    	$sql = $this->pdo->prepare('SELECT * FROM produtos WHERE id_usuario = :id_usuario');
        $sql->bindParam(':id_usuario', $id_usuario);
    	//executar a consulta
    	$sql->execute();
    	//pegar os dados retornados
    	$dados = $sql->fetch(PDO::FETCH_OBJ);
    	return $dados;
    }


}
    ?>